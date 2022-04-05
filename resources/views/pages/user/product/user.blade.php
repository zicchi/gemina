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
                                <th>Aksi</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><img class="vendor-thumb" src="{{$user->thumb_image_url}}" alt="vendor image" /></td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-info">Info</button>
                                            <a href="{{route('user::product::certificates',[$product,$user])}}" class="btn btn-outline-success">Sertifikat</a>
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
