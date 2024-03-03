@extends('layouts.admin')
@section('title', 'Edit FAQ')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.reviews-setting.index') }}">Review</a>
                            </li>
                            <li class="breadcrumb-item active">Review Detail</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Review Detail</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" id="reviewsEditForm" action="{{ route('admin.reviews-setting.update', $review->id) }}" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.reviews-setting.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="reviewsEditForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 mb-2">
                                <label for="title" class="form-label">Title </label>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $review->title) }}" placeholder="Enter Title">
                                @error('title')
                                    <code id="title-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="description" class="form-label">Description </label>
                                <textarea id="description" class="form-control" placeholder="Description" name="description">{{ old('description', $review->description) }}</textarea>
                                @error('description')
                                    <code id="description-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>
                            
                           <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="image" name="image"
                                    onchange="loadPreview(this);">
                                </div>
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                                <img id="preview_img" src="{{ asset('storage/uploads/settings/reviews/'.$review->image) }}" class="mt-2" width="100"
                                height="100" />
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="author_name" class="form-label">Author Name </label>
                                <input type="text" class="form-control" name="author_name" value="{{ old('author_name', $review->author_name) }}" placeholder="Enter Author Name">
                                @error('author_name')
                                    <code id="author_name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div> 


                            <div class="col-md-12 mb-2">
                                <label for="designation" class="form-label">Designation </label>
                                <input type="text" class="form-control" name="designation" value="{{ old('designation', $review->designation) }}" placeholder="Enter Designation">
                                @error('designation')
                                    <code id="designation-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>  


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
