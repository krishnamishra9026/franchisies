@extends('layouts.admin')
@section('title', 'Edit Badges')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.badges.index') }}">Badges</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Badge</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Badge</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" id="badgesEditForm" action="{{ route('admin.badges.update', $badge->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.badges.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="badgesEditForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Name </label>
                                <input type="text" class="form-control" name="name" value="{{ old('name',$badge->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="price" class="form-label">Price </label>
                                <input type="number" class="form-control" name="price" value="{{ old('price', $badge->price) }}" placeholder="Enter Price">
                                @error('price')
                                    <code id="price-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="icon">Upload Icon</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="icon" name="icon"
                                    onchange="loadPreview(this);">
                                </div>
                                @if ($errors->has('icon'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('icon') }}</strong>
                                </span>
                                @endif
                                @if($badge->icon)
                                <img id="preview_img" src="{{ asset('storage/uploads/badges/'.$badge->icon)  }}" class="mt-2" width="100"
                                height="100" />
                                @else
                                <img id="preview_img" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                                @endif
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="description" class="form-label">Descripton </label>
                                <textarea class="form-control" rows="3" name="description" placeholder="Enter description">{{ old('description', $badge->description) }}</textarea>
                                @error('description')
                                    <code id="description-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="Color" class="form-label">Color </label>
                                <input type="color" name="color" value="{{ old('color', $badge->color) }}" class="form-control">
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="user_type" class="form-label">User type</label>
                                <select class="form-control" name="user_type" id="example-select">
                                    <option value="">Select user type</option>
                                    <option @if(old('user_type', $badge->user_type) == 'Sponsor' ) selected @endif value="Sponsor">Sponsor</option>
                                    <option @if(old('user_type', $badge->user_type) == 'Creator' ) selected @endif value="Creator">Creator</option>
                                </select>
                                @error('user_type')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            
                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $badge->status) == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status', $badge->status) == 0 ) selected @endif value="0">Disable</option>
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
