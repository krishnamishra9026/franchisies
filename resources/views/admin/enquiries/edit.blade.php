@extends('layouts.admin')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.enquiries.index') }}">Enquiries</a>
                            </li>
                            <li class="breadcrumb-item active">Enquiry Detail</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Enquiry Detail</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" id="enquiriesEditForm" action="{{ route('admin.enquiries.update', $enquiry->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.enquiries.index') }}" class="btn btn-sm btn-dark">Cancel</a>
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
