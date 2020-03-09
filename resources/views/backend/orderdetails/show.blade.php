@extends('backendtemplate')

@section('content')
<div class="container-fluid">
	<h2>Show with your Orderdetail</h2>
	<div class="row">
		<div class="col-md-12  ">
			<table cellpadding="10" cellspacing="0" class="border " style="background-color:white;color: black;">
			<tr>

			<td>Voucher: {{$orderdetail->voucher_no}}</td>

			</tr>
			<tr>
				<td>Recipe Name: {{$recipe->topping->name}},
						 {{$recipe->crust->name}}</td>
			</tr>
			<tr>
				<td>Qty :{{$orderdetail->qty}}</td>
			</tr>
		
			<tr>
				<td>Total:{{$recipe->price}}</td>
			</tr>
			
			
			</table>
		</div>
	</div>
</div>
	
@endsection