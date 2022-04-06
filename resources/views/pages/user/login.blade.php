@extends('layout.user.blank')
@section('title')
    Login
@endsection
@section('content')
    <div class="container pt-24px pb-24px">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="card">
                    <div class="card-header bg-primary">
                        <a href="{{route('main::home')}}" title="Ekka">
                            <h1 class="text-white text-center">Gemina</h1>
                        </a>
                    </div>
                    <div class="card-body p-5">
                        <h4 class="text-dark mb-5">Sign In</h4>
                        @include('shared.errors')
                        <form action="{{route('main::postLogin')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>

                                <div class="form-group col-md-12 ">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign In</button>

                                    <p class="sign-upp">Don't have an account yet ?
                                        <a class="text-blue" href="{{route('main::register')}}">Sign Up</a>
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
