@extends('backendtemplate')

@section('content')
	
	<div class="container-fluid">

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Sizes Edit Form 
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
	        	
	            <form action="{{route('sizes.update',$size->id)}}" method="POST" enctype="multipart/form-data">
	            	@csrf
	            	@method('PUT')
	            	<div class="form-group row">
						<label for="inputPrice" class="col-sm-2 col-form-label"> Price </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="number" class="form-control @error('price') is-invalid @enderror" id="inputPrice" placeholder="Enter Price" name="price" value="{{$size->price}}" required="" autocomplete="price" autofocus>
				      		@error('price')
				      		<span class="invalid-feedback" role="alert">
				      			<strong>{{$message}}</strong>
				      		</span> 
				      		@enderror
				    	</div>
					</div>
					<div class="form-group row">
						<label for="inputPrice" class="col-sm-2 col-form-label"> Name </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Enter Name" name="name" value="{{$size->name}}" required="" autocomplete="price" autofocus>
				      		@error('name')
				      		<span class="invalid-feedback" role="alert">
				      			<strong>{{$message}}</strong>
				      		</span> 
				      		@enderror
				    	</div>
					</div>
					<div class="form-group row">
						<label for="photo" class="col-sm-2 col-form-label"> photo  </label>
					    <div class="col-sm-10">
					    	<ul class="nav nav-tabs">
					    		<li class="nav-item">
					    			<a href="#old" class="nav-link active" data-toggle = "tab">Old</a>
					    		</li>

					    		<li class="nav-item">
					    			<a href="#new" class="nav-link" data-toggle = "tab">New</a>
					    		</li>
					    	</ul>

					    	<div class="tab-content py-3">
					    		<div class="tab-pane fade show active" id="old">
					    			<img src="{{asset($size->photo)}}" class="img-fluid w-25">
					    			<input type="hidden" name="oldphoto" value="{{asset($size->photo)}}">
					    		</div>

					    		<div class="tab-pane fade show" id="new">
					    			<input type="file" name="photo" class="form-control-file" id="photo">
					    		</div>
					    	</div>
					    </div>
					</div>
					


					<div class="form-group row">
						<div class="col-sm-2"></div>
					    <div class="col-sm-10">
					      <button type="submit" class="btn btn-primary">
					      	<i class="fa fa-save"></i> Update
					      </button>
					    </div>
					</div>

				</form>

	        </div>
		</div>

	</div>
@endsection