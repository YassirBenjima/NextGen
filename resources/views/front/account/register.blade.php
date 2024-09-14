@extends('front.layouts.app')
@section('content')
@section('title', 'Register')

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
                        <h2 class="banner-title">Register</h2>
                        <div class="bread-crumb"><a href="{{route('front.home')}}">Home</a> / Register</div>
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
                        <h3 class="sec-title text-center">Create an Account</h3>
                        <p class="sec-desc text-center">
                            Please enter your details to register!
                        </p>
                        <div class="login-form">
                            <form name="registrationForm" id="registrationForm" action="{{route('account.register')}}" method="post">
                                @csrf
                                <div>
                                    <input type="text" name="name" id="name" placeholder="Your Full Name">
                                    <p class="text-danger mt-2"></p>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="email" id="email" name="email" placeholder="Email">
                                            <p class="text-danger mt-2"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="phone" name="phone" placeholder="Phone">
                                            <p class="text-danger mt-2"></p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="password" name="password" id="password" placeholder="Password">
                                            <p class="text-danger mt-2"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" name="confirm-password" id="confirm-password" placeholder="Repeat Password">
                                            <p class="text-danger mt-2"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <a href="{{route('account.login')}}">Already have an Account?</a>
                                </div>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                        </div>
                        <div class="social-log-regi mt-4 text-center">
                            <h5>OR Register WITH</h5>
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
<script type="text/javascript">
    $("#registrationForm").submit(function(event) {
        event.preventDefault(); // Empêche le rechargement de la page lors de la soumission du formulaire
        $.ajax({
            url: "{{route('account.processRegister')}}",
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {
                var errors = response.errors;
                if (Response.status == false) {
                    if (errors.name) {
                        $('#name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.name);
                    } else {
                        $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                    if (errors.email) {
                        $('#email').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.email);
                    } else {
                        $('#email').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                    if (errors.password) {
                        $('#password').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.password);
                    } else {
                        $('#password').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                } else {
                    $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#email').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#password').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    window.location.href = "{{route('account.login')}}"
                }
            },
            error: function(JQXHR, execption) {
                console.log("Something Went Wrong");
            }
        });
    });
</script>
@endsection