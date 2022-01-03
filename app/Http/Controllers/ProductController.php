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
        return view('product/index',['products'=>$products]);
    }
    public function create(Request $req)
    {
        $product=new Product();
        // $req->validate([
        //     'productName'=>'required|max:30',
        //     'productCategory'=>'required|max:20',
        //     'productPrice'=>'required',
        //     'productDescription'=>'required|max:255',
        //     'productGallery'=>'required|image|min:1024|max:2048',
        // ]);
        $product->productName=$req->productName;
        $product->productCategory=$req->productCategory;
        $product->productPrice=$req->productPrice;
        $product->productDescription=$req->productDescription;
        $productImage=$req->file('productGallery');
        $productName=rand().'.'.$productImage->getClientOriginalExtension();
        $product->productGallery=$productName;
        $productImage->move(public_path('product'),$productName);
        $product->Save();
        return redirect('/admin/product/list');;
    }

    public function list()
    {
        $products=Product::all();
        return view('/product/productList',['products'=>$products]);
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect('/admin/product/list');
    }

    public function detail($id)
    {
        $product=Product::find($id);
        return view('product/detail',['product'=>$product]);
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
            return view('product/index',['products'=>$products]);
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
        if($products->count()==0)
            return 'no items in cart';
        else
        return view('product/cart',['cartlist'=>$products]);
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
    static public function cartTotal(){
        return 12000;
    }
}
