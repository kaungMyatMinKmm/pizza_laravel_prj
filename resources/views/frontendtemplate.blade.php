<!-- style="background-color: #10AB43" -->
<!DOCTYPE html>
<html>
<head>
	<title>OfflinePOS</title>
	<link rel="stylesheet" type="text/css" href="{{asset('pos/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('pos/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('pos/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('pos/dist/aos.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<script type="text/javascript" src="{{asset('pos/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('pos/js/bootstrap.bundle.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('pos/dist/aos.js')}}"></script>
  <script type="text/javascript" src="{{asset('pos/js/custom.js')}}"></script>
</head>
<body>
	<div id="banner">
		<nav class="navbar navbar-expand-lg  fixed-top navbar-light">
  			<a class="navbar-brand" href="#">
  				<img src="{{asset('pos/img/piza icon.png')}}" style="width: 50px;height: 60px;border-style: groove;">
  				<img src="{{asset('pos/img/pos.png')}}" style="width: 170px;height: 60px;border-style: groove;float: right;">
  			</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
 			</button>
  			<div class="collapse navbar-collapse" id="navbarNav">
    			<ul class="navbar-nav ml-auto">
      				<li class="nav-item active">
        				<a class="nav-link" href="{{route('main')}}">Home <span class="sr-only">(current)</span></a>
      				</li>
      				<!-- <li class="nav-item">
        				<a class="nav-link" href="#">Features</a>
      				</li> -->
      				<li class="nav-item">
        				<a class="nav-link" href="{{route('contactpage')}}">Contact</a>
      				</li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('aboutpage')}}">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal">Sign In| Sign Up</a>
              </li>
      				
    			</ul>
  			</div>
		</nav>

<!-- Modal -->
    <div class="modal fade " id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign In | Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-5 col-md-12 col-sm-12">
            <img src="{{asset('pos/img/pos img.png')}}" style="width: 300px">
          </div>
          <div class="col-lg-7 col-md-12 col-sm-12">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sign In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sign Up</a>
              </li>
              
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form>
                  <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="" class="form-control" id="username">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="" class="form-control" id="password">
                  </div>
                  <div class="form-group">
                    <label for="password">Comfirm Password</label>
                    <input type="password" name="" class="form-control" id="password">
                  </div>

                  <div class="offset-2 col-lg-8 offset-2">
                    <button type="submit" class="btn btn-warning btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="email" name="" class="form-control" id="password">
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                  </div>
                  <div class="offset-2 col-lg-8 offset-2">
                    <button type="submit" class="btn btn-warning btn-block">
                      Login
                    </button>
                  </div>
              </div>
              
              </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
    </div>
  </div>
 @yield('content')

  <div class="footer">
    <div class="container-fluid text-center" style="background-color: #346D49">
    <div class="row py-3">
      <div class="col-lg-4 col-md-12 col-sm-12">
        <h4>Company</h4>
        <a href="" class="text-dark">About Us</a><br>
        <a href="" class="text-dark">Contact Us</a>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12">
        <h4>Need Help?</h4>
        <p>Support</p>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12">
        <h4>Terms & Conditions</h4>
        <p>License</p>
        <p>TOS</p>
        <p>Privacy Policy</p>
        <p>Return Policy</p>
      </div>
    </div>
    </div>
    
  </div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>

    AOS.init();
</script> 
</body>

</html>