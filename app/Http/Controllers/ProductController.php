<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Product();
        $p->productname = $request->productname;
        $p->price = $request->price;
        $p->count = $request->count;
        $p->save();
        return 'یک محصول اضافه شد';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Product::where('id', $id)->exists()) {
            $p = Product::find($id);
            $p->productname = is_null($request->productname) ? $p->productname : $request->productname;
            $p->price = is_null($request->price) ? $p->price : $request->price;
            $p->count = is_null($request->count) ? $p->count : $request->count;
            $p->save();
    
            return response()->json([
                "message" => "با موفقیت بروزرسانی شد "
            ], 200);
            } else {
            return response()->json([
                "message" => "محصول یافت نشد "
            ], 404);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
