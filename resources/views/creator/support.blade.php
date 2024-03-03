@extends('layouts.creator')
@section('title', 'Welcome to Collab Marketplace Contact Us')
@php
$setting =  \App\Models\WebsiteContactSetting::first();
@endphp

@section('content')
    <div class="support">
        @if(isset($setting->banner))
        <div class="supportbanner" style="background: url('{{ asset('storage/uploads/banner/'.$setting->banner) }}')">
            @else
            <div class="supportbanner" style="background: url('{{ asset('assets/images/frontend/hero-contact.jpg') }}')">
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="supportinfo">
                            <h1>{{ $setting->header ?? 'Contact Us' }}</h1>
                            <p>{{ $setting->description ?? 'The best way to reach our team is via online form or by email. We will get back to you as soon as possible.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contactus">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-xs-12">
                        <div class="contact-grid">
                            <img src="{{ asset('assets/images/frontend/icons/outline-email.png') }}" class="icons" alt="Support">
                            <h4>Support</h4>
                            <p><a href="mailto:{{ $setting->email ?? 'support@gmail.com' }}">{{ $setting->email ?? 'support@gmail.com' }}</a></p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="contact-grid">
                            <img src="{{ asset('assets/images/frontend/icons/call.png') }}" class="icons" alt="Enquiry">
                            <h4>Enquiry</h4>
                            <a href="tel:{{ $setting->phone ?? '+910123456789' }}"> {{ $setting->phone ?? '+91- 0123456789' }}</a>
                        </div>
                    </div>
                    {{--  <div class="col-sm-4 col-xs-12">
                        <div class="contact-grid">
                            <img src="{{ asset('assets/images/frontend/icons/cmap.png') }}" class="icons" alt="Address">
                            <h4>Address</h4>
                            <p>Lorem Ipsum is simply dummy text</p>
                        </div>
                    </div>  --}}
                </div>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="contactform BoxShadow formstyle">
                            <h2>Get in touch with us</h2>

                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('save-conatct-us') }}" id="contactForm">
                                @csrf
                                @method('POST')
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input type="text" required class="form-control" value="{{ old('name') }}" name="name">
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" required class="form-control" value="{{ old('email') }}" name="email">
                                </div>
                                <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }} mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                                    <input type="number" required class="form-control" value="{{ old('mobile') }}" name="mobile">
                                </div>
                                <div class="form-group {{ $errors->has('query') ? 'has-error' : '' }} mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Your Enquiry</label>
                                    <textarea class="form-control" required rows="5" name="query">{{ old('query') }}</textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@push('scripts')
@endpush
