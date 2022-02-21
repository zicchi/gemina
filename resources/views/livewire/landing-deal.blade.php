@if($products->count() > 0)
    <div>
        <div class="row">
            <!--  Special Section Start -->
            <div class="ec-spe-section col-lg-12 col-md-12 col-sm-12 sectopn-spc-mb">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="ec-title">Terdekat</h2>
                    </div>
                </div>

                <div class="ec-spe-products">
                    @foreach($products as $product)
                        <div class="ec-spe-product">
                            <div class="ec-spe-pro-inner">
                                <div class="ec-spe-pro-image-outer col-md-6 col-sm-12">
                                    <div class="ec-spe-pro-image">
                                        <img class="img-responsive" src="{{asset('main/assets/images/product-image/77_1.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="ec-spe-pro-content col-md-6 col-sm-12">
                                    <h5 class="ec-spe-pro-title"><a href="#">{{$product->name}}</a></h5>
                                    <div class="ec-spe-pro-desc">{{$product->description}}</div>
                                    <div class="ec-spe-price">
                                        <span class="new-price">GRATIS</span>
                                    </div>
                                    <div class="ec-spe-pro-btn">
                                        <a href="#" class="btn btn-lg btn-primary">Gabung</a>
                                    </div>
                                    <div class="ec-spe-pro-progress">
                                        <span class="ec-spe-pro-progress-desc"><span>Slot terisi:
                                                <b>20</b></span><span>Kapasitas: <b>{{$product->capacity}}</b></span></span>
                                    </div>
                                    <div class="countdowntimer">
                                        <span class="ec-spe-count-desc">Menuju kegiatan :</span>
                                        <span class="fs-3 font-weight-bold">
                                            {{now()->diffInDays($product->date) > 0 ? now()->diffInDays($product->date).' Hari' : 'Hari Ini'}}
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--  Testimonial & Special Section End -->

            <!--  services Section Start -->
            {{--            <div class="ec-services-section col-lg-3 col-md-3 col-sm-3">--}}
            {{--                <div class="col-md-12">--}}
            {{--                    <div class="section-title">--}}
            {{--                        <h2 class="ec-title">Our Services</h2>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="ec_ser_block">--}}
            {{--                    <div class="ec_ser_content ec_ser_content_1 col-sm-12">--}}
            {{--                        <div class="ec_ser_inner">--}}
            {{--                            <div class="ec-service-image">--}}
            {{--                                <img src="assets/images/icons/service_4_1.svg" class="svg_img ser_svg" alt="" />--}}
            {{--                            </div>--}}
            {{--                            <div class="ec-service-desc">--}}
            {{--                                <h2>Worldwide Delivery</h2>--}}
            {{--                                <p>For Order Over $100</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="ec_ser_content ec_ser_content_2 col-sm-12">--}}
            {{--                        <div class="ec_ser_inner">--}}
            {{--                            <div class="ec-service-image">--}}
            {{--                                <img src="assets/images/icons/service_4_2.svg" class="svg_img ser_svg" alt="" />--}}
            {{--                            </div>--}}
            {{--                            <div class="ec-service-desc">--}}
            {{--                                <h2>Next Day delivery</h2>--}}
            {{--                                <p>UK Orders Only</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="ec_ser_content ec_ser_content_3 col-sm-12">--}}
            {{--                        <div class="ec_ser_inner">--}}
            {{--                            <div class="ec-service-image">--}}
            {{--                                <img src="assets/images/icons/service_4_3.svg" class="svg_img ser_svg" alt="" />--}}
            {{--                            </div>--}}
            {{--                            <div class="ec-service-desc">--}}
            {{--                                <h2>Best Online Support</h2>--}}
            {{--                                <p>Hours: 8AM -11PM</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="ec_ser_content ec_ser_content_4 col-sm-12">--}}
            {{--                        <div class="ec_ser_inner">--}}
            {{--                            <div class="ec-service-image">--}}
            {{--                                <img src="assets/images/icons/service_4_4.svg" class="svg_img ser_svg" alt="" />--}}
            {{--                            </div>--}}
            {{--                            <div class="ec-service-desc">--}}
            {{--                                <h2>Return Policy</h2>--}}
            {{--                                <p>Easy & Free Return</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="ec_ser_content ec_ser_content_5 col-sm-12">--}}
            {{--                        <div class="ec_ser_inner">--}}
            {{--                            <div class="ec-service-image">--}}
            {{--                                <img src="assets/images/icons/service_4_5.svg" class="svg_img ser_svg" alt="" />--}}
            {{--                            </div>--}}
            {{--                            <div class="ec-service-desc">--}}
            {{--                                <h2>30% money back</h2>--}}
            {{--                                <p>For Order Over $100</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
@endif
