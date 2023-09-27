<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login() {
        return view('admin.auth.login');
    }
    public function store(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::guard('admin')->attempt($request->only('email','password'))) {
            return redirect()->route('admin.dashboard');
        }else {
            return redirect()->route('admin.login');
        }
    }
    public function register() {
        return view('admin.auth.register');
    }
    public function registerStore(Request $request) {
        $request->validate([
            'name'=>'required|unique:admins',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:8'
        ]);
        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        if(Auth::guard('admin')->attempt($request->only('email','password'))){
            return redirect()->route('admin.dashboard');
        }
    }
    public function logout() {
        Session::flush();
        Auth::guard('admin')->logout();
        $request->session()->regenerate();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->reute('admin.login');
    }
}
