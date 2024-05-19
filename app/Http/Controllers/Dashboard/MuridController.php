<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.murid', [
            'title' => 'Data Murid',
            'data' => Murid::all()
        ]);
    }
}
