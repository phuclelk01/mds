<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index.blade.php');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique',
            'password' => 'require',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
    public function checkvalue(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->intended('/');
        } else {
            // Đăng nhập không thành công
            return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng.');
        }
    }
    public function register()
    {
        return view('admin/register.blade.php');
    }
}
