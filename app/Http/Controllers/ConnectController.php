<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\HomePageController;
class ConnectController extends Controller
{
    public function register(){
        return view('Connect.register');
    }
    public function login(){
        return view('Connect.login');
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        $users = User::where('email', $request['email'])->first();
        if($users){
            if ($users || !Hash::check($request['password'], $users->password)) {
                $request->session()->put('email',$users->email);
                return redirect('/Customer/index');
            }else{
                return back()->with('fail','Password not matched.');
            }
        }else{
            return back()->with('fail','This email is not registered');
        }
    }


        function registerUser(Request $request) {
        // Lấy thông tin người dùng từ form đăng ký
        $customer_name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        // Kiểm tra xem người dùng đã tồn tại trong cơ sở dữ liệu chưa
        $existingUser = User::where('email', $email)->first();

        if ($existingUser) {
          // Nếu người dùng đã tồn tại, hiển thị thông báo lỗi
          return redirect()->back()->with('error', 'Email đã tồn tại, vui lòng chọn email khác.');
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5|confirmed',
                'password_confirmation' => 'required|min:5|same:password',

            ],[
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
          // Nếu người dùng chưa tồn tại, tạo tài khoản mới cho người dùng
            $users = new User();
            $users->user_id = uniqid('', true); // tạo mã có độ dài 23 ký tự
            $users->customer_name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->save();


                  // Hiển thị thông báo đăng ký thành công và chuyển hướng về trang đăng nhập
                  if ($users) {
                    return redirect()->route('index')->with('success', 'Đăng ký tài khoản thành công');
                } else {
                    return back()->with('fail', 'Something went wrong! Please try again!');
                }
        }
    }
}
