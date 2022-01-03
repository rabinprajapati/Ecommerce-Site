<?php
    use App\Http\Controllers\ProductController;
    $total=0;
    $total=ProductController::cartTotal();
?>
@extends('/layout/layout')
@section('content')
    <h1>Cart</h1>
    @foreach ($cartlist as $product)
      <div class="container">
        <div class="row">
                <div class="col-sm-3">
                    <img class="cartImage" src="{{url('product',$product->productGallery)}}" alt="" srcset="">
                </div>
                <div class="col-sm-4">
                    <h3>{{$product->productName}}</h3>
                    <p>{{$product->productDescription}}</p>
                </div>
                <div class="col-sm-2">
                    <h4>{{'$'.$product->productPrice}}</h4>
                </div>
                <div class="col-sm-3">
                    <a href="/removeCart/{{$product->cartId}}"><button class="btn btn-warning">remove</button></a>
                </div>
             
        </div>
      </div>
      @endforeach
      <hr>
      <h1>total:{{$total}}</h1>

@endsection