@extends('layouts.web')
@section('content')
<!-- Page Content -->

<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-body">
          <div class="card-title">Profile</div>
          <hr>
          <form>
            <div class="form-group">
              <label>Name</label>
              <input value="{{Auth::user()->name ?? ''}}" class="form-control" type="text" name="name">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input value="{{Auth::user()->name ?? ''}}" class="form-control" type="text" name="name">
            </div>

            <div class="form-group">
              <label>Phone Number</label>
              <input value="{{Auth::user()->name ?? ''}}" class="form-control" type="text" name="name">
            </div>

            <button class="btn btn-outline-info">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<br><br>


@endsection