@extends('layouts.admin')
@section('title', 'Add Service')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.services-setting.index') }}">Service</a>
                            </li>
                            <li class="breadcrumb-item active">Add Service</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Service</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" action="{{ route('admin.services-setting.store') }}" id="content_typesForm"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.services-setting.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="content_typesForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                             
                            <div class="col-md-12 mb-2">
                                <label for="title" class="form-label">Title </label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter Title">
                                @error('title')
                                    <code id="title-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="status" class="form-label">Category</label>
                                <select class="form-control" name="category" id="example-select">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option @if(old('category') == $category->id ) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <code id="name-error" class="text-danger">{{ $message }}</code>
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

                                <img id="preview_img" src="{{ asset('assets/images/thumbnails/services-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                            </div>   

                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Sort Order </label>
                                <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order') }}" placeholder="Enter Sort Order">
                                @error('sort_order')
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
