@extends('layouts.admin')
@section('title', 'Add Package')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.packages.index') }}">Packages</a>
                            </li>
                            <li class="breadcrumb-item active">Add Package</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Package</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" action="{{ route('admin.packages.store') }}" id="content_typesForm"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.packages.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="content_typesForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 mb-2">
                                <label for="user_type" class="form-label">User type</label>
                                <select class="form-control" name="user_type" id="example-select">
                                    <option value="">Select user type</option>
                                    <option @if(old('user_type') == 'Sponsor' ) selected @endif value="Sponsor">Sponsor</option>
                                    <option @if(old('user_type') == 'Creator' ) selected @endif value="Creator">Creator</option>
                                </select>
                                @error('user_type')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                             
                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Name </label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                @error('name')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="description" class="form-label">Features (description) </label>
                                <textarea type="text" class="form-control" name="description" placeholder="Enter Features (description)">{{ old('description') }}</textarea>
                                @error('description')
                                    <code id="description-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                           <div class="col-md-12 mb-2">
                                <label for="monthly_price" class="form-label">Monthly Price </label>
                                <input type="text" class="form-control" name="monthly_price" value="{{ old('monthly_price') }}" placeholder="Enter Monthly Price">
                                @error('monthly_price')
                                    <code id="monthly_price-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="quarterly_price" class="form-label">Quarterly Price </label>
                                <input type="text" class="form-control" name="quarterly_price" value="{{ old('quarterly_price') }}" placeholder="Enter Quarterly Price">
                                @error('quarterly_price')
                                    <code id="quarterly_price-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="half_yearly_price" class="form-label">Half Yearly Price </label>
                                <input type="text" class="form-control" name="half_yearly_price" value="{{ old('half_yearly_price') }}" placeholder="Enter Half Yearly Price">
                                @error('half_yearly_price')
                                    <code id="half_yearly_price-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="yearly_price" class="form-label">Yearly Price </label>
                                <input type="text" class="form-control" name="yearly_price" value="{{ old('yearly_price') }}" placeholder="Enter Yearly Price">
                                @error('yearly_price')
                                    <code id="yearly_price-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status') == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status') == 0 ) selected @endif value="0">Disable</option>
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
