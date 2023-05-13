<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminManageUser extends Controller
{
    public function listaccus (){
        $dataUser = User::select('*')
        ->paginate(3) ;
        return view('Admin.listaccus',['dataUser' => $dataUser]);
    }
    public function delete($id)
    {
        user::where('user_id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Account deleted successfully!');
    }
    public function showPassword($user_id)
    {
        // Tìm user theo user_id
        $user = User::where('user_id', $user_id)->first();
    
        // Nếu không tìm thấy user thì trả về 404 Not Found
        if (!$user) {
            abort(404);
        }
        // Lấy danh sách user
        $dataUser = User::all();
        // Trả về view để hiển thị mật khẩu không bị hash mã hóa
        return view('Admin.listaccus', ['user' => $user, 'dataUser' => $dataUser, 'showPassword' => true]);
    }
    


}
