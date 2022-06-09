@extends('layout.user.blank')
@section('title')
    Register
@endsection
@section('content')
    <div class="container align-items-center pt-24px pb-24px">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="card">
                    <div class="card-header bg-primary">
                        <a href="{{route('main::home')}}" title="Ekka">
                            <h1 class="text-white text-center">Gemina</h1>
                        </a>
                    </div>
                    <div class="card-body p-5">
                        <h4 class="text-dark mb-5">Sign Up</h4>
                        @include('shared.errors')
                        @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('main::speaker::register')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="LinkedIn Link Url">
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control" id="github" name="github" placeholder="Github Link Url">
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control" id="dribbble" name="dribbble" placeholder="Dribbble Link Url">
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control" id="instance" name="instance" placeholder="Instansi">
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <textarea class="form-control" id="bio" name="bio" placeholder="Bio"></textarea>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <label for="cv_url">Kategori</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <label for="cv_url">CV</label>
                                    <input type="file" class="form-control" id="cv_url" name="cv_url" required>
                                    <span class="text-muted">Format .pdf</span>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <label for="image">Foto</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>


                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign Up</button>

                                    <p class="sign-upp">Already have an account?
                                        <a class="text-blue" href="{{route('main::login')}}">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
