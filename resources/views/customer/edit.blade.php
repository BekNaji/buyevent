@extends('layouts.web')
@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">
		
		<div class="card">
			<div class="card-body">
				<b>Customer Form</b>
				<hr>
				<form action="{{route('customer.update')}}" method="POST">
					@csrf
					<div class="form-group">
						<label>Name</label>
						<input value="{{$customer->name}}" class="form-control" type="text" name="name" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input value="{{$customer->email}}" class="form-control" type="text" name="email" required>
					</div>

					<div class="form-group">
						<label>Phone</label>
						<input value="{{$customer->phone}}" class="form-control" type="text" name="phone" required>
					</div>

					<button class="btn btn-outline-success">Update</button>
				</form>
				
			</div>
		</div>
	</div>
</div>
@endsection