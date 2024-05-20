<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('murid')->latest()->get();

        return view('pages.dashboard.absen', [
            'title' => 'Data Absensi',
            'data' => $absensi
        ]);
    }
}
