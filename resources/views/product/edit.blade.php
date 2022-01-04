@extends('layout/layout')
@section('content')
<h2>edit product</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="/admin/product/update/{{$product->id}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Product Name</label>
                        <input type="text" class="form-control" name="productName" value={{$product->productName}}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Product Category</label>
                        <input type="text" class="form-control" name="productCategory" value={{$product->productCategory}}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Product price</label>
                        <input type="text" class="form-control" name="productPrice" value={{$product->productPrice}}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Product Description</label>
                        <input type="text" class="form-control" name="productDescription" value={{$product->productDescription}}>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>    
@endsection