@extends('layouts.web')
@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">
		
		<div class="card">
			<div class="card-body">
				<b>Paycheck</b> <br><br>
				<a href="{{route('cart.index')}}" class="btn btn-outline-info">Edit Cart Items</a>
				<a href="{{route('customer.edit')}}" class="btn btn-outline-info">Edit Customer</a>
				<hr>
				<b>Name: </b> {{ $customer->name }} <br>
				<b>Email: </b> {{ $customer->email }} <br>
				<b>Phone: </b> {{ $customer->phone }} <br>
				<hr>
				<table class="table table-bordered">
					<thead>
						<th>
							
							<td>Name</td>
							<td>Description</td>
							<td>Price</td>
							<td>Count</td>
						</th>
					</thead>
					<tbody>
						@foreach($orders as $order)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $order['name'] ?? '' }}</td>
							<td>{{ $order['desc'] ?? '' }}</td>
							<td>{{ $order['price']  ?? ''}}</td>
							<td>{{ $order['count'] ?? ''}}</td>
						</tr>
						@endforeach
					</tbody>
				</table><br><br>
				<b>Total Price: </b> {{ session('totalPrice')}}
				<hr>
				<a href="{{route('send.invoice')}}" class="btn btn-outline-primary">Pay and Send me Invoice</a>
				
			</div>
		</div>
	</div>
</div>
@endsection