@section('title', $product->title)
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
                <h2 class="banner-title">Shop</h2>
                <div class="bread-crumb">
                    <a href="{{ route('front.home') }}">Home</a> / 
                    <a href="{{ route('front.shop') }}">{{ $product->title }}</a>
                </div>
            </div>
        </div>
    </div>
</section>    
<!-- Banner End -->

<!-- Shop Section Start -->
<section class="single-product-section">
    <div class="container">
        <div class="row">
            @php
                $productImage = $product->product_images->first();
            @endphp
            <div class="col-lg-7 col-md-12">
                <div id="product-slider" class="carousel slide product-slider" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="ps-img">
                                <img src="{{ asset('uploads/product/small/' . $productImage->image) }}" alt="{{ $product->title }}" />
                            </div>
                        </div>
                    </div>
                    <ol class="carousel-indicators">
                        @foreach ($product->product_images as $key => $productImage)
                            <li data-target="#product-slider" data-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}">
                                <img src="{{ asset('uploads/product/small/' . $productImage->image) }}" alt="{{ $product->title }}">
                            </li> 
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="sin-product-details">
                    <h3>{{ $product->title }}</h3>
                    <div class="woocommerce-product-rating">
                        <div class="star-rating">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="twi-star"></i>
                            @endfor
                        </div>
                        <a href="#" class="woocommerce-review-link">
                            <span class="count">03</span> customer reviews
                        </a>
                    </div>
                    <div class="product-price clearfix">
                        <span class="price">
                            <span>{{ $product->price }} <span class="woocommerce-Price-currencySymbol">MAD</span></span>
                        </span>
                    </div>
                    <div class="pro-excerp">
                        <p>{{ html_entity_decode(strip_tags($product->short_description)) }}</p>
                    </div>
                    <div class="product-cart-qty">
                        @if($product->track_qty == "Yes")
                            @if ($product->qty > 0)
                                <a href="javascript:void(0);" onclick="addToCart('{{ $product->id }}');" class="add-to-cart-btn">Add To Cart</a>
                            @else
                                <a href="javascript:void(0);" class="add-to-cart-btn">Out Of Stock</a>
                            @endif
                        @else   
                            <a href="javascript:void(0);" onclick="addToCart('{{ $product->id }}');" class="add-to-cart-btn">Add To Cart</a>
                        @endif
                    </div>
                    <div class="pro-socila">
                        <a href="#"><i class="twi-facebook"></i></a>
                        <a href="#"><i class="twi-twitter-square"></i></a>
                        <a href="#"><i class="twi-pinterest-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="product-tabarea">
                    <ul class="nav nav-tabs productTabs" id="productTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="descriptions-tab" data-toggle="tab" href="#descriptions" role="tab" aria-controls="descriptions" aria-selected="true">Description</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="productTabContent">
                        <div class="tab-pane fade show active" id="descriptions" role="tabpanel" aria-labelledby="descriptions-tab">
                            <div class="descriptionContent">
                                {{ html_entity_decode(strip_tags($product->description)) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="related-product-area">
                    <h3>Related Products</h3>
                    <div class="related-slider owl-carousel">
                        @foreach ($relatedProducts as $relProduct)
                            @php
                                $relProductImage = $relProduct->product_images->first();
                            @endphp
                            <div class="single-shop-product">
                                <div class="sp-thumb">
                                    <img src="{{ asset('uploads/product/small/' . $relProductImage->image) }}" alt="{{ $relProduct->title }}" />
                                    <div class="pro-badge">
                                        <p class="sale">Sale</p>
                                    </div>
                                </div>
                                <div class="sp-details">
                                    <h4>{{ $relProduct->title }}</h4>
                                    <div class="product-price clearfix">
                                        <span class="price">
                                            <del>
                                                <span>{{ $relProduct->price }}</span> <span class="woocommerce-Price-currencySymbol">MAD</span>
                                            </del>
                                            <ins>
                                                <span>{{ $relProduct->price }}</span> <span class="woocommerce-Price-currencySymbol">MAD</span>
                                            </ins>
                                        </span>
                                    </div>
                                    <div class="sp-details-hover">
                                        @if($product->track_qty == "Yes")
                                            @if ($product->qty > 0)
                                                <a class="sp-cart" href="javascript:void(0);" onclick="addToCart('{{ $product->id }}');">
                                                    <i class="twi-cart-plus"></i><span>Add to cart</span>
                                                </a>                                                           
                                            @else
                                                <a class="sp-cart" href="javascript:void(0);">
                                                    <i class="twi-cart-plus"></i><span>Out Of Stock</span>
                                                </a>  
                                            @endif
                                        @else   
                                            <a class="sp-cart" href="javascript:void(0);" onclick="addToCart('{{ $product->id }}');">
                                                <i class="twi-cart-plus"></i><span>Add to cart</span>
                                            </a>                                                        
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->
@endsection
