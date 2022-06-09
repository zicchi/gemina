@extends('layout.admin.template')
@section('title')
    Suggestion
@endsection
@section('content')
    <div>
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>@yield('title')</h1>
                <p class="breadcrumbs">
                    <span><a href="{{route('admin::index')}}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>@yield('title')

                </p>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($suggestions as $suggestion)
                                    <tr>
                                        <td>{{$suggestion->name}}</td>
                                        <td>{{$suggestion->email}}</td>
                                        <td>{{\Illuminate\Support\Carbon::simpleDatetime($suggestion->created_at)}}</td>
                                        <td>
                                            <button class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#detail-{{$suggestion->id}}">Detail</button>
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
            {{$suggestions->links()}}
        </div>

        @foreach($suggestions as $suggestion)
            <div class="modal fade modal-add-contact" id="detail-{{$suggestion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header px-4">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Komentar</h5>
                        </div>

                        <div class="modal-body px-4">
                            <div class="row mb-2">
                                <div class="">
                                    <dt>Nama</dt>
                                    <dd>{{$suggestion->name}}</dd>
                                    <dt>No. Telp</dt>
                                    <dd>{{$suggestion->phone}}</dd>
                                    <dt>Email</dt>
                                    <dd>{{$suggestion->email}}</dd>
                                    <dt>Komentar</dt>
                                    <dd>{{$suggestion->comments}}</dd>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer px-4">
                            <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
