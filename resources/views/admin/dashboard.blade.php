@extends('admin.layouts.app')
@section('content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Dashboard</li>
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
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                        <!--begin::Col-->
                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                            <!--begin::Card widget 20-->
                            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5 mb-xl-10" style="background-color: #F1416C;background-image:url('assets/media/patterns/vector-1.png')">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{$totalOrders}}</span>
                                        <!--end::Amount-->
                                        <!--begin::Subtitle-->
                                        <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Total Orders</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                                        <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                            <span>{{$totalOrdersDelivered}} Delivered</span>
                                            @php
                                                if ($totalOrders > 0) {
                                                    $percentageDelivered = ($totalOrdersDelivered / $totalOrders) * 100;
                                                } else {
                                                    $percentageDelivered = 0; // Prévenir la division par zéro
                                                }
                                            @endphp
                                            <span>{{ number_format($percentageDelivered, 2) }}%</span>
                                        </div>
                                        <div class="h-8px mx-3 w-100 bg-white bg-opacity-50 rounded">
                                            <div class="bg-white rounded h-8px" role="progressbar" style="width: {{ $percentageDelivered }}%;" aria-valuenow="{{ number_format($percentageDelivered, 2) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>                                    
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 20-->

                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                            <!--begin::Card widget 17-->
                            <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">                       
                                            <!--begin::Amount-->
                                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{number_format($totalRevenue,2)}}</span>
                                            <!--end::Amount-->
                                            <!--begin::Currency-->
                                            <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">MAD</span>
                                            <!--end::Currency-->
                                            <!--begin::Badge-->
                                            <span class="badge badge-light-success fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->100%</span>
                                            <!--end::Badge-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Products Earnings in Mai</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                                    <!--begin::Chart-->
                                    <div class="d-flex flex-center me-5 pt-2">
                                        <div id="kt_card_widget_17_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70" data-kt-line="11"></div>
                                    </div>
                                    <!--end::Chart-->
                                    <!--begin::Labels-->
                                    <div class="d-flex flex-column content-justify-center flex-row-fluid">
                                        <!--begin::Label-->
                                        <div class="d-flex fw-semibold align-items-center">
                                            <!--begin::Bullet-->
                                            <div class="bullet w-8px h-3px rounded-2 bg-danger me-3"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="text-gray-500 flex-grow-1 me-4">Maroc</div>
                                            <!--end::Label-->
                                            <!--begin::Stats-->
                                            <div class="fw-bolder text-gray-700 text-xxl-end">{{$totalRevenueMaroc}} MAD</div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex fw-semibold align-items-center my-3">
                                            <!--begin::Bullet-->
                                            <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="text-gray-500 flex-grow-1 me-4">Algerie</div>
                                            <!--end::Label-->
                                            <!--begin::Stats-->
                                            <div class="fw-bolder text-gray-700 text-xxl-end">{{$totalRevenueAlgerie}} MAD</div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex fw-semibold align-items-center">
                                            <!--begin::Bullet-->
                                            <div class="bullet w-8px h-3px rounded-2 me-3" style="background-color: #E4E6EF"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="text-gray-500 flex-grow-1 me-4">Others</div>
                                            <!--end::Label-->
                                            <!--begin::Stats-->
                                            <div class="fw-bolder text-gray-700 text-xxl-end">{{$totalRevenueOthers}} MAD</div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Labels-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 17-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xxl-6">
                            <!--begin::Engage widget 10-->
                            <div class="card card-flush h-md-100">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url('assets/media/stock/900x600/42.png')">
                                    <!--begin::Wrapper-->
                                    <div class="mb-10">
                                        <!--begin::Title-->
                                        <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                                        <span class="me-2">Try our all new Enviroment
                                        <br>
                                        <span class="position-relative d-inline-block text-danger">
                                            <a href="#" class="text-danger opacity-75-hover">FOR FREE</a>
                                            <!--begin::Separator-->
                                            <span class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                            <!--end::Separator-->
                                        </span></span></div>
                                        <!--end::Title-->
                                        <!--begin::Action-->
                                        <div class="text-center">
                                            <a href="{{route('products.index')}}" class="btn btn-sm btn-dark fw-bold">Begin Now</a>
                                        </div>
                                        <!--begin::Action-->
                                    </div>
                                    <!--begin::Wrapper-->
                                    <!--begin::Illustration-->
                                    <img class="mx-auto h-150px h-lg-200px theme-light-show" src="{{ asset('admin-assets/media/illustrations/misc/upgrade.svg') }}" alt="">
                                    <img class="mx-auto h-150px h-lg-200px theme-dark-show" src="{{ asset('admin-assets/media/illustrations/misc/upgrade-dark.svg') }}" alt="">
                                    <!--end::Illustration-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Engage widget 10-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
@endsection