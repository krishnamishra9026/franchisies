@extends('layouts.franchisor')
@section('title', 'My Account')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('franchisor.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                            <li class="breadcrumb-item active">My Account</li>
                        </ol>
                    </div>
                    <h4 class="page-title">My Account</h4>
                </div>
            </div>
        </div>
        @include('franchisor.includes.flash-message')
        <!-- end page title -->

    </div> <!-- container -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="accountForm" method="POST"
                        action="{{ route('franchisor.my-account.update', Auth::guard('franchisor')->id()) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2 {{ $errors->has('firstname') ? 'has-error' : '' }}">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                placeholder="Enter First Name" value="{{ old('firstname', $franchisor->firstname) }}">
                            @error('firstname')
                                <span id="firstname-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2 {{ $errors->has('lastname') ? 'has-error' : '' }}">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                placeholder="Enter Last Name" value="{{ old('lastname', $franchisor->lastname) }}">
                            @error('lastname')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2 {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email Address" value="{{ old('email', $franchisor->email) }}">
                            @error('email')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2 {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter Phone Number" value="{{ old('phone', $franchisor->phone) }}">
                            @error('phone')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2 {{ $errors->has('brand') ? 'has-error' : '' }}">
                            <label for="brand">Brand</label>
                            <input type="text" class="form-control" id="brand" name="brand"
                                placeholder="Enter Last Name" value="{{ old('brand', $franchisor->brand) }}">
                            @error('brand')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="avatar">Profile Picture</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="avatar" name="avatar"
                                onchange="loadPreview(this);">
                            </div>
                            @if ($errors->has('avatar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                            @endif
                            <img id="preview_img" src="{{ $franchisor->avatar }}" class="mt-2" width="100"
                                height="100" />
                        </div>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success" form="accountForm">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id)
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
