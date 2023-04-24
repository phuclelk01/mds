<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use resources\views\customer;

class AuthController extends Controller
{
    public function index()
    {
        $data = Product::select('products.*', 'categories.catName')
            ->join('categories', 'products.catID', '=', 'categories.catID')
            ->get();
        return view('index', compact('data'));
    }

    public function add()
    {
        $category = Category::get();
        return view('add', compact('category'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => ['required', 'numeric', 'min:0'],
            'image' => 'required',
            'details' => 'required',
            'category' => 'required',
        ]);

        $pro = new Product();
        $pro->productID = $request->id;
        $pro->productName = $request->name;
        $pro->productPrice = $request->price;
        $pro->productImage = $request->image;
        $pro->productDetails = $request->details;
        $pro->catID = $request->category;
        $pro->save();
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $data = Product::where('productID', '=', $id)->first();
        $category = Category::get();
        return view('edit', compact('data', 'category'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'details' => 'required',
            'category' => 'required',
        ]);

        $proID = $request->id;
        Product::where('productID', '=', $proID)->update([
            'productName' => $request->name,
            'productPrice' => $request->price,
            'productImage' => $request->image,
            'productDetails' => $request->details,
            'catID' => $request->category
        ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }
    public function delete($id)
    {
        Product::where('productID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product delete successfully!');
    }
}
