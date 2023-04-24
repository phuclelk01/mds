<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Customer;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index.blade.php');
    }
    public function login(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'password' => 'required'

        ]);

        $Admin = Admin::where('adEmail', '=', $request->email)->first();
        $User = Customer::where('customerEmail', '=', $request->email)->first();

        if ($Admin) {
            if ($request->password == $Admin->adPassword) {
                $request->session()->put('loginId', $Admin->adminID);
                return redirect('addashboard');
            } else {
                return back()->with('fail', 'Password not matched.');
            }
        } else if ($User) {
            if ($request->password == $User->customerPass) {
                $request->session()->put('loginId', $User->customerID);
                return redirect('customerHome');
            } else {
                return back()->with('fail', 'Password not matched.');
            }
        } else {
            return back()->with('fail', 'This email is not have');
        }
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
    public function product()
    {
        return view('admin.product');
    }
}
