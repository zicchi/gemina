@extends('layout.user.template')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Top Statistics -->
    <div class="row">
        <div class="col-xl-4 col-sm-6 p-b-15 lbl-card">
            <div class="card card-mini dash-card card-1">
                <div class="card-body">
                    <h2 class="mb-1">{{$register_data}}</h2>
                    <p>Pendaftar Seminar</p>
                    <span class="mdi mdi-account-arrow-left"></span>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 p-b-15 lbl-card">
            <div class="card card-mini dash-card card-2">
                <div class="card-body">
                    <h2 class="mb-1">{{$joinedEvents}}</h2>
                    <p>Seminar diikuti</p>
                    <span class="mdi mdi-account-clock"></span>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 p-b-15 lbl-card">
            <div class="card card-mini dash-card card-3">
                <div class="card-body">
                    <h2 class="mb-1">{{$events->count()}}</h2>
                    <p>Seminar dibuat</p>
                    <span class="mdi mdi-package-variant"></span>
                </div>
            </div>
        </div>
    </div>


@endsection
