<?php
  use App\Http\Controllers\ProductController;
  $total=0;
  if(Session::has('user'))
  {
    $total=ProductController::cartItem();
  }
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Shopping</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        @if(Session::has('user'))
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Session::get('user')->userName}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/logout">Logout</a>
          </div>
          </li>
          @if((Session::get('user')->userName)=='admin')
          <li class="nav-item">
            <a class="nav-link" href="/admin/product/add">add product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/product/list">product list</a>
          </li>
          @endif
        @else
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li>
        @endif
      </ul>
      <form class="form-inline my-2 my-lg-0" action="/search" method="POST">
        @csrf
        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
        @if(Session::has('user'))
          <a href="/cart">Cart({{$total}})</a>
        @endif
    </div>
  </nav>
  <style>
    .indexImage{
      height: 250px;
      width: 300px
    }
    .detailImage{
      height: 300px;
    }
    .cartImage{
      height: 80px;
    }
  </style>