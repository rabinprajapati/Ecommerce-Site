@extends('layout/layout')
@section('content')
<h2>Login page</h2>
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
{{Session::forget('message')}}
@endif
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">User Name</label>
                        <input type="text" class="form-control" name="userName" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="userPassword" placeholder="Password">
                    </div>
                    <div class="form-check">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>    
@endsection