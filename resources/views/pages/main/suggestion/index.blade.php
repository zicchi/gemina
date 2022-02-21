@extends('layout.main.template')
@section('title')
    Contact Us
@endsection
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="ec-common-wrapper">
                <div class="ec-contact-leftside">
                    <div class="ec-contact-container">
                        <div class="ec-contact-form">
                            <form action="{{route('main::suggestion::store')}}" method="post">
                                @csrf
                                    <span class="ec-contact-wrap">
                                        <label>First Name*</label>
                                        <input type="text" name="first_name" placeholder="Enter your first name"
                                               required />
                                    </span>
                                <span class="ec-contact-wrap">
                                        <label>Last Name*</label>
                                        <input type="text" name="last_name" placeholder="Enter your last name"
                                               required />
                                    </span>
                                <span class="ec-contact-wrap">
                                        <label>Email*</label>
                                        <input type="email" name="email" placeholder="Enter your email address"
                                               required />
                                    </span>
                                <span class="ec-contact-wrap">
                                        <label>Phone Number*</label>
                                        <input type="text" name="phone" placeholder="Enter your phone number"
                                               required />
                                    </span>
                                <span class="ec-contact-wrap">
                                        <label>Comments/Questions*</label>
                                        <textarea name="comments"
                                                  placeholder="Please leave your comments here.."></textarea>
                                    </span>

                                <span class="ec-contact-wrap ec-contact-btn">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="ec-contact-rightside">
                    <div class="ec_contact_map">
                        <div class="ec_map_canvas">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.853788371146!2d112.62644731476475!3d-8.014009994228822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6270625e433a5%3A0x8d92f41c63d8d37!2sb&#39;Gadang%20Coffee!5e0!3m2!1sen!2sus!4v1645430085214!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            <a href="https://sites.google.com/view/maps-api-v2/mapv2"></a>
                        </div>
                    </div>
                    <div class="ec_contact_info">
                        <h1 class="ec_contact_info_head">Contact us</h1>
                        <ul class="align-items-center">
                            <li class="ec-contact-item"><i class="ecicon eci-map-marker" aria-hidden="true"></i>
                                <span>Address :</span>Gadang, Kec. Sukun, Kota Malang, Jawa Timur 65149</li>
                            <li class="ec-contact-item align-items-center">
                                <i class="ecicon eci-phone"aria-hidden="true"></i>
                                <span>Call Us :</span><a href="tel:+440123456789">+44 0123 456 789</a></li>
                            <li class="ec-contact-item align-items-center"><i class="ecicon eci-envelope"
                                                                              aria-hidden="true"></i><span>Email :</span><a
                                    href="mailto:example@ec-email.com">example@ec-email.com</a></li>
                        </ul>
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
