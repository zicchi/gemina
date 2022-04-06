@extends('layout.user.blank')
@section('title')
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
                        @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('main::postRegister')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                </div>

                                <div class="form-group col-md-12 ">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                                </div>


                                <div class="col-md-12">
                                    {{--                                    <div class="d-inline-block mr-3">--}}
                                    {{--                                        <div class="control control-checkbox">--}}
                                    {{--                                            <input type="checkbox" class="form-check" />--}}
                                    {{--                                            <div class="control-indicator"></div>--}}
                                    {{--                                            I Agree the terms and conditions--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

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
