<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
// use Session;

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
    public function logout() {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->reute('admin.login');
    }
}
