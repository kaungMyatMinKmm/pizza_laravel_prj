@extends('backendtemplate')

@section('content')
	
	<div class="container-fluid">

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Tables Create Form 
			            </h4>
					</div>

					<div class="col-2">
						<a href="{{route('tables.index')}}" class="btn btn-outline-primary btn-block float-right"> 
		            		<i class="fa fa-backward pr-2"></i>	Go Back 
		            	</a>
					</div>
				</div>

	        </div>
	        <div class="card-body">
	        	
	            <form action="{{route('orders.store')}}" method="POST" enctype="multipart/form-data">
	            	@csrf
	            	
					<div class="form-group row">
						<label for="table" class="col-sm-2 col-form-label">Choose Table</label>
						<div class="col-sm-10">
							<select name="table" class="form-control">
								@foreach ($tables as $row)
								<option value="{{$row->id}}">{{$row->table_no}}</option>
								@endforeach
							</select>
						</div>
					</div>
	            	<div class="form-group row">
						<label for="inputTable" class="col-sm-2 col-form-label"> Order_no </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control @error('order') is-invalid @enderror" id="inputOrder" placeholder="Enter Order No" name="order" value="{{old('order')}}" required="" autocomplete="order" autofocus>
				      		@error('order')
				      		<span class="invalid-feedback" role="alert">
				      			<strong>{{$message}}</strong>
				      		</span> 
				      		@enderror
				    	</div>
					</div>
					<div class="form-group row">
						<label for="Orderdate" class="col-sm-2 col-form-label"> Orderdate </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="date" class="form-control @error('orderdate') is-invalid @enderror" id="Orderdate" placeholder="Enter Order No" name="orderdate" value="{{old('orderdate')}}" required="" autocomplete="orderdate" autofocus>
				      		@error('orderdate')
				      		<span class="invalid-feedback" role="alert">
				      			<strong>{{$message}}</strong>
				      		</span> 
				      		@enderror
				    	</div>
					</div>
					
					
					


					<div class="form-group row">
						<div class="col-sm-2"></div>
					    <div class="col-sm-10">
					      <button type="submit" class="btn btn-primary">
					      	<i class="fa fa-save"></i> Save
					      </button>
					    </div>
					</div>

				</form>

	        </div>
		</div>

	</div>
@endsection