<?php

namespace App\Http\Controllers;

use App\Models\AnimalGrade;
use Illuminate\Http\Request;

class AnimalGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = AnimalGrade::latest()->get();

        return view(
            'animal-grades.index',
            compact('grades')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animal-grades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        AnimalGrade::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('animal-grades.index')
            ->with(
                'success',
                'Grade berhasil ditambahkan'
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
    public function edit(AnimalGrade $animal_grade)
    {
        return view(
            'animal-grades.edit',
            compact('animal_grade')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,AnimalGrade $animal_grade)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        $animal_grade->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('animal-grades.index')
            ->with(
                'success',
                'Grade berhasil diperbarui'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnimalGrade $animal_grade)
    {
        $animal_grade->delete();

        return redirect()
            ->route('animal-grades.index')
            ->with(
                'success',
                'Grade berhasil dihapus'
            );
    }
}
