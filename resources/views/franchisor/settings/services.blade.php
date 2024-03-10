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
                            <li class="breadcrumb-item active">Popular Services Setting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Popular Services Setting</h4>
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
                        action="{{ route('franchisor.settings.works') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group mb-2 {{ $errors->has('works_title1') ? 'has-error' : '' }}">
                            <label for="works_title1">Section 1 Title</label>
                            <input type="text" class="form-control" id="works_title1" name="works_title1"
                                placeholder="Enter Section 1 Title" value="{{ old('works_title1', $setting->works_title1) }}">
                            @error('works_title1')
                                <span id="works_title1-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                         <div class="form-group mb-3">
                            <label for="works_image1">Upload section 1 Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="works_image1" name="works_image1"
                                onchange="loadPreview(this);">
                            </div>
                            @if ($errors->has('works_image1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('works_image1') }}</strong>
                                </span>
                            @endif

                            <img id="preview_img" src="{{ asset('storage/uploads/works_image1/'.$setting->works_image1) }}" class="mt-2" width="100"
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
