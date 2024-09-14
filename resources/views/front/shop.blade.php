@section('title', 'Shop')
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
                        <div class="bread-crumb"><a href="{{ route('front.home') }}">Home</a> / shop</div>
                        <div class="banner-img">
                            <img src="assets/images/shop/banner2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>    
        <!-- Banner End -->

        <!-- Shop Section Start -->
        <section class="shop-left-sidebar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="shop-sidebar">
                            <aside class="widget widget-categories">
                                <h3 class="widget-title">Categories</h3>
                                <ul>
                                    @if($categories->isNotEmpty())
                                    @foreach ($categories as $key => $category)
                                        <li><a href="{{ route('front.shop',$category->slug)}}">{{$category->name}}</a></i></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </aside>
                            <aside class="widget widget-categories">
                                <h3 class="widget-title">Brands</h3>
                                @if($brands->isNotEmpty())
                                <ul>
                                    @foreach ($brands as $brand)
                                    <li>
                                        <label for="brand-{{ $brand->id }}">
                                            <input {{ (is_array($brandsArray) && in_array($brand->id, $brandsArray)) ? 'checked' : ''  }} class="brand-label" type="checkbox" value="{{ $brand->id }}" id="brand-{{ $brand->id }}" name="brand[]">
                                            {{ $brand->name }}
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            
                            </aside>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="results">
                                    Showing {{ $products->count() }} / {{ $products->total() }} results
                                </div>
                            </div>                            
                            <div class="col-md-5">
                                <div class="sort-view">
                                    <a class="view-mode active" href="#"><i class="twi-th"></i></a>
                                    {{-- <a class="view-mode" href="#"><i class="twi-bars"></i></a> --}}
                                    <div class="sorts">
                                        <select name="sort" id="sort">
                                            <option value="" selected>Sort By</option>
                                            <option value="latest" <?php echo ($sort == 'latest') ? 'selected' : ''; ?>>Latest</option>
                                            <option value="price_desc" <?php echo ($sort == 'price_desc') ? 'selected' : ''; ?>>Price (Low &gt; High)</option>
                                            <option value="price_asc" <?php echo ($sort == 'price_asc') ? 'selected' : ''; ?>>Price (High &gt; Low)</option>
                                        </select>
                                        <i class="twi-angle-down1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if ($products->isNotEmpty())
                            @foreach($products as $key => $product)
                            @php
                            $productImage = $product->product_images->first();
                            @endphp
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-shop-product">
                                        <div class="sp-thumb">
                                            <a href="{{ route('front.product', $product->slug) }}">
                                                <img src="{{ asset('uploads/product/small/' . $productImage->image)}}" alt="" class="">
                                            </a>
                                            <div class="pro-badge">
                                                <p class="sale">Sale</p>
                                            </div>
                                        </div>
                                        <div class="sp-details">
                                            <h4>{{ $product->title }}</h4>
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <del><span>{{ $product->compare_price }} <span class="woocommerce-Price-currencySymbol">MAD</span></span></del>
                                                    <ins><span>{{ $product->price }} <span class="woocommerce-Price-currencySymbol">MAD</span></span></ins>
                                                </span>         
                                            </div>
                                            <div class="sp-details-hover">
                                                <a class="sp-cart" href="javascript:void(0);" onclick="addToCart('{{ $product->id }}');"><i class="twi-cart-plus"></i><span>Add to cart</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1 col-md-12 mt-20">
                                <div class="goru-pagination text-center clearfix">
                                    <a class="prev" href="#"><i class="twi-long-arrow-alt-left"></i></a>
                                    <span class="current">1</span>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">5</a>
                                    <a class="next" href="#"><i class="twi-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Section End -->
@endsection
@section('customJs')
<script>
    // Lorsqu'un changement est détecté dans les éléments ayant la classe ".brand-label", la fonction apply_filters() est appelée.
    $(".brand-label").change(function() {
        apply_filters();
    });
    // Lorsqu'un changement est détecté dans l'élément avec l'ID "#sort", la fonction apply_filters() est appelée.
    $("#sort").change(function() {
        apply_filters();
    });
    // Fonction qui applique les filtres
    function apply_filters() {
        var brands = [];
        // Parcours de tous les éléments avec la classe ".brand-label"
        $(".brand-label").each(function() {
            // Si une case à cocher est cochée, sa valeur est ajoutée au tableau "brands"
            if ($(this).is(":checked") == true) {
                brands.push($(this).val());
            }
        });
        var url = '{{ url()->current() }}?';
        // Filtrage par marque
        if (brands.length > 0) {
            url += '&brand=' + brands.toString();
        }
        // Filtrage par tri
        url += '&sort=' + $('#sort').val();
        // Redirection vers la nouvelle URL avec les filtres appliqués
        window.location.href = url;
};
</script>
@endsection