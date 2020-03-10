@extends('backendtemplate')
@section('content')

  <!-- Main Content -->
<h2>Sales (Select All your recipe)</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="table-tab" data-toggle="tab" href="#table" role="tab" aria-controls="table" aria-selected="true">Topping</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Crust</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Size</a>
            </li>
            
          </ul>
          <div class="tab-content" id="myTabContent">

          <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
              <div class="container">
                 <div class="row ">
                        @foreach($toppings as $row)
                          
                          <div class="card col-lg-4 w-10 h-10 m-2">
                            <img src="{{$row->photo}}" class="card-img-top" alt="..." style="width: 150; height: 150;">
                            <div class="card-body px-3">
          
                              <h5 class="card-title">{{$row->name}}</h5>

                              <!-- <p class="card-text"></p> -->
                              <input type="radio" name="category" class="select"  value="{{$row->id}}" data-id="{{$row->id}}" data-name="{{$row->name}}" data-price="{{$row->price}}">
                            </div>
                          </div>
                        @endforeach 
                </div> 

              </div>
          </div>
          <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="container">
                 <div class="row ">
                        @foreach($crusts as $row)
                          
                          
                          <div class="card col-lg-4 w-10 h-10 m-2">
                            <img src="{{$row->photo}}" class="card-img-top" alt="..." style="width: 150; height: 150;">
                            <div class="card-body px-3">
          
                              <h5 class="card-title">{{$row->name}}</h5>
                              <!-- <p class="card-text"></p> -->
                              <input type="radio" name="category" class="select"  value="{{$row->id}}" data-id="{{$row->id}}" data-name="{{$row->name}}" data-price="{{$row->price}}">
                            </div>
                          </div>
                        @endforeach 
                </div> 

              </div>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="row">
                       @foreach($sizes as $row)
                      
                          <div class="card col-lg-4 w-10 h-10 m-2">
                            
                            <div class="card-body">
                              <h5 class="card-title">{{$row->name}}</h5>
                              <input type="radio" name="size" class="select" value="{{$row->id}}" data-id="{{$row->id}}" data-name="{{$row->name}}" data-price="{{$row->price}}">
                            </div>
                          </div>
                         
                        @endforeach
                  </div> 
            </div>
         
        </div>
      </div>

      <div class="col-lg-4 table-responsive">
            <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody id="order">
                    
                  </tbody>
                  <tfoot id="total">
                    
                  </tfoot>
            </table>
          </div>
        </div>
  </div> 
      <!-- End of Main Content -->

  
@endsection

  <!-- modal start -->
  <div class="modal fade" id="detailOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="container row">
          <div class="col-lg-12 ">
            <h3 class="text-center" id="modalTitle">Pizza POS</h3>
            <h5>Address: Yangon</h5>
            <h5>Ph: 09975345664</h5>
          </div>
        </div>
        <div class="modal-body ">
          <table class="table">
            <thead>
              <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Price</th>
                  
              </tr>
            </thead>

            <tbody id="orderdetail">
            </tbody>

            <tfoot id="totaldetail">
            </tfoot>
            
          </table>  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal end -->