<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();

        return view(
            'packages.index',
            compact('packages')
        );
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
        ]);

        Package::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('packages.index')
            ->with(
                'success',
                'Paket berhasil ditambahkan.'
            );
    }

    public function edit(Package $package)
    {
        return view(
            'packages.edit',
            compact('package')
        );
    }

    public function update(
        Request $request,
        Package $package
    )
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
        ]);

        $package->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('packages.index')
            ->with(
                'success',
                'Paket berhasil diperbarui.'
            );
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()
            ->route('packages.index')
            ->with(
                'success',
                'Paket berhasil dihapus.'
            );
    }
}