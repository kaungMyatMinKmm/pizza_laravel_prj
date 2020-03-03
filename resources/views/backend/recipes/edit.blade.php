@extends('backendtemplate')

@section('content')
	
	<div class="container-fluid">

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Recipes Edit Form 
			            </h4>
					</div>

					<div class="col-2">
						<a href="{{route('recipes.index')}}" class="btn btn-outline-primary btn-block float-right"> 
		            		<i class="fa fa-backward pr-2"></i>	Go Back 
		            	</a>
					</div>
				</div>

	        </div>
	        <div class="card-body">
	        	
	            <form action="{{route('recipes.update',$recipes->id)}}" method="POST" enctype="multipart/form-data">
	            	@csrf <!--token for controller -->
	            	@method('PUT')
	       			<div class="form-group row">
						<label for="inputName" class="col-sm-2 col-form-label"> Name </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Enter Recipe Name" name="name" value="{{$recipes->name}}" required="" autocomplete="name" autofocus>
				      		@error('name')
				      		<span class="invalid-feedback" role="alert">
				      			<strong>{{$message}}</strong>
				      		</span> 
				      		@enderror
				    	</div>
					</div>

					

					<div class="form-group row">
						<label for="inputPrice" class="col-sm-2 col-form-label"> price </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control @error('price') is-invalid @enderror" id="inputPrice" placeholder="Enter Recipe price" name="price" value="{{$recipes->price}}" required="" autocomplete="price" autofocus>
				      		@error('price')
				      		<span class="invalid-feedback" role="alert">
				      			<strong>{{$message}}</strong>
				      		</span> 
				      		@enderror
				    	</div>
					</div>

					<div class="form-group row">
						<label for="inputQty" class="col-sm-2 col-form-label"> Qty </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control @error('qty') is-invalid @enderror" id="inputQty" placeholder="Enter Recipe qty" name="qty" value="{{$recipes->qty}}" required="" autocomplete="qty" autofocus>
				      		@error('qty')
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