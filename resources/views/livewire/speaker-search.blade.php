<div>
    <div class="row">
        <div class="col-md-2">
            <div class="section-title">
                <h2 class="ec-title">Speaker</h2>
            </div>
        </div>
        <div class="col-md-10">
            <div class="align-self-center ec-header-search">
                <div class="header-search">
                    <form class="ec-search-group-form" action="#">
                        <div class="input-group">
                            <input class="form-control" wire:model="query" placeholder="Kira-kira siapa ya yang cocok... ?" type="text">
                        </div>
                        <div class="ec-search-select-inner">
                            <select wire:model="category_id" aria-label="Default select example">
                                <option value="0">Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <span><i class="fas fa-chevron-down"></i></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <div class="row margin-minus-b-15">
        <div class="col">
            <!-- 1st Product tab start -->
            <div class="row">
                @if($speakers->count() > 0)
                    @foreach($speakers as $speaker)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-5 ec-product-content">
                            <div class="ec-product-inner">
                                <div class="ec-pro-image-outer">
                                    <div class="ec-pro-image">
                                        <a href="" data-bs-target="#modal-{{$speaker->id}}" class="image">
                                        <span class="label veg">
                                            <span class="dot"></span>
                                        </span>
                                            <img class="main-image" src="{{asset('main/assets/images/product-image/50_1.jpg')}}" alt="Product" />
                                        </a>
                                    </div>
                                </div>
                                <div class="ec-pro-content">
                                    <a href="{{route('main::product::show',[$speaker])}}"><h6 class="ec-pro-stitle">{{$speaker->category->name}}</h6></a>
                                    <a href="{{route('main::product::show',[$speaker])}}"><h6 class="ec-pro-title">{{\Illuminate\Support\Str::limit($speaker->name,20)}}</h6></a>
                                    <h5 class="ec-pro-title"><a href="{{route('main::product::show',[$speaker])}}">{{\Illuminate\Support\Str::limit($speaker->description,20)}}</a></h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center">Pembicara tidak ditemukan</div>
                @endif
            </div>
            <div>
                @if($speakers->count() > 0)
                    <div class="pagination">
                        {{$speakers->links()}}
                    </div>
                @endif
            </div>
            <!-- ec 1st Product tab end -->
        </div>
    </div>
</div>
@section('modal')
    @foreach($speakers as $speaker)
        <div class="modal fade" id="modal-{{$speaker->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="quickview-pro-content">
                                    <h5 class="ec-quick-title"><a href="product-left-sidebar.html">premium quality organic trail mix dried fruit</a></h5>
                                    <div class="ec-quickview-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star"></i>
                                    </div>

                                    <div class="ec-quickview-desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                        since the 1500s,</div>
                                    <div class="ec-quickview-price">
                                        <span class="new-price">$199.00</span>
                                        <span class="old-price">$200.00</span>
                                    </div>

                                    <div class="ec-pro-variation">
                                        <div class="ec-pro-variation-inner ec-pro-variation-size">
                                            <span>Size</span>
                                            <div class="ec-pro-variation-content">
                                                <ul>
                                                    <li><span>250 g</span></li>
                                                    <li><span>500 g</span></li>
                                                    <li><span>1 kg</span></li>
                                                    <li><span>2 kg</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ec-quickview-qty">
                                        <div class="qty-plus-minus">
                                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                        </div>
                                        <div class="ec-quickview-cart ">
                                            <button class="btn btn-primary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
