<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\AnimalExitLog;
use App\Models\Cage;
use App\Models\AnimalGrade;
use App\Models\AnimalCategory;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ActivityLogger;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $animals = Animal::with([
            'category',
            'grade',
            'cage'
        ]);

        // Filter berdasarkan kandang
        if ($request->filled('cage')) {
            $animals->where('cage_id', $request->cage);
        }

        // Filter berdasarkan grade
        if ($request->filled('grade')) {
            $animals->where('grade_id', $request->grade);
        }

        $animals = $animals->get();

        // Data kandang untuk filter
        $cages = Cage::orderByRaw(
            'CAST(SUBSTRING_INDEX(name, " ", -1) AS UNSIGNED)'
        )->get();

        // Data grade untuk filter
        $grades = AnimalGrade::orderBy('name')->get();

        return view('animals.index', compact(
            'animals',
            'cages',
            'grades'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = AnimalCategory::all();
        $grades = AnimalGrade::all();
        $cages = Cage::all();

        return view(
            'animals.create',
            compact(
                'categories',
                'grades',
                'cages'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',

            'category_id' => 'required',
            'grade_id' => 'required',
            'cage_id' => 'required',

            'gender' => 'required',

            'weight' => 'required|integer',
            'age' => 'required|integer',

            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'entry_date' => 'required',

            'status' => 'required',

            'description' => 'nullable',
        ]);

        $image = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store(
                    'animals',
                    'public'
                );

        }

        $lastAnimal = Animal::orderBy('animal_code', 'desc')->first();

        if ($lastAnimal) {

            $lastNumber = (int) substr($lastAnimal->animal_code, 3);

            $nextNumber = $lastNumber + 1;

        } else {

            $nextNumber = 1;

        }

        $animalCode = 'KMB' . str_pad(
            $nextNumber,
            3,
            '0',
            STR_PAD_LEFT
        );

        $animal = Animal::create([
            'animal_code' => $animalCode,

            'name' => $request->name,

            'category_id' => $request->category_id,
            'grade_id' => $request->grade_id,
            'cage_id' => $request->cage_id,

            'gender' => $request->gender,

            'weight' => $request->weight,
            'age' => $request->age,

            'image' => $image,

            'qr_code' => '',

            'entry_date' => $request->entry_date,

            'status' => $request->status,

            'description' => $request->description,

            'user_id' => auth()->id(),
        ]);

        $animal->update([
            'qr_code' => route(
                'website.animal.detail',
                $animal->animal_code
            )
        ]);

        ActivityLogger::log(
            'Animal',
            'Create',
            'Menambahkan hewan "' . $animal->name . '"'
        );

        return redirect()
            ->route('animals.index')
            ->with(
                'success',
                'Hewan berhasil ditambahkan.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        $categories = AnimalCategory::all();
        $grades = AnimalGrade::all();
        $cages = Cage::all();

        return view(
            'animals.edit',
            compact(
                'animal',
                'categories',
                'grades',
                'cages'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name' => 'required|string|max:100',

            'category_id' => 'required',
            'grade_id' => 'required',
            'cage_id' => 'required',

            'gender' => 'required',

            'weight' => 'required|integer',
            'age' => 'required|integer',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

            'entry_date' => 'required|date',

            'status' => 'required',

            'description' => 'nullable|string',
        ]);

        // =========================
        // FOTO
        // =========================

        $image = $animal->image;

        if ($request->hasFile('image')) {

            // Hapus foto lama
            if ($animal->image) {
                Storage::disk('public')->delete($animal->image);
            }

            // Simpan foto baru
            $image = $request->file('image')
                ->store('animals', 'public');
        }


        // =========================
        // UPDATE DATA
        // =========================

        $animal->update([
            'name' => $request->name,

            'category_id' => $request->category_id,
            'grade_id' => $request->grade_id,
            'cage_id' => $request->cage_id,

            'gender' => $request->gender,

            'weight' => $request->weight,
            'age' => $request->age,

            'image' => $image,

            'entry_date' => $request->entry_date,

            'status' => $request->status,

            'description' => $request->description,
        ]);


        // =========================
        // ACTIVITY LOG
        // =========================

        ActivityLogger::log(
            'Animal',
            'Update',
            'Mengubah data hewan "' . $animal->name . '"'
        );


        return redirect()
            ->route('animals.index')
            ->with(
                'success',
                'Data hewan berhasil diperbarui.'
            );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        // Simpan data hewan sebelum dihapus
        AnimalExitLog::create([
            'animal_id' => $animal->id,
            'animal_code' => $animal->animal_code,
            'name' => $animal->name,

            'category_id' => $animal->category_id,
            'cage_id' => $animal->cage_id,
            'grade_id' => $animal->grade_id,

            'entry_date' => $animal->entry_date,
            'exit_date' => now()->toDateString(),

            'reason' => 'Disembelih',

            'user_id' => auth()->id(),
        ]);

        // Simpan nama untuk activity log
        $animalName = $animal->name;

        // Hapus gambar
        if ($animal->image) {
            Storage::disk('public')
                ->delete($animal->image);
        }

        // Hapus QR Code
        if ($animal->qr_code) {
            Storage::disk('public')
                ->delete($animal->qr_code);
        }

        // Hapus data hewan
        $animal->delete();

        // Catat aktivitas user
        ActivityLogger::log(
            'Animal',
            'Delete',
            'Menghapus hewan "' . $animalName . '"'
        );

        return redirect()
            ->route('animals.index')
            ->with(
                'success',
                'Data hewan berhasil dihapus dan dicatat sebagai hewan keluar.'
            );
    }

    public function detail(Animal $animal)
    {
        return view('animals.detail_index', compact('animal'));
    }

    public function qrcode(Animal $animal)
    {
        return view(
            'animals.qrcode',
            compact('animal')
        );
    }

    public function downloadQr(Animal $animal)
    {
        $svg = QrCode::size(500)
            ->margin(2)
            ->generate(
                route(
                    'website.animal.detail',
                    $animal->animal_code
                )
            );

        return response($svg)
            ->header('Content-Type', 'image/svg+xml')
            ->header(
                'Content-Disposition',
                'attachment; filename="'.$animal->animal_code.'.svg"'
            );
    }

    public function reportPdf(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Data hewan masuk
        $animalsIn = Animal::with([
            'category',
            'grade',
            'cage'
        ])
        ->when($startDate, function ($query) use ($startDate) {
            $query->whereDate('entry_date', '>=', $startDate);
        })
        ->when($endDate, function ($query) use ($endDate) {
            $query->whereDate('entry_date', '<=', $endDate);
        })
        ->orderBy('entry_date', 'asc')
        ->get();

        // Data hewan keluar
        $animalsOut = \App\Models\AnimalExitLog::with([
            'category',
            'grade',
            'cage'
        ])
        ->when($startDate, function ($query) use ($startDate) {
            $query->whereDate('exit_date', '>=', $startDate);
        })
        ->when($endDate, function ($query) use ($endDate) {
            $query->whereDate('exit_date', '<=', $endDate);
        })
        ->orderBy('exit_date', 'asc')
        ->get();

        // Hewan yang masih tersedia
        $animalsAvailable = Animal::count();

        $pdf = Pdf::loadView('animals.report-pdf', compact(
            'animalsIn',
            'animalsOut',
            'animalsAvailable',
            'startDate',
            'endDate'
        ));

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream(
            'Laporan_Data_Hewan.pdf'
        );
    }
}
