<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Details;
use App\Models\product;
use Illuminate\Http\Request;
Use Illuminate\Support\Carbon;
use PhpParser\Builder\Function_;

class HomePageController extends Controller
{
    public function index(){
        return view('Customer.index');
    }
    public function products(){
        return view('Customer.products');
    }
    public function shoppingcart(){
        return view('Customer.shoppingcart');
    }
    public function ProductListIndex (){
        $dataproduct = product::select('*')
        ->paginate(8) ;
        return view('Customer.products',['dataproduct' => $dataproduct]);
    }

    public function Buy(Request $request, $product_id)
    {
        // Tạo một bản ghi mới trong bảng Order_Details
        $orderDetail = new Order_Details();

        // Lấy thông tin sản phẩm từ bảng Products
        $product = Product::findOrFail($product_id);

        // Gán giá trị từ request và model Product vào bản ghi Order_Details
        $orderDetail->user_id = $request->input('user_id');
        $orderDetail->order_id = $request->session()->get('order_id'); // Lấy order_id từ session
        $orderDetail->product_id = $product_id;
        $orderDetail->quantity = 1;
        $orderDetail->price = $product->price;

        // Lưu bản ghi vào cơ sở dữ liệu
        $orderDetail->save();

        // Truy vấn các Order_Detail đã lưu của user hiện tại
        return redirect()->route('Customer.products', ['user_id' => $product_id])->with('success', 'Added to cart successfully');    }
}
