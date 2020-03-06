@extends('frontendtemplate')

@section('content')

 <!-- main content -->
  <div class="container-fluid my-3">
    <div class="row text-center py-3">
      <div class="col-lg-12">
        <img src="{{asset('pos/img/pie bakey.png')}}">
        <h2 style="padding-top: 30">Available piza in Bakery with laravel  POS System</h2>
        
      </div>
    </div>
    <div class="row aos-init aos-animate" data-aos="fade-right" data-aos-delay="50" data-aos-duration="400">
      <div class="col-lg-3">
        <img src="{{asset('pos/img/piza 2.png')}}">
      </div>
      <div class="col-lg-3 my-3">
        <img src="{{asset('pos/img/piza 4.png')}}" style="width: 150px;height: 150px;" >
      </div>
      <div class="col-lg-3">
        <img src="{{asset('pos/img/piza.png')}}" style="width: 150px;height: 150px;">
      </div>
      <div class="col-lg-3">
        <img src="{{asset('pos/img/piza 3.png')}}">
      </div>
    </div>
  </div> 
  <div class="container-fluid text-center" style="background-color: #C2E0CC">
    <h3 class="py-4"> Guaranted to save your time, increase the accurancy of your inventory, and help you make informed decision for your business
    </h3>
    <div class="row py-3">
      <div class="col-lg-4 col-md-12 col-sm-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="50" data-aos-duration="400">
        <img src="{{asset('pos/img/clock-100.png')}}">
        <h3>Save Time</h3>
        <p>save2-3 hours of manual work a week that our automation  </p>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="50" data-aos-duration="400">
        <img src="{{asset('pos/img/accounting-100.png')}}">
        <h3>Make Informed Decision</h3>
        <p>Order the right products for your store using our reporting</p>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 aos-init aos-animate" data-aos="fade-up" data-aos-delap="50" data-aos-duration="400">
        <img src="{{asset('pos/img/increase-100.png')}}">
        <h3>Increase Sales</h3>
        <p>Our user friendly system speeds up checkout,increase sales for your business</p>
      </div>
    </div>
  </div>
  <!-- end content -->

@endsection