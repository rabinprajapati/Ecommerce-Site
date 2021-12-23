<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('index',['products'=>$products]);
    }
    public function detail($id)
    {
        $product=Product::find($id);
        return view('detail',['product'=>$product]);
    }
    public function search(Request $req)
    {
        $string=$req->search;
        $products=Product::where('productName','like','%'.$string.'%')->get();
        if($products->count()==0)
        {
            return view('noResult');
        }
        else{
            return view('index',['products'=>$products]);
        }
        
    }
    public function addToCart(Request $req)
    {   
        if($req->session()->has('user'))
        {
            $cart=new Cart();
            $cart->productId=$req->productId;
            $cart->userId=Session::get('user')->id;
            $cart->save();
            return redirect('/');
        }
        else
        {
            return redirect('/login');
        }
        
    }

    public function cart()
    {
        $userId=Session::get('user')->id;
        $products=DB::table('cart')
                    ->join('products','cart.productId','=','products.id')
                    ->where('cart.userId',$userId)
                    ->select('products.*','cart.id as cartId')
                    ->get();
        return view('cart',['cartlist'=>$products]);
    }
    public function removeCart($id)
    {   
        Cart::destroy($id);
        return redirect('/cart');
    }

    static public function cartItem(){
        $userId=Session::get('user')->id;
        $count=Cart::where('userId',$userId)->count();
        return $count;
    }
}
