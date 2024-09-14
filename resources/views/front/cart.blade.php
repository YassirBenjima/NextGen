@extends('front.layouts.app')
@section('content')
@section('title', 'Cart')

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
                        <h2 class="banner-title">Cart</h2>
                        <div class="bread-crumb"><a href="{{route('front.home')}}">Home</a> / Cart</div>
                    </div>
                </div>
            </div>
        </section>    
        <!-- Banner End -->

        <!-- Cart Section Start -->
        <section class="cart-section"> 
            <div class="container">
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
                <div class="row">
                    <div class="col-md-12">
                        <form class="woocommerce-cart-form" action="#">
                            <table class="cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-name-thumbnail">Product Name</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                        <th class="product-remove">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($cartContent))
                                    @foreach( $cartContent as $item )
                                    
                                    <tr class="cart-item">
                                        <td class="product-thumbnail-title">
                                            <a href="#">
                                                <img src="{{ asset('uploads/product/small/' . $item->options->productImage->image )}}" alt="{{$item->name}}">
                                            </a>
                                            <a class="product-name" href="#">{{$item->name}}</a> 
                                        </td>
                                        <td class="product-unit-price">
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span>{{$item->price}}<span class="woocommerce-Price-currencySymbol">MAD</span></span>
                                                </span>           
                                            </div>
                                        </td>
                                        <td class="product-quantity clearfix">
                                            <div class="quantityd clearfix">
                                                <button class="qtyBtn btnMinus" data-id="{{$item->rowId}}"><span>-</span></button>
                                                <input class="input-text qty text carqty" type="text" value="{{$item->qty}}">
                                                <button class="qtyBtn btnPlus" data-id="{{$item->rowId}}">+</button>
                                            </div>
                                        </td>
                                        <td class="product-total">
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span>{{$item->price * $item->qty }}<span class="woocommerce-Price-currencySymbol">MAD</span></span>
                                                </span>           
                                            </div>
                                        </td>
                                        <td class="product-remove">
                                            <a onclick="removeFromCart('{{$item->rowId}}')"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                    <tr>
                                        <td colspan="6" class="actions">
                                            <a href="{{route('front.shop')}}" class="button continue-shopping">Continue Shopping</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="coupon">
                                        {{-- <h3>Counpon discount</h3> --}}
                                        <p>
                                            {{-- Enter your code if you have one. --}}
                                        </p>
                                        <input type="hidden" name="coupon_code" placeholder="Enter Your code Here"> 
                                        {{-- <button type="submit" class="button" name="apply_coupon">Apply coupon</button> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cart-totals">
                                        <h2>Cart Totals</h2>
                                        <table class="shop-table">
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Sub Total</th>
                                                    <td data-title="Subtotal">
                                                        <span class="woocommerce-Price-amount amount price">{{Cart::subtotal()}}<span class="woocommerce-Price-currencySymbol"> MAD</span></span>
                                                    </td>
                                                </tr>
                                                <tr class="cart-subtotal">
                                                    <th>Shipping</th>
                                                    <td data-title="shipping">
                                                        <span class="woocommerce-Price-amount amount">0<span class="woocommerce-Price-currencySymbol"> MAD</span></span>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Grand Total</th>
                                                    <td data-title="Subtotal">
                                                        <span class="woocommerce-Price-amount amount price">{{Cart::subtotal()}}<span class="woocommerce-Price-currencySymbol"> MAD</span></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="{{route('front.checkout')}}" class="checkout-button">Proceed to checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Cart Section End -->

@endsection
@section('customJs')
<script>
    $('.btnPlus').off('click').on('click', function() {
        var qtyElement = $(this).closest('.quantityd').find('.carqty');
        var qtyValue = parseInt(qtyElement.val(), 10);
        if (!isNaN(qtyValue) && qtyValue < 10) {
            qtyElement.val(qtyValue + 1);
            var rowId = $(this).data('id');
            var newQty = qtyElement.val();
            updateCart(rowId, newQty);
        }
    });


    $('.btnMinus').off('click').on('click', function() {
    var qtyElement = $(this).closest('.quantityd').find('.carqty');
    var qtyValue = parseInt(qtyElement.val(), 10);
        if (!isNaN(qtyValue) && qtyValue > 1) { // Décrémente la quantité seulement si > 1
            qtyElement.val(qtyValue - 1);
            var rowId = $(this).data('id');
            var newQty = qtyElement.val();
            updateCart(rowId, newQty);
        } else {
            console.log('Quantity cannot be less than 1');
        }
    });

    function updateCart(rowId, qty) {
        $.ajax({
            url: ' {{route("front.updateCart")}}',
            type: 'post',
            data: {
                rowId: rowId,
                qty: qty,
            },
            dataType: 'json',
            success: function(response) {
                window.location.href = '{{route("front.cart")}}'
            }
        });
    }

    function removeFromCart(rowId) {
        if (confirm("Are you sure you want to delete ?")) {
            $.ajax({
                url: ' {{route("front.removeFromCart.cart")}}',
                type: 'post',
                data: {
                    rowId: rowId
                },
                dataType: 'json',
                success: function(response) {
                    window.location.href = '{{route("front.cart")}}'
                }
            });
        }
    }
</script>
@endsection