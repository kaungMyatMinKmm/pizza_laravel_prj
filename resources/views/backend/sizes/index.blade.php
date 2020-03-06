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
			            	Sizes list
			            </h4>
					</div>

					<div class="col-2">
						<a href="{{route('sizes.create')}}" class="btn btn-outline-primary btn-block float-right"> 
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
								<th>Price</th>
								<th>Name</th>
								<!-- <th>Photo</th> -->
								<th>Action</th>
								
							</tr>
						</thead>

						<tbody>
							@php $i=1; @endphp
							@foreach($sizes as $row)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$row->price}}</td>
								<td>{{$row->name}}</td>
								<!-- <td>{{$row->photo}}</td> -->
								
								<td>
									<!-- <a href="#" class="btn btn-info detail" data-id="{{$row->id}}">Detail</a> -->
									
									<a href="{{route('sizes.edit',$row->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
									<form method="post" action="{{route('sizes.destroy',$row->id)}}" onsubmit="return confirm('Are You Sure?')" class="d-inline-flex">
										@csrf
										@method('DELETE')

									<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>
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


