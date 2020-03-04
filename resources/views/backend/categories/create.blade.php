@extends ('backendtemplate');
@section('content');

<div class="container-fluid">

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Categories Create Form 
			            </h4>
					</div>

					<div class="col-2">
						<a href="{{route('categories.index')}}" class="btn btn-outline-primary btn-block float-right"> 
		            		<i class="fa fa-backward pr-2"></i>	Go Back 
		            	</a>
					</div>
				</div>

	        </div>
	        <div class="card-body">
	        	
	            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
	            	@csrf
	            	<div class="form-group row">
						<label for="inputName" class="col-sm-2 col-form-label"> Name </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle" placeholder="Enter Category Name" name="name" value="{{old('name')}}" required="" autocomplete="name" autofocus>
				      		@error('name')
				      		<span class="invalid-feedback" role="alert">
				      			<strong>{{$message}}</strong>
				      		</span> 
				      		@enderror
				    	</div>
					</div>
					<div class="form-group row">
						<label for="inputPhoto" class="col-sm-2 col-form-label"> Photo </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="inputPhoto"  name="photo" value="{{old('photo')}}" required="" autocomplete="photo" autofocus>
				      		@error('photo')
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