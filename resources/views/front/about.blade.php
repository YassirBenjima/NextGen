@extends('front.layouts.app')
@section('content')
@section('title', 'About Us')

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
                        <h2 class="banner-title">About</h2>
                        <div class="bread-crumb"><a href="index.html">Home</a> / About</div>
                    </div>
                </div>
            </div>
        </section>    
        <!-- Banner End -->

        <!-- History Section Start -->
        <section class="history-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h3 class="sec-title text-center">Révolutionner les Expériences Technologiques au Maroc</h3>
                        <p>
                            NextGen a été fondé en 2021, au plus fort de la pandémie mondiale, lorsque les matériaux de gaming étaient rares et que le marché avait désespérément besoin d'innovation. Avec pour mission de fournir des matériaux de gaming haute performance et de qualité, nous avons ouvert notre premier magasin à Temara. Depuis, nous nous sommes rapidement étendus à Casablanca, Marrakech et Tanger, devenant le leader du marché au Maroc. Notre croissance est alimentée par un engagement envers l'excellence, une passion pour la technologie et une dévotion envers nos clients.
                        </p>
                        <a href="{{ route('front.home')}}" class="goru-btn">start now</a>
                    </div>
                    <div class="col-lg-5">
                        <div class="history-thumb">
                            <img src="{{ asset('front-assets/images/about/1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row m-top-113">
                    <div class="col-lg-12">
                        <div class="video-banner" style="background-image: url('{{ asset('front-assets/images/about/video-bg.jpg') }}');">
                            <a class="popup-video" href="https://www.youtube.com/embed/5BzqRGXgSgA?si=4Owiwe1PjqKjH-7L" data-rel="lightcase"><i class="twi-play-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- History Section End -->

        <!-- Service Section Start -->
        <section class="service-section service-ab">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <img src="{{ asset('front-assets/images/home/truck.png') }}"alt="">
                            <h4>100% Free Shipping</h4>
                            <p>We ship all our products for free as long as you buying within the USA.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <img src="{{ asset('front-assets/images/home/headphone.png') }}" alt="">
                            <h4>24/7 Support</h4>
                            <p>Our support team is extremely active, you will get response within 2 minutes.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <img src="{{ asset('front-assets/images/home/undo.png') }}" alt="">
                            <h4>30 Day Return</h4>
                            <p>Our 30 day return program is open from customers, just fill up a simple form.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Service Section End -->
 
@endsection