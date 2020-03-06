@extends('backendtemplate');
@section('content')
<div class="container-fluid">
	<h2>Table with Show</h2>
	<div class="card shadow">
		<div class="card-header">
			<div class="row">
				<div class="col-10">
					<h4 class="m-0 font-weight-bold text-primary">
						Crusts List
					</h4>
				</div>
				<div class="col-2">
					<a href="{{route('crusts.create')}}" class="btn btn-outline-primary btn-block float-right">
						<i class="fa fa-plus pr-2"></i>Add New
					</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Price</th>
							<th>Action</th>

						</tr>
					</thead>
					<tbody>
						@php $i=1; @endphp
						@foreach($crusts as $row)
						<tr>
							<td>{{$i++}}</td>
							<!-- <td>{{$row->name}}</td>
							<td>{{$row->email}}</td> -->
							<td>{{$row->name}}</td>
							<td>{{$row->price}}</td>
							<td>
								
								<a href="{{route('crusts.edit',$row->id)}}" class="btn btn-warning">Edit</a>
								<form method="post" action="{{route('crusts.destroy',$row->id)}}" onsubmit="return confirm('Are You Sure?')" class="d-inline-flex">
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