@extends('layouts.admin')
@section('title', 'Add Reviews')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.reviews.index') }}">Reviews</a>
                            </li>
                            <li class="breadcrumb-item active">Add Review</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Review</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" action="{{ route('admin.reviews.store') }}" id="content_typesForm"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.reviews.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="content_typesForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                             
                            <div class="col-md-12 mb-2">
                                <label for="author" class="form-label">Author </label>
                                <input type="text" class="form-control" name="author" value="{{ old('author') }}" placeholder="Enter Author">
                                @error('author')
                                    <code id="author-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="subject" class="form-label">Subject </label>
                                <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" placeholder="Enter Subject">
                                @error('subject')
                                    <code id="subject-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="review" class="form-label">Review </label>
                                <textarea id="review" class="form-control" name="review">{{ old('review') }}</textarea>
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Rating</label>
                                <div class="rating">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" value="{{ old('rating', 1) }}" id="flexRadioDefault1">
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star-outline"></i>
                                        <i class="mdi mdi-star-outline"></i>
                                        <i class="mdi mdi-star-outline"></i>
                                        <i class="mdi mdi-star-outline"></i>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" value="{{ old('rating', 2) }}" id="flexRadioDefault2">
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star-outline"></i>
                                        <i class="mdi mdi-star-outline"></i>
                                        <i class="mdi mdi-star-outline"></i>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" value="{{ old('rating', 3) }}" id="flexRadioDefault3">
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star-outline"></i>
                                        <i class="mdi mdi-star-outline"></i>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" value="{{ old('rating', 4) }}" id="flexRadioDefault4">
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star-outline"></i>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" value="{{ old('rating', 5) }}" id="flexRadioDefault5">
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                    </div>

                                    @error('rating')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                                </div>
                            </div>
    

                            <div class="col-md-12 mb-2">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status') == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status') == 0 ) selected @endif value="0">Disable</option>
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
