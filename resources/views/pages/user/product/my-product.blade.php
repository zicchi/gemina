@extends('layout.user.template')
@section('title')
    Kunjunganku
@endsection
@section('content')
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Seminar yang didaftarkan</h1>
            <span><a href="{{route('user::index')}}">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i><a href="{{route('user::product::index')}}">Seminar</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>@yield('title')
        </div>
        <div>
            <a href="{{route('main::product::index')}}" class="btn btn-primary"> Katalog
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="ec-vendor-list card card-default">
                <div class="card-body">
                    <form action="{{route('user::product::myEvents')}}">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="Cari ..." name="q">
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table">
                            <thead>
                            <tr>
                                <th>Poster</th>
                                <th>Judul Seminar</th>
                                <th>Kontak</th>
                                <th>Status</th>
                                <th>Waktu</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td><img class="vendor-thumb" src="{{$event->thumb_image_url}}" alt="vendor image" /></td>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->contact}}</td>
                                    <td>
                                        @if($event->activated)
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-danger">Berakhir</span>
                                        @endif
                                    </td>
                                    <td>{{\Illuminate\Support\Carbon::simpleDatetime($event->date)}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button"
                                                    class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modal-{{$event->id}}">Info</button>
                                        </div>

                                        <div class="modal fade" id="modal-{{$event->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{$event->name}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <dt>Speaker</dt>
                                                        <dd>{{$event->speaker}}</dd>
                                                        <dt>Alamat / Link</dt>
                                                        <dd>{{$event->place}}</dd>
                                                        <dt>Tanggal</dt>
                                                        <dd>{{\Illuminate\Support\Carbon::simpleDatetime($event->date)}}</dd>
                                                        <dt>Jenis</dt>
                                                        <dd>{{$event->online ? 'Online' : 'Offline'}}</dd>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-3">
        {{$events->links()}}
    </div>
@endsection
