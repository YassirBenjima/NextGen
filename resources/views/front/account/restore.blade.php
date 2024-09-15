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
                          <li class="list-group-item clearfix"><a href="{{route('account.profile')}}"> My Account</a></li>
                          <li class="list-group-item clearfix"><a href="{{route('account.order')}}"> My Orders</a></li>
                          <li class="list-group-item clearfix"><a href="{{route('account.restore')}}" class="active">Restore Password</a></li>
                          <li class="list-group-item clearfix"><a href="{{route('account.logout')}}">Logout</a></li>
                        </ul>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9">
                @if(session('success'))
                <div class="alert alert-success" id="successMessage">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger" id="dangerMessage">
                    {{ session('error') }}
                </div>
                @endif
          
              <!-- Carte pour les Informations Personnelles -->
              <div class="login-form mb-5">
                  <div class="card-header">
                      <h3 class="card-title">Restore Password</h3>
                  </div>
                  <div class="card-body">
                      <form action="" method="post" name="changePasswordForm" id="changePasswordForm" class="form w-100">
                        @csrf  
                            <div class="form-group">
                              <label for="old_password">Old Password</label>
                              <input type="password" class="form-control" name="old_password" id="old_password">
                            </div>
                            <div class="form-group">                              
                              <label for="new_password">New Password<span class="require"></span></label>
                              <input type="password" class="form-control" name="new_password" id="new_password">
                            </div>                          
                            <div class="form-group">                              
                              <label for="confirm_password">Confirm Password <span class="require"></span></label>
                              <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                            </div>
                          </div>
                          <div class="padding-top-20">
                              <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          
          </div>
        </div>
    </div>
</section>
@endsection
