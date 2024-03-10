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
                            <li class="breadcrumb-item active">How it works Setting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">How it works Setting</h4>
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


                        <div class="form-group mb-2 {{ $errors->has('works_description1') ? 'has-error' : '' }}">
                            <label for="works_description1">Section 1 Description</label>
                            <textarea type="text" class="form-control" id="works_description1" name="works_description1"
                                placeholder="Enter Section 1 Description">{{ old('works_description1', $setting->works_description1) }}</textarea>
                            @error('works_description1')
                                <span id="works_description1-error" class="error invalid-feedback">{{ $message }}</span>
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

                            <img id="preview_img" src="{{ asset('storage/uploads/works/'.$setting->works_image1) }}" class="mt-2" width="100"
                                height="100" />
                        </div>



                        <div class="form-group mb-2 {{ $errors->has('works_title2') ? 'has-error' : '' }}">
                            <label for="works_title2">Section 2 Title</label>
                            <input type="text" class="form-control" id="works_title2" name="works_title2"
                                placeholder="Enter Section 2 Title" value="{{ old('works_title2', $setting->works_title2) }}">
                            @error('works_title2')
                                <span id="works_title2-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('works_description2') ? 'has-error' : '' }}">
                            <label for="works_description2">Section 2 Description</label>
                            <textarea type="text" class="form-control" id="works_description2" name="works_description2"
                                placeholder="Enter Section 2 Description">{{ old('works_description2', $setting->works_description2) }}</textarea>
                            @error('works_description2')
                                <span id="works_description2-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                         <div class="form-group mb-3">
                            <label for="works_image2">Upload section 2 Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="works_image2" name="works_image2"
                                onchange="loadPreview1(this);">
                            </div>
                            @if ($errors->has('works_image2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('works_image2') }}</strong>
                                </span>
                            @endif

                            <img id="preview_img1" src="{{ asset('storage/uploads/works/'.$setting->works_image2) }}" class="mt-2" width="100"
                                height="100" />
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('works_title3') ? 'has-error' : '' }}">
                            <label for="works_title3">Section 3 Title</label>
                            <input type="text" class="form-control" id="works_title3" name="works_title3"
                                placeholder="Enter Section 3 Title" value="{{ old('works_title3', $setting->works_title3) }}">
                            @error('works_title3')
                                <span id="works_title3-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('works_description3') ? 'has-error' : '' }}">
                            <label for="works_description3">Section 3 Description</label>
                            <textarea type="text" class="form-control" id="works_description3" name="works_description3"
                                placeholder="Enter Section 3 Description">{{ old('works_description3', $setting->works_description3) }}</textarea>
                            @error('works_description3')
                                <span id="works_description3-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                         <div class="form-group mb-3">
                            <label for="works_image3">Upload section 3 Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="works_image3" name="works_image3"
                                onchange="loadPreview2(this);">
                            </div>
                            @if ($errors->has('works_image3'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('works_image3') }}</strong>
                                </span>
                            @endif

                            <img id="preview_img2" src="{{ asset('storage/uploads/works/'.$setting->works_image3) }}" class="mt-2" width="100"
                                height="100" />
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('works_title4') ? 'has-error' : '' }}">
                            <label for="works_title4">Section 4 Title</label>
                            <input type="text" class="form-control" id="works_title4" name="works_title4"
                                placeholder="Enter Section 4 Title" value="{{ old('works_title4', $setting->works_title4) }}">
                            @error('works_title4')
                                <span id="works_title4-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group mb-2 {{ $errors->has('works_description4') ? 'has-error' : '' }}">
                            <label for="works_description4">Section 4 Description</label>
                            <textarea type="text" class="form-control" id="works_description4" name="works_description4"
                                placeholder="Enter Section 4 Description">{{ old('works_description4', $setting->works_description4) }}</textarea>
                            @error('works_description4')
                                <span id="works_description4-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                         <div class="form-group mb-3">
                            <label for="works_image4">Upload section 4 Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="works_image4" name="works_image4"
                                onchange="loadPreview3(this);">
                            </div>
                            @if ($errors->has('works_image4'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('works_image4') }}</strong>
                                </span>
                            @endif

                            <img id="preview_img3" src="{{ asset('storage/uploads/works/'.$setting->works_image4) }}" class="mt-2" width="100"
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

        function loadPreview1(input, id) {
            id = id || '#preview_img1';
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


        function loadPreview2(input, id) {
            id = id || '#preview_img2';
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


        function loadPreview3(input, id) {
            id = id || '#preview_img3';
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
