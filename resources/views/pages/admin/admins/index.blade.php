@extends('layout.admin.template')
@section('title')
    Admin
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
                        data-bs-target="#addAdmin">Tambah Admin
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
                                    <th>Nama</th>
                                    <th>Wewenang</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        @if($admin->role == 'superadmin')
                                            @continue
                                        @endif
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->role_name}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" data-bs-target="#editAdmin-{{$admin->id}}" data-bs-toggle="modal" class="btn btn-outline-success">Edit</button>
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
            {{$admins->links()}}
        </div>

        <div class="modal fade modal-add-contact" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{route('admin::admins::store')}}" method="post">
                        @csrf
                        <div class="modal-header px-4">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add Admin</h5>
                        </div>

                        <div class="modal-body px-4">
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="username">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" name="password" id="password">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-4">
                                        <label for="event">Wewenang</label>
                                        <select name="role" id="role" class="form-control form-select">
                                            @foreach(\App\Models\Admin::adminRoles() as $role => $name)
                                                <option value="{{$role}}">{{$name}}</option>
                                            @endforeach
                                        </select>
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
        @foreach($admins as $admin)
            <div class="modal fade modal-add-contact" id="editAdmin-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form action="{{route('admin::admins::update',[$admin])}}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-header px-4">
                                <h5 class="modal-title" id="exampleModalCenterTitle">{{$admin->name}}</h5>
                            </div>

                            <div class="modal-body px-4">
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{$admin->name}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" value="{{$admin->username}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" name="password" id="password">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-4">
                                            <label for="event">Wewenang</label>
                                            <select name="role" id="role" class="form-control form-select">
                                                @foreach(\App\Models\Admin::adminRoles() as $role => $name)
                                                    <option value="{{$role}}" {{$role == $admin->role ? 'selected' : ''}}>{{$name}}</option>
                                                @endforeach
                                                @if(auth('admin')->user()->role == 'superadmin')
                                                    <option value="superadmin" {{'superadmin' == $admin->role ? 'selected' : ''}}>Superadmin</option>
                                                @endif
                                            </select>
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
