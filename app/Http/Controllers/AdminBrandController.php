<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminBrandController extends Controller
{
    public function brandlist (){
        $databrand = Brands::select('*')
        ->paginate(5) ;
        return view('Admin.brand',['databrand' => $databrand]);
    }

    public function addbrand(Request $request)
{
    $request->validate([
        'brand_id' => 'required|max:5',
        'brand_name' => 'required',
    ], [
        'brand_id.required' => 'Vui lòng nhập ID Brand',
        'brand_name.required' => 'Vui lòng nhập Name Brand',
        'brand_id.max' => 'ID brand chỉ tối đa 5 ký tự',
    ]);

    $brand_name = $request->input('brand_name');
    $brand_id = $request->input('brand_id');

    if (Brands::where('brand_name', $brand_name)->orWhere('brand_id', $brand_id)->exists()) {
    return back()->withErrors(['brand_name' => 'Brand name or ID already exists']);
    }

    // Tạo một brand mới vào trong dữ liệu
    $brand = new Brands();
    $brand->brand_id = $request->input('brand_id');
    $brand->brand_name = $request->input('brand_name');
    $brand->save();

    // Hiển thị thông báo thành công và chuyển hướng về trang danh sách brand
    return redirect()->back()->with('success', 'Successfully added new brand');
}

public function editbrand($brand_id)
{
    $brand = Brands::where('brand_id', '=', $brand_id)->first();
    $databrand = array();

    return view('Admin.edit-brand', compact('brand', 'databrand'));
}

public function updatebrand(Request $request)
{
    $request->validate([
        'name' => 'required|unique:brands,brand_name',
    ], [
        'name.required' => 'Please enter the brand name',
        'name.unique' => 'The brand name is already taken',
    ]);

    Brands::where('brand_id', $request->id)->update([
        'brand_name' => $request->name,
    ]);

    return redirect()->back()->with('success', 'Brand name updated successfully!');
}
Public function deletebrand($brand_id)
{
    $products = Products::where('brand_id', $brand_id)->count();
    if ($products > 0) {
        return back()->withErrors(['error' => 'This brand cannot be deleted because there are already products related to it']);
    } else {
        Brands::where('brand_id', $brand_id)->delete();
        return redirect()->back()->with('successfull', 'Deleted brand successfully');
    }
}
}
