@extends('layout.admin.template')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Top Statistics -->
    <div class="row">
        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
            <div class="card card-mini dash-card card-1">
                <div class="card-body">
                    <h2 class="mb-1">{{$users}}</h2>
                    <p>Pengguna</p>
                    <span class="mdi mdi-account-arrow-left"></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
            <div class="card card-mini dash-card card-2">
                <div class="card-body">
                    <h2 class="mb-1">{{$products}}</h2>
                    <p>Seminar</p>
                    <span class="mdi mdi-account-clock"></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
            <div class="card card-mini dash-card card-3">
                <div class="card-body">
                    <h2 class="mb-1">0</h2>
                    <p>Seminar dibuat</p>
                    <span class="mdi mdi-package-variant"></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
            <div class="card card-mini dash-card card-4">
                <div class="card-body">
                    <h2 class="mb-1">$98,503</h2>
                    <p>Daily Revenue</p>
                    <span class="mdi mdi-currency-usd"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card my-3">
                <div class="card-body">
                    <div class="my-1">
                        <canvas id="user-chart"></canvas>
                    </div>
                </div>
            </div>
            <span class="text-muted"><i>Pendaftaran pengguna 7 hari terakhir</i></span>
        </div>
        <div class="col-md-6">
            <div class="card my-3">
                <div class="card-body">
                    <div class="my-1">
                        <canvas id="product-chart"></canvas>
                    </div>
                </div>
            </div>
            <span class="text-muted"><i>Jumlah Seminar yang telah dibuat pada 7 hari terakhir</i></span>
        </div>
    </div>

@endsection
@push('bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js" integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var ctx = document.getElementById('user-chart');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [{!! collect($reports)->pluck('days')->map(function($label) { return "'".$label."'"; })->join(',') !!}],
                datasets: [
                    {
                        label: "User",
                        data: [{{ collect($reports)->pluck('userStats')->map(function($item) { return floor($item); })->join(',') }}],
                        backgroundColor: '#ddaa04',
                        borderColor: '#ddaa04',
                        tension: 0
                    },
                ]

            },
            options: {
                scales: {
                    xAxes:[{
                        gridLines: {
                            display: false,
                        }
                    }],
                }
            }
        })
    </script>
    <script>
        var ctx = document.getElementById('product-chart');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [{!! collect($reports)->pluck('days')->map(function($label) { return "'".$label."'"; })->join(',') !!}],
                datasets: [
                    {
                        label: "Seminar",
                        data: [{{ collect($reports)->pluck('productStats')->map(function($item) { return floor($item); })->join(',') }}],
                        backgroundColor: '#6610f2',
                        borderColor: '#6610f2',
                        tension: 0
                    },
                ]

            },
            options: {
                scales: {
                    xAxes:[{
                        gridLines: {
                            display: false,
                        }
                    }],
                }
            }
        })
    </script>
@endpush
