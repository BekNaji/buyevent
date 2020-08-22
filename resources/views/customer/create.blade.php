@extends('layouts.web')
@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">
		@if ($errors->any())
		<div class="alert alert-danger">
		 <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
		</div>
		@endif
		<div class="card">
			<div class="card-body">
				<b>Customer Form</b>
				<hr>
				<form action="{{route('customer.store')}}" method="POST">
					@csrf
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="text" name="email" required>
					</div>

					<div class="form-group">
						<label>Phone</label>
						<input class="form-control" type="text" name="phone" required>
					</div>

					<button class="btn btn-outline-success">Continue</button>
				</form>
				
			</div>
		</div>
	</div>
</div>
@endsection