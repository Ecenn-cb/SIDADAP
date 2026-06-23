<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use Illuminate\Http\Request;

class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cages = Cage::with('user')
            ->latest()
            ->get();

        return view(
            'cages.index',
            compact('cages')
        );
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
            'name' => 'required|max:20',
            'total_animals' => 'required|integer|min:0',
        ]);

        Cage::create([
            'name' => $request->name,
            'total_animals' => $request->total_animals,
            'user_id' => auth()->id(),
        ]);

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
            'name' => 'required|max:20',
            'total_animals' => 'required|integer|min:0',
        ]);

        $cage->update([
            'name' => $request->name,
            'total_animals' => $request->total_animals,
        ]);

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
}