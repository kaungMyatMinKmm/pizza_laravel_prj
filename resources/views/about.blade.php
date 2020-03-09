@extends('frontendtemplate');

@section('content');

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-5">
			<h4>About Us</h4>
			<p>
The Company was Founded in 2010 and has since grown dramatically. We primarily assist customers who own small businesses and want the flexibility and cost effectiveness of an online system</p>
		</div>
		<div class="col-lg-6">
			<img src="{{asset('pos/img/pos img.png')}}">
		</div>
	</div>
</div>

@endsection