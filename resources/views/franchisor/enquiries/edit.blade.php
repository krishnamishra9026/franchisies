@extends('layouts.franchisor')
@section('title', 'Edit Enquiry')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('franchisor.enquiries.index') }}">Enquiries</a>
                            </li>
                            <li class="breadcrumb-item active">Enquiry Detail</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Enquiry Detail</h4>
                </div>
            </div>
        </div>
        @include('franchisor.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" id="enquiriesEditForm" action="{{ route('franchisor.enquiries.update', $enquiry->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('franchisor.enquiries.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                {{-- <button type="submit" class="btn btn-sm btn-success" form="enquiriesEditForm">Save</button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-12 mb-2">
                                <label for="raised_date" class="form-label">Raised date </label>
                                <input type="text" class="form-control" readonly raised_date="raised_date" value="{{ old('raised_date',$enquiry->created_at) }}" placeholder="Enter Raised date">
                                @error('raised_date')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>
                            
                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Name </label>
                                <input type="text" class="form-control" readonly name="name" value="{{ old('name',$enquiry->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="email" class="form-label">Email </label>
                                <input type="text" class="form-control" readonly name="email" value="{{ old('email',$enquiry->email) }}" placeholder="Enter Email">
                                @error('email')
                                    <code id="email-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            @if($enquiry->price && $enquiry->price > 0)
                            <div class="col-md-12 mb-2">
                                <label for="price" class="form-label">Offer Price </label>
                                <textarea type="text" class="form-control" readonly name="price" placeholder="Query">{{ old('price',$enquiry->price) }}</textarea>
                                @error('price')
                                    <code id="price-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>
                            @endif


                            <div class="col-md-12 mb-2">
                                <label for="query" class="form-label">Query </label>
                                <textarea type="text" class="form-control" readonly name="query" placeholder="Query">{{ old('query',$enquiry->query) }}</textarea>
                                @error('query')
                                    <code id="query-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="brand_name" class="form-label">Brand Name </label>
                                <textarea type="text" class="form-control" readonly name="brand_name" placeholder="Brand Name">{{ old('brand_name',$enquiry->brand_name) }}</textarea>
                                @error('brand_name')
                                    <code id="brand_name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="available_slot" class="form-label">Available Slot </label>
                                <textarea type="text" class="form-control" readonly name="available_slot" placeholder="Available Slot">{{ old('available_slot',$enquiry->available_slot) }}</textarea>
                                @error('available_slot')
                                    <code id="available_slot-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="category" class="form-label">Category </label>
                                <textarea type="text" class="form-control" readonly name="category" placeholder="Category">{{ old('category',$enquiry->category) }}</textarea>
                                @error('category')
                                    <code id="category-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="city" class="form-label">City </label>
                                <textarea type="text" class="form-control" readonly name="city" placeholder="City">{{ old('city',$enquiry->city) }}</textarea>
                                @error('city')
                                    <code id="city-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }} mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">State</label>
                                    <input type="text" required class="form-control" readonly value="{{ old('state', $enquiry->state) }}" name="state">
                                </div>


                                <div class="form-group {{ $errors->has('brandagreement') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">Have standard Brand Agreement</label>
                                    <div class="col-sm-12">
                                        <input id="brandagreement" type="radio" value="Yes" @if($enquiry->brandagreement == 'Yes') checked @endif  name="brandagreement" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                        <input id="brandagreement" type="radio" value="No" @if($enquiry->brandagreement == 'No') checked @endif  name="brandagreement"  style=" margin:10px 0 0;"  > &nbsp;&nbsp;No
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('business_experience') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">Do you have any experience in operating similar business</label>
                                    <div class="col-sm-12">
                                        <input id="business_experience" type="radio" value="Yes" @if($enquiry->business_experience == 'Yes') checked @endif  name="business_experience" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                        <input id="business_experience" type="radio" value="No" @if($enquiry->business_experience == 'No') checked @endif  name="business_experience"  style=" margin:10px 0 0;"  > &nbsp;&nbsp;No
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('investment_range') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">Investment Range</label>
                                    <div class="col-sm-12">
                                        <input id="investment_range" type="radio" value="Below 3 Lacs"  @if($enquiry->investment_range == 'Below 3 Lacs') checked @endif   name="investment_range" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Below 3 Lacs  &nbsp;&nbsp;
                                        <input id="investment_range" type="radio" value="3 to 5 Lacs" @if($enquiry->investment_range == '3 to 5 Lacs') checked @endif  name="investment_range"  style=" margin:10px 0 0;"  > &nbsp;&nbsp;3 to 5 Lacs
                                        <input id="investment_range" type="radio" value="5 Lacs+" @if($enquiry->investment_range == '5 Lacs+') checked @endif  name="investment_range"  style=" margin:10px 0 0;"  > &nbsp;&nbsp;5 Lacs+
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('associate_time') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">How soon do you want to associate:</label>
                                    <div class="col-sm-12">
                                        <input id="associate_time" type="radio" value="Immediately"  @if($enquiry->associate_time == 'Immediately') checked @endif   name="associate_time" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Immediately &nbsp;&nbsp;
                                        <input id="associate_time" type="radio" value="Within 3 Months" @if($enquiry->associate_time == 'Within 3 Months') checked @endif  name="associate_time"  style=" margin:10px 0 0;"  > &nbsp;&nbsp;Within 3 Months
                                        <input id="associate_time" type="radio" value="After 3 Months"  @if($enquiry->associate_time == 'After 3 Months') checked @endif name="associate_time"  style=" margin:10px 0 0;"  > &nbsp;&nbsp;After 3 Months
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('how_to_know_me') ? 'has-error' : '' }} mb-2">
                                    <label for="basicText" class="form-label">How did you get to know about FranchiseBazaar partnership program:</label>
                                    <div class="col-sm-12">
                                        <input id="how_to_know_me" type="radio" value="Social Media"  @if($enquiry->how_to_know_me == 'Social Media') checked @endif   name="how_to_know_me" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Social Media &nbsp;&nbsp;
                                        <input id="how_to_know_me" type="radio" value="Referral"  @if($enquiry->how_to_know_me == 'Referral') checked @endif name="how_to_know_me"  style=" margin:10px 0 0;"  > &nbsp;&nbsp;Referral
                                        <input id="how_to_know_me" type="radio" value="Webinars"  @if($enquiry->how_to_know_me == 'Webinars') checked @endif name="how_to_know_me"  style=" margin:10px 0 0;"  > &nbsp;&nbsp;Webinars
                                        <input id="how_to_know_me" type="radio" value="Partner Companies"   @if($enquiry->how_to_know_me == 'Partner Companies') checked @endif name="how_to_know_me" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Partner Companies &nbsp;&nbsp;
                                        <input id="how_to_know_me" type="radio" value="Newspaper"  @if($enquiry->how_to_know_me == 'Newspaper') checked @endif name="how_to_know_me"  style=" margin:10px 0 0;"  > &nbsp;&nbsp;Newspaper
                                        <input id="how_to_know_me" type="radio" value="TV Advertisement"  @if($enquiry->how_to_know_me == 'TV Advertisement') checked @endif name="how_to_know_me"  style=" margin:10px 0 0;"  > &nbsp;&nbsp;TV Advertisement                                        
                                        <input id="how_to_know_me" type="radio" value="Others"  @if($enquiry->how_to_know_me == 'Others') checked @endif name="how_to_know_me"  style=" margin:10px 0 0;"  > &nbsp;&nbsp;Others
                                    </div>

           
                            
                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" disabled id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $enquiry->status) == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status', $enquiry->status) == 0 ) selected @endif value="0">Disable</option>
                                </select>
                                @error('status')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
