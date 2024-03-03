@extends('layouts.admin')
@section('title', 'Add Tags')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.search-keywords.index') }}">Tags</a>
                            </li>
                            <li class="breadcrumb-item active">Add Tags</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Tags</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" action="{{ route('admin.search-keywords.store') }}" id="content_typesForm"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.search-keywords.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="content_typesForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-12 mb-2" style="display:none;">
                                <label for="content_type" class="form-label">Select Content type or Category or Tag</label>
                                <select name="keyword" selectpicker class=" form-control" data-live-search="true" >
                                    <optgroup label="Group 1">
                                        <option value="">Select Content type</option>
                                        @foreach($content_types as $content_type)
                                        <option @if(old('keyword') == $content_type->name ) selected @endif value="{{$content_type->name}}">{{$content_type->name}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Group 2">
                                        <option value="">Select your category</option>
                                        @foreach($categories as $category)
                                        <option @if(old('keyword') == $category->name ) selected @endif value="{{$category->name}}">{{$category->name}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Group 3">
                                        <option value="">Select tags</option>
                                        @foreach($tags as $tag)
                                        <option @if(old('keyword') == $tag->id ) selected @endif value="{{$tag->name}}">{{$tag->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('keyword')
                                <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                             
                            <div class="col-md-12 mb-2 display-keyword">
                                <label for="keyword" class="form-label">Keyword </label>
                                <input type="text" class="form-control" name="keyword" value="{{ old('keyword') }}" placeholder="Enter Keyword">
                                @error('keyword')
                                    <code id="keyword-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>    

                            <div class="col-md-12 mb-2" style="display: none;">
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
