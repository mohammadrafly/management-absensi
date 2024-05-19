<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('login')
                    ->withErrors($validator)
                    ->withInput();
            }

            $credentials = $request->only(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return redirect()->route('login')->with(['error' => 'Gagal login.']);
            }
            
            return redirect()->route('dashboard')->with(['success' => 'Berhasil login.']);
        }

        return view('pages.login', [
            'title' => 'Login'
        ]);
    }
}