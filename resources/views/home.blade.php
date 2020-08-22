@extends('layouts.web')
@section('content')
<!-- Page Content -->

  <br><br>

    <!-- Page Features -->
    <div class="row text-center">
      @foreach($products as $product)
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="http://placehold.it/500x325" alt="">
          <div class="card-body">
            <h4 class="card-title">{{$product->name}}</h4>
            <p class="card-text">{{$product->desc}}</p>

          </div>
          <div class="card-footer">
            <span class="float-left"><b>Price: </b>${{$product->price}}</span>
            <a href="{{route('cart.add',encrypt($product->id))}}" class="btn btn-primary float-right">Add to Cart!</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <!-- /.row -->


@endsection