@extends('layouts.app')
@section('title', 'Support and Assistant | Franchisee Bazaar')
@section('description', 'Need to get in touch? Contact us to get help with any questions or feedback you have with us | Franchisee Bazaar')
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

                            <div class="row">

                                <div class="col-sm-6">

                                    @if(isset($setting->image))
                                    <img src="{{ asset('storage/uploads/image/'.$setting->image) }}" class="img-fluid img-responsive w-100 p-3">
                                    @else
                                    <img src="{{ asset('assets/images/h5_hard.png') }}" class="img-fluid img-responsive w-100 p-3">
                                    @endif

                                </div>

                            <form class="row col-md-6" method="POST" action="{{ route('save-become-state-partner') }}" id="contactForm">
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
                                        <input id="brandagreement" type="radio" value="Yes"   name="brandagreement" style=" margin:10px 0 0;"  > &nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="brandagreement" type="radio" value="No"  name="brandagreement"  style=" margin:10px 0 0;"  checked > &nbsp;No
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('business_experience') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">Do you have any experience in operating similar business</label>
                                    <div class="col-sm-12">
                                        <input id="business_experience" type="radio" value="Yes"   name="business_experience" style=" margin:10px 0 0;"  > &nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="business_experience" type="radio" value="No"  name="business_experience"  style=" margin:10px 0 0;"  checked > &nbsp;No
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('investment_range') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">Investment Range</label>
                                    <div class="col-sm-12">
                                        <input id="investment_range" type="radio" value="Below 3 Lacs "   name="investment_range" style=" margin:10px 0 0;"  > &nbsp;Below 3 Lacs  &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="investment_range" type="radio" value="3 to 5 Lacs"  name="investment_range"  style=" margin:10px 0 0;"  checked > &nbsp;3 to 5 Lacs &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="investment_range" type="radio" value="5 Lacs+"  name="investment_range"  style=" margin:10px 0 0;"  checked > &nbsp;5 Lacs+
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('associate_time') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">How soon do you want to associate:</label>
                                    <div class="col-sm-12">
                                        <input id="associate_time" type="radio" value="Immediately"   name="associate_time" style=" margin:10px 0 0;"  > &nbsp;Immediately &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="associate_time" type="radio" value="Within 3 Months"  name="associate_time"  style=" margin:10px 0 0;"  checked > &nbsp;Within 3 Months &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="associate_time" type="radio" value="After 3 Months"  name="associate_time"  style=" margin:10px 0 0;"  checked > &nbsp;After 3 Months
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('how_to_know_me') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">How did you get to know about FranchiseBazaar partnership program:</label>
                                    <div class="col-sm-12">
                                        <input id="how_to_know_me" type="radio" value="Social Media"   name="how_to_know_me" style=" margin:10px 0 0;"  > &nbsp;Social Media &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="how_to_know_me" type="radio" value="Referral"  name="how_to_know_me"  style=" margin:10px 0 0;"  checked > &nbsp;Referral &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="how_to_know_me" type="radio" value="Webinars"  name="how_to_know_me"  style=" margin:10px 0 0;"  checked > &nbsp;Webinars &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="how_to_know_me" type="radio" value="Partner Companies"   name="how_to_know_me" style=" margin:10px 0 0;"  > &nbsp;Partner Companies &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
                                        <input id="how_to_know_me" type="radio" value="Newspaper"  name="how_to_know_me"  style=" margin:10px 0 0;"  checked > &nbsp;Newspaper &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="how_to_know_me" type="radio" value="TV Advertisement"  name="how_to_know_me"  style=" margin:10px 0 0;"  checked > &nbsp;TV Advertisement  &nbsp;&nbsp;&nbsp;&nbsp;                                      
                                        <input id="how_to_know_me" type="radio" value="Others"  name="how_to_know_me"  style=" margin:10px 0 0;"  checked > &nbsp;Others
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
    </div>
@endsection

@push('scripts')
@endpush
