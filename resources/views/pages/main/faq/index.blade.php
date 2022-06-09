@extends('layout.main.template')
@section('title')
    FAQ
@endsection
@section('content')
<div class="container my-3">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="section-title">
                <h2 class="ec-bg-title">FAQ</h2>
                <h2 class="ec-title">FAQ</h2>
                <p class="sub-title mb-3">Customer service management</p>
            </div>
        </div>
        <div class="ec-faq-wrapper">
            <div class="ec-faq-container">
                <div id="ec-faq">
                    @foreach($faqs as $faq)
                        <div class="col-sm-12 ec-faq-block">
                            <h4 class="ec-faq-title">{{$faq->question}}</h4>
                            <div class="ec-faq-content">
                                <p>{{$faq->answer}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('top')
    <link rel="stylesheet" href="{{asset('main/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('main/assets/css/responsive.css')}}" />
@endpush
