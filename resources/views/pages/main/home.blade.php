@extends('layout.main.template')
@section('title')
@endsection
@section('content')
    <div class="container my-5" data-animation="fadeIn">
        <div class="row">
            <div class="col-md-2">
                <div class="section-title">
                    <h2 class="ec-title">Seminar</h2>
                </div>
            </div>
            <div class="col-md-10">
                <div class="align-self-center ec-header-search">
                    <div class="header-search">
                        <form class="ec-search-group-form" action="#">
                            <input class="form-control" placeholder="Search Your Products..." type="text">
                            <button class="search_submit" type="submit"><img src="{{asset('main/assets/images/icons/search.svg')}}"
                                                                             class="svg_img search_svg" alt="" /></button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <div class="row margin-minus-b-15">
            <div class="col">
                <!-- 1st Product tab start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-5 ec-product-content">
                            <div class="ec-product-inner">
                                <div class="ec-pro-image-outer">
                                    <div class="ec-pro-image">
                                        <a href="#" class="image">
                                                <span class="label veg">
                                                    <span class="dot"></span>
                                                </span>
                                            <img class="main-image"
                                                 src="{{asset('main/assets/images/product-image/50_1.jpg')}}" alt="Product" />
                                        </a>
                                        <span class="flags">
                                                <span class="new">New</span>
                                            </span>
                                    </div>
                                </div>
                                <div class="ec-pro-content">
                                    <a href="#"><h6 class="ec-pro-stitle">Technology</h6></a>
                                    <h5 class="ec-pro-title"><a href="#">{{\Illuminate\Support\Str::limit('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, assumenda deleniti eligendi expedita nostrum nulla officia possimus? Ad dolorem eius ex facere, fuga illum nesciunt nisi officia provident quidem sit!',50)}}</a></h5>
                                    <div class="ec-pro-rat-price">
                                        <span class="ec-price">
                                                <span class="new-price">Free</span>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- ec 1st Product tab end -->
            </div>
        </div>
    </div>

@endsection
