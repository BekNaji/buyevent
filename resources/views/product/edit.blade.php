@extends('layouts.web')
@section('content')
<!-- Page Content -->


<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-body">
          <div class="card-title"><b>Store Product</b></div>
          <hr>
          <form action="{{route('product.update')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{encrypt($product->id)}}">
            <div class="form-group">
              <label>Name</label>
              <input value="{{$product->name}}" required class="form-control" type="text" name="name">
            </div>

            <div class="form-group">
              <label>Desc</label>
              <textarea class="form-control" name="desc">
              {{$product->desc}}
              </textarea>
            </div>

            <div class="form-group">
              <label>Price</label>
              <input value="{{$product->price}}"  required class="form-control" type="number" name="price" step="0.01">
            </div>

            <div class="form-group">
              <label>Count</label>
              <input value="{{$product->count}}" required class="form-control" type="number" name="count" >
            </div>

          
            <button type="store" class="btn btn-outline-success">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<br><br>


@endsection