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
        <div class="mb-3">
            <form action="{{route('user::product::index')}}">
                <input type="search" class="form-control" placeholder="Cari ..." name="q">
            </form>
        </div>
        <div class="ec-vendor-card mt-m-24px row">
            @if($events->count() > 0)
                @foreach($events as $event)
                    <div class="col-lg-6 col-xl-4 col-xxl-3">
                        <div class="card card-default mt-24px">
                            <a href="{{route('user::product::show',['product' => $event])}}"
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
                                    <div class="col-4">
                                        <h6 class="text-uppercase">Peserta</h6>
                                        <h5>{{$event->orders()->count()}}</h5>
                                    </div>
                                    <div class="col-4">
                                        <h6 class="text-uppercase">Verifikasi</h6>
                                        <span class="badge badge-sm badge-{{$event->verified ? 'primary':'danger'}}">{{$event->verified ? 'Sudah':'Belum'}}</span>
                                    </div>
                                    <div class="col-4">
                                        <h6 class="text-uppercase">Kapasitas</h6>
                                        <h5>{{$event->capacity}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center mt-2">
                Belum ada seminar <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                          data-bs-target="#addVendor">Adakan Seminar
                    </button>
                </div>
            @endif

        </div>

        <div class="my-3">
            {{$events->links()}}
        </div>
    </div>


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
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-4">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control" name="description" id="description" required></textarea>
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
                                    <input type="number" class="form-control" id="capacity" name="capacity" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="event">Fee</label>
                                    <input type="number" class="form-control" name="fee" id="fee" min="0" required>
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
                                    <select name="online" id="" class="form-control form-select" required>
                                        <option value="1">Online</option>
                                        <option value="0">Offline</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="speaker">Pembicara</label>
                                    <input type="text" class="form-control" name="speaker" id="speaker" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="contact">Contact Person</label>
                                    <input type="number" class="form-control" name="contact" id="contact" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="order_allowed_until">Waktu Seminar</label>
                                    <input type="datetime-local" dusk="date" id="date" min="{{now()->format('Y-m-d\TH:i')}}" name="date" class="form-control" value="{{now()->format('Y-m-d\TH:i')}}" required>
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
