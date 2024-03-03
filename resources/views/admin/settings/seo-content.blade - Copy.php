@extends('layouts.admin')
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
                            <textarea type="text" id="editor-content" class="form-control" id="seo_content" name="seo_content"
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

<script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea#editor-content',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
            content_style: 'body { font-family:roboto; font-size:16px }'
    });
</script>

@endpush
