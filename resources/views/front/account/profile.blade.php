@section('title', 'My Account')
@extends('front.layouts.app')
@section('content')
<style>
  .page-banner {
  margin-top: 150px;
}
</style>
      <!-- Banner Start -->
      <section class="page-banner">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <span class="round-shape"></span>
                      <h2 class="banner-title">My Account</h2>
                      <div class="bread-crumb"><a href="{{route('front.home')}}">Home</a> / My Account</div>
                  </div>
              </div>
          </div>
      </section>    
      <!-- Banner End -->

  <section class="shop-left-sidebar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-sidebar">
                    <aside class="widget widget-categories">
                        <ul>
                          <li class="list-group-item clearfix"><a href="{{route('account.profile')}}" class="active"> My Account</a></li>
                          <li class="list-group-item clearfix"><a href="{{route('account.order')}}"> My Orders</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;"> Wish list</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;">Restore Password</a></li>
                          <li class="list-group-item clearfix"><a href="{{route('account.logout')}}">Logout</a></li>
                        </ul>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9">
              <div class="login-form">
                  <aside class="widget widget-categories">
                    <h3 class="widget-title">Personel Informations</h3>
                    <form action="#" class="form w-100" role="form">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email <span class="require">*</span></label>
                        <input type="text" class="form-control" name="email" id="email">
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone <span class="require">*</span></label>
                        <input type="text" class="form-control" name="phone" id="phone">
                      </div>
                      <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" rows="8" name="address" id="address">
                      </div>
                      <div class="padding-top-20">                  
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </form>
                  </aside>
              </div>
          </div>
        </div>
    </div>
</section>
@endsection
