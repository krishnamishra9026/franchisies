@extends('layouts.admin')
@section('title', 'Edit Campaign')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.campaigns.index') }}">Campaigns</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Campaign</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Campaign</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" id="campaignsEditForm" action="{{ route('admin.campaigns.update', $campaign->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.campaigns.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="campaignsEditForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                           <div class="col-md-12 mb-2">
                                <label for="status" class="form-label">Select Sponsor</label>
                                <select class="form-control" name="sponsor" id="example-select">
                                    <option value="">Select Sponsor</option>
                                    @foreach($sponsors as $sponsor)
                                    <option @if(old('sponsor', $campaign->sponsor) == $sponsor->id ) selected @endif value="{{$sponsor->id}}">{{$sponsor->first_name}} {{$sponsor->last_name}}</option>
                                    @endforeach
                                </select>
                                @error('sponsor')
                                <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                             
                            <div class="col-md-12 mb-2">
                                <label for="title" class="form-label">Title </label>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $campaign->title) }}" placeholder="Enter Title">
                                @error('title')
                                    <code id="title-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="description" class="form-label">Description </label>
                                <textarea class="form-control" name="description" placeholder="Enter Description">{{ old('description', $campaign->description) }}</textarea>
                                @error('description')
                                    <code id="description-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="status" class="form-label">Category</label>
                                <select class="form-control" name="category" id="example-select">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option @if(old('category', $campaign->category) == $category->id ) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="status" class="form-label">Type of Content</label>
                                <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose Type of Content..." name="content_type[]">
                                    <option value="">Select Type of Content</option>
                                    @foreach($content_types as $content_type)
                                    <option @if(in_array($content_type->id, old('content_type', $selected_content_types))) selected @endif  value="{{$content_type->id}}">{{$content_type->name}}</option>
                                    @endforeach
                                </select>
                                @error('content_type')
                                <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="price" class="form-label">Price </label>
                                <input type="text" class="form-control" name="price" value="{{ old('price', $campaign->price) }}" placeholder="Enter Price">
                                @error('price')
                                    <code id="price-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            
                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $campaign->status) == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status', $campaign->status) == 0 ) selected @endif value="0">Disable</option>
                                </select>
                                @error('status')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="image">Upload image</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="image" name="image"
                                    onchange="loadPreview(this);">
                                </div>
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                                @if(isset($campaign->image))
                                <img id="preview_img" src="{{ asset('storage/uploads/campaigns/'.$campaign->image)  }}" class="mt-2" width="100" height="100" />
                                @else
                                <img id="preview_img" src="{{ asset('assets/images/thumbnails/placeholder.png')  }}" class="mt-2" width="100" height="100" />
                                @endif
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

