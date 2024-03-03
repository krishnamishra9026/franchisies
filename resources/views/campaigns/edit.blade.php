@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Create Ad Campaign')

@section('content')
<div class="CreateCampaign">
    <div class="container">
        <h1>Create Ad Campaign</h1>
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="Campaignadd BoxShadow formstyle">
                    <form method="post" action="{{ route('campaigns.store') }}" class="row g-2" enctype="multipart/form-data">
                        @csrf

                            <input type="hidden" name="sponsor" value="{{ auth()->user()->id }}">

                            <div class="col-md-12 col-12">
                              <label for="label" class="form-label">Title<span>*</span></label>
                              <input type="text" name="title" value="{{ old('title', $campaign->title) }}"  class="form-control" placeholder="Enter your title">
                              @error('title')
                                    <code id="title-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 col-12">
                                <label for="label" class="form-label">Description</label>
                                <textarea class="form-control" rows="4" cols="4" name="description"  placeholder="Enter description">{{ old('description', $campaign->description) }}</textarea>
                                @error('description')
                                <code id="description-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="label" class="form-label">Category<span>*</span></label>
                                <select class="form-control" name="category">
                                    <option value="">Select your category</option>
                                    @foreach($categories as $category)
                                    <option @if(old('category', $campaign->category) == $category->id ) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="label" class="form-label">Type of content<span>*</span></label>
                                <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." name="content_type[]">
                                    <option value="">Select Type of Content</option>
                                    @foreach($content_types as $content_type)
                                    <option @if(in_array($content_type->id, old('content_type', $selected_content_types))) selected @endif value="{{$content_type->id}}">{{$content_type->name}}</option>
                                    @endforeach
                                </select>
                                @error('content_type')
                                <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="label" class="form-label">Price<span>*</span></label>
                                <input type="text" class="form-control" name="price" value="{{ old('price', $campaign->price) }}" placeholder="Enter your price">
                                @error('price')
                                    <code id="price-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="label" class="form-label">Status<span>*</span></label>
                              <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $campaign->status) == 1 ) selected @endif value="1">Active</option>
                                    <option @if(old('status', $campaign->status) == 0 ) selected @endif value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="label" class="form-label">Thumbnail</label>
                                <div class="form-group">
                                    <div class="upload">
                                        <div class="uploadimg">
                                            <input type="file" name="image" />
                                            <img src="{{ asset('assets/images/frontend/icons/user-filled.png') }}" />
                                        </div>
                                        <div class="upbtn">
                                            <img src="{{ asset('assets/images/frontend/icons/camera.png') }}" />
                                        </div>
                                        <p>Upload thumbnail picture</p>
                                    </div>

                                </div>
                                @if(isset($campaign->image))
                                <img height="65" src="{{ asset('storage/uploads/campaigns/'.$campaign->image) }}">
                                @endif
                            </div>

                            <div class="col-12 text-center mt-4">
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush
