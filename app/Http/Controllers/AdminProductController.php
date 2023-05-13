<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    
    public function ProductList (){
        $dataproduct = product::select('*')
        ->paginate(3) ;
        return view('Admin.projects',['dataproduct' => $dataproduct]);
    }

    public function save(Request $request)
    {
        $id = $request->id;
        $id_table = product::where('product_id', $id)->count();
        if ($id_table > 0) {
            return back()->with('fail', 'ID already exists!');
        } else {
            $validateData = $request->validate([
                'id' => 'required',
                'name' => 'required',
                'price' => 'required',
                'image' => 'required',
                'kindoffoodid' => 'required',
                'sizeS' => 'required|numeric|min:1',
                'sizeL' => 'required|numeric|min:1',
                'sizeM' => 'required|numeric|min:1'
            ]);

            $pro = new product();
            $pro->product_id = $request->id;
            $pro->product_name = $request->name;
            $pro->price = $request->price;
            $pro->quantiny = $request->quantiny;
            $pro->category_id = $request->category_id;
            $pro->brand_id = $request->brand_id;
            $pro->save();
            return redirect()->back()->with('success', 'Product added successfully!');
        }

    }
    public function delete($id)
    {
        product::where('product_id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

}
