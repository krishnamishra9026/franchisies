@extends('layouts.admin')
@section('title', 'Edit Creator')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.creators.index') }}">Creators</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Creator</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Creator</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" id="creatorsEditForm" action="{{ route('admin.creators.update', $creator->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-end">
                                <a href="{{ route('admin.creators.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-primary" form="creatorsEditForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="allcampaigns BoxShadow">
                                    <div class="campaigns-tabs">
                                        <ul class="nav nav-pills" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="pill" href="#AccountInformation">Account Information</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="pill" href="#Services">Services</a>
                                            </li>
                                        </ul>

                                    </div>

                                    <div class="tab-content">
                                        <div id="AccountInformation" class="tab-pane active"><br>

                                            <div class="row">

                                                <div class="col-md-12 mb-2">
                                                    <label for="firstname" class="form-label">First Name </label>
                                                    <input type="text" class="form-control" name="firstname" value="{{ old('firstname',$creator->firstname) }}" placeholder="Enter First Name">
                                                    @error('firstname')
                                                    <code id="firstname-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <label for="lastname" class="form-label">Last Name </label>
                                                    <input type="text" class="form-control" name="lastname" value="{{ old('lastname',$creator->lastname) }}" placeholder="Enter Last Name">
                                                    @error('lastname')
                                                    <code id="lastname-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <label for="username" class="form-label">Username </label>
                                                    <input type="text" class="form-control" name="username" value="{{ old('username',$creator->username) }}" placeholder="Enter Creator User Name">
                                                    @error('username')
                                                    <code id="username-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <label for="email" class="form-label">Email </label>
                                                    <input type="email" class="form-control" name="email" value="{{ old('email',$creator->email) }}" placeholder="Enter Email">
                                                    @error('email')
                                                    <code id="email-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <label for="password" class="form-label">Password </label>
                                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter Creator password">
                                                    @error('password')
                                                    <code id="password-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>


                                                <div class="col-md-12 mb-2">
                                                    <label for="bio" class="form-label">Bio* </label>
                                                    <textarea class="form-control" name="bio" placeholder="Enter Creator Bio">{{ old('bio',$creator->bio) }}</textarea>
                                                    @error('bio')
                                                    <code id="bio-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <label for="bio" class="form-label">Gender</label>
                                                    <select name="gender" class="form-control safari" id="gender">
                                                        <option value="" selected>Gender</option>
                                                        <option @if(old('gender', $creator->gender) == 'Male') selected @endif value="Male" >Male </option>
                                                        <option @if(old('gender', $creator->gender) == 'Female') selected @endif value="Female" >Female </option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <label for="bio" class="form-label">Social Accounts - Instagram /Youtube/Tiktok </label>
                                                    <div class = "form-check">
                                                        <input class = "form-check-input" type = "hidden" name = "instagram" value="0">
                                                        <input class="form-check-input" type="checkbox"  @if(old('gender', $creator->instagram) == 1) checked @endif id="checkbox1" name="instagram" value="1" >
                                                        <label class="form-check-label"> Instagram </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden" name="youtube" value="0">
                                                        <input class="form-check-input" type="checkbox"  @if(old('gender', $creator->youtube) == 1) checked @endif id="checkbox3" name="youtube" value="1" >
                                                        <label class="form-check-label"> Youtube </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden" name="tiktok" value="0">
                                                        <input class="form-check-input" type="checkbox"  @if(old('gender', $creator->tiktok) == 1) checked @endif id="checkbox3" name="tiktok" value="1" >
                                                        <label class="form-check-label"> Tiktok </label>
                                                    </div>
                                                </div>


                                                <div class="col-md-12 mb-2">
                                                    <label for="phone" class="form-label">Phone Number </label>
                                                    <input type="number" class="form-control" name="phone" value="{{ old('phone',$creator->phone) }}" placeholder="Enter Mobile Number">
                                                    @error('phone')
                                                    <code id="phone-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>


                                                <div class="col-md-12 mb-2">
                                                    <label for="alt_phone_number" class="form-label">Alternate Phone Number</label>
                                                    <input type="number" class="form-control" name="alt_phone_number" value="{{ old('alt_phone_number', $creator->alt_phone_number) }}" placeholder="Enter Alternate Phone Number">
                                                    @error('alt_phone_number')
                                                    <code id="alt_phone_number-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <label for="avatar">Profile Picture</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" id="avatar" name="avatar"
                                                        onchange="loadPreview(this);">
                                                    </div>
                                                    @if ($errors->has('avatar'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('avatar') }}</strong>
                                                    </span>
                                                    @endif
                                                    @if($creator->avatar)
                                                    <img id="preview_img" src="{{ asset('storage/uploads/creators/'.$creator->avatar)  }}" class="mt-2" width="100"
                                                    height="100" />
                                                    @else
                                                    <img id="preview_img" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                                    height="100" />
                                                    @endif
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <label for="city" class="form-label">City </label>
                                                    <input type="text" class="form-control" name="city" value="{{ old('city',$creator->city) }}" placeholder="Enter City">
                                                    @error('city')
                                                    <code id="city-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>


                                                <div class="col-md-12 mb-2">
                                                    <label for="country" class="form-label">Country </label>
                                                    <select class="form-control" name="country">
                                                        <option value="">Please select Country</option>
                                                        @foreach($countries as $country)
                                                        <option value="{{ $country->country }}"  @if(old('country', $creator->country) == $country->country) selected @endif>{{ $country->country }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('country')
                                                    <code id="country-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <label for="state" class="form-label">Province </label>
                                                    <select class="form-control" name="state">
                                                        <option value="">Please select Province</option>
                                                        @foreach($states as $state)
                                                        <option value="{{ $state->state }}"  @if(old('state', $creator->state) == $state->state) selected @endif>{{ $state->state }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('state')
                                                    <code id="state-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <label for="label" class="form-label">Featured on home<span>*</span></label>
                                                    <select class="form-control" name="featured" id="example-select">
                                                        <option value="">Select Featured on home</option>
                                                        <option @if(old('featured', @$creator->featured) == 1 ) selected @endif value="1">Yes</option>
                                                        <option @if(old('featured', @$creator->featured) == 0 ) selected @endif value="0">No</option>
                                                    </select>
                                                    @error('featured')
                                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <label for="name" class="form-label">Status</label>
                                                    <select class="form-control" name="status" id="example-select">
                                                        <option value="">Select Status</option>
                                                        <option @if(old('status', $creator->status) == 1 ) selected @endif value="1">Enable</option>
                                                        <option @if(old('status', $creator->status) == 0 ) selected @endif value="0">Disable</option>
                                                    </select>
                                                    @error('status')
                                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>

                                            </div>

                                        </div>
                                        <div id="Services" class="tab-pane fade"><br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="creator-services">
                                                        <h4>Describe your Talent</h4>
                                                        <div class="col-md-12 mb-2">
                                                            <label for="talent_title" class="form-label">Title</label>
                                                            <input type="text" class="form-control" name="talent_title" value="{{ old('talent_title', $creator->talent_title) }}" placeholder="Enter your title">
                                                            @error('talent_title')
                                                            <code id="name-error" class="text-danger">{{ $message }}</code>
                                                            @enderror
                                                        </div>
                                                        <h4>About My Service</h4>
                                                        <div class="col-md-12 mb-2">
                                                            <label for="content_type" class="form-label">What will you create?</label>
                                                            <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." name="content_type[]">
                                                                <option value="">Select type of content</option>
                                                                @foreach($content_types as $content_type)
                                                                <option @if(in_array($content_type->id, old('content_type', $selected_content_types))) selected @endif value="{{$content_type->id}}">{{$content_type->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('content')
                                                            <code id="name-error" class="text-danger">{{ $message }}</code>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12 mb-2">
                                                            <label for="social_channel" class="form-label">What are your social channel about?</label>
                                                            <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." name="category[]">
                                                                <option value="">Select your category</option>
                                                                @foreach($categories as $category)
                                                                <option @if(in_array($category->id, old('category', $selected_categories))) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('social_channel')
                                                            <code id="name-error" class="text-danger">{{ $message }}</code>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="get_discovered" class="form-label">Get discovered<span>*</span> <span class="ovisible">(Brands will find your with these keywords)</span></label>
                                                            <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." name="tag[]">
                                                                <option value="">Select tags</option>
                                                                @foreach($tags as $tag)
                                                                <option @if(in_array($tag->id, old('tag', $selected_tags))) selected @endif value="{{$tag->id}}">{{$tag->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('get_discovered')
                                                            <code id="name-error" class="text-danger">{{ $message }}</code>
                                                            @enderror
                                                        </div>
                                                        <h4>Showcase of your work</h4>

                                                        @if($showcase_works && count($showcase_works))
                                                        @foreach($showcase_works as $key => $showcase_work)
                                                        <div id="dynamicAddRemove">
                                                            <div class="row mb-2">
                                                                <div class="col-sm-11 uploadfile">
                                                                    @if($key == 0) <label for="formFileMultiple" class="form-label">Upload video or an image</label> @endif
                                                                    <input type="hidden" name="addMoreInputFields[{{$key}}][id]" value="{{$showcase_work->id}}">
                                                                    <input class="form-control" type="file" id="formFileMultiple" name="addMoreInputFields[{{$key}}][image_video]" multiple>
                                                                    @if(isset($showcase_work->image_video))
                                                                    <img height="45" src="{{ asset('storage/uploads/creators/service/showcase/'.$showcase_work->image_video) }}">
                                                                    @endif
                                                                </div>
                                                                @if($key == 0)
                                                                <div class="col-sm-1 p-0">
                                                                    <div class="add">
                                                                        <button type="button" id="dynamic-ar" class="btn btn-primary" data-count="{{ count($showcase_works) }}">+ Add More</button>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div class="col-sm-1 p-0">
                                                                    <div class="remove">
                                                                        <button type="button" class="btn btn-danger remove-input-field">Remove</button>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                        <div id="dynamicAddRemove">
                                                            <div class="row mb-2">
                                                                <div class="col-sm-11 uploadfile">
                                                                    <label for="formFileMultiple" class="form-label">Upload video or an image</label>
                                                                    <input class="form-control" type="file" id="formFileMultiple" name="addMoreInputFields[0][image_video]" multiple>
                                                                </div>
                                                                <div class="col-sm-1 p-0">
                                                                    <div class="add">
                                                                        <button type="button" id="dynamic-ar" class="btn btn-primary" data-count="1">+ Add More</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif


                                                        <h4>Top Client Logo's</h4>

                                                        
                                                        @if($client_logos && count($client_logos))
                                                        @foreach($client_logos as $key => $client_logo)
                                                        <div id="dynamicAddRemoveClient">
                                                            <div class="row mb-2">
                                                                <div class="col-sm-11 uploadfile">
                                                                    <input type="hidden" name="addMoreBrands[{{$key}}][id]" value="{{$client_logo->id}}">
                                                                    @if($key == 0)<label for="formFileMultiple" class="form-label">Upload brand</label>@endif
                                                                    <input class="form-control" type="file" name="addMoreBrands[{{$key}}][image]" multiple>
                                                                    @if(isset($client_logo->image))
                                                                    <img height="45" src="{{ asset('storage/uploads/creators/service/brands/'.$client_logo->image) }}">
                                                                    @endif
                                                                </div>
                                                                @if($key == 0)
                                                                <div class="col-sm-1 p-0">
                                                                    <div class="add">
                                                                        <button type="button" id="dynamic-ar-client" class="btn btn-primary" data-count="{{ count($client_logos) }}">+ Add More</button>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div class="col-sm-1 p-0">
                                                                    <div class="remove">
                                                                        <button type="button" class="btn btn-danger remove-input-field-client">Remove</button>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                        <div id="dynamicAddRemoveClient">
                                                            <div class="row mb-2">
                                                                <div class="col-sm-11 uploadfile">
                                                                    <label for="formFileMultiple" class="form-label">Upload brand</label>
                                                                    <input class="form-control" type="file" id="formFileMultiple" name="addMoreBrands[0][image]" multiple>
                                                                </div>
                                                                <div class="col-sm-1 p-0">
                                                                    <div class="add">
                                                                        <button type="button" id="dynamic-ar-client" class="btn btn-primary" data-count="1">+ Add More</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <h4>Showcase Example</h4>
                                                        <div class="row mb-3">
                                                            <div class="col-sm-12">
                                                                @if($showcase_works && count($showcase_works))
                                                                @foreach($showcase_works as $key => $showcase_work)
                                                                @if(isset($showcase_work->image_video))
                                                                    <img height="45" src="{{ asset('storage/uploads/creators/service/showcase/'.$showcase_work->image_video) }}">
                                                                    @endif
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <h4>Pricing</h4>

                                                        @if($pricings && count($pricings))
                                                        @foreach($pricings as $key => $pricing)

                                                        @php
                                                        $social_platform = json_decode($pricing->social_platform);
                                                        @endphp

                                                        <div id="">
                                                            <div class="row row1">
                                                                <div class="col-sm-4 servicecol">
                                                                    @if($key == 0)<label for="label" class="form-label">Service detail</label>@endif
                                                                    <input type="text" class="form-control" name="addMorePricing[{{$key}}][service_detail]" placeholder="2 post , 2 story" value="{{ $pricing->service_detail }}">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    @if($key == 0)<label for="label" class="form-label">Delivery Time</label>@endif
                                                                    <input type="text" class="form-control" name="addMorePricing[{{$key}}][delivery_time]" value="{{ $pricing->delivery_time }}" placeholder="7 days">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    @if($key == 0)<label for="label" class="form-label">Social Media Platform</label>@endif

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" @if (in_array('youtube', $social_platform ?? [] )) checked @endif  id="check1" name="addMorePricing[{{$key}}][social_platform][]" value="youtube" >
                                                                        <label class="form-check-label">YouTube</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" @if (in_array('instagram', $social_platform ?? [] )) checked @endif  id="check1" name="addMorePricing[{{$key}}][social_platform][]" value="instagram" >
                                                                        <label class="form-check-label">Instagram</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" @if (in_array('tiktok', $social_platform ?? [] )) checked @endif  id="check1" name="addMorePricing[{{$key}}][social_platform][]" value="tiktok" >
                                                                        <label class="form-check-label">TikTok</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    @if($key == 0)<label for="label" class="form-label">Price</label>@endif
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="basic-addon1">$</span>
                                                                        <input type="text" class="form-control" name="addMorePricing[{{$key}}][price]" value="{{ $pricing->price }}" placeholder="100">
                                                                    </div>
                                                                </div>
                                                                @if($key == 0)
                                                                <div class="col-sm-1 p-0">
                                                                    <div class="pricelist-addmore">
                                                                        <button type="button" id="dynamic-ar-pricing" class="btn btn-primary" data-count="{{ count($pricings) }}">+ Add More</button>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div class="col-sm-1 p-0">
                                                                    <div class="pricelist-remove">
                                                                        <button type="button" class="btn btn-danger remove-input-field-pricing">Remove</button>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <div id="dynamicAddRemovePricing"></div>
                                                        @else
                                                        <div id="">
                                                            <div class="row row1">
                                                                <div class="col-sm-4 servicecol">
                                                                    <label for="label" class="form-label">Service detail</label>
                                                                    <input type="text" class="form-control" name="addMorePricing[0][service_detail]" placeholder="2 post , 2 story">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label for="label" class="form-label">Delivery Time</label>
                                                                    <input type="text" class="form-control" name="addMorePricing[0][delivery_time]" value="7 days">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="label" class="form-label">Social Media Platform</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="check1" name="addMorePricing[0][social_platform][]" value="youtube" >
                                                                        <label class="form-check-label">YouTube</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="check1" name="addMorePricing[0][social_platform][]" value="instagram" >
                                                                        <label class="form-check-label">Instagram</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="check1" name="addMorePricing[0][social_platform][]" value="tiktok" >
                                                                        <label class="form-check-label">TikTok</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label for="label" class="form-label">Price</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text" id="basic-addon1">$</span>
                                                                        <input type="text" class="form-control" name="addMorePricing[0][price]" placeholder="100">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-1 p-0">
                                                                    <div class="pricelist-addmore">
                                                                        <button type="button" id="dynamic-ar-pricing" class="btn btn-primary" data-count="1">+ Add More</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="dynamicAddRemovePricing">
                                                        </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
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

    <script type="text/javascript">

    $("#dynamic-ar").click(function () {

        var i = $(this).attr('data-count');
        $("#dynamicAddRemove").append('<div class="row mb-2"><div class="col-sm-11 uploadfile"><input type="file" name="addMoreInputFields[' + i +
            '][image_video]" class="form-control" multiple /></div><div class="col-sm-1 p-0"><div class="remove"><button type="button" class="btn btn-danger remove-input-field">Remove</button></div></div></div>'
            );
        i++;
        $("#dynamic-ar").attr('data-count',i);
        
        
    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parent().parent().parent().remove();
    });


     $("#dynamic-ar-client").click(function () {
        var j = $(this).attr('data-count');
        $("#dynamicAddRemoveClient").append('<div class="row mb-2"><div class="col-sm-11 uploadfile"><input type="file" name="addMoreBrands[' + j +
            '][image]" class="form-control" multiple /></div><div class="col-sm-1 p-0"><div class="remove"><button type="button" class="btn btn-danger remove-input-field-client">Remove</button></div></div></div>'
            );
        ++j;
        $("#dynamic-ar-client").attr('data-count',j);
    });
    $(document).on('click', '.remove-input-field-client', function () {
        $(this).parent().parent().parent().remove();
    });


     $("#dynamic-ar-pricing").click(function () {
        var k = $(this).attr('data-count');
        var variable = '<div class="row row2"><div class="col-sm-4 servicecol"><input type="text" name="addMorePricing[' + k + '][service_detail]" class="form-control" placeholder="Enter service detail"></div><div class="col-sm-2"><input type="text" name="addMorePricing[' + k + '][delivery_time]" class="form-control" placeholder="Enter delivery time"></div><div class="col-sm-3"><div class="form-check"><input class="form-check-input" type="checkbox" id="check1" name="addMorePricing[' + k + '][social_platform][]" value="youtube" ><label class="form-check-label">YouTube</label></div><div class="form-check"><input class="form-check-input" type="checkbox" id="check1" name="addMorePricing[' + k + '][social_platform][]" value="instagram" ><label class="form-check-label">Instagram</label></div><div class="form-check"><input class="form-check-input" type="checkbox" id="check1" name="addMorePricing[' + k + '][social_platform][]" value="tiktok" ><label class="form-check-label">TikTok</label></div></div><div class="col-sm-2"><div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">$</span><input type="text" name="addMorePricing[' + k + '][price]" class="form-control" placeholder="Enter price"></div></div><div class="col-sm-1 p-0"><div class="pricelist-remove"><button type="button" class="btn btn-danger remove-input-field-pricing">Remove</button></div></div></div>';
        
        $("#dynamicAddRemovePricing").append(variable);
        ++k;
        $("#dynamic-ar-pricing").attr('data-count',k);
    });
    $(document).on('click', '.remove-input-field-pricing', function () {
        $(this).parent().parent().parent().remove();
    });


    $(document).on('click', '#nextTab', function(event) {
        event.preventDefault();

        $('.nav-pills a[href="#Services"]').tab('show');
        
    });


</script>


@endpush
