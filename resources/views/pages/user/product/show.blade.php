@extends('layout.user.template')
@section('title')
    {{$product->name}}
@endsection
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>@yield('title')</h1>
            <p class="breadcrumbs"><span><a href="{{route('user::index')}}">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span><span><a href="{{route('user::product::index')}}">Event</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>@yield('title')
            </p>
        </div>
        <div class="btn-group">
            <a href="javascript:0" data-bs-target="#editEvent" data-bs-toggle="modal" class="btn btn-primary">Edit</a>
            <a href="{{route('user::product::audience',[$product])}}" class="btn btn-success">Peserta</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Product Detail</h2>
                </div>

                <div class="card-body product-detail">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="single-pro-img">
                                    <div class="single-product-scroll">
                                        <div class="single-product-cover">
                                            <div class="single-slide">
                                                <img class="img-responsive"
                                                     src="{{$product->thumb_image_url}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row review-rating">
                                <div class="col-12">
                                    <ul class="nav nav-tabs" id="myRatingTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active"
                                               id="product-detail-tab" data-bs-toggle="tab"
                                               data-bs-target="#productdetail" href="#productdetail" role="tab"
                                               aria-selected="true">
                                                <i class="mdi mdi-library-books mr-1"></i> Detail</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link"
                                               id="product-information-tab" data-bs-toggle="tab"
                                               data-bs-target="#productinformation" href="#productinformation"
                                               role="tab" aria-selected="false">
                                                <i class="mdi mdi-information mr-1"></i>Info</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="myTabContent2">
                                        <div class="tab-pane pt-3 fade show active" id="productdetail"
                                             role="tabpanel">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever
                                                since the
                                                1500s, when an unknown printer took a galley of type and
                                                scrambled it to
                                                make a type specimen book. It has survived not only five
                                                centuries, but also
                                                the leap into electronic typesetting, remaining essentially
                                                unchanged.
                                            </p>
                                            <ul class="features">
                                                <li>Any Product types that You want - Simple, Configurable</li>
                                                <li>Downloadable/Digital Products, Virtual Products</li>
                                                <li>Inventory Management with Backordered items</li>
                                                <li>Flatlock seams throughout.</li>
                                            </ul>
                                        </div>

                                        <div class="tab-pane pt-3 fade" id="productinformation" role="tabpanel">
                                            <ul>
                                                <li><span>Weight</span> 1000 g</li>
                                                <li><span>Dimensions</span> 35 × 30 × 7 cm</li>
                                                <li><span>Color</span> Black, Pink, Red, White</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-add-contact" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{route('user::product::update',['product' => $product])}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-header px-4">
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{$product->name}}</h5>
                        </div>

                        <div class="modal-body px-4">
                            <div class="form-group row mb-6">
                                <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Poster Seminar</label>

                                <div class="col-sm-8 col-lg-10">
                                    <div class="custom-file mb-1">
                                        <input type="file" class="custom-file-input" id="coverImage" name="edit-image">
                                        <label class="custom-file-label" for="coverImage">Choose file...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">Judul Seminar</label>
                                        <input type="text" class="form-control" name="edit-name" id="name" value="{{$product->name}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-4">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" name="edit-description" id="description">{{$product->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-4">
                                        <label for="place">Tempat Seminar</label>
                                        <textarea class="form-control" id="place" name="edit-place">{{$product->place}}</textarea>
                                        <span class="text-muted">Jika online, isikan dengan link online conference seminar atau kosongi terlebih dahulu</span>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="capacity">Kapasitas</label>
                                        <input type="number" class="form-control" id="capacity" name="edit-capacity" value="{{$product->capacity}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="product">Fee</label>
                                        <input type="number" class="form-control" name="edit-fee" id="fee" min="0" value="{{$product->fee}}">
                                        <span class="text-muted">Input 0 jika seminar tidak berbayar</span>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="product">Kategori</label>
                                        <select name="edit-category_id" id="" class="form-control form-select">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="online">Jenis Seminar</label>
                                        <select name="edit-online" id="" class="form-control form-select">
                                            <option value="1" {{$product->online ? 'selected' : ''}}>Online</option>
                                            <option value="0" {{$product->online ? '' : 'selected'}}>Offline</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="speaker">Pembicara</label>
                                        <input type="text" class="form-control" name="edit-speaker" id="speaker" value="{{$product->speaker}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="contact">Contact Person</label>
                                        <input type="number" class="form-control" name="edit-contact" id="contact" value="{{$product->contact}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="order_allowed_until">Waktu Seminar</label>
                                        <input type="datetime-local" dusk="date" id="date" min="{{now()->format('Y-m-d\TH:i')}}" name="edit-date" class="form-control" value="{{\Carbon\Carbon::parse($product->date)->format('Y-m-d\TH:i')}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer px-4">
                            <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary btn-pill">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
