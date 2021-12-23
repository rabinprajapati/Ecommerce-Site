@extends('/layout/layout')
@section('content')
    <h1>home page</h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          @foreach ($products as $item)
          <div class="carousel-item {{$item->id==1?'active':''}}">
            <img class="d-block w-50" src={{$item->productGallery}} alt="First slide">
          </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="container">
          <div class="row">
                @foreach ($products as $item)
                <div class="col-sm-3">
                  <a href="/detail/{{$item->id}}"><img class="indexImage" src={{$item->productGallery}} ></a>
                  <h3>{{$item->productName}}</h3>
                  <h2>{{$item->productPrice}}</h2>
                  <button class="btn btn-primary">buy</button>
                  <form action="/addToCart" method="post">
                    @csrf
                    <input type="hidden" name="productId" value="{{$item->id}}">
                    <button class="btn btn-success">add to cart</button>
                </form>
                </div>
                @endforeach
              </div>
      </div>
@endsection