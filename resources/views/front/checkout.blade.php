@section('title', 'Checkout')

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
                        <h2 class="banner-title">Checkout</h2>
                        <div class="bread-crumb"><a href="{{route('front.home')}}">Home</a> / Checkout</div>
                    </div>
                </div>
            </div>
        </section>    
        <!-- Banner End -->

        <!-- Checkout Section Start -->
        <section class="checkout-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <form action="" id="orderForm" name="orderForm" method="post">
                            @csrf

                            <div class="woocommerce-billing-fields">
                                <h3>Billing Info</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="billing-countries">
                                            <label>Country</label>
                                            <select class="country_to_state country_select " id="country" name="country">
                                                <option value="">State / Country *</option>
                                                @if ($countries->isNotEmpty())
                                                @foreach ($countries as $country)
                                                <option {{ (!empty($customerAddress) && $customerAddress->country_id==$country->id ) ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                                @endif                                        
                                            </select>
                                            <p class="text-danger mt-2"></p>

                                        </div>
                                    </div>
                                    <p class="col-lg-6">
                                        <label>First Name</label>
                                        <input placeholder="" name="first_name" type="text" value="{{ (!empty($customerAddress)) ? $customerAddress->first_name : ''}}">  
                                        <p class="text-danger mt-2"></p>
                                    </p>
                                    <p class="col-lg-6">
                                        <label>Last Name</label>
                                        <input placeholder="" name="last_name" type="text" value="{{ (!empty($customerAddress)) ? $customerAddress->last_name : ''}}">
                                        <p class="text-danger mt-2"></p>

                                    </p>
                                    <p class="col-lg-12">
                                        <label>Address</label>
                                        <input placeholder="" name="address" value="{{ (!empty($customerAddress)) ? $customerAddress->address : ''}}" type="text">
                                        <p class="text-danger mt-2"></p>

                                    </p>
                                    <p class="col-lg-12">
                                        <label>Apartement</label>
                                        <input placeholder="" name="apartment" value="{{ (!empty($customerAddress)) ? $customerAddress->apartment : ''}}" type="text">
                                        <p class="text-danger mt-2"></p>

                                    </p>
                                    <div class="col-lg-12">
                                            <label>City / Town</label>
                                            <input placeholder="" name="city" value="{{ (!empty($customerAddress)) ? $customerAddress->city : ''}}" type="text">
                                            <p class="text-danger mt-2"></p>

                                    </div>
                                    <div class="col-lg-6">
                                            <label>Country / States</label>
                                            <input placeholder="" name="state" value="{{ (!empty($customerAddress)) ? $customerAddress->state : ''}}" type="text">
                                            <p class="text-danger mt-2"></p>

                                    </div>
                                    <p class="col-lg-6">
                                        <label>Postcode / Zip</label>
                                        <input placeholder="" name="zip" value="{{ (!empty($customerAddress)) ? $customerAddress->zip : ''}}" type="text">
                                        <p class="text-danger mt-2"></p>
                                    </p>
                                    <p class="col-lg-6">
                                        <label>Email</label>
                                        <input placeholder="" name="email" type="email" value="{{ (!empty($customerAddress)) ? $customerAddress->email : ''}}">
                                        <p class="text-danger mt-2"></p>

                                    </p>
                                    <p class="col-lg-6">
                                        <label>Telephone</label>
                                        <input placeholder="" name="mobile" value="{{ (!empty($customerAddress)) ? $customerAddress->mobile : ''}}" type="tel">
                                        <p class="text-danger mt-2"></p>
                                    </p>
                                    <p class="col-lg-12">
                                        <label>Order Note</label>
                                        <textarea name="notes" placeholder="">{{ (!empty($customerAddress)) ? $customerAddress->notes : ''}}</textarea>
                                        <p class="text-danger mt-2"></p>
                                    </p>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-8">
                        <div class="woocommerce-checkout-review-order" id="order_review">
                            <h3>Your Order</h3>
                            <table class="check-table woocommerce-checkout-review-order-table">
                                <thead>
                                    <tr>
                                        <th class="product-name">Products</th>
                                        <th class="product-total"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $item)
                                    <tr class="cart-item">
                                        <td class="product-name">{{ $item->name}}</td>
                                        <td class="product-total">
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span>{{ $item->price * $item->qty }} <span class="woocommerce-Price-currencySymbol"> MAD</span></span>
                                                </span>           
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td>
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span>{{Cart::subtotal(0, '.', '')}} <span class="woocommerce-Price-currencySymbol"> MAD</span></span>
                                                </span>           
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>Discount</th>
                                        <td>
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span id="discountAmount">- {{ $discount }} <span class="woocommerce-Price-currencySymbol"> MAD</span></span>
                                                </span>           
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>Shipping</th>
                                        <td>
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span id="shippingAmount">{{ number_format($totalShippingCharge,2)}} <span class="woocommerce-Price-currencySymbol"> MAD</span></span>
                                                </span>           
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span id="grandTotal">{{ number_format($grandTotal,2) }} <span class="woocommerce-Price-currencySymbol" style="white-space: nowrap;">MAD</span></span>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>                                    
                                </tfoot>
                            </table>
                            <div class="woocommerce-checkout-payment" id="payment">
                                <ul class="wc_payment_methods payment_methods methods">
                                    <li class="wc_payment_method payment_method_bacs">
                                        <input checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs" type="radio">
                                        <label for="payment_method_bacs">Direct bank transfer</label>
                                        <div class="payment_box payment_method_bacs visibales">
                                            <p>
                                                Aenean id ullamcorper libero. Vestibulum impnibh. Lorem  ullamcorper volutpat. Vestibulum lacinia risus. Etiam sagittis ullamcorper volutpat.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_cod">
                                        <input value="cod" name="payment_method" class="input-radio" id="payment_method_cod" type="radio">
                                        <label for="payment_method_cod">Cash On Delivery</label>
                                        <div class="payment_box payment_method_cod">
                                            <p>
                                                Exam id ullamcorper libero. Vestibulum impnibh. Lorem  ullamcorper volutpat. Vestibulum lacinia risus. Etiam sagittis ullamcorper volutpat.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_paypal">
                                        <input value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal" type="radio">
                                        <label for="payment_method_paypal">PayPal <i class="twi-cc-mastercard"></i><i class="twi-cc-visa"></i><i class="twi-cc-paypal"></i><i class="twi-cc-discover"></i></label>
                                        <div class="payment_box payment_method_paypal">
                                            <p>
                                                Vestibulum impnibh. Lorem  ullamcorper volutpat. Vestibulum lacinia risus. Etiam sagittis ullamcorper volutpat.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="place-order mb-5">
                                <button type="submit" class="button">Place Order</button>
                            </div>

                            <div class="coupon">
                                <h3>Coupon Discount</h3>
                                
                                <p>
                                    Enter your code if you have one.
                                </p>
                                <input type="text" name="coupon_code" id="coupon_code" placeholder="Enter Your code Here"> 
                                <button type="button" class="button" id="apply_coupon" name="apply_coupon">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Checkout Section End -->
@endsection


@section('customJs')
<script>
    $(document).ready(function() {
        $('#card-payment-form').hide(); // Initialement, masquer le formulaire de paiement par carte
        // Basculer la visibilité du formulaire de paiement par carte en fonction de la sélection du bouton radio
        $("input[name='payment_method']").change(function() {
            if ($('#payment_method_two').is(":checked")) {
                $('#card-payment-form').show(); // Afficher le formulaire de paiement par carte si "Carte" est sélectionné
            } else {
                $('#card-payment-form').hide(); // Masquer le formulaire de paiement par carte si "Paiement à la livraison" est sélectionné
            }
        });
    });
    $("#orderForm").submit(function(event) {
        event.preventDefault(); 
        $.ajax({
            url: "{{route('front.processCheckout')}}",
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {
                var errors = response.errors;

                if (response.status == false) {
                    if (errors.first_name) {
                        $('#first_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.first_name);
                    } else {
                        $('#first_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                    if (errors.last_name) {
                        $('#last_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.last_name);
                    } else {
                        $('#last_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                    if (errors.email) {
                        $('#email').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.email);
                    } else {
                        $('#email').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                    if (errors.country) {
                        $('#country').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.country);
                    } else {
                        $('#country').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                    if (errors.address) {
                        $('#address').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.address);
                    } else {
                        $('#address').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                    if (errors.city) {
                        $('#city').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.city);
                    } else {
                        $('#city').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                    if (errors.state) {
                        $('#state').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.state);
                    } else {
                        $('#state').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                    if (errors.zip) {
                        $('#zip').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.zip);
                    } else {
                        $('#zip').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                    if (errors.mobile) {
                        $('#mobile').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.mobile);
                    } else {
                        $('#mobile').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }
                } else {
                    // Réinitialisation des messages d'erreur si la validation réussit
                    $('#firstname').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#lastname').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#email').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#country').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#address').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#city').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#state').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#zip').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    $('#mobile').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    // Redirection vers la page de confirmation de commande avec l'identifiant de la commande
                    window.location.href = "{{ route('front.thanks', ['orderId' => ':orderId']) }}".replace(':orderId', response.orderId);
                }
            },
            error: function(JQXHR, execption) {
                console.log("Something Went Wrong");
            }
        });
    });
    // Exécute une requête AJAX lorsque le pays est modifié
    $('#country').change(function(){
        $.ajax({
            url : "{{route('front.getOrderSummary')}}",
            type: 'POST',
            data: {country_id: $("#country").val()},
            dataType : 'json',
            success: function(response){
                console.log(response);  // Vérifiez ce qui est renvoyé
                if (response.status == true) {
                    $("#shippingAmount").html(response.shippingCharge + ' MAD');
                    $("#grandTotal").html(response.grandTotal + ' MAD');
                    $("#discountAmount").html( '- ' + response.discount + ' MAD');
                }
            }
        });
    });

    $("#apply_coupon").click(function(){
    $.ajax({
        url: '{{ route("front.applyDiscount") }}',
        type: 'post',
        data: {code: $("#coupon_code").val(), country_id: $("#country").val()},
        dataType: 'json',
        success: function(response) {
            console.log(response);  // Vérifiez ce qui est renvoyé
            if (response.status == true) {
                $("#shippingAmount").html(response.shippingCharge + ' MAD');
                $("#grandTotal").html(response.grandTotal + ' MAD');
                $("#discountAmount").html( '- ' + response.discount + ' MAD');
            }else {
                alert(response.message);
            }
        }
    });
});


</script>
@endsection