<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Cage;
use App\Models\AnimalGrade;
use App\Models\AnimalCategory;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ActivityLogger;

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

        if ($request->filled('cage')) {
            $animals->where('cage_id', $request->cage);
        }

        $animals = $animals->get();

        $cages = Cage::orderByRaw(
            'CAST(SUBSTRING_INDEX(name, " ", -1) AS UNSIGNED)'
        )->get();

        return view('animals.index', compact(
            'animals',
            'cages'
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

        $lastAnimal = Animal::latest('id')->first();

        $nextNumber = $lastAnimal
            ? $lastAnimal->id + 1
            : 1;

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

            'qr_code' => null,

            'entry_date' => $request->entry_date,

            'status' => $request->status,

            'description' => $request->description,

            'user_id' => auth()->id(),
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

    if ($request->hasFile('image')) {

        if ($animal->image) {
            Storage::disk('public')
                ->delete($animal->image);
        }

        $image = $request->file('image')
            ->store('animals', 'public');

    } else {

        $image = $animal->image;

    }

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

        $animalName = $animal->name;
        $animal->delete();

        ActivityLogger::log(
            'Animal',
            'Delete',
            'Menghapus hewan "' . $animalName . '"'
        );

        return redirect()
            ->route('animals.index')
            ->with(
                'success',
                'Data hewan berhasil dihapus.'
            );
    }

    public function detail(Animal $animal)
    {
        return view('animals.detail_index', compact('animal'));
    }
}
