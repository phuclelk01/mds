<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function CategoryList()
    {
        $datacategory = Categories::select('*')->paginate(3);
        return view('Admin.category', ['datacategory' => $datacategory]);
    }


    public function addcategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required|max:5',
            'category_name' => 'required',
        ],[
            'category_id.required' => 'Vui lòng nhập ID category',
            'category_name.required' => 'Vui lòng nhập Name category',
            'category_id.max' => 'ID category chỉ tối đa 5 ký tự',
        ]);

        $category_id = $request->input('category_id');
        $category_name = $request->input('category_name');

        if (Categories::where('category_id', $category_id)->orWhere('category_name', $category_name)->count() > 0) {
            $errors = [];
            if (Categories::where('category_id', $category_id)->count() > 0) {
                $errors['category_id'] = 'Category ID already exists';
            }
            if (Categories::where('category_name', $category_name)->count() > 0) {
                $errors['category_name'] = 'Category Name already exists';
            }
            return back()->withErrors($errors)->withInput();
        }
        // Tạo một category mới vào trong dữ liệu
        $category = new Categories();
        $category->category_id = $category_id;
        $category->category_name = $category_name;
        $category->save();

        // Hiển thị thông báo thành công và chuyển hướng về trang danh sách category
        return redirect()->back()->with('success', 'Successfully added new category');
    }
    public function editcategory($category_id)
    {
        $category = Categories::where('category_id', '=', $category_id)->first();
        $datacategory = array();

        return view('Admin.edit-product', compact('category', 'datacategory'));
    }

    public function updatecategory(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $category_id = $request->category_id;
        $category_name = $request->category_name;
        Categories::where('category_id', '=', $category_id)->update(['category_name' => $category_name]);
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }
    public function savecategory(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'id' => 'required',
        ]);
        $category_id = $request->id;
        $category_name = $request->name;
        $category = new Categories();
        $category->category_id = $category_id;
        $category->category_name = $category_name;
        $category->save();
        return redirect()->back()->with('success', 'Cateogry Added Successfully');
    }
    public function deletecategory($category_id)
    {
        $products = Products::where('category_id', $category_id)->count();
        if ($products > 0) {
            return back()->withErrors(['error' => 'This category cannot be deleted because there are already products related to it']);
        } else {
            Categories::where('category_id', $category_id)->delete();
            return redirect()->back()->with('successfull', 'Deleted category successfully');
        }
    }
}
