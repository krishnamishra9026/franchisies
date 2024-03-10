@extends('layouts.franchisor')
@section('title', 'Edit Information')
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
                            <li class="breadcrumb-item"><a href="{{ route('franchisor.information-page-management.index') }}">Informations</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Information</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Information</h4>
                </div>
            </div>
        </div>
        @include('franchisor.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" action="{{ route('franchisor.information-page-management.update', $information->id) }}" id="InformationForm"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('franchisor.information-page-management.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="InformationForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Page Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Page Title" value="{{ old('name', $information->name) }}">
                                @error('name')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Description </label>
                                <textarea id="editor-content" class="form-control" name="editor">{{ old('editor', $information->editor) }}</textarea>
                                @error('editor')
                                    <code id="title-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                           
                            <div class="col-md-12 mb-2">
                                <label for="meta_title" class="form-label">Meta Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title"
                                    placeholder="Enter Page Title" value="{{ old('meta_title', $information->meta_title) }}">
                                @error('meta_title')
                                    <code id="title-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="meta_description" class="form-label">Meta Description </label>
                                <textarea name="meta_description" class="form-control">{{ old('meta_description', $information->meta_description) }}</textarea>
                                @error('meta_description')
                                    <code id="title-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>
            
                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $information->status) == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status', $information->status) == 0 ) selected @endif value="0">Disable</option>
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
