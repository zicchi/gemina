@extends('layout.user.template')
@section('title')
@endsection
@section('content')
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Vendor List</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Vendor</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVendor"> Add Vendor
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="ec-vendor-list card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table">
                            <thead>
                            <tr>
                                <th>Poster</th>
                                <th>Judul Seminar</th>
                                <th>Kontak</th>
                                <th>Status</th>
                                <th>Join On</th>
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
                                                    class="btn btn-outline-info">Info</button>
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
@endsection
