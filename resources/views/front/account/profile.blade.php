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
                          <li class="list-group-item clearfix"><a href="{{route('account.restore')}}">Restore Password</a></li>
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
                      <h3 class="card-title">Personal Information</h3>
                  </div>
                  <div class="card-body">
                      <form action="" name="profileForm" id="profileForm" class="form w-100">
                          <div class="form-group">
                              <label for="name">Name</label>
                              <input value="{{$user->name}}" type="text" class="form-control" name="name" id="name">
                          </div>
                          <div class="form-group row">                              
                            <div class="col-md-6">
                              <label for="email">Email <span class="require">*</span></label>
                              <input value="{{$user->email}}" type="text" class="form-control" name="email" id="email">
                            </div>
                            <div class="col-md-6">
                              <label for="phone">Phone <span class="require">*</span></label>
                              <input value="{{$user->phone}}" type="text" class="form-control" name="phone" id="phone">
                            </div>
                          </div>
                          <div class="padding-top-20">
                              <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                      </form>
                  </div>
              </div>
          
              <!-- Carte pour l'Adresse de Facturation -->
              <div class="login-form">
                  <div class="card-header">
                      <h3 class="card-title">Billing Address</h3>
                  </div>
                  <div class="card-body">
                      <form action="" name="adrressForm" id="adrressForm" class="form w-100">
                          <div class="form-group row">
                              <div class="col-md-6">
                                  <label for="first_name">First Name</label>
                                  <input value="{{ (!empty($address)) ? $address->first_name : ''}}" type="text" class="form-control" name="first_name" id="first_name">
                              </div>
                              <div class="col-md-6">
                                  <label for="last_name">Last Name</label>
                                  <input value="{{ (!empty($address)) ? $address->last_name : ''}}" type="text" class="form-control" name="last_name" id="last_name">
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-md-6">
                                  <label for="email">Email <span class="require">*</span></label>
                                  <input value="{{ (!empty($address)) ? $address->email : ''}}" type="text" class="form-control" name="email" id="email">
                              </div>
                              <div class="col-md-6">
                                  <label for="phone">Mobile <span class="require">*</span></label>
                                  <input value="{{ (!empty($address)) ? $address->mobile : ''}}" type="text" class="form-control" name="mobile" id="mobile">
                              </div>
                          </div>
                          <div class="billing-countries">
                              <label>Country</label>
                              <select class="country_to_state country_select " id="country_id" name="country_id">
                                  <option value="">State / Country *</option>
                                  @if ($countries->isNotEmpty())
                                      @foreach ($countries as $country)
                                          <option {{ (!empty($address) && $address->country_id==$country->id ) ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                                      @endforeach
                                  @endif
                              </select>
                              <p class="text-danger mt-2"></p>
                          </div>
                          <div class="form-group">
                              <label for="address">Address <span class="require">*</span></label>
                              <input value="{{ (!empty($address)) ? $address->address : ''}}" type="text" class="form-control" name="address" id="address">
                          </div>
                          <div class="form-group row">
                              <div class="col-md-6">
                                  <label for="apartment">Apartment</label>
                                  <input value="{{ (!empty($address)) ? $address->apartment : ''}}" type="text" class="form-control" name="apartment" id="apartment">
                              </div>
                              <div class="col-md-6">
                                  <label for="city">City / Town</label>
                                  <input value="{{ (!empty($address)) ? $address->city : ''}}" type="text" class="form-control" name="city" id="city">
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-md-6">
                                  <label for="state">Country / State</label>
                                  <input value="{{ (!empty($address)) ? $address->state : ''}}" type="text" class="form-control" name="state" id="state">
                              </div>
                              <div class="col-md-6">
                                  <label for="zip">Zip</label>
                                  <input value="{{ (!empty($address)) ? $address->zip : ''}}" type="text" class="form-control" name="zip" id="zip">
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