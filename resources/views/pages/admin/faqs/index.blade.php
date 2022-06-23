@extends('layout.admin.template')
@section('title')
    FAQ
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
                        data-bs-target="#addfaq">Tambah FAQ
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
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($faqs as $faq)
                                    <tr>
                                        <td>{{$faq->question}}</td>
                                        <td>{{$faq->answer}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#edit-faq-{{$faq->id}}">Edit</button>
                                                @if(auth('admin')->user()->role == 'superadmin')
                                                    <button form="delete-item-{{ $faq->id }}" onclick="return confirm('Anda yakin ingin menghapus data {{ $faq->id }}')" class="btn btn-danger">Hapus</button>
                                                    <form action="{{ route('admin::faq::destroy', [$faq]) }}" method="post" class="hidden" id="delete-item-{{ $faq->id }}">
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

        <div class="modal fade modal-add-contact" id="addfaq" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{route('admin::faq::store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header px-4">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add FAQ</h5>
                        </div>

                        <div class="modal-body px-4">
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="question">Pertanyaan</label>
                                        <input type="text" class="form-control" name="question" id="question" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="answer">Jawaban</label>
                                        <input type="text" class="form-control" name="answer" id="answer" required>
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
                @foreach($faqs as $faq)
                    <div class="modal fade modal-add-contact" id="edit-faq-{{$faq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form action="{{route('admin::faq::update',[$faq])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="modal-header px-4">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit FAQ</h5>
                                    </div>

                                    <div class="modal-body px-4">
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="question">Pertanyaan</label>
                                                    <textarea class="form-control" name="edit-question" id="question" required>{{$faq->question}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="answer">Jawaban</label>
                                                    <textarea class="form-control" name="edit-answer" id="answer" required>{{$faq->answer}}</textarea>
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
