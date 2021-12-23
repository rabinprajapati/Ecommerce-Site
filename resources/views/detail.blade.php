@extends('layout/layout')
@section('content')
<h1>detail page</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detailImage" src={{$product->productGallery}} alt="">
        </div>
        <div class="col-sm-6">
            <a href="/">go back</a>
            <br>
            <h3>{{$product->productName}}</h3>
            <h2>{{$product->productPrice}}</h2>
            <p>{{$product->productDescription}}</p>
            <button class="btn btn-primary">buy</button>
            <form action="/addToCart" method="POST">
                @csrf
                <input type="hidden" name="productId" value="{{$product->id}}">
                <button class="btn btn-success">add to cart</button>
            </form>
        </div>
    </div>
</div>

@endsection
