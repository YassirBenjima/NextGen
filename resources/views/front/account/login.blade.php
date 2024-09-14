@extends('front.layouts.app')
@section('content')
@section('title', 'Login')

<style>
    .page-banner {
    margin-top: 150px;
}
</style>
        <!-- Banner Start -->
        <section class="page-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="round-shape"></span>
                        <h2 class="banner-title">Login</h2>
                        <div class="bread-crumb"><a href="{{route('front.home')}}">Home</a> / Login</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner End -->
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
        <!-- Login Register Section Start -->
        <section class="login-section d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <h3 class="sec-title text-center">Content to see you again</h3>
                        <p class="sec-desc text-center">
                            Please enter your details to log in
                        </p>
                        <div class="login-form">
                            <form class="form w-100" name="loginForm" id="loginForm" action="{{route('account.authenticate')}}" method="post">    
                                @csrf
                                <div class="mb-3">
                                    <input type="text" placeholder="Email" name="email" id="email" value="{{old('email')}}">
                                    <p class="text-danger mt-2"></p>
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Password" name="password" type="password" id="password">
                                    <p class="text-danger mt-2"></p>

                                </div>
                                <div class="mb-3">
                                    <a href="{{route('account.register')}}">Not a Member yet?</a>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="social-log-regi text-center mt-4">
                            <h5>OR LOGIN WITH</h5>
                            <a href="#"><i class="twi-facebook-f"></i></a>
                            <a href="#"><i class="twi-twitter"></i></a>
                            <a href="#"><i class="twi-google-plus-g"></i></a>
                            <a href="#"><i class="twi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Login Register Section End -->

@endsection
@section('customJs')
<script src="{{asset('admin-assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('admin-assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('admin-assets/js/custom/authentication/sign-up/general.js')}}"></script>
<script type="text/javascript">
</script>
@endsection