@extends('/layout/layout')
@section('content')
    <h1>Cart</h1>
    @foreach ($cartlist as $product)
      <div class="container">
        <div class="row">
                <div class="col-sm-3">
                    <img class="cartImage" src={{$product->productGallery}} alt="" srcset="">
                </div>
                <div class="col-sm6">
                    <h3>{{$product->productName}}</h3>
                    <p>{{$product->productDescription}}</p>
                </div>
                <div class="col-sm-3">
                    <a href="/removeCart/{{$product->cartId}}"><button class="btn btn-warning">remove</button></a>
                </div>
             
        </div>
      </div>
      @endforeach
@endsection