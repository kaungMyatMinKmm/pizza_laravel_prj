@extends('frontendtemplate')
@section('content')
<div class="container-fluid">
<div class="row my-4">
			<div class="col-lg-6">
				<form>
					<div class="form-group">
						
						<input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Your Name">

					</div>
					<div class="form-group">
						
						<input type="email" class="form-control" id="" value="Your Email">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="" value="Subject">

					</div>
					<div class="form-group">
						<textarea name="terms" cols="62" rows="4"></textarea>
					</div>

					<div class="offset-4 col-4 offset-4" class="btn btn-light">
						<button type="submit"id="loginbtn">
							Send Message
						</button>
					</div>
				</form>
			</div>
			<div class="col-lg-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488799.4874886525!2d95.90136216008075!3d16.838952469188303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon!5e0!3m2!1sen!2smm!4v1580442959373!5m2!1sen!2smm" width="600" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</div>
		</div>
</div>
@endsection