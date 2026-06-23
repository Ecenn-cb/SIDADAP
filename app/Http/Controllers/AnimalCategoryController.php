<?php

namespace App\Http\Controllers;

use App\Models\AnimalCategory;
use Illuminate\Http\Request;

class AnimalCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = AnimalCategory::latest()->get();

        return view(
            'animal-categories.index',
            compact('categories')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'animal-categories.create'
        );
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

        AnimalCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('animal-categories.index')
            ->with(
                'success',
                'Kategori berhasil ditambahkan'
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
    public function edit(AnimalCategory $animal_category)
    {
        return view(
            'animal-categories.edit',
            compact('animal_category')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,AnimalCategory $animal_category)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        $animal_category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('animal-categories.index')
            ->with(
                'success',
                'Kategori berhasil diperbarui'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnimalCategory $animal_category)
    {
        $animal_category->delete();

        return redirect()
            ->route('animal-categories.index')
            ->with(
                'success',
                'Kategori berhasil dihapus'
            );
    }
}
