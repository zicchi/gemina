@extends('layout.admin.template')
@section('title')
    Category
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
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addcategory">Tambah category
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
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-category-{{$category->id}}">Edit</button>
                                                @if(auth('admin')->user()->role == 'superadmin')
                                                    <button form="delete-item-{{ $category->id }}" onclick="return confirm('Anda yakin ingin menghapus data {{ $category->name }}')" class="btn btn-danger">Hapus</button>
                                                    <form action="{{ route('admin::category::destroy', [$category]) }}" method="post" class="hidden" id="delete-item-{{ $category->id }}">
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
            {{$categories->links()}}
        </div>

        <div class="modal fade modal-add-contact" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{route('admin::category::store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header px-4">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add category</h5>
                        </div>

                        <div class="modal-body px-4">
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="answer">Name</label>
                                        <input class="form-control" name="name" id="name" required>
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
        @foreach($categories as $category)
            <div class="modal fade modal-add-contact" id="edit-category-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form action="{{route('admin::category::update',[$category])}}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-header px-4">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit category</h5>
                            </div>

                            <div class="modal-body px-4">
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="answer">Name</label>
                                            <input class="form-control" name="edit-name" id="name" value="{{$category->name}}" required>
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
    </div>
@endsection
