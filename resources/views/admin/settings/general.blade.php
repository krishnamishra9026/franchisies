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
                            <li class="breadcrumb-item active">Website Setting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Website Setting</h4>
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
                        action="{{ route('admin.website-settings.update', $setting->id) }}" enctype="multipart/form-data">
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

                        <div class="form-group mb-2 {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                placeholder="Enter Meta Title" value="{{ old('meta_title', $setting->meta_title) }}">
                            @error('meta_title')
                                <span id="meta_title-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                            <label for="meta_description">Meta Description</label>
                            <textarea type="text" class="form-control" id="meta_description" name="meta_description"
                                placeholder="Enter Meta Description">{{ old('meta_description', $setting->meta_description) }}</textarea>
                            @error('meta_description')
                                <span id="meta_description-error" class="error invalid-feedback">{{ $message }}</span>
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
