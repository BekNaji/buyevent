
@extends('layouts.web')
@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">
		
		<div class="card">
			<div class="card-body">
				<b>Cart</b>
				<hr>
				<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Desc</th>
					<th>Price</th>
					<th>Count</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@if($orders != '')
				@foreach($orders as $key => $product)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$product['name'] 	?? ''}}</td>
					<td>{{$product['desc'] 	?? ''}}</td>
					<td>{{$product['price'] ?? ''}}</td>
					<td>{{$product['count'] ?? ''}}</td>
					<td>
						
						<a class="btn btn-outline-danger" 
						href="{{route('cart.delete',encrypt($loop->index))}}">Delete</a>

					</td>
				</tr>
				@endforeach
				@endif
				</table>
			 <hr>
			 <span class="float-left"><h4>Total Price: $
			 	@if(session('totalPrice'))
			 	{{ session('totalPrice') }} <br><br>
			 	<a href="{{route('customer.create')}}" class="btn btn-outline-success">Payment</a>
			 	@endif
			 </h4></span>
			</tbody>
		
			</div>
		</div>
	</div>
</div>
@endsection


