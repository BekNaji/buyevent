@extends('layouts.web')
@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">
		
		<div class="card">
			<div class="card-body">
				<b>Product list</b>
				<a class=" float-right btn btn-outline-success" href="{{route('product.create')}}">Create</a><hr>
				<table class="table table-bordered">
			<thead>
				<tr>
					<th>id</th>
					<th>Name</th>
					<th>Desc</th>
					<th>Price</th>
					<th>Count</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$product->name}}</td>
					<td>{{$product->desc}}</td>
					<td>{{$product->price}}</td>
					<td>{{$product->count}}</td>
					<td>
						<a class="btn btn-outline-warning" 
						href="{{route('product.edit',encrypt($product->id))}}">Edit</a>
						<a class="btn btn-outline-danger" 
						href="{{route('product.delete',encrypt($product->id))}}">Delete</a>

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
			</div>
		</div>
	</div>
</div>
@endsection