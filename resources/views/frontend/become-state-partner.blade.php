@extends('layouts.app')
@section('title', 'Support and Assistant | winwinpromo')
@section('description', 'Need to get in touch? Contact us to get help with any questions or feedback you have with us | winwinpromo')
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
                            <h1>Become State Partner</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contactus">
            <div class="container">


                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="contactform BoxShadow formstyle">
                            <h2>Become State Partner</h2>

                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('save-become-state-partner') }}" id="contactForm">
                                @csrf
                                @method('POST')
                                <input type="hidden" value="become_state_partner" name="form_type">
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

                                <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }} mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">State</label>
                                    <input type="text" required class="form-control" value="{{ old('state') }}" name="state">
                                </div>


                                <div style="display: none;" class="form-group {{ $errors->has('brandagreement') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">Have standard Brand Agreement</label>
                                    <div class="col-sm-12">
                                        <input id="brandagreement" type="radio" value="Yes"   name="brandagreement" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                        <input id="brandagreement" type="radio" value="No"  name="brandagreement"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('business_experience') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">Do you have any experience in operating similar business</label>
                                    <div class="col-sm-12">
                                        <input id="business_experience" type="radio" value="Yes"   name="business_experience" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                        <input id="business_experience" type="radio" value="No"  name="business_experience"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('investment_range') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">Investment Range</label>
                                    <div class="col-sm-12">
                                        <input id="investment_range" type="radio" value="Below 3 Lacs "   name="investment_range" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Below 3 Lacs  &nbsp;&nbsp;
                                        <input id="investment_range" type="radio" value="3 to 5 Lacs"  name="investment_range"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;3 to 5 Lacs
                                        <input id="investment_range" type="radio" value="5 Lacs+"  name="investment_range"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;5 Lacs+
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('associate_time') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">How soon do you want to associate:</label>
                                    <div class="col-sm-12">
                                        <input id="associate_time" type="radio" value="Immediately"   name="associate_time" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Immediately &nbsp;&nbsp;
                                        <input id="associate_time" type="radio" value="Within 3 Months"  name="associate_time"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;Within 3 Months
                                        <input id="associate_time" type="radio" value="After 3 Months"  name="associate_time"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;After 3 Months
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('how_to_know_me') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">How did you get to know about FranchiseBazaar partnership program:</label>
                                    <div class="col-sm-12">
                                        <input id="how_to_know_me" type="radio" value="Social Media"   name="how_to_know_me" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Social Media &nbsp;&nbsp;
                                        <input id="how_to_know_me" type="radio" value="Referral"  name="how_to_know_me"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;Referral
                                        <input id="how_to_know_me" type="radio" value="Webinars"  name="how_to_know_me"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;Webinars
                                        <input id="how_to_know_me" type="radio" value="Partner Companies"   name="how_to_know_me" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Partner Companies &nbsp;&nbsp;
                                        <input id="how_to_know_me" type="radio" value="Newspaper"  name="how_to_know_me"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;Newspaper
                                        <input id="how_to_know_me" type="radio" value="TV Advertisement"  name="how_to_know_me"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;TV Advertisement                                        
                                        <input id="how_to_know_me" type="radio" value="Others"  name="how_to_know_me"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;Others
                                    </div>
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
