@extends('layout.admin.template')
@section('title')
    {{$user->name}}
@endsection
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>@yield('title')</h1>
            <p class="breadcrumbs"><span><a href="{{route('admin::index')}}">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span><span><a href="{{route('admin::user::index')}}">User</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>@yield('title')
            </p>
        </div>
        <div class="btn-group">
            <a href="javascript:0" data-bs-toggle="modal" data-bs-target="#editUser" class="btn btn-primary">Edit</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>User Detail</h2>
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
                                                     src="{{$user->thumb_image_url != '' ? $user->thumb_image_url : asset('admin/assets/img/user/u8 - Copy.jpg')}}" alt="">
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
                                               id="user-information-tab" data-bs-toggle="tab"
                                               data-bs-target="#userinformation" href="#userinformation"
                                               role="tab" aria-selected="false">
                                                <i class="mdi mdi-information mr-1"></i>Info</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="myTabContent2">
                                        <div class="tab-pane pt-3 fade show active" id="userinformation" role="tabpanel">
                                            <ul>
                                                <li><span>Email</span> : {{$user->email}}</li>
                                                <li><span>Phone</span> : {{$user->phone}}</li>
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
    <div class="modal fade modal-add-contact" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('admin::user::update',[$user])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add user</h5>
                    </div>

                    <div class="modal-body px-4">

                        <div class="form-group row mb-6">
                            <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Foto User</label>

                            <div class="col-sm-8 col-lg-10">
                                <div class="custom-file mb-1">
                                    <input type="file" class="custom-file-input" id="coverImage" name="image">
                                    <label class="custom-file-label" for="coverImage">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" name="phone" id="phone" value="{{$user->phone}}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="password" id="password">
                                    <span class="text-muted">Kosongi jika tidak ingin diubah</span>
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
