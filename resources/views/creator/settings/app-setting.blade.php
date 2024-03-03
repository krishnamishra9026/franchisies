@extends('layouts.creator')
@section('title', 'App Setting')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('creator.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                            <li class="breadcrumb-item active">App Setting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">App Setting</h4>
                </div>
            </div>
        </div>
        @include('creator.includes.flash-message')
        <!-- end page title -->

    </div> <!-- container -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="accountForm" method="POST"
                        action="{{ route('creator.app-settings.update', Auth::guard('creator')->id()) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2 {{ $errors->has('instagram_username') ? 'has-error' : '' }}">
                            <label for="instagram_username">Instagram Username</label>
                            <input type="text" class="form-control" id="instagram_username" name="instagram_username"
                                placeholder="Enter Instagram Username" value="{{ old('instagram_username', $app_setting->instagram_username) }}">
                            @error('instagram_username')
                                <span id="instagram_username-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('youtube_api_key') ? 'has-error' : '' }}">
                            <label for="youtube_api_key">Youtube Api Key</label>
                            <input type="text" class="form-control" id="youtube_api_key" name="youtube_api_key"
                                placeholder="Enter Youtube Api Key" value="{{ old('youtube_api_key', $app_setting->youtube_api_key) }}">
                            @error('youtube_api_key')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <p><a href="https://console.cloud.google.com/apis/credentials">Link to Get Youtube Api Key</a> </p>

                        <div class="form-group mb-2 {{ $errors->has('tiktok_license_key') ? 'has-error' : '' }}">
                            <label for="tiktok_license_key">Tiktok License Key</label>
                            <input type="tiktok_license_key" class="form-control" id="tiktok_license_key" name="tiktok_license_key"
                                placeholder="Enter Tiktok License Key" value="{{ old('tiktok_license_key', $app_setting->tiktok_license_key) }}">
                            @error('tiktok_license_key')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <p><a href="https://nextpost.tech/downloads/tiktok-rest-api/">Link to Get Tiktok License Key</a> </p>
                        <p><a href="https://apipheny.io/tiktok-api/">Link to Tiktok App Creation</a> </p>

                        <div class="form-group mb-2 {{ $errors->has('tiktok_username') ? 'has-error' : '' }}">
                            <label for="tiktok_username">tiktok Username</label>
                            <input type="text" class="form-control" id="tiktok_username" name="tiktok_username"
                                placeholder="Enter tiktok Username" value="{{ old('tiktok_username', $app_setting->tiktok_username) }}">
                            @error('tiktok_username')
                                <span id="tiktok_username-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
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
