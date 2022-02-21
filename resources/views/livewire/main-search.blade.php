<div>
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
                        <div class="input-group">
                            <input class="form-control" wire:model="query" placeholder="Ikut seminar apa ya... ?" type="text">
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
                @if($products->count() > 0)
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-3 ec-product-content">
                            <div class="ec-product-inner">
                                <div class="ec-pro-image-outer">
                                    <div class="ec-pro-image">
                                        <a href="" data-bs-target="#modal-{{$product->id}}" class="image">
                                        <span class="label veg">
                                            <span class="dot"></span>
                                        </span>
                                            <img class="main-image" src="{{asset('main/assets/images/product-image/50_1.jpg')}}" alt="Product" />
                                        </a>
                                        <span class="flags">
                                        <span class="new">New</span>
                                    </span>
                                    </div>
                                </div>
                                <div class="ec-pro-content">
                                    <a href="{{route('main::product::show',[$product])}}"><h6 class="ec-pro-stitle">{{$product->category->name}}</h6></a>
                                    <a href="{{route('main::product::show',[$product])}}"><h6 class="ec-pro-title">{{\Illuminate\Support\Str::limit($product->name,20)}}</h6></a>
                                    <h5 class="ec-pro-title"><a href="{{route('main::product::show',[$product])}}">{{\Illuminate\Support\Str::limit($product->description,20)}}</a></h5>
                                    <div class="ec-pro-rat-price">
                                    <span class="ec-price">
                                        @if($product->fee == 0)
                                            <span class="new-price">Free</span>
                                        @else
                                            <span class="new-price">{{$product->fee}}</span>
                                        @endif
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center">Produk tidak ditemukan</div>
                @endif
            </div>
            <div>
                @if($products->count() > 0)
                    <div class="pagination">
                        {{$products->links()}}
                    </div>
                @endif
            </div>
            <!-- ec 1st Product tab end -->
        </div>
    </div>
</div>
    @section('modal')
        @foreach($products as $product)
            <div class="modal fade" id="modal-{{$product->id}}" tabindex="-1" role="dialog">
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
