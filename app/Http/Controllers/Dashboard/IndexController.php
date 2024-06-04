<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Murid;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $absenToday = Murid::whereHas('absens', function ($query) use ($today) {
            $query->whereDate('created_at', $today);
        })->count();

        $totalMurid = Murid::count();

        $notAbsenToday = $totalMurid - $absenToday;

        return view('pages.dashboard.index', [
            'title' => 'Dashboard',
            'totalMurid' => $totalMurid,
            'totalUser' => User::count(),
            'absenToday' => $absenToday,
            'notAbsenToday' => $notAbsenToday,
        ]);
    }

    public function Logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with(['success' => 'Berhasil keluar dari sistem.']);
    }
}
