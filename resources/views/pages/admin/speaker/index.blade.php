@extends('layout.admin.template')
@section('title')
    Speaker
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
                                    <th>Aksi</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($speakers as $speaker)
                                    <tr>
                                        <td>{{$speaker->name}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" data-bs-target="#editAdmin-{{$speaker->id}}" data-bs-toggle="modal" class="btn btn-outline-success">Edit</button>
                                                @if(!$speaker->activated)
                                                    <a href="{{route('admin::speakers::activate',[$speaker])}}" class="btn btn-primary">Aktifkan</a>
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
            {{$speakers->links()}}
        </div>

{{--        <div class="modal fade modal-add-contact" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <form action="{{route('admin::speakers::store')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="modal-header px-4">--}}
{{--                            <h5 class="modal-title" id="exampleModalCenterTitle">Add Admin</h5>--}}
{{--                        </div>--}}

{{--                        <div class="modal-body px-4">--}}
{{--                            <div class="row mb-2">--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="name">Nama</label>--}}
{{--                                        <input type="text" class="form-control" name="name" id="name">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="username">Username</label>--}}
{{--                                        <input type="text" class="form-control" name="username" id="username">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="password">Password</label>--}}
{{--                                        <input type="text" class="form-control" name="password" id="password">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="form-group mb-4">--}}
{{--                                        <label for="event">Wewenang</label>--}}
{{--                                        <select name="role" id="role" class="form-control form-select">--}}
{{--                                            @foreach(\App\Models\Admin::adminRoles() as $role => $name)--}}
{{--                                                <option value="{{$role}}">{{$name}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="modal-footer px-4">--}}
{{--                            <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Batal</button>--}}
{{--                            <button type="submit" class="btn btn-primary btn-pill">Simpan</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        @foreach($speakers as $speaker)
            <div class="modal fade modal-add-contact" id="editAdmin-{{$speaker->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form action="{{route('admin::speakers::update',[$speaker])}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-header px-4">
                                <h5 class="modal-title" id="exampleModalCenterTitle">{{$speaker->name}}</h5>
                            </div>

                            <div class="modal-body px-4">
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{$speaker->name}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" value="{{$speaker->email}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="instance">Instansi</label>
                                            <input type="text" class="form-control" name="instance" id="instance" value="{{$speaker->instance}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="github">Github Url</label>
                                            <input type="text" class="form-control" name="github" id="github" value="{{$speaker->github}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="linkedin">LinkedIn Url</label>
                                            <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{$speaker->linkedin}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="dribbble">Dribbble Url</label>
                                            <input type="text" class="form-control" name="dribbble" id="dribbble" value="{{$speaker->dribbble}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="bio">Bio</label>
                                            <textarea class="form-control" name="bio">{{$speaker->bio}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select name="category_id" id="" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
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
        @endforeach
    </div>
@endsection
