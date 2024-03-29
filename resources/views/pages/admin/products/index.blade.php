@extends('layout.admin.template')
@section('title')
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

    <div class="card my-3">
        <div class="card-body">
            <form action="{{route('admin::event::index')}}">
                <div class="form-group">
                    <input type="search" name="q" placeholder="Cari.." class="form-control">
                </div>
            </form>
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
                            @foreach($products as $product)
                                <tr>
                                    <td><img class="vendor-thumb" src="{{$product->thumb_image_url}}" alt="vendor image" /></td>
                                    <td>{{$product->name}}
                                        @if(!$product->verified)
                                            <span class="badge badge-warning">Belum Verifikasi</span>
                                        @endif
                                    </td>
                                    <td>{{$product->contact}}</td>
                                    <td>
                                        @if($product->activated)
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-danger">Berakhir</span>
                                        @endif
                                    </td>
                                    <td>{{\Illuminate\Support\Carbon::simpleDatetime($product->date)}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('admin::event::show',[$product])}}" class="btn btn-outline-info">Rincian</a>
                                            @if(auth('admin')->user()->role == 'superadmin')
                                                <button form="delete-item-{{ $product->id }}" onclick="return confirm('Anda yakin ingin menghapus data {{ $product->name }}')" class="btn btn-danger">Hapus</button>
                                                <form action="{{ route('admin::event::destroy', [$product]) }}" method="post" class="hidden" id="delete-item-{{ $product->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            @endif
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
        {{$products->links()}}
    </div>
@endsection
