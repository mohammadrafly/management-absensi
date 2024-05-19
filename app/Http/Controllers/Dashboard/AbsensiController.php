<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.absen', [
            'title' => 'Data Absensi',
            'data' => Absensi::all()
        ]);
    }
}
