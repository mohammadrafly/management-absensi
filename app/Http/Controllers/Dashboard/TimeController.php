<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeController extends Controller
{
    public function index(Request $request)
    {
        $time = Time::find(1);
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'start_time_enter' => 'required|string',
                'end_time_enter' => 'required|string',
                'start_time_leave' => 'required|string',
                'end_time_leave' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                return redirect()->route('setting')
                    ->withErrors($validator)
                    ->withInput();
            }
    
            $data = $validator->validated();
    
            if (!$time->update($data)) {
                return redirect()->route('setting')->with(['error' => 'Gagal update jam!']);
            }
        
            return redirect()->route('setting')->with(['success' => 'Success update jam!']);
        }

        return view('pages.dashboard.setting', [
            'title' => 'Setting Bot',
            'data' => $time,
        ]);
    }
}
