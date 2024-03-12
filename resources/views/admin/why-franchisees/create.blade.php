@extends('layouts.admin')
@section('title', 'Add Why Franchisees')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.why-franchisees.index') }}">Why Franchisees</a>
                            </li>
                            <li class="breadcrumb-item active">Add Why Franchisees</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Why Franchisees</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" action="{{ route('admin.why-franchisees.store') }}" id="content_typesForm"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.why-franchisees.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="content_typesForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">


                            <div class="form-group mb-2">
                                <label for="meta_title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter Title">
                                @error('title')
                                    <span id="title-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group mb-2">
                                <label for="sort_order">Sort Order </label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order"
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

                            <div class="form-group mb-2">
                                <label for="direction">Direction</label>
                                <select class="form-control" name="direction" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('direction') == 1 ) selected @endif value="1">Right</option>
                                    <option @if(old('direction') == 0 ) selected @endif value="0">Left</option>
                                </select>
                                @error('direction')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
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
        selector: 'textarea#desc-content',
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
