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
            now()->startOfMonth()->toDateString()
        );

        $endDate = $request->input(
            'end_date',
            now()->toDateString()
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
            ->orderBy('entry_date', 'desc')
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
            ->orderBy('exit_date', 'desc')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Statistik
        |--------------------------------------------------------------------------
        */

        $totalIn = $animalsIn->count();

        $totalOut = $animalsOut->count();

        /*
        | Hewan tersedia = seluruh hewan yang masih ada
        | di tabel animals pada saat laporan dibuat.
        */
        $totalAvailable = Animal::count();

        return view(
            'animal-reports.index',
            compact(
                'startDate',
                'endDate',
                'animalsIn',
                'animalsOut',
                'totalIn',
                'totalOut',
                'totalAvailable'
            )
        );
    }
}