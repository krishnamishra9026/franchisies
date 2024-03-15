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
                            <li class="breadcrumb-item active">Home Banner</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Home Banner</h4>
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
                    <form id="accountForm" method="POST"  action="{{ route('admin.settings.homebanner') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group mb-2">
                            <label for="banner_title" class="mb-1">Title</label>
                            <input type="text" class="form-control" id="banner_title" name="banner_title"
                                placeholder="Enter Banner Title" value="{{ old('banner_title', $homebanner->banner_title) }}">
                            @error('banner_title')
                                <span id="banner_title-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="search_placeholder" class="mb-1">Search Placeholder</label>
                            <input type="text" class="form-control" id="search_placeholder" name="search_placeholder"
                                placeholder="Enter Search placeholder" value="{{ old('search_placeholder', $homebanner->search_placeholder) }}">
                            @error('search_placeholder')
                                <span id="search_placeholder-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="search_button_background" class="mb-1">Search Button Background</label>
                            <input type="color" class="form-control" value="{{ old('search_button_background', $homebanner->search_button_background ?? '#814E81') }}" id="search_button_background" name="search_button_background">
                            @error('search_button_background')
                                <span id="search_button_background-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="background_image" class="mb-1">Upload Background image </label>
                            <div class="imagesize"><i>(Image Size 1920 x 712)</i></div>
                            <input type="file" class="form-control" id="background_image" value="{{ old('background_image', $homebanner->background_image) }}" name="background_image">
                            @error('background_image')
                                <span id="background_image-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                            @if(isset($homebanner->background_image))
                            <br>
                                <img height="55" src="{{ asset('storage/uploads/homebanner/'.$homebanner->background_image) }}">
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="mobile_background_image" class="mb-1">Upload Mobile Background image</label>
                            <input type="file" class="form-control" id="mobile_background_image" value="{{ old('mobile_background_image', $homebanner->mobile_background_image) }}" name="mobile_background_image">
                            @error('background-image')
                                <span id="mobile_background_image-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                             @if(isset($homebanner->mobile_background_image))
                             <br>
                                <img height="55" src="{{ asset('storage/uploads/homebanner/'.$homebanner->mobile_background_image) }}">
                            @endif
                        </div>

                        <div class="form-group mb-2">
                            <label for="modal_image" class="mb-1">Upload Mobile Background image</label>
                            <input type="file" class="form-control" id="modal_image" value="{{ old('modal_image', $homebanner->modal_image) }}" name="modal_image">
                            @error('background-image')
                                <span id="modal_image-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                             @if(isset($homebanner->modal_image))
                             <br>
                                <img height="55" src="{{ asset('storage/uploads/homebanner/'.$homebanner->modal_image) }}">
                            @endif
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
