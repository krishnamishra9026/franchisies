@extends('layouts.admin')
@section('title', 'Edit Tag')
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
                            <li class="breadcrumb-item active">Edit Tag</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Tag</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" id="search-keywordsEditForm" action="{{ route('admin.search-keywords.update', $tag->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.search-keywords.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="search-keywordsEditForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-12 mb-2">
                                <label for="keyword" class="form-label">Name </label>
                                <input type="text" class="form-control" name="keyword" value="{{ old('keyword',$tag->keyword) }}" placeholder="Enter Name">
                                @error('keyword')
                                    <code id="keyword-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


           
                            
                            <div class="col-md-12 mb-2" style="display:none;">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $tag->status) == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status', $tag->status) == 0 ) selected @endif value="0">Disable</option>
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
