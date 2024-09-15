@section('title', 'Thank You')
@extends('front.layouts.app')
@section('content')
<style>
    .page-banner {
        margin-top: 150px;
    }
</style>
        <section class="container"> 
            @if(session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
            @endif
            <div class="col-md-12 text-center py-5">
                <h1>Thank You!</h1>
                <p> Your Order Id Is : {{ $id }}</p>
            </div>
        </section>
@endsection
@section('customJs')
@endsection