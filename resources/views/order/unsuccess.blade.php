@extends('layouts.web')
@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">
		
		<div class="card">
			<div class="card-body">
				<center>
					<img style="width:150px; height: 150px" src="https://teak.wihardja.com.sg/20191129013853/unsuccessful-logo-01.png">
				<br>
				<h3>Your Order Has Not Been Taken!</h3>
				<h6>Invoice mail has not been sent to the address! Please try again!</h6>
				<a href="{{route('home')}}">Back Home</a>
				</center>
				
			</div>
		</div>
	</div>
</div>
@endsection