<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    public function ProductList (){
        $dataproduct = Products::select('*')
        ->paginate(5) ;
        return view('Admin.product',['dataproduct' => $dataproduct]);
    }
    public function addproduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|max:5',
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image_name' => 'required',
            'image_path_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_path_2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'product_id.required' => 'Please enter the product ID',
            'product_name.required' => 'Please enter the product Name',
            'product_id.max' => 'Product ID must be maximum 5 characters',
            'price.required' => 'Please enter the product price',
            'quantity.required' => 'Please enter the product quantity',
            'description.required' => 'Please enter the product description',
            'category_id.required' => 'Please enter the category ID',
            'brand_id.required' => 'Please enter the brand ID',
            'image_name.required' => 'Please provide the product image name',
            'image_path_1.required' => 'Please provide the product image path 1',
            'image_path_2.required' => 'Please provide the product image path 2',
            'image_path_1.image' => 'The file must be an image',
            'image_path_2.image' => 'The file must be an image',
            'image_path_1.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image_path_2.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image_path_1.max' => 'The image size must not exceed 2MB',
            'image_path_2.max' => 'The image size must not exceed 2MB',
        ]);

        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');

        if (Products::where('product_id', $product_id)->orWhere('product_name', $product_name)->count() > 0) {
            $errors = [];
            if (Products::where('product_id', $product_id)->count() > 0) {
                $errors['product_id'] = 'Product ID already exists';
            }
            return back()->withErrors($errors)->withInput();
        }

        // Create a new product
        $product = new Products();
        $product->product_id = $product_id;
        $product->product_name = $product_name;
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->image_name = $request->input('image_name');

        if ($request->hasFile('image_path_1')) {
            $image_path_1 = $request->file('image_path_1');
            $image_path_1_name = $image_path_1->getClientOriginalName();
            $image_path_1->move('Model', $image_path_1_name);
            $product->image_path_1 = $image_path_1_name;
        }

        if ($request->hasFile('image_path_2')) {
            $image_path_2 = $request->file('image_path_2');
            $image_path_2_name = $image_path_2->getClientOriginalName();
            $image_path_2->move('Model', $image_path_2_name);
            $product->image_path_2 = $image_path_2_name;
        }

        $product->save();

        // Display success message and redirect back to the product list page
        return redirect()->back()->with('success', 'Successfully added new product');
    }


    public function editproduct($product_id)
    {
        $product = Products::where('product_id', '=', $product_id)->first();
        return view('Admin.edit-product', compact('product'));
    }




    public function updateproduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image_name' => 'required',
            'image_path_1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_path_2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_path_1')) {
            $image_path_1 = $request->file('image_path_1');
            $image_path_1_name = $image_path_1->getClientOriginalName();
            $image_path_1->storeAs('Model', $image_path_1_name);
        } else {
            $image_path_1_name = $request->input('image_path_1');
        }

        if ($request->hasFile('image_path_2')) {
            $image_path_2 = $request->file('image_path_2');
            $image_path_2_name = $image_path_2->getClientOriginalName();
            $image_path_2->storeAs('Model', $image_path_2_name);
        } else {
            $image_path_2_name = $request->input('image_path_2');
        }

        $product_id = $request ->product_id;
        $product_name = $request ->product_name;
        $price = $request ->price;
        $quantity = $request ->quantity;
        $description = $request ->description;
        $category_id = $request ->category_id;
        $brand_id = $request ->brand_id;
        $image_name = $request ->image_name;
        $image_path_1 = $request ->image_path_1;
        $image_path_2 = $request ->image_path_2;

        Products::where('product_id', '=', $product_id)
        ->update([  'product_name' => $product_name,
                    'price' => $price,
                    'quantity' => $quantity,
                    'description' => $description,
                    'category_id' => $category_id,
                    'brand_id' => $brand_id,
                    'image_name' => $image_name,
                    'image_path_1' => $image_path_1_name,
                    'image_path_2' => $image_path_2_name,
        ]);

        // Hiển thị thông báo thành công và chuyển hướng về trang danh sách sản phẩm
        return redirect()->back()->with('success', 'Successfully updated product');
    }

    public function saveproduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image_name' => 'required',
            'image_path_1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_path_2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'product_name.required' => 'Please enter the product Name',
            'price.required' => 'Please enter the product price',
            'quantity.required' => 'Please enter the product quantity',
            'description.required' => 'Please enter the product description',
            'category_id.required' => 'Please enter the category ID',
            'brand_id.required' => 'Please enter the brand ID',
            'image_name.required' => 'Please provide the product image name',
            'image_path_1.image' => 'The file must be an image',
            'image_path_2.image' => 'The file must be an image',
            'image_path_1.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image_path_2.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image_path_1.max' => 'The image size must not exceed 2MB',
            'image_path_2.max' => 'The image size must not exceed 2MB',
        ]);

        // Tạo một đối tượng mới của lớp Products
        $product = new Products();
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->image_name = $request->input('image_name');

        if ($request->hasFile('image_path_1')) {
            $image_path_1 = $request->file('image_path_1');
            $image_path_1_name = $image_path_1->getClientOriginalName();
            $image_path_1->move('Model', $image_path_1_name);
            $product->image_path_1 = $image_path_1_name;
        }

        if ($request->hasFile('image_path_2')) {
            $image_path_2 = $request->file('image_path_2');
            $image_path_2_name = $image_path_2->getClientOriginalName();
            $image_path_2->move('Model', $image_path_2_name);
            $product->image_path_2 = $image_path_2_name;
        }

        $product->save();

        // Hiển thị thông báo thành công và chuyển hướng về trang danh sách sản phẩm
        return redirect()->back()->with('success', 'Successfully saved product');
    }





    public function deleteproduct($product_id)
    {
            Products::where('product_id', $product_id)->delete();
            return redirect()->back()->with('deletesuccess', 'Deleted product successfully');

    }
}
