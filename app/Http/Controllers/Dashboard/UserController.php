<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index', [
            'title' => 'Data User',
            'data' => User::all()
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')){
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
        
            if ($validator->fails()) {
                return redirect()->route('user')
                    ->withErrors($validator)
                    ->withInput();
            }
        
            $data = $request->only(['name', 'email']);
            $data['password'] = Hash::make($request->password);
        
            if (!User::create($data)){
                return redirect()->route('user')->with(['error' => 'Gagal tambah user!']);
            }
        
            return redirect()->route('user')->with(['success' => 'Success tambah user!']);
        }

        return view('pages.dashboard.create', [
            'title' => 'Tambah User'
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->isMethod('POST')){
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]);
        
            if ($validator->fails()) {
                return redirect()->route('user.update', $id)
                    ->withErrors($validator)
                    ->withInput();
            }
        
            $data = $request->only(['name', 'email']);
        
            if (!$user->update($id, $data)){
                return redirect()->route('user.update', $id)->with(['error' => 'Gagal tambah user!']);
            }
        
            return redirect()->route('user.update', $id)->with(['success' => 'Success tambah user!']);
        }

        return view('pages.dashboard.update', [
            'title' => 'Update User',
            'data' => $user
        ]);
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user->delete()){
            return redirect()->route('user')->with(['error' => 'Gagal delete user!']);
        }

        return redirect()->route('user')->with(['success' => 'Success delete user!']);
    }
}
