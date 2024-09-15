@section('title', 'Order Detail')
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
                      <h2 class="banner-title">Order Detail</h2>
                      <div class="bread-crumb"><a href="{{route('front.home')}}">Home</a> / Order Detail</div>
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
                          <li class="list-group-item clearfix"><a href="javascript:;"> Wish list</a></li>
                          <li class="list-group-item clearfix"><a href="javascript:;">Restore Password</a></li>
                          <li class="list-group-item clearfix"><a href="{{route('account.logout')}}">Logout</a></li>
                        </ul>
                    </aside>
                </div>
            </div>
            <div class="col-md-9">
                <div class="cart-section">
                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">My Orders</h2>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-name-thumbnail">Orders #</th>
                                        <th class="product-price">Date Purchased</th>
                                        <th class="product-quantity">Status</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart-item">
                                        <td class="product-thumbnail-title">
                                            <a href="{{route('account.orderDetail',$order->id )}}">{{$order->id}}</a>
                                        </td>
                                        <td class="product-unit-price">
                                            {{  \Carbon\Carbon::parse($order->created_at)->format('d M, Y')  }}
                                        </td>
                                        <td class="product-quantity clearfix">
                                            @if ($order->status == 'pending')
                                              <span class="badge btn-danger bg-warning">Pending</span>
                                            @elseif ($order->status == 'shipped')
                                              <span class="badge btn-info bg-info">Shipped</span>
                                            @elseif ($order->status == 'cancelled')
                                              <span class="badge btn-info bg-danger">Cancelled</span>
                                            @else
                                              <span class="badge btn-success bg-success">Delivered</span>
                                            @endif
                                        </td>
                                        <td class="product-total">
                                            <span class="price">
                                                {{ number_format($order->grand_total, 2) }} <span class="woocommerce-Price-currencySymbol"> MAD</span>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-name-thumbnail">Product Name</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-quantity">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $orderItems as $item )
                                    
                                    <tr class="cart-item">
                                        <td class="product-thumbnail-title">
                                            @php
                                                $productImage = getProductImage($item->product_id)  ;
                                            @endphp
                                             <a href="#">
                                                <img src="{{ asset('uploads/product/small/' . $productImage->image )}}" alt="{{$item->name}}">
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
                                                <input class="input-text qty text carqty" type="text" value="{{$item->qty}}" disabled> 
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="cart-totals">
                        <h2>Order Totals</h2>
                        <table class="shop-table">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Sub Total</th>
                                    <td data-title="Subtotal">
                                        <span class="woocommerce-Price-amount amount price">{{number_format($order->subtotal,2)}}<span class="woocommerce-Price-currencySymbol"> MAD</span></span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Shipping</th>
                                    <td data-title="shipping">
                                        <span class="woocommerce-Price-amount amount">{{number_format($order->shipping,2)}}<span class="woocommerce-Price-currencySymbol"> MAD</span></span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Discount</th>
                                    <td data-title="shipping">
                                        <span class="woocommerce-Price-amount amount">- {{number_format($order->discount,2)}}<span class="woocommerce-Price-currencySymbol"> MAD</span></span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Subtotal">
                                        <span class="woocommerce-Price-amount amount price">{{number_format($order->grand_total,2)}}<span class="woocommerce-Price-currencySymbol"> MAD</span></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                    
            </div>
        </div>
    </div>
</section>
@endsection
