@extends('layout.user.template')
@section('title')
    Peserta {{$product->name}}
@endsection
@section('content')
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>@yield('title')</h1>
            <p class="breadcrumbs">
                <span><a href="{{route('user::index')}}">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i><a href="{{route('user::product::index')}}">Seminar</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>@yield('title')

            </p>
        </div>
        <div>
            <a href="{{route('user::product::excel',[$product])}}" class="btn btn-primary">Export Excel</a>
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
