@extends('backendtemplate')

@section('content')
	
	<div class="container-fluid">
		<h2>Show with table</h2>
	  <!-- Page Heading -->
		<!-- <h1 class="h3 mb-4 text-gray-800">
	  		<i class="fas fa-dolly pr-3"></i> 
	  		Courses 
	  	</h1> -->

		<div class="card shadow mb-4">
			<div class="card-header py-3">
	            <div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Tastes list
			            </h4>
					</div>

					<div class="col-2">
						<a href="{{route('tastes.create')}}" class="btn btn-outline-primary btn-block float-right"> 
		            		<i class="fa fa-plus pr-2"></i>	Add New 
		            	</a>
					</div>
				</div>
	        </div>
	        <div class="card-body">
				
				

	            <div class="table-responsive">
	            	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Taste Name </th>
								<th>Action</th>
								
							</tr>
						</thead>

						<tbody>
							@php $i=1; @endphp
							@foreach($tastes as $row)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$row->name}}</td>
								
								<td>
									
									<a href="{{route('tastes.edit',$row->id)}}" class="btn btn-warning">Edit</a>
									<form method="post" action="{{route('tastes.destroy',$row->id)}}" onsubmit="return confirm('Are You Sure?')" class="d-inline-flex">
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
