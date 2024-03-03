@extends('layouts.admin')
@section('title', 'Content Management')
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Content Management</a></li>
                            <li class="breadcrumb-item active">Creator Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Creator Dashboard</h4>
                </div>
            </div>
        </div>
        @include('admin.includes.flash-message')
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="accountForm" method="POST"
                        action="{{ route('admin.creator-dashboard.update', Auth::guard('administrator')->id()) }}">
                        @csrf
                        @method('PUT')

                            <div class="form-group mb-2 {{ $errors->has('header') ? 'has-error' : '' }} ">
                                <label for="header">Main Title</label>
                                <input type="text" class="form-control" id="header" value="{{ old('header', $admin->header) }}" name="header"
                                    placeholder="Enter Meta Title">
                                @error('header')
                                    <span id="header-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-2 {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" 
                                    placeholder="Enter Title" value="{{ old('title', $admin->title) }}">
                                @error('title')
                                    <span id="title-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-2 {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="description">Description</label>
                                <textarea rows="4" cols="4" class="form-control" id="description" name="description"
                                    placeholder="Enter Description">{{ old('description', $admin->description) }}</textarea>
                                @error('description')
                                    <span id="description-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" form="accountForm" class="btn btn-success">Save</button>
                    </div>
                </div>
                        </form>
            </div>
        </div>

    </div> <!-- container -->

@endsection
@push('scripts')

@endpush
