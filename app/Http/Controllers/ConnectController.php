<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ConnectController extends Controller
{
    public function register()
    {
        return view('Connect.register');
    }

    public function login()
    {
        return view('Connect.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        $Admin = Admin::where('email', '=', $request->email)->first();
        $User = User::where('email', '=', $request->email)->first();

        if ($Admin) {
            if ($request->password == $Admin->password) {
                $request->session()->put('email', $Admin->email);
                return redirect('Admin/projects');
            } else {
                return back()->with('fail', 'Password not matched.');
            }
        } else if ($User) {
            if (Hash::check($request->password, $User->password)) {
                $request->session()->put('email', $User->email);
                return redirect('Customer/dashboard');
            } else {
                return back()->with('fail', 'Password not matched.');
            }
        } else {
            return back()->with('fail', 'This email does not exist.');
        }
    }

    public function registerUser(Request $request)
    {
        $customer_name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $existingUser = User::where('email', $email)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Email đã tồn tại, vui lòng chọn email khác.');
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5|confirmed',
                'password_confirmation' => 'required|min:5|same:password',
            ], [
                'name.required' => 'Vui lòng nhập tên của bạn',
                'email.required:users' => 'Vui lòng nhập địa chỉ email của bạn',
                'email.email' => 'Địa chỉ email không hợp lệ',
                'email.unique' => 'Địa chỉ email đã được sử dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
                'password_confirmation.required' => 'Vui lòng nhập mật khẩu',
                'password_confirmation.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
                'password_confirmation.confirmed' => 'Mật khẩu không khớp',
            ]);

            $email = $request->input('email');

            if (User::where('email', $email)->exists()) {
                return back()->withErrors(['email' => 'Địa chỉ email đã tồn tại']);
            }

            $users = new User();
            $unique_id = Str::random(20);

            while (User::where('user_id', $unique_id)->exists()) {
                $unique_id = Str::random(20);
            }

            $users->user_id = $unique_id;
            $users->customer_name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->save();

            if ($users) {
                return redirect('/Connect/register')->with('success', 'Đăng ký tài khoản thành công');
            } else {
                return back()->with('fail', 'Something went wrong! Please try again!');
            }
        }
    }

    public function dashboard()
{
    $customerEmail = session()->get('email');
    $data = User::where('email', $customerEmail)->first();
    return view('Customer.dashboard', compact('data'));
}


    
    

    public function logout()
    {
            return view('Customer.index');
    }
}
