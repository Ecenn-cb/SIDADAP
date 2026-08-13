<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalExitLog;
use Illuminate\Http\Request;

class AnimalReportController extends Controller
{
    public function index(Request $request)
    {
        // Default periode: bulan berjalan
        $startDate = $request->input(
            'start_date',
            now()->startOfMonth()->format('Y-m-d')
        );

        $endDate = $request->input(
            'end_date',
            now()->format('Y-m-d')
        );

        /*
        |--------------------------------------------------------------------------
        | Hewan Masuk
        |--------------------------------------------------------------------------
        */

        $animalsIn = Animal::with([
            'category',
            'grade',
            'cage'
        ])
        ->whereBetween('entry_date', [
            $startDate,
            $endDate
        ])
        ->latest('entry_date')
        ->get();

        /*
        |--------------------------------------------------------------------------
        | Hewan Keluar
        |--------------------------------------------------------------------------
        */

        $animalsOut = AnimalExitLog::with([
            'category',
            'grade',
            'cage'
        ])
        ->whereBetween('exit_date', [
            $startDate,
            $endDate
        ])
        ->latest('exit_date')
        ->get();

        /*
        |--------------------------------------------------------------------------
        | Statistik
        |--------------------------------------------------------------------------
        */

        $totalIn = $animalsIn->count();

        $totalOut = $animalsOut->count();

        // Hewan yang saat ini masih tersimpan di tabel animals
        $totalAvailable = Animal::count();

        return view(
            'animal-reports.index',
            compact(
                'animalsIn',
                'animalsOut',
                'totalIn',
                'totalOut',
                'totalAvailable',
                'startDate',
                'endDate'
            )
        );
    }
}