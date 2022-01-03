@extends('layout/layout')
@section('content')
<h2>add product</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="/admin/product/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Product Name</label>
                        <input type="text" class="form-control" name="productName" placeholder="Enter product name">
                        <span class="text-danger">
                            @error('productName')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Product Category</label>
                        <input type="text" class="form-control" name="productCategory" placeholder="Enter product category">
                        <span class="text-danger">
                            @error('productCategory')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Product price</label>
                        <input type="text" class="form-control" name="productPrice" placeholder="Enter product price">
                        <span class="text-danger">
                            @error('productPrice')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Product Description</label>
                        <input type="text" class="form-control" name="productDescription" placeholder="Enter product description">
                        <span class="text-danger">
                            @error('productDescription')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Product image</label>
                        <input type="file" class="form-control" name="productGallery">
                        <span class="text-danger">
                            @error('productGallery')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>    
@endsection