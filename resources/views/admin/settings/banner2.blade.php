@extends('layouts.admin')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                            <li class="breadcrumb-item active">Banner1 Setting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Banner2 Setting</h4>
                </div>
            </div>
        </div>
        @include('admin.includes.flash-message')
        <!-- end page title -->

    </div> <!-- container -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="accountForm" method="POST"
                        action="{{ route('admin.settings.banner2') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group mb-2 {{ $errors->has('banner2_title') ? 'has-error' : '' }}">
                            <label for="banner2_title">Banner Title</label>
                            <input type="text" class="form-control" id="banner2_title" name="banner2_title"
                                placeholder="Enter Banner Title" value="{{ old('banner2_title', $setting->banner2_title) }}">
                            @error('banner2_title')
                                <span id="banner2_title-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('banner2_description') ? 'has-error' : '' }}">
                            <label for="banner2_description">Banner Description</label>
                            <textarea type="text" class="form-control" id="banner2_description" name="banner2_description"
                                placeholder="Enter Banner Title">{{ old('banner2_description', $setting->banner2_description) }}</textarea>
                            @error('banner2_description')
                                <span id="banner2_description-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('banner2_button_text') ? 'has-error' : '' }}">
                            <label for="banner2_button_text">Banner Button Text</label>
                            <input type="text" class="form-control" id="banner2_button_text" name="banner2_button_text"
                                placeholder="Enter Banner Button Text" value="{{ old('banner2_button_text', $setting->banner2_button_text) }}">
                            @error('banner2_button_text')
                                <span id="banner2_button_text-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('banner2_button_bg_color') ? 'has-error' : '' }}">
                            <label for="banner2_button_bg_color">Button Bg Color</label>
                            <input type="color" class="form-control" id="banner2_button_bg_color" name="banner2_button_bg_color"
                                placeholder="Enter Button Bg Color" value="{{ old('banner2_button_bg_color', $setting->banner2_button_bg_color) }}">
                            @error('banner2_button_bg_color')
                                <span id="banner2_button_bg_color-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('banner2_button_text_color') ? 'has-error' : '' }}">
                            <label for="banner2_button_text_color">Button Text Color</label>
                            <input type="color" class="form-control" id="banner2_button_text_color" name="banner2_button_text_color"
                                placeholder="Enter Button Text Color" value="{{ old('banner2_button_text_color', $setting->banner2_button_text_color) }}">
                            @error('banner2_button_text_color')
                                <span id="banner2_button_text_color-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="banner2_image">Banner Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="banner2_image" name="banner2_image"
                                onchange="loadPreview(this);">
                            </div>
                            @if ($errors->has('banner2_image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('banner2_image') }}</strong>
                                </span>
                            @endif
                            <img id="preview_img" src="{{ asset('storage/uploads/settings/banner2/'.$setting->banner2_image) }}" class="mt-2" width="100"
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
