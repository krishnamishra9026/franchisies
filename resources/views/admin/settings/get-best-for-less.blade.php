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
                            <li class="breadcrumb-item active">Get the best for less</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Get the best for less</h4>
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
                        action="{{ route('admin.settings.get-best-for-less') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group mb-2 {{ $errors->has('title1') ? 'has-error' : '' }}">
                            <label for="title1">Section 1 Title</label>
                            <input type="text" class="form-control" id="title1" name="title1"
                                placeholder="Enter Section 1 Title" value="{{ old('title1', $setting->title1) }}">
                            @error('title1')
                                <span id="title1-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        

                        <div class="form-group mb-2 {{ $errors->has('title2') ? 'has-error' : '' }}">
                            <label for="title2">Section 2 Title</label>
                            <input type="text" class="form-control" id="title2" name="title2"
                                placeholder="Enter Section 2 Title" value="{{ old('title2', $setting->title2) }}">
                            @error('title2')
                                <span id="title2-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        


                        <div class="form-group mb-2 {{ $errors->has('title3') ? 'has-error' : '' }}">
                            <label for="title3">Section 3 Title</label>
                            <input type="text" class="form-control" id="title3" name="title3"
                                placeholder="Enter Section 3 Title" value="{{ old('title3', $setting->title3) }}">
                            @error('title3')
                                <span id="title3-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        

                         <div class="form-group mb-3">
                            <label for="image">Upload Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="image" name="image"
                                onchange="loadPreview(this);">
                            </div>
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif

                            <img id="preview_img" src="{{ asset('storage/uploads/settings/best-for-less/'.$setting->image) }}" class="mt-2" width="100"
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
