@extends('layouts.admin')
@section('title', 'My Account')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                            <li class="breadcrumb-item active">Seo Content Setting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Seo Content Setting</h4>
                </div>
            </div>
        </div>
        @include('admin.includes.flash-message')
        <!-- end page title -->

    </div> <!-- container -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="accountForm" method="POST"
                        action="{{ route('admin.settings.seo-content') }}">
                        @csrf
                        @method('POST')

                        <div class="form-group mb-2 {{ $errors->has('seo_content') ? 'has-error' : '' }}">
                            <label for="seo_content">Seo Content</label>
                            <textarea type="text" class="form-control summernote" name="seo_content"
                                placeholder="Enter Seo Content">{{ old('seo_content', $seo_content) }}</textarea>
                            @error('seo_content')
                                <span id="seo_content-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
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

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">

        $(document).ready(function() {

          $('.summernote').summernote();

        });

    </script>

@endpush
