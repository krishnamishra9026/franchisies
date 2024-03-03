@extends('layouts.admin')
@section('title', 'Edit Category')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Category</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Category</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" id="categoriesEditForm" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="categoriesEditForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">H1 Title </label>
                                <input type="text" class="form-control" name="h1_title" value="{{ old('h1_title', $category->h1_title) }}" placeholder="Enter H1 Title">
                                @error('h1_title')
                                    <code id="h1-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">H2 Tag</label>
                                <input type="text" class="form-control" name="h2_tag" value="{{ old('h2_tag', $category->h2_tag) }}"  placeholder="Enter H2 Tag">
                                @error('h2_tag')
                                    <h1_title id="h2-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="page_description" class="form-label">Page Description </label>
                                <textarea class="form-control" name="page_description" placeholder="Enter Meta Description">{{ old('page_description',$category->page_description) }}</textarea>
                                @error('page_description')
                                    <code id="page_description-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Name </label>
                                <input type="text" class="form-control" name="name" value="{{ old('name',$category->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="meta_title" class="form-label">Meta Title </label>
                                <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title',$category->meta_title) }}" placeholder="Enter Meta Title">
                                @error('meta_title')
                                    <code id="meta_title-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="meta_description" class="form-label">Meta Description </label>
                                <textarea class="form-control" name="meta_description" placeholder="Enter Meta Description">{{ old('meta_description',$category->meta_description) }}</textarea>
                                @error('meta_description')
                                    <code id="meta_description-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            


                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select" required>
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $category->status) == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status', $category->status) == 0 ) selected @endif value="0">Disable</option>
                                </select>
                                @error('status')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
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
