
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hello World</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>
<body>
<div class="container">
	<div class="row">
	<div class="col-md-10 offset-md-1">
		
		<div class="card">
			<div class="card-body">
				<b>Paycheck</b> <br><br>
				
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
				<b>Total Price: </b> {{ $totalPrice }}
				
				
			</div>
		</div>
	</div>
</div>

</div>

</body>
</html>
