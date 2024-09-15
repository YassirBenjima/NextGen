<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>NextGen | @yield('title') </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Include All CSS -->
        <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('front-assets/css/themewar-icons.css') }}"/>
        <link rel="stylesheet" href="{{ asset('front-assets/css/flaticon.css') }}"/>
        <link rel="stylesheet" href="{{ asset('front-assets/css/animate.css') }}"/>
        <link rel="stylesheet" href="{{ asset('front-assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front-assets/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front-assets/css/settings.css') }}">
        <link rel="stylesheet" href="{{ asset('front-assets/css/lightcase.css') }}">
        <link rel="stylesheet" href="{{ asset('front-assets/css/preset.css') }}"/>
        <link rel="stylesheet" href="{{ asset('front-assets/css/ignore_in_wp.css') }}"/>
        <link rel="stylesheet" href="{{ asset('front-assets/css/theme.css') }}"/>
        <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}"/>
        <link rel="shortcut icon" href="{{ asset('admin-assets/media/logos/Logomark.svg')}}" />
    </head>
    <body>
        <!-- Preloader Start -->
        <div class="preloader" id="preloader">
            <div class="la-ball-scale-multiple la-2x">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- Preloader End -->

        <!-- Header Start -->
        <header class="header-01 fix-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{route('front.home')}}">
                                <img src="{{ asset('admin-assets/media/logos/Logomark.svg')}}" alt="NextGen"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <nav class="mainmenu mobile-menu">
                            <div class="mobile-btn">
                                <a href="javascript: void(0);"><span>Menu</span><i class="twi-bars"></i></a>
                            </div>
                            <ul>
                                <li class="active menu-item-has-children">
                                    <a href="{{route('front.home')}}">Home</a>
                                </li>
                                @if(getCategories()->isNotEmpty())
                                    @foreach (getCategories() as $category)
                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0);">{{ $category->name }}</a>
                                            @if($category->sub_category->isNotEmpty())
                                                <ul class="sub-menu">
                                                    @foreach ($category->sub_category as $subCategory)
                                                        <li><a href="{{ route('front.shop',[$category->slug, $subCategory->slug]) }}">{{ $subCategory->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach 
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="header-cogs">
                            <a class="search search-toggles" href="javascript:void(0);"><i class="twi-search"></i></a>
                            <a class="select-country" href="javascript:void(0);"><img src="{{ asset('front-assets/images/flag.png') }}" alt=""/>Eng</a>
                            <a class="select-currency" href="javascript:void(0);"> <i class="twi-money-bill"></i> MAD</a>
                            @if(Auth::check())
                            <a class="user-login" href="{{ route('account.profile') }}"><i class="twi-user-circle"></i><span>My Account</span></a>
                            @else
                            <a class="user-login" href="{{ route('account.login') }}"><i class="twi-user-circle"></i><span>Log In</span></a>
                            @endif
                            {{-- <a class="carts" href="{{route('front.cart')}}"><img src="{{ asset('front-assets/images/cart.png') }}" alt=""></a> --}}
                            <a class="carts" href="{{ route('front.cart') }}">
                                <span>{{ Cart::count() }}</span>
                                <img src="{{ asset('front-assets/images/cart.png') }}" alt="">
                            </a>                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->

        <!-- Popup Search -->
        <section class="popup-search-sec">
            <div class="popup-search-overlay"></div>
            <div class="overlay-popup">
                <a href="javascript:void(0);" class="search-closer">x</a><!-- Close Popup Btn -->
                <div class="middle-search">
                    <div class="popup-search-form"><!-- Search Form Start -->
                        <form method="get" action="{{route('front.shop')}}">
                            <input value="{{ Request::get('search')}}" type="search" name="search" id="search" placeholder="Search...">
                            <button type="submit"><i class="twi-search"></i></button>
                        </form><!-- Search Form End -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Popup Search -->

        @yield('content')


    
        <!-- Footer Start -->
        <footer class="footer-01">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <aside class="widget about-widget">
                            <div class="foo-logo">
                                <a href="{{route('front.home')}}"><img src="{{ asset('admin-assets/media/logos/Logomark.svg')}}" alt=""/></a>
                            </div>
                            <p>
                                1er Chaine de magazines gaming au Maroc
                            </p>
                            <div class="ab-social">
                                <a href="https://www.facebook.com/setupgame.ma"><i class="twi-facebook"></i></a>
                                <a href="https://x.com/SetupGamema"><i class="twi-twitter"></i></a>
                                <a href="https://www.instagram.com/setupgame.ma/"><i class="twi-instagram"></i></a>
                                <a href="https://www.youtube.com/@SetupGameMaroc"><i class="twi-youtube"></i></a>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-2 col-md-4 col-custome-1">
                        <aside class="widget">
                            <h3 class="widget-title">Useful Links</h3>
                            <ul>
                                <li><a href="{{ route('front.about') }}">Return Policy</a></li>
                                <li><a href="{{route('front.about')}}">Return Policy</a></li>
                                <li><a href="{{route('front.about')}}">Blog</a></li>
                                <li><a href="{{route('front.about')}}">Contact</a></li>
                                <li><a href="{{route('front.about')}}">Terms & Conditions</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-2 col-md-4 col-custome-2">
                        <aside class="widget">
                            <h3 class="widget-title">Account</h3>
                            <ul>
                                @if(Auth::check())
                                <li><a href="{{route('account.profile')}}">My Account</a></li>
                                <li><a href="{{route('account.order')}}">Purchases</a></li>
                                <li><a href="{{route('account.logout')}}">Logout</a></li>
                                @else
                                <li><a href="{{ route('account.login') }}">Login</a></li>
                                <li><a href="{{ route('account.register') }}">Register</a></li>
                                @endif
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-2 col-md-6 col-custome-3">
                        <aside class="widget contact-widget">
                            <h3 class="widget-title">Contact & Address</h3>
                            <p>
                                2ème étage, appartement 19, Immeuble Guelizium, Av. Mohammed V, Marrakech 40000
                            </p>
                            <p>
                                Phone: +212530245555
                            </p>
                        </aside>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Ened -->

        <!-- Coryight Start -->
        <section class="copyright-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <ul class="menu-link">
                           <li><a href="#">Privacy Policy</a></li> | 
                           <li><a href="#">Terms of Service</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="copys-text"><i class="twi-copyright"></i>Copyright YassirOussama 2024 | All Rights Reserved</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Coryight End -->

        <!-- Back To Top -->
        <a href="#" id="backtotop"><i class="twi-angle-double-up2"></i></a>

    <script src="{{ asset('front-assets/js/jquery.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('front-assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery.shuffle.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/lightcase.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/tweenmax.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/extensions/revolution.extension.video.min.js') }}"></script>    
    <script src="{{ asset('front-assets/js/theme.js') }}"></script>

    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('preloader').style.display = 'none';
        };
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initOWL();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#profileForm").submit(function(event){
        event.preventDefault();
        $.ajax({
            url: '{{route("account.updateProfile")}}',
            type : 'post',
            data : $(this).serializeArray(),
            dataType : 'json',
            success : function(response){
            if(response.status == true){
                window.location.href = '{{route("account.profile")}}';
            }else{
                alert(response.error);
            }
            }
        });
        });
        $("#adrressForm").submit(function(event){
        event.preventDefault();
        $.ajax({
            url: '{{route("account.updateAddress")}}',
            type : 'post',
            data : $(this).serializeArray(),
            dataType : 'json',
            success : function(response){
            if(response.status == true){
                window.location.href = '{{route("account.profile")}}';
            }else{
                alert(response.error);
            }
            }
        });
        });
        function addToCart(id) {
            $.ajax({
                url: ' {{route("front.addToCart")}}',
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = '{{ route("front.cart")}}';
                    } else {
                        alert(response.message);
                    }
                }
            });
        }
        setTimeout(function() {
            var successMessage = document.getElementById('successMessage');
            var dangerMessage = document.getElementById('dangerMessage');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
            if (dangerMessage) {
                dangerMessage.style.display = 'none';
            }
        }, 3000);
    </script>
    @yield('customJs')
</body>
</html>