@extends('layout.user.template')
@section('title')
    Seminar
@endsection
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>Seminar</h1>
            <span class="text-muted">Daftar seminar yang telah kamu buat.</span>
            <p class="breadcrumbs"><span><a href="{{route('user::index')}}">Home</a></span><span><i class="mdi mdi-chevron-right"></i></span>@yield('title')</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addVendor">Adakan Seminar
            </button>
        </div>
    </div>

    <div class="card card-default p-4 ec-card-space">
        <div class="ec-vendor-card mt-m-24px row">

            @foreach($events as $event)
                <div class="col-lg-6 col-xl-4 col-xxl-3">
                    <div class="card card-default mt-24px">
                        <a href="javascript:0" data-bs-toggle="modal" data-bs-target="#modal-event-{{$event->id}}"
                           class="view-detail"><i class="mdi mdi-eye-plus-outline"></i>
                        </a>
                        <div class="vendor-info card-body text-center p-4">
                            <a href="javascript:0" class="text-secondary d-inline-block mb-3">
                                <div class="image mb-3">
                                    <img src="{{$event->thumb_image_url}}" class="img-fluid rounded-circle"
                                         alt="Avatar Image">
                                </div>

                                <h5 class="card-title text-dark">{{$event->name}}</h5>

                                <ul class="list-unstyled">
                                    <li class="d-flex mb-1">
                                        <i class="mdi mdi-cellphone-basic mr-1"></i>
                                        <span>{{$event->contact}}</span>
                                    </li>
                                    <li class="d-flex mb-1">
                                        <i class="mdi mdi-calendar mr-1"></i>
                                        <span>{{\Illuminate\Support\Carbon::simpleDatetime($event->date)}}</span>
                                    </li>
                                    <li class="d-flex">
                                        <i class="mdi mdi-currency-usd mr-1"></i>
                                        <span>{{$event->fee > 0 ? \Illuminate\Support\Str::currency($event->fee,'Rp. ') : 'Free'}}</span>
                                    </li>
                                </ul>
                            </a>
                            <div class="row justify-content-center ec-vendor-detail">
                                <div class="col-6">
                                    <h6 class="text-uppercase">Peserta</h6>
                                    <h5>{{$event->orders()->count()}}</h5>
                                </div>
                                <div class="col-6">
                                    <h6 class="text-uppercase">Kapasitas</h6>
                                    <h5>{{$event->capacity}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="my-3">
            {{$events->links()}}
        </div>
    </div>


    <!-- Contact Modal -->
    @foreach($events as $event)
        <div class="modal fade" id="modal-event-{{$event->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-end border-bottom-0">

                        <div class="dropdown">
                            <button class="btn-dots-icon" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a type="button" class="dropdown-item" data-bs-toggle="modal" href="#editEvent-{{$event->id}}" aria-label="Close">
                                    Edit
                                </a>
                                <a class="dropdown-item" href="{{route('user::product::audience',['product' => $event])}}">Pendaftar</a>
                            </div>
                        </div>

                        <button type="button" class="btn-close-icon" data-bs-dismiss="modal"
                                aria-label="Close">
                            <i class="mdi mdi-close"></i>
                        </button>
                    </div>

                    <div class="modal-body pt-0">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <div class="profile-content-left px-4">
                                    <div class="text-center widget-profile px-0 border-0">
                                        <div class="card-img mx-auto rounded-circle">
                                            <img src="{{$event->thumb_image_url}}" alt="user image">
                                        </div>

                                        <div class="card-body">
                                            <h4 class="py-2 text-dark">{{$event->name}}</h4>
                                            <p>john.example@gmail.com</p>
                                            <a class="btn btn-primary btn-pill my-3"
                                               href="#">Follow</a>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between ">
                                        <div class="text-center pb-4">
                                            <h6 class="text-dark pb-2">1503</h6>
                                            <p>Items</p>
                                        </div>

                                        <div class="text-center pb-4">
                                            <h6 class="text-dark pb-2">2905</h6>
                                            <p>Sell</p>
                                        </div>

                                        <div class="text-center pb-4">
                                            <h6 class="text-dark pb-2">1200</h6>
                                            <p>Payout</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contact-info px-4">
                                    <h4 class="text-dark mb-1">Contact Details</h4>
                                    <p class="text-dark font-weight-medium pt-3 mb-2">Email address</p>
                                    <p>john.example@gmail.com</p>
                                    <p class="text-dark font-weight-medium pt-3 mb-2">Phone Number</p>
                                    <p>+00 1234 5678 91</p>
                                    <p class="text-dark font-weight-medium pt-3 mb-2">Birthday</p>
                                    <p>Dec 10, 1991</p>
                                    <p class="text-dark font-weight-medium pt-3 mb-2">Event</p>
                                    <p class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--        Modal Edit Event / Product--}}

        <div class="modal fade modal-add-contact" id="editEvent-{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{route('user::product::update',['product' => $event])}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-header px-4">
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{$event->name}}</h5>
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
                                        <input type="text" class="form-control" name="edit-name" id="name" value="{{$event->name}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-4">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" name="edit-description" id="description">{{$event->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-4">
                                        <label for="place">Tempat Seminar</label>
                                        <textarea class="form-control" id="place" name="edit-place">{{$event->place}}</textarea>
                                        <span class="text-muted">Jika online, isikan dengan link online conference seminar atau kosongi terlebih dahulu</span>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="capacity">Kapasitas</label>
                                        <input type="number" class="form-control" id="capacity" name="edit-capacity" value="{{$event->capacity}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="event">Fee</label>
                                        <input type="number" class="form-control" name="edit-fee" id="fee" min="0" value="{{$event->fee}}">
                                        <span class="text-muted">Input 0 jika seminar tidak berbayar</span>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="event">Kategori</label>
                                        <select name="edit-category_id" id="" class="form-control form-select">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$event->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="online">Jenis Seminar</label>
                                        <select name="edit-online" id="" class="form-control form-select">
                                            <option value="1" {{$event->online ? 'selected' : ''}}>Online</option>
                                            <option value="0" {{$event->online ? '' : 'selected'}}>Offline</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="speaker">Pembicara</label>
                                        <input type="text" class="form-control" name="edit-speaker" id="speaker" value="{{$event->speaker}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="contact">Contact Person</label>
                                        <input type="number" class="form-control" name="edit-contact" id="contact" value="{{$event->contact}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="order_allowed_until">Waktu Seminar</label>
                                        <input type="datetime-local" dusk="date" id="date" min="{{now()->format('Y-m-d\TH:i')}}" name="edit-date" class="form-control" value="{{\Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i')}}">
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
    @endforeach

    <!-- Add Contact Button  -->
    <div class="modal fade modal-add-contact" id="addVendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('user::product::store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Adakan Seminar</h5>
                    </div>

                    <div class="modal-body px-4">
                        <div class="form-group row mb-6">
                            <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Poster Seminar</label>

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
                                    <label for="name">Judul Seminar</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-4">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-4">
                                    <label for="place">Tempat Seminar</label>
                                    <textarea class="form-control" id="place" name="place"></textarea>
                                    <span class="text-muted">Jika online, isikan dengan link online conference seminar atau kosongi terlebih dahulu</span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="capacity">Kapasitas</label>
                                    <input type="number" class="form-control" id="capacity" name="capacity">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="event">Fee</label>
                                    <input type="number" class="form-control" name="fee" id="fee" min="0">
                                    <span class="text-muted">Input 0 jika seminar tidak berbayar</span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="event">Kategori</label>
                                    <select name="category_id" id="" class="form-control form-select">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="online">Jenis Seminar</label>
                                    <select name="online" id="" class="form-control form-select">
                                        <option value="1">Online</option>
                                        <option value="0">Offline</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="speaker">Pembicara</label>
                                    <input type="text" class="form-control" name="speaker" id="speaker">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="contact">Contact Person</label>
                                    <input type="number" class="form-control" name="contact" id="contact">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="order_allowed_until">Waktu Seminar</label>
                                    <input type="datetime-local" dusk="date" id="date" min="{{now()->format('Y-m-d\TH:i')}}" name="date" class="form-control" value="{{now()->format('Y-m-d\TH:i')}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer px-4">
                        <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-pill">Adakan!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
