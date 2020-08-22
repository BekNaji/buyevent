@extends('layouts.web')
@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">
		
		<div class="card">
			<div class="card-body">
				<center>
					<img style="width:150px; height: 150px" src="https://png.pngtree.com/png-vector/20190228/ourmid/pngtree-check-mark-icon-design-template-vector-isolated-png-image_711429.jpg">
				<br>
				<h3>Your Order Has Been Taken!</h3>
				<h6>Invoice mail has been sent to the address!</h6>
				<a href="{{route('home')}}">Back Home</a>
				</center>
				
			</div>
		</div>
	</div>
</div>
@endsection