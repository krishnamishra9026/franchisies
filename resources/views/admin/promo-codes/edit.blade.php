@extends('layouts.admin')
@section('title', 'Edit Promo Code')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.promo-codes.index') }}">Promo Codes</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Promo Code </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit  Promo Code </h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" id="reviewsEditForm" action="{{ route('admin.promo-codes.update', $promo_code->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.promo-codes.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="reviewsEditForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-12 mb-2">
                                <label for="code" class="form-label">Code </label>
                                <input type="text" class="form-control" name="code" value="{{ old('code', $promo_code->code) }}" placeholder="Enter COde">
                                @error('code')
                                    <code id="code-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="valid_from_date" class="form-label">Valid From Date </label>
                                <input type="date" class="form-control" name="valid_from_date" value="{{ old('valid_from_date', $promo_code->valid_from_date) }}" placeholder="Enter Valid From Date">
                                @error('valid_from_date')
                                    <code id="valid_from_date-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="valid_to_date" class="form-label">Valid To Date </label>
                                <input type="date" class="form-control" name="valid_to_date" value="{{ old('valid_to_date', $promo_code->valid_to_date) }}" placeholder="Enter Valid To Date">
                                @error('valid_to_date')
                                    <code id="valid_to_date-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="type" class="form-label">Coupon Type </label>
                                <select class="form-control" name="type">
                                    <option value="">Select</option>
                                    <option @if(old('type',$promo_code->type) == 'fixed') selected @endif value="fixed">Fixed</option>
                                    <option @if(old('type',$promo_code->type) == 'percent') selected @endif value="percent">Percent</option>
                                </select>
                                @error('type')  <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="type" class="form-label">Type </label>
                                <label for="value" class="form-label">Coupon Value </label>
                                    <input type="text" placeholder="Coupon Value" name="value" value="{{ old('value', $promo_code->value) }}" class="form-control" />                                    
                                    @error('value')  <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="no_of_uses" class="form-label">No. of uses</label>
                                <input type="number" id="no_of_uses" class="form-control" placeholder="Enter No. of uses" name="no_of_uses" value="{{ old('no_of_uses', $promo_code->no_of_uses) }}" >
                            </div>

           
                            
                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $promo_code->status) == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status', $promo_code->status) == 0 ) selected @endif value="0">Disable</option>
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
