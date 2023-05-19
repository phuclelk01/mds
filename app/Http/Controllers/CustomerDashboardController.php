<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
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
    public function ProductListIndex()
    {
        $datalist = Products::select('*')
            ->paginate(8);
        return view('Admin.category', ['datalist' => $datalist]);
    }

}
