<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productList(){
        $product = Product::paginate(3);
        return view('dashboard.productList',compact('product'));
    }

    public function newProduct(){
        return view('dashboard.productCreate');
    }

    public function productCreate(Request $request)
    {
        $request->validate([
        'productname'=>'required',
            'productbrand'=>'required',
            'productquantity'=>'required',
            'productimage'=>'required'
        ]);

//    $product_Image = "";
//    if($request->hasFile('product_image')){
//    $file = $request->file('product_image');
//    if($file->isValid()){
//    $product_Image = date('Ymdhms').".".$file->getClientOriginalExtension();
//    $file->storeAs('product', $product_Image);
//    }
//    }

        $image = "";

        if ($request->hasFile('productimage')) {
            $file = $request->file('productimage');
            if ($file->isValid()) {

                $image = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('products', $image);
//                dd($file);


            }
        }

    Product::create([
    'product_name'=>$request->productname,
        'product_brand'=>$request->productbrand,
        'product_quantity'=>$request->productquantity,
        'product_image'=>$image

    ]);

    return redirect()->back()->with('success','product created successfully');

    }

    public function productDelete($id)
    {
    $product=Product::where('product_id',$id);
//    dd($product);
    $product->delete();
    return redirect()->back()->with('successD','A Product was deleted');

    }

    public function productEdit($id)
    {

        $product=Product::where('product_id',$id)->first();
        return view('dashboard.productUpdate',compact('product'));

    }

    public function productUpdate(Request $request,$id){

        $product=Product::where('product_id',$id);

        $image = "";

        if ($request->hasFile('productimage')) {
            $file = $request->file('productimage');
            if ($file->isValid()) {

                $image = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('products', $image);
//                dd($file);


            }
        }


        $product->update([
            'product_name'=>$request->productname,
            'product_brand'=>$request->productbrand,
            'product_quantity'=>$request->productquantity,
            'product_image'=>$image
        ]);

        return redirect()->route('product.list')->with('success','Product Updated Successfully');
    }

}
