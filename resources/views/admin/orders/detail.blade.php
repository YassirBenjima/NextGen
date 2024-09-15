@extends('admin.layouts.app')
<title>NextGen | Orders List</title>
@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Order Details</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard')}}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Order Details</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Order details page-->
                <form action="" method="post" name="changeOrderStatusForm" id="changeOrderStatusForm">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
                            <!--begin::Button-->
                            <button type="submit" class="btn btn-success btn-sm ms-auto">Save Order</button>
                            <!--end::Button-->
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success" id="successMessage">
                            {{ session('success') }}
                        </div>
                        @endif

                        <!--begin::Order summary-->
                        <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                            <!--begin::Order details-->
                            <div class="card card-flush py-6 flex-row-fluid">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Order Details (#{{$order->id}})</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="currentColor" />
                                                                <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        Date Added</div>
                                                    </td>
                                                    <td class="fw-bold text-end">{{$order->created_at}}</td>
                                                </tr>
                                                <!--end::Date-->
                                                <!--begin::Payment method-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="currentColor" />
                                                                <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="currentColor" />
                                                                <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Payment Method</div>
                                                    </td>
                                                    <td class="fw-bold text-end">{{$order->payement_status}}
                                                    <img src="{{ asset('admin-assets/media/svg/card-logos/visa-dark.svg') }}" class="w-50px ms-2" /></td>
                                                </tr>
                                                <!--end::Payment method-->
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm006.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M20 8H16C15.4 8 15 8.4 15 9V16H10V17C10 17.6 10.4 18 11 18H16C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18H21C21.6 18 22 17.6 22 17V13L20 8Z" fill="currentColor" />
                                                                <path opacity="0.3" d="M20 18C20 19.1 19.1 20 18 20C16.9 20 16 19.1 16 18C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18ZM15 4C15 3.4 14.6 3 14 3H3C2.4 3 2 3.4 2 4V13C2 13.6 2.4 14 3 14H15V4ZM6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Shipping Status</div>
                                                    </td>
                                                    <td class="fw-bold text-end">
                                                        @if($order->status == "pending")
                                                            <div class="badge badge-light-warning">Pending</div>
                                                        @elseif ($order->status == "shipped")
                                                            <div class="badge badge-light-info">Shipped</div>
                                                        @elseif ($order->status == "cancelled")
                                                            <div class="badge badge-light-danger">Cancelled</div>
                                                        @else   
                                                            <div class="badge badge-light-success">Delivered</div>
                                                        @endif
                                                    </td>

                                                </tr>
                                                <!--end::Date-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Order details-->
                            <!--begin::Customer details-->
                            <div class="card card-flush py-6 flex-row-fluid">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Customer Details</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                                <!--begin::Customer name-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor" />
                                                                <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor" />
                                                                <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Customer</div>
                                                    </td>
                                                    <td class="fw-bold text-end">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <!--begin::Name-->
                                                            {{$order->first_name}} {{$order->last_name}}
                                                            <!--end::Name-->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--end::Customer name-->
                                                <!--begin::Customer email-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor" />
                                                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Email</div>
                                                    </td>
                                                    <td class="fw-bold text-end">
                                                    {{$order->email}}
                                                    </td>
                                                </tr>
                                                <!--end::Payment method-->
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z" fill="currentColor" />
                                                                <path opacity="0.3" d="M19 4H5V20H19V4Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Phone</div>
                                                    </td>
                                                    <td class="fw-bold text-end">{{$order->mobile}}</td>
                                                </tr>
                                                <!--end::Date-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Customer details-->
                        </div>
                        <!--end::Order summary-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" role="tab-panel">
                                <!--begin::Orders-->
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                                        <!--begin::Payment address-->
                                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                            <!--begin::Background-->
                                            <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                                <img src="{{ asset('admin-assets/media/icons/duotune/ecommerce/ecm001.svg') }}" class="w-175px" />
                                            </div>
                                            <!--end::Background-->
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Payment Address</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">{{$order->address}},
                                                <br />{{$order->apartment}},
                                                <br />{{$order->countryName}},
                                                <br />{{$order->city}} {{$order->zip}},
                                                <br />{{$order->state}}.
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Payment address-->
                                        <!--begin::Customer details-->
                                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Shippment Status</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <div class="table-responsive">
                                                    <!--begin::Table-->
                                                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-4 min-w-100px">
                                                        <!--begin::Table body-->
                                                        <tbody class="fw-semibold text-gray-600">
                                                            <!--begin::Customer name-->
                                                            <tr>
                                                                <td class="text-muted">
                                                                    <div class="d-flex align-items-center">
                                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                                    <span class="svg-icon svg-icon-2 me-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                            <path d="M21 16V8L12 2 3 8v8l9 6 9-6Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            <path d="M3.27 8L12 13l8.73-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            <path d="M12 22V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        </svg>                                                                      
                                                                    </span>
                                                                    <!--end::Svg Icon-->Order Id</div>
                                                                </td>
                                                                <td class="fw-bold text-end">
                                                                    <div class="d-flex align-items-center justify-content-end">
                                                                        <!--begin::Name-->
                                                                        {{$order->id}}
                                                                        <!--end::Name-->
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!--end::Customer name-->
                                                            <!--begin::Customer email-->
                                                            <tr>
                                                                <td class="text-muted">
                                                                    <div class="d-flex align-items-center">
                                                                    <span class="svg-icon svg-icon-2 me-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                            <rect x="2" y="6" width="20" height="12" rx="2" stroke="currentColor" stroke-width="2" />
                                                                            <path d="M2 10h20" stroke="currentColor" stroke-width="2"/>
                                                                            <path d="M14 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" fill="currentColor"/>
                                                                        </svg>
                                                                        
                                                                    </span>
                                                                    <!--end::Svg Icon-->Total</div>
                                                                </td>
                                                                <td class="fw-bold text-end">
                                                                {{number_format($order->grand_total,0)}} MAD
                                                                </td>
                                                            </tr>
                                                            <!--end::Payment method-->
                                                            <!--begin::Date-->
                                                                <tr>
                                                                    <td class="text-muted">
                                                                        <div class="d-flex align-items-center">
                                                                        <span class="svg-icon svg-icon-2 me-2">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                                <path d="M21 7L9 19l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            </svg>
                                                                            
                                                                        </span>
                                                                        <!--end::Svg Icon-->Status</div>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <select class="form-select form-control-solid" name="status" placeholder="">
                                                                            <option {{ ($order->status == 'pending') ? 'selected' : ''}} value="pending">Pending</option>
                                                                            <option {{ ($order->status == 'shipped') ? 'selected' : ''}} value="shipped">Shipped</option>
                                                                            <option {{ ($order->status == 'delivered') ? 'selected' : ''}} value="delivered">Delivered</option>
                                                                            <option {{ ($order->status == 'cancelled') ? 'selected' : ''}} value="cancelled">Cancelled</option>
                                                                        </select>                                                                        
                                                                    </td>
                                                                </tr>
                                                                <!--end::Date-->
                                                                <tr>
                                                                    <td class="text-muted">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="svg-icon svg-icon-2 me-2">
                                                                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="currentColor" />
                                                                                    <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="currentColor" />
                                                                                </svg>
                                                                            </span>
                                                                        <!--end::Svg Icon-->Shipped Date</div>
                                                                    </td>
                                                                    <td class="text-end">
                                                                    <input type="text" value="{{$order->shipped_date}}" name="shipped_date" id="shipped_date" class="form-control"> 
                                                                    </td>
                                                                </tr>
                                                        </tbody>
                                                        <!--end::Table body-->
                                                    </table>
                                                    <!--end::Table-->
                                                </div>
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Customer details-->                                    
                                    </div>
                                    <!--begin::Product List-->
                                    <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Order #{{$order->id}}</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                            <th class="min-w-175px">Product</th>
                                                            {{-- <th class="min-w-100px text-end">SKU</th> --}}
                                                            <th class="min-w-70px text-end">Qty</th>
                                                            <th class="min-w-100px text-end">Unit Price</th>
                                                            <th class="min-w-100px text-end">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="fw-semibold text-gray-600">
                                                        <!--begin::Products-->
                                                        @foreach($orderItems as $item)
                                                        @php
                                                            $productImage = getProductImage($item->product_id)  ;
                                                        @endphp
                                                        <tr>
                                                            <!--begin::Product-->
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <!--begin::Thumbnail-->
                                                                    <a href="javascript:void(0)" class="symbol symbol-50px">
                                                                        <span class="symbol-label" style="background-image:url({{ asset('uploads/product/small/' . $productImage->image )}});"></span>
                                                                    </a>
                                                                    <!--end::Thumbnail-->
                                                                    <!--begin::Title-->
                                                                    <div class="ms-5">
                                                                        <a href="javascript:void(0)" class="fw-bold text-gray-600 text-hover-primary">{{$item->name}}</a>
                                                                        <div class="fs-7 text-muted">Delivery Date: {{$item->created_at}}</div>
                                                                    </div>
                                                                    <!--end::Title-->
                                                                </div>
                                                            </td>
                                                            <!--end::Product-->
                                                            <!--begin::SKU-->
                                                            {{-- <td class="text-end">02773009</td> --}}
                                                            <!--end::SKU-->
                                                            <!--begin::Quantity-->
                                                            <td class="fs-4 text-end">{{$item->qty}}</td>
                                                            <!--end::Quantity-->
                                                            <!--begin::Price-->
                                                            <td class="fs-4 text-end">{{number_format($item->price,0)}} MAD</td>
                                                            <!--end::Price-->
                                                            <!--begin::Total-->
                                                            <td class="fs-4 text-end">{{number_format($item->total,0)}} MAD</td>
                                                            <!--end::Total-->
                                                        </tr>
                                                        @endforeach
                                                        <!--end::Products-->
                                                        <!--begin::Subtotal-->
                                                        <tr>
                                                            <td colspan="3" class="fs-3 text-dark text-end">Subtotal</td>
                                                            <td class="fs-3 text-end">{{number_format($order->subtotal,0)}} MAD</td>
                                                        </tr>
                                                        <!--end::Subtotal-->
                                                        <!--begin::VAT-->
                                                        <tr>
                                                            <td colspan="3" class="fs-3 text-dark text-end">Discount</td>
                                                            <td class="fs-3 text-end">- {{number_format($order->discount,0)}} MAD</td>
                                                        </tr>
                                                        <!--end::VAT-->
                                                        <!--begin::Shipping-->
                                                        <tr>
                                                            <td colspan="3" class="fs-3 text-dark text-end">Shipping Rate</td>
                                                            <td class="fs-3 text-end">{{number_format($order->shipping,0)}} MAD</td>
                                                        </tr>
                                                        <!--end::Shipping-->
                                                        <!--begin::Grand total-->
                                                        <tr>
                                                            <td colspan="3" class="fs-3 text-dark text-end">Grand Total</td>
                                                            <td class="text-dark fs-3 fw-bolder text-end">{{number_format($order->grand_total,0)}} MAD</td>
                                                        </tr>
                                                        <!--end::Grand total-->
                                                    </tbody>
                                                    <!--end::Table head-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Product List-->
                                </div>
                                <!--end::Orders-->
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                    </div>
                </form>
                <!--end::Order details page-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer">
        <!--begin::Footer container-->
        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2023&copy;</span>
                <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item">
                    <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                </li>
                <li class="menu-item">
                    <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                </li>
                <li class="menu-item">
                    <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                </li>
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Footer container-->
    </div>
    <!--end::Footer-->
</div>
<!--end:::Main-->
    @endsection
    @section('customJs')
    <script>
        setTimeout(function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);

        $(document).ready(function(){
            $('#shipped_date').datetimepicker({
                // options here
                format:'Y-m-d H:i:s',
            });
        });

        $("#changeOrderStatusForm").submit(function(event) {
            event.preventDefault();
            
            var formData = $(this).serializeArray(); // Récupère toutes les données du formulaire
            console.log(formData); // Inspecte les données dans la console

            $.ajax({
                url: '{{route("orders.changeOrderStatus", $order->id)}}',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    window.location.href = '{{route("orders.detail", $order->id)}}';
                },
                error: function(xhr, status, error) {
                    console.error('Une erreur est survenue : ', error);
                }
            });
        });

    </script>
    @endsection