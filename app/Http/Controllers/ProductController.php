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
        //
        return response()->json([
            'products'=>Product::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new Product;
        $product->product_name=$request->product_name;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        if($product->save())
        {
            return response()->json([
                'message' =>'Product Added',
                'status'=>'success',
                'data'=>$product
            ]);
        }
        else{
            return response()->json([
                'message' =>'Something Went Wrong, Please try again',
                'status'=>'failed',
                'data'=>''
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json(['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->product_name=$request->product_name;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        if($product->save())
        {
            return response()->json([
                'message' =>'Product Updated',
                'status'=>'success',
                'data'=>$product
            ]);
        }
        else{
            return response()->json([
                'message' =>'Something Went Wrong, Please try again',
                'status'=>'failed',
                'data'=>''
            ]);
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
        if($product->delete())
        {
            return response()->json([
                'message' =>'Product Deleted',
                'status'=>'success',
                'data'=>$product
            ]);
        }
        else{
            return response()->json([
                'message' =>'Something Went Wrong, Please try again',
                'status'=>'failed',
                'data'=>''
            ]);
        }
    }
}
