@extends('layouts.admin')
@section('title', 'FAQs')
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">FAQs</a></li>
                            <li class="breadcrumb-item active">FAQs</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Frequently Asked Questions</h4>
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
                        action="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                            <div class="form-group mb-2">
                                <label for="meta_title">Title</label>
                                <input type="text" class="form-control" id="header" name="header"
                                    placeholder="Enter Title">
                                @error('header')
                                    <span id="title-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="meta_description">Description</label>
                                <textarea type="text" rows="4" cols="4" class="form-control" id="description" name="description"  id="description" name="description"
                                    placeholder="Enter Description"></textarea>
                                @error('description')
                                    <span id="description-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="sort_order">Sort Order </label>
                                <input type="text" class="form-control" id="sort_order" name="sort_order"
                                    placeholder="Sort Order">
                                @error('sort_order')
                                    <span id="sort_order-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status') == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status') == 0 ) selected @endif value="0">Disable</option>
                                </select>
                                @error('status')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </form>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" form="accountForm" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->

@endsection

@push('scripts')

@endpush
