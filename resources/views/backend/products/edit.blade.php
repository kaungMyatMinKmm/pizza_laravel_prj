@extends('backendtemplate')

@section('content')
	
	<div class="container-fluid">

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Products Edit Form 
			            </h4>
					</div>

					<div class="col-2">
						<a href="{{route('products.index')}}" class="btn btn-outline-primary btn-block float-right"> 
		            		<i class="fa fa-backward pr-2"></i>	Go Back 
		            	</a>
					</div>
				</div>

	        </div>
	        <div class="card-body">
	        	
	            <form action="{{route('products.update',$products->id)}}" method="POST" enctype="multipart/form-data">
	            	@csrf <!--token for controller -->
	            	@method('PUT')
	       			<div class="form-group row">
						<label for="inputName" class="col-sm-2 col-form-label"> Name </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Enter Product Name" name="name" value="{{$products->product_name}}" required="" autocomplete="name" autofocus>
				      		@error('name')
				      		<span class="invalid-feedback" role="alert">
				      			<strong>{{$message}}</strong>
				      		</span> 
				      		@enderror
				    	</div>
					</div>

					<div class="form-group row">
						<label for="inputCodeno" class="col-sm-2 col-form-label">Code No</label>

						<div class="col-sm-10">
							<input type="text" name="codeno" class="form-control @error('codeno')is-invalid @enderror" id="inputCodeno" placeholder="Enter codeno" required="required" value="{{$products->code_no}}">
							@error('name')
							<span class="invalid-feedback" role="alert" >
								<strong>{{$message}}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="inputPrice" class="col-sm-2 col-form-label"> price </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control @error('price') is-invalid @enderror" id="inputPrice" placeholder="Enter Product price" name="price" value="{{$products->price}}" required="" autocomplete="price" autofocus>
				      		@error('price')
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
					    			<img src="{{asset($products->photo)}}" class="img-fluid w-25">
					    			<input type="hidden" name="oldphoto" value="{{asset($products->photo)}}">
					    		</div>

					    		<div class="tab-pane fade show" id="new">
					    			<input type="file" name="photo" class="form-control-file" id="photo">
					    		</div>
					    	</div>
					    </div>
					</div>




					
					<div class="form-group row">
						<label for="category" class="col-sm-2 col-form-label">Choose Category</label>
						<div class="col-sm-10">
							<select name="category" class="form-control">
							@foreach ($categories as $row)
							<option value="{{$row->id}}" @if ($products->category_id == $row->id) {{'selected'}} @endif>{{$row->name}}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="category" class="col-sm-2 col-form-label">Choose Size</label>
						<div class="col-sm-10">
							<select name="size" class="form-control">
							@foreach ($sizes as $row)
							<option value="{{$row->id}}" @if ($products->size_id == $row->id) {{'selected'}} @endif>{{$row->name}}</option>
							@endforeach
							</select>
						</div>
					</div>


					<div class="form-group row">
						<label for="size" class="col-sm-2 col-form-label">Choose size</label>
						<div class="col-sm-10">
							<select name="size" class="form-control">
							@foreach ($sizes as $row)
							<option value="{{$row->id}}" @if ($products->size_id == $row->id) {{'selected'}} @endif>{{$row->name}}</option>
							@endforeach
							</select>
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