<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  
    function validatelogin(Request $req)
    {
        $result=User::where(['email'=>$req->input('email'),'password'=>$req->input('password')])->first();
        // var_dump($result);
        // var_dump($result->name);

        if($result)
        {
            $req->session()->put('uid',$result->id);
            $req->session()->put('uname',$result->name);
            return redirect('products');
        }
        else
        return redirect('login')->with('status', 'Incorrect login! Please try again');;
    }
    function validate_adminlogin(Request $req)
    {

        if(!strcmp($req->input('email'),'admin@admin') && !strcmp($req->input('password'),'admin123'))
        {
            $req->session()->put('uid','admin_uid');
            $req->session()->put('uname','Admin');
            return view('admin_dashboard',['udata'=>$result]);
        }
        else
        return redirect('login')->with('status', 'Incorrect login! Please try again');;
    }
    public function products()
    {
        //  $response = Http::get("http://127.0.0.1:8000/api/products");
        //  $data = $response->json()->body();
        //   https://www.javatpoint.com/php-curl
        // dd($data);
        $PC=new ProductController();

        $data['data']=json_decode($PC->index()->content(),true);

        return view('products',$data);
    }
    
    public function admin_products()
    {
        $PC=new ProductController();

        $data['data']=json_decode($PC->index()->content(),true);

        return view('admin_products',$data);
    }

    public function product_add(Request $request)
    {
        // $response = Http::post('http://127.0.0.1:8000/api/product_add', [
        //     'product_name' => $request->input('product_name'),
        //     'price' => $request->input('price'),
        //     'quantity' => $request->input('quantity'),
        // ]);
        $PC=new ProductController();

        $data['data']=json_decode($PC->store($request)->content(),true);

        return view('product_new',$data);
    }
    public function product_update(Request $request)
    {
        $PC=new ProductController();
        $product=new Product;
        $product->id=$request->id;
        $data['data']=json_decode($PC->update($request,$product),true);

        return view('products',$data);
    }
    public function product_edit(Request $request)
    {
        $PC=new ProductController();
        $product=new Product;
        $product->id=$request->id;
        $data['data']=json_decode($PC->show($product),true);

        return view('products',$data);
    }
    public function product_delete(Request $request)
    {
        $PC=new ProductController();
        $product=new Product;
        $product->id=$request->id;
        $data['data']=json_decode($PC->destroy($request,$product),true);

        return view('products',$data);
    }
    public function cart_add(Request $request)
    {
        $request->session()->put(['product-'.$request->pid  =>  $request->quantity]);
        return redirect('products');
    }
    public function cart_remove(Request $request)
    {
        $request->session()->forget('product-'.$request->pid);     
        return redirect('products');
    }  
}
