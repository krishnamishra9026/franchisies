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
                            <li class="breadcrumb-item active">Website Setting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Website Setting</h4>
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
                        action="{{ route('franchisor.website-settings.update', $setting->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="logo">Logo</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="logo" name="logo"
                                onchange="loadPreview(this);">
                            </div>
                            @if ($errors->has('logo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('logo') }}</strong>
                                </span>
                            @endif

                            <img id="preview_img" src="{{ asset('storage/uploads/logo/'.$setting->logo) }}" class="mt-2" width="100"
                                height="100" />
                        </div>

                        <div class="form-group mb-2 {{ $errors->has('copyright_text') ? 'has-error' : '' }}">
                            <label for="copyright_text">Copyright text</label>
                            <input type="text" class="form-control" id="copyright_text" name="copyright_text"
                                placeholder="Enter Copyright text" value="{{ old('copyright_text', $setting->copyright_text) }}">
                            @error('copyright_text')
                                <span id="copyright_text-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('facebook_link') ? 'has-error' : '' }}">
                            <label for="facebook_link">Facebook link</label>
                            <input type="text" class="form-control" id="facebook_link" name="facebook_link"
                                placeholder="Enter Facebook link" value="{{ old('facebook_link', $setting->facebook_link) }}">
                            @error('facebook_link')
                                <span id="facebook_link-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('instagram_link') ? 'has-error' : '' }}">
                            <label for="instagram_link">Instagram link</label>
                            <input type="text" class="form-control" id="instagram_link" name="instagram_link"
                                placeholder="Enter Instagram link" value="{{ old('instagram_link', $setting->instagram_link) }}">
                            @error('instagram_link')
                                <span id="instagram_link-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('youtube_link') ? 'has-error' : '' }}">
                            <label for="youtube_link">Youtube link</label>
                            <input type="text" class="form-control" id="youtube_link" name="youtube_link"
                                placeholder="Enter Youtube link" value="{{ old('youtube_link', $setting->youtube_link) }}">
                            @error('youtube_link')
                                <span id="youtube_link-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>                        


                        <div class="form-group mb-2 {{ $errors->has('tiktok_link') ? 'has-error' : '' }}">
                            <label for="tiktok_link">Tiktok link</label>
                            <input type="text" class="form-control" id="tiktok_link" name="tiktok_link"
                                placeholder="Enter Tiktok link" value="{{ old('tiktok_link', $setting->tiktok_link) }}">
                            @error('tiktok_link')
                                <span id="tiktok_link-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('twitter_link') ? 'has-error' : '' }}">
                            <label for="twitter_link">Twitter link</label>
                            <input type="text" class="form-control" id="twitter_link" name="twitter_link"
                                placeholder="Enter Twitter link" value="{{ old('twitter_link', $setting->twitter_link) }}">
                            @error('twitter_link')
                                <span id="twitter_link-error" class="error invalid-feedback">{{ $message }}</span>
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
