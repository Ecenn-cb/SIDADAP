<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Price;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function packagePrices(Package $package)
    {
        $prices = Price::where(
            'package_id',
            $package->id
        )->get();

        return view(
            'prices.index',
            compact(
                'package',
                'prices'
            )
        );
    }

    public function index()
    {
        $prices = Price::with('package')
            ->latest()
            ->get();

        return view(
            'prices.index',
            compact('prices')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Package $package)
    {
        return view(
            'prices.create',
            compact('package')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Package $package)
    {
        $request->validate([
            'box_count' => 'required|integer|min:1',
            'female_price' => 'required|numeric|min:0',
            'male_price' => 'required|numeric|min:0',
        ]);

        Price::create([
            'package_id' => $package->id,
            'box_count' => $request->box_count,
            'female_price' => $request->female_price,
            'male_price' => $request->male_price,
        ]);

        return redirect()
            ->route(
                'packages.prices',
                $package->id
            )
            ->with(
                'success',
                'Harga berhasil ditambahkan.'
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
    public function edit(Price $price)
    {
        $packages = Package::all();

        return view(
            'prices.edit',
            compact(
                'price',
                'packages'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $price)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'box_count' => 'required|integer|min:1',
            'female_price' => 'required|numeric|min:0',
            'male_price' => 'required|numeric|min:0',
        ]);

        $price->update([
            'package_id' => $request->package_id,
            'box_count' => $request->box_count,
            'female_price' => $request->female_price,
            'male_price' => $request->male_price,
        ]);

        return redirect()
            ->route('prices.index')
            ->with(
                'success',
                'Harga paket berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price)
    {
        $price->delete();

        return redirect()
            ->route('prices.index')
            ->with(
                'success',
                'Harga paket berhasil dihapus.'
            );
    }
}
