<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
Use Illuminate\Support\Carbon;
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
                $request->session()->put('user_name', $User->user_name);
                $order = new Order();
                $user_id = $User->user_id; // Lấy giá trị 'user_id' từ đối tượng User
                $request->session()->put('user_id', $user_id);
                $lastLoginDate = $User->last_login_date;
                $currentDate = Carbon::now()->toDateString(); // Ngày hiện tại
                if ($lastLoginDate != $currentDate) {
                    // Người dùng đăng nhập vào một ngày mới, cập nhật ngày mới
                    $order->order_date = Carbon::now();
                } else {
                    // Người dùng đã đăng nhập trong cùng một ngày, giữ ngày cũ
                    $order->order_date = $lastLoginDate;
                }
                $order->user_id = $user_id;
                $order->total = 0; // Gán giá trị 0 cho trường 'total'
                $order->save(); // Lưu order vào cơ sở dữ liệu
                // Lưu order vào cơ sở dữ liệu // Lưu order vào cơ sở dữ liệu
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

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:5|confirmed',
        'password_confirmation' => 'required|min:5|same:password',
    ], [
        'name.required' => 'Please enter your name',
        'email.required' => 'Please enter your email address',
        'email.email' => 'Email address is not valid',
        'email.unique' => 'The email address has been used',
        'password.required' => 'Please enter a password',
        'password.min' => 'Password must be at least 5 characters',
        'password_confirmation.required' => 'Please enter a password',
        'password_confirmation.min' => 'Password must be at least 5 characters',
        'password_confirmation.confirmed' => 'Password does not match',
    ]);

    $existingUser = User::where('email', $email)->first();

    if ($existingUser) {
        return redirect()->back()->with('error', 'Email already exists, please choose another email.');
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
        return redirect('/Connect/register')->with('success', 'Account registration successful');
    } else {
        return back()->with('fail', 'Something went wrong! Please try again!');
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
