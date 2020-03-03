@extends ('backendtemplate')
@section('content')

<div class="container-fluid">

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Products Create Form 
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
	        	
	            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
	            	@csrf
	            	<div class="form-group row">
						<label for="inputName" class="col-sm-2 col-form-label"> Name </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Enter Product Name" name="name" value="{{old('name')}}" required="" autocomplete="name" autofocus>
				      		@error('name')
				      		<span class="invalid-feedback" role="alert">
				      			<strong>{{$message}}</strong>
				      		</span> 
				      		@enderror
				    	</div>
					</div>

					<div class="form-group row">
						<label for="inputPrice" class="col-sm-2 col-form-label">Price</label>

						<div class="col-sm-10">
							<input type="text" name="price" class="form-control @error('price')is-invalid @enderror" id="inputPrice" placeholder="Enter Price" required="required">
							@error('name')
							<span class="invalid-feedback" role="alert" >
								<strong>{{$message}}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="inputCodeno" class="col-sm-2 col-form-label">Code No</label>

						<div class="col-sm-10">
							<input type="text" name="codeno" class="form-control @error('codeno')is-invalid @enderror" id="inputCodeno" placeholder="Enter codeno" required="required">
							@error('name')
							<span class="invalid-feedback" role="alert" >
								<strong>{{$message}}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>

						<div class="col-sm-3">
							<input type="file" name="photo" class="form-control @error('photo')is-invalid @enderror" id="inputPhoto" required="required">
						</div>
						@error('name')
							<span class="invalid-feedback" role="alert" >
								<strong>{{$message}}</strong>
							</span>
						@enderror
					</div>

					<div class="form-group row">
						<label for="category" class="col-sm-2 col-form-label">Choose Category</label>
						<div class="col-sm-10">
							<select name="category" class="form-control">
								@foreach ($categories as $row)
								<option value="{{$row->id}}">{{$row->name}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="size" class="col-sm-2 col-form-label">Choose Size</label>
						<div class="col-sm-10">
							<select name="size" class="form-control">
								@foreach ($sizes as $row)
								<option value="{{$row->id}}">{{$row->name}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Select Recipes</label>
							<div class="col-sm-10">
								<select name="recipes[]" class="form-control recipes" multiple="multiple">
									@foreach ($recipes as $row)
									<option value="{{$row->id}}" >{{$row->name}}</option>
									@endforeach
								</select>
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


		@section('script')
			<script type="text/javascript">
				$(document).ready(function () {

					$('.recipes').select2();

				})
			</script>

		@endsection

@endsection