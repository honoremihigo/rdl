<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'adminName' => 'required|min:4|unique:admins',
            'password' => 'required|min:6'
        ]);

        Admin::create([
            'adminName' => $request->adminName,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success','register success');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'adminName' => 'required|min:4',
            'pass' => 'required|min:6'
        ]);

        $admin = Admin::where('adminName', $validated['adminName'])->first();

        if($admin && Hash::check($validated['pass'], $admin->password)){
            Auth::guard('web')->login($admin);
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success','login success');
        }

        return back()->withErrors([
            'error' => 'invalid credentials'
        ])->onlyInput('adminName');
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success','you logged out');
    }
}
