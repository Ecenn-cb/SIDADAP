<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Helpers\ActivityLogger;

class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cages = Cage::with(['user'])
            ->withCount('animals')
            ->orderBy('name', 'asc')
            ->get();

        return view('cages.index', compact('cages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Generate Cage Code
        |--------------------------------------------------------------------------
        */

        $lastCage = Cage::select('cage_code')
            ->orderByRaw(
                "CAST(SUBSTRING(cage_code,4) AS UNSIGNED) DESC"
            )
            ->first();

        if ($lastCage) {

            $lastNumber = (int) substr(
                $lastCage->cage_code,
                3
            );

            $nextNumber = $lastNumber + 1;

        } else {

            $nextNumber = 1;

        }

        $cageCode = 'KDG' . str_pad(
            $nextNumber,
            3,
            '0',
            STR_PAD_LEFT
        );

        /*
        |--------------------------------------------------------------------------
        | Save Cage
        |--------------------------------------------------------------------------
        */

        $cage = Cage::create([

            'cage_code' => $cageCode,

            'name' => $request->name,

            'user_id' => auth()->id(),

        ]);

        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        ActivityLogger::log(
            'Cage',
            'Create',
            'Menambahkan kandang "' . $cage->name . '"'
        );

        return redirect()
            ->route('cages.index')
            ->with(
                'success',
                'Kandang berhasil ditambahkan.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Cage $cage)
    {
        $cage->load([
            'user',
            'animals.category',
            'animals.grade',
        ]);

        return view(
            'cages.show',
            compact('cage')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cage $cage)
    {
        return view(
            'cages.edit',
            compact('cage')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Cage $cage
    )
    {
        $request->validate([
            'name' => 'required|string|max:20',
        ]);

        $cage->update([
            'name' => $request->name,
        ]);

        ActivityLogger::log(
            'Cage',
            'Update',
            'Memperbarui kandang "' . $cage->name . '"'
        );

        return redirect()
            ->route('cages.index')
            ->with(
                'success',
                'Kandang berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cage $cage)
    {
        $cage->delete();

        return redirect()
            ->route('cages.index')
            ->with(
                'success',
                'Kandang berhasil dihapus.'
            );
    }

    /**
     * Download QR Code.
     */
    public function downloadQr(Cage $cage)
    {
        $svg = QrCode::size(500)
            ->margin(2)
            ->generate(
                route(
                    'website.cage.detail',
                    $cage->cage_code
                )
            );

        return response($svg)
            ->header('Content-Type', 'image/svg+xml')
            ->header(
                'Content-Disposition',
                'attachment; filename="' . $cage->cage_code . '.svg"'
            );
    }
}