@extends ('backendtemplate');
@section('content');


	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
	            <div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Orders list
			            </h4>
					</div>

					<div class="col-2">
						<a href="{{route('orders.create')}}" class="btn btn-outline-primary btn-block float-right"> 
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
								<th>Table</th>
								<th>OrderNo</th>
								<th>OrderDate</th>
								<th>Total</th>
								<th>Action</th>
								
							</tr>
						</thead>

						<tbody>
							@php $i=1; @endphp
							@foreach($orders as $row)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$row->table->table_no}}</td>
								<td>{{$row->order}}</td>
								<td>{{$row->orderdate}}</td>
								
								
								<td>
									<a href="#" class="btn btn-info detail" data-id="{{$row->id}}">Detail</a>
									<a href="{{route('products.edit',$row->id)}}" class="btn btn-warning">Edit</a>
									<form method="post" action="{{route('products.destroy',$row->id)}}" onsubmit="return confirm('Are You Sure?')" class="d-inline-flex">
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
					res.category_id+"</td><br><td>Code_no:"+res.code_no+"</td><br>"+res.product_name+"<br>"+res.price);
				$('#detailModal').modal('show');
			})
		})
	})
</script>
@endsection