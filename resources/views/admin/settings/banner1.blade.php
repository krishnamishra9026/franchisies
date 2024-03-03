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
                    <h4 class="page-title">Banner1 Setting</h4>
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
                        action="{{ route('admin.settings.banner1') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group mb-2 {{ $errors->has('banner1_title') ? 'has-error' : '' }}">
                            <label for="banner1_title">Banner Title</label>
                            <input type="text" class="form-control" id="banner1_title" name="banner1_title"
                                placeholder="Enter Banner Title" value="{{ old('banner1_title', $setting->banner1_title) }}">
                            @error('banner1_title')
                                <span id="banner1_title-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('banner1_button_text') ? 'has-error' : '' }}">
                            <label for="banner1_button_text">Banner Button Text</label>
                            <input type="text" class="form-control" id="banner1_button_text" name="banner1_button_text"
                                placeholder="Enter Banner Button Text" value="{{ old('banner1_button_text', $setting->banner1_button_text) }}">
                            @error('banner1_button_text')
                                <span id="banner1_button_text-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('banner1_button_bg_color') ? 'has-error' : '' }}">
                            <label for="banner1_button_bg_color">Button Bg Color</label>
                            <input type="color" class="form-control" id="banner1_button_bg_color" name="banner1_button_bg_color"
                                placeholder="Enter Button Bg Color" value="{{ old('banner1_button_bg_color', $setting->banner1_button_bg_color) }}">
                            @error('banner1_button_bg_color')
                                <span id="banner1_button_bg_color-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('banner1_button_text_color') ? 'has-error' : '' }}">
                            <label for="banner1_button_text_color">Button Text Color</label>
                            <input type="color" class="form-control" id="banner1_button_text_color" name="banner1_button_text_color"
                                placeholder="Enter Button Text Color" value="{{ old('banner1_button_text_color', $setting->banner1_button_text_color) }}">
                            @error('banner1_button_text_color')
                                <span id="banner1_button_text_color-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="banner1_image">Banner Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="banner1_image" name="banner1_image"
                                onchange="loadPreview(this);">
                            </div>
                            @if ($errors->has('banner1_image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('banner1_image') }}</strong>
                                </span>
                            @endif
                            <img id="preview_img" src="{{ asset('storage/uploads/settings/banner1/'.$setting->banner1_image) }}" class="mt-2" width="100"
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
