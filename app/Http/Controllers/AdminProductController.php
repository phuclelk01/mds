<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    public function ProductList (){
        $dataproduct = product::select('*')
        ->paginate(5) ;
        return view('Admin.projects',['dataproduct' => $dataproduct]);
    }

    public function deleteproduct($product_id)
    {
        product::where('product_id', '=', $product_id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

}
