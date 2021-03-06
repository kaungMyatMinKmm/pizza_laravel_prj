@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<h2>Table with Show</h2>
	<div class="card shadow">
		<div class="card-header">
			<div class="row">
				<div class="col-10">
					<h4 class="m-0 font-weight-bold text-primary">
						Orders List
					</h4>
				</div>
				<!-- <div class="col-2">
					<a href="{{route('crusts.create')}}" class="btn btn-outline-primary btn-block float-right">
						<i class="fa fa-plus pr-2"></i>Add New
					</a>
				</div> -->
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Voucher_no</th>
							<th>Orderdate</th>
							<th>Total</th>
							<th>Action</th>

						</tr>
					</thead>
					<tbody>
						@php $i=1; @endphp
						@foreach($orders as $row)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$row->voucher_no}}</td>
							<td>{{$row->orderdate}}</td>
							<td>{{$row->total}}</td>
							<!-- <td>{{$row->price}}</td> -->
							<td>
								
								<form method="post" action="{{route('orders.destroy',$row->id)}}" onsubmit="return confirm('Are You Sure?')" class="d-inline-flex">
										@csrf
										@method('DELETE')

									<button type="submit" class="btn btn-danger"> Delete
									</button>	
									</form>
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