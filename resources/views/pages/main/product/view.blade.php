@extends('layout.main.template')
@section('title')
    {{$product->name}}
@endsection
@section('content')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('main::product::index')}}">Product</a></li>
                            <li class="breadcrumb-item">@yield('title')</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Sart Single product -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-pro-rightside ec-common-rightside col-lg-12 col-md-12">

                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">
                                @include('shared.errors')
                                <div class="single-pro-img single-pro-img-no-sidebar">
                                    <div class="single-product-scroll">
                                        <div class="single-product-cover">
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="{{$product->image_url}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc single-pro-desc-no-sidebar">
                                    <div class="single-pro-content">
                                        <h5 class="ec-single-title">{{$product->name}}</h5>
                                        <div class="ec-single-desc">{{$product->description}}</div>
                                        <dt>Penyelenggara</dt>
                                        <dd>{{$product->initiator->name}}</dd>

                                        <div class="ec-single-price-stoke">
                                            <div class="ec-single-price">
                                                <span class="new-price">
                                                    @if($product->fee > 0)
                                                        Rp. {{number_format($product->fee,2,',','.')}}
                                                    @else
                                                        Free
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="ec-single-stoke">
                                                <span class="ec-single-ps-title">Kapasitas</span>
                                                <span class="ec-single-sku">{{$product->capacity}}</span>
                                            </div>
                                        </div>
                                        @if(auth('user')->user())
                                            @if($check == null)
                                                @if($product->capacity >= $product->orders()->count())
                                                    <div class="ec-single-qty">
                                                        <div class="ec-single-cart ">
                                                            <a href="{{route('main::product::join',[$product])}}" class="btn btn-primary">Daftar</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="ec-single-qty">
                                                    <div class="ec-single-cart ">
                                                        <a href="#" class="btn btn-secondary disabled">Anda sudah terdaftar</a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single product content End -->
                    <!-- Single product tab start -->
                    <!-- product details description area end -->
                </div>

            </div>
        </div>
    </section>
    <!-- End Single product -->
@endsection
@push('top')
    <link rel="stylesheet" href="{{asset('main/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('main/assets/css/responsive.css')}}" />
@endpush
