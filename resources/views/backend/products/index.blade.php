@extends ('backendtemplate');
@section('content');


	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
	            <div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Products list
			            </h4>
					</div>

					<div class="col-2">
						<a href="{{route('products.create')}}" class="btn btn-outline-primary btn-block float-right"> 
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
								<th>Code No</th>
								<th> Name </th>
								<th> Price </th>
								<th>Action</th>
								
							</tr>
						</thead>

						<tbody>
							@php $i=1; @endphp
							@foreach($products as $row)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$row->code_no}}</td>
								<td>{{$row->product_name}}</td>
								<td>{{$row->price}}</td>
								
								<td>
									<a href="#" class="btn btn-info detail" data-id="{{$row->id}}"><i class="fas fa-info"></i></a>
									<a href="{{route('products.edit',$row->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
									<form method="post" action="{{route('products.destroy',$row->id)}}" onsubmit="return confirm('Are You Sure?')" class="d-inline-flex">
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
	<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Product Detail</h5>
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
			// alert(id);
			$.get("products/"+id,function(res){

				// $('#detailModalLabel').text(res.namee);
				$('#detailBody').html(
					"</td><br><td>Code_no:"+res.code_no+"</td><br>"+res.product_name+"<br>"+res.price);
				$('#detailModal').modal('show');
			})
		})
	})
</script>
@endsection