@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Create Campaign')

@section('content')
<div class="CreateCampaign">
    <div class="container">
        <h1>Create Campaign</h1>
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="Campaignadd BoxShadow formstyle">
                    <form action="" method="post" class="row g-2">
                            <div class="col-md-12 col-12">
                              <label for="label" class="form-label">Title<span>*</span></label>
                              <input type="text" class="form-control" placeholder="Enter your title">
                            </div>
                            <div class="col-md-12 col-12">
                                <label for="label" class="form-label">Description</label>
                                <textarea class="form-control" rows="4" cols="4" placeholder="Enter description"></textarea>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="label" class="form-label">Category<span>*</span></label>
                              <select class="form-control">
                                <option selected>Select your category</option>
                                <option>Music</option>
                                <option>Reel</option>
                              </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="label" class="form-label">Type of content<span>*</span></label>
                              <select class="form-control">
                                <option selected>Select your content</option>
                                <option>Lorem Ipsum is simply dummy text of the printing</option>
                                <option>Lorem Ipsum is simply dummy text of the printing</option>
                              </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="label" class="form-label">Price<span>*</span></label>
                                <input type="text" class="form-control" placeholder="Enter your price">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="label" class="form-label">Status<span>*</span></label>
                              <select class="form-control">
                                <option selected>Select status</option>
                                <option>Active</option>
                                <option>Inactive</option>
                              </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="label" class="form-label">Thumbnail</label>
                                <div class="form-group">
                                    <div class="upload">
                                        <div class="uploadimg">
                                            <input type="file" />
                                            <img src="{{ asset('assets/images/frontend/icons/user-filled.png') }}" />
                                        </div>
                                        <div class="upbtn">
                                            <img src="{{ asset('assets/images/frontend/icons/camera.png') }}" />
                                        </div>
                                        <p>Upload thumbnail picture</p>
                                    </div>

                                </div>
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
