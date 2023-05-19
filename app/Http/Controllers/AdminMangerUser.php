<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMangerUser extends Controller
{
    public function listaccus()
    {
        $dataUser = User::select('*')
            ->paginate(3);
        return view('Admin.dashboard', ['dataUser' => $dataUser]);
    }
    public function delete($user_id)
    {
        $order_id = Orders::where('user_id', '=', $user_id)->count();
        if ($order_id > 0) {
            return back()->with(['delete_fail' => 'This category cannot be deleted because there are already Order related to it']);
        } else {
        User::where('user_id', '=', $user_id)->delete();
        return redirect()->back()->with('delete_success', 'Account deleted successfully!');
    }
    }

    public function edit($id)
    {
        $dataUser = User::where('user_id', '=', $id)->get()->first();
        return view('Admin.editaccus', ['dataUser' => $dataUser]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birthday' => 'required',
            'gender' => 'required',

        ], [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your name',
            'birthday.required' => 'Please enter your name',
            'gender.required' => 'Please enter your name',

        ]);

        User::where('user_id', $request->id)->update([
            'user_name' => $request->name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
        ]);

        return redirect()->back()->with('success', 'Customer name update successfully!');
    }
}

