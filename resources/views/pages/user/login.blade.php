@extends('layout.user.blank')
@section('title')
    Login
@endsection
@section('content')
    <div class="container">



        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header bg-primary"><h2 class="text-white">@yield('title')</h2></div>
                <div class="card-body p-5">
                    @include('shared.errors')
                    <form action="{{route('main::postLogin')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <button type="button" class="btn btn-link btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
