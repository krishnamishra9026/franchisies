@extends('layouts.admin')
@section('title', 'Content Management')
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Content Management</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Contact</h4>
                </div>
            </div>
        </div>
        @include('admin.includes.flash-message')
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="accountForm" method="POST"
                        action="{{ route('admin.contact-setting.update', Auth::guard('administrator')->id()) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                            <div class="form-group mb-2 {{ $errors->has('header') ? 'has-error' : '' }} ">
                                <label for="meta_title">Heading</label>
                                <input type="text" class="form-control" id="header" value="{{ old('header', $setting->header) }}" name="header"
                                    placeholder="Enter Heading">
                                @error('header')
                                    <span id="Heading-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-2 {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="meta_description">Description</label>
                                <textarea type="text" rows="4" cols="4" class="form-control" id="description" name="description"  id="description" name="description"
                                    placeholder="Enter Description">{{ old('description', $setting->description) }}</textarea>
                                @error('description')
                                    <span id="description-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="banner">Banner</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="banner" name="banner"
                                    onchange="loadPreview(this);">
                                </div>
                                @if ($errors->has('banner'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('banner') }}</strong>
                                </span>
                                @endif
                                <img id="preview_img" src="{{ asset('storage/uploads/banner/'. $setting->banner) }}" class="mt-2" width="100"
                                height="100" />
                            </div>


                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="image" name="image"
                                    onchange="loadPreviewImage(this);">
                                </div>
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                                <img id="preview_img_image" src="{{ asset('storage/uploads/image/'. $setting->image) }}" class="mt-2" width="100"
                                height="100" />
                            </div>

                            <div class="form-group mb-2 {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="meta_description">Support Email </label>
                                <input type="text" class="form-control" id="email" value="{{ old('email', $setting->email) }}" name="email"
                                    placeholder="Enter Support Email">
                                @error('support_email')
                                    <span id="support_email-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-2 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label for="meta_description">Support Phone Number </label>
                                <input type="number" class="form-control" id="phone" value="{{ old('phone', $setting->phone) }}" name="phone" placeholder="Enter Support Phone Number">
                                @error('phone')
                                    <span id="phone-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </form>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" form="accountForm" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->

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

    <script>
        function loadPreviewImage(input, id) {
            id = id || '#preview_img_image';
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
