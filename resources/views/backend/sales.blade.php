@extends('backendtemplate')
@section('content')

  <!-- Main Content -->
<h2>Sales</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Size</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Product</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container">
               
                      @foreach($categories as $row)
                        
                        
                        <div class="card col-sm-2 m-2">
                          <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">{{$row->name}}</p>
                            <input type="radio" name="category" value="{{$row->id}}">
                          </div>
                        </div>
                      @endforeach  

            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                     @foreach($sizes as $row)
                    
                        <div class="card col-lg-3 w-10 h-10 m-2">
                           <img src="{{$row->photo}}" class="card-img-top w-10" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">{{$row->name}}</h5>
                            <input type="radio" name="category" value="{{$row->id}}">
                          </div>
                        </div>
                       
                      @endforeach
                </div> 
          </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="row">
                     @foreach($products as $row)
                    
                        <div class="card col-lg-4 w-10 h-10 m-2">
                           <img src="{{$row->photo}}" class="card-img-top " style="width: 10; height: 10;" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">{{$row->product_name}}</h5>
                            <input type="radio" name="category" value="{{$row->id}}">
                          </div>
                        </div>
                       
                      @endforeach
                </div> 
        </div>
      </div>

  </div>

  </div>
  </div> 
      <!-- End of Main Content -->

@endsection