<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }

    public function Logout()
    {
        Auth::destroy();

        return redirect()->route('login')->with(['success' => 'Berhasil keluar dari sistem.']);
    }
}
