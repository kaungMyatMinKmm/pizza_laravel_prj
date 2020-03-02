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
									<a href="#" class="btn btn-info detail" data-id="{{$row->id}}">Detail</a>
									
									<a href="{{route('tables.edit',$row->id)}}" class="btn btn-warning">Edit</a>
									<form method="post" action="{{route('tables.destroy',$row->id)}}" onsubmit="return confirm('Are You Sure?')" class="d-inline-flex">
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


<!-- Modal -->
	<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Sizes Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detailBody">
        
      </div>
      
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('.detail').click(function(){
			var id = $(this).data('id');
			alert(id);
		})
	})
</script>
@endsection
