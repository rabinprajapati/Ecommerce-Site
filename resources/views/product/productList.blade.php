
@extends('/layout/layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
</div>
    <h1>Product list</h1>
    <div class="container">
        <div class="row">
                <div class="col-sm-3">
                   <h2>Image</h2>
                </div>
                <div class="col-sm-4">
                    <h2>Product Name</h2>
                </div>
                <div class="col-sm-4">
                    <h2>Actions</h2>
                </div>
        </div>
      </div>
    @foreach ($products as $product)
    <hr>
      <div class="container">
        <div class="row">
                <div class="col-sm-3">
                    <img class="cartImage" src="{{url('product',$product->productGallery)}}" alt="" srcset="">
                </div>
                <div class="col-sm-4">
                    <h3>{{$product->productName}}</h3>
                </div>
                <div class="col-sm-4">
                    <a href="/admin/product/edit/{{$product->id}}"><button class="btn btn-warning">edit</button></a>
                    <button class="btn btn-primary">detail</button>
                    <a href="/admin/product/delete/{{$product->id}}"><button class="btn btn-danger">delete</button></a>
                </div>
        </div>
      </div>
      @endforeach

@endsection