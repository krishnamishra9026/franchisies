@extends('layouts.creator')
@section('title','Welcome to Collab Marketplace Account Setting')

@section('content')

@php
$categories = \DB::table('categories')->get(['name', 'id']);
$content_types = \DB::table('content_types')->get(['name', 'id']);
$tags = \DB::table('tags')->get(['name', 'id']);
$pricings = \DB::table('creator_pricings')->where('creator_id', auth()->user()->id)->get();
$showcase_works = \DB::table('creator_showcase_works')->where('creator_id', auth()->user()->id)->get();
$client_logos = \DB::table('creator_client_logos')->where('creator_id', auth()->user()->id)->get();
@endphp

<div class="CreateCampaign creatorMyServices">
    <div class="container">
        <h1>My Services</h1>
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="Campaignadd BoxShadow formstyle">
                        <div id="btnwizard" class="myservices">
                            <ul class="nav nav-pills form-wizard-header mb-4 hidden-xs">
                                <li class="nav-item">
                                    <a href="#tab12" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 1 || empty(request()->get('tab'))) active @else @if($service_completed == 'not completed') disabled @endif  @endif rounded-circle pt-2 pb-2">
                                        <span class="d-none d-sm-inline">1</span>
                                        <div class="servicename">My Services</div>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="#tab22" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 2) active @else @if($service_completed == 'not completed') disabled @endif  @endif rounded-circle pt-2 pb-2">
                                        <span class="d-none d-sm-inline">2</span>
                                        <div class="servicename">My Content</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab32" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 3 ) active @else @if($service_completed == 'not completed') disabled @endif  @endif rounded-circle pt-2 pb-2">
                                        <span class="d-none d-sm-inline">3</span>
                                        <div class="servicename">My Work Showcase</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab42" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 4) active @else @if($service_completed == 'not completed') disabled @endif  @endif rounded-circle pt-2 pb-2">
                                        <span class="d-none d-sm-inline">4</span>
                                        <div class="servicename">My Charges</div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#tab52" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 5) active @else @if($service_completed == 'not completed') disabled @endif  @endif rounded-circle pt-2 pb-2">
                                        <span class="d-none d-sm-inline">5</span>
                                        <div class="servicename">Upgrade My Profile</div>
                                    </a>
                                </li>

                            </ul>

                            <div class="mobile-dropdown hidden-lg">
                                <ul class="nav nav-pills">
                                    <li class="nav-item mb-2">
                                        <a href="#tab12" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 1 || empty(request()->get('tab'))) active @else @if($service_completed == 'not completed') disabled @endif  @endif pt-2 pb-2">My Services</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a href="#tab22" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 2) active @else @if($service_completed == 'not completed') disabled @endif  @endif  pt-2 pb-2">My Content</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a href="#tab32" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 3 ) active @else @if($service_completed == 'not completed') disabled @endif  @endif  pt-2 pb-2">My Work Showcase</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a href="#tab42" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 4) active @else @if($service_completed == 'not completed') disabled @endif  @endif pt-2 pb-2">My Charges</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a href="#tab52" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 5) active @else @if($service_completed == 'not completed') disabled @endif  @endif pt-2 pb-2">Upgrade My Profile</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content mb-0 b-0">

                                <div class="tab-pane @if(request()->get('tab') == 1 || empty(request()->get('tab'))) active @else fade @endif" id="tab12">
                                    <form method="POST" id="creatorsEditForm" action="{{ route('creator.profile-service-save', auth()->user()->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12 col-12 row g-2 mt-0">
                                                <h4>Describe how you can help sponsors promote their products and services.</h4>
                                                <div class="col-md-12 col-12 mb-2">
                                                    <input type="hidden" name="tab" value="1">
                                                    <label for="label" class="form-label">Title<span>*</span> </label>
                                                    <input type="text" required class="form-control" id="talent_title" name="talent_title" value="{{ old('talent_title', auth()->user()->talent_title) }}" placeholder="Enter your title">
                                                    @error('talent_title')
                                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                                    @enderror
                                                </div>

                                                <div class="text-end">
                                                    <input type='submit' class='btn btn-primary button-next' name='next' value='Continue' />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane @if(request()->get('tab') == 2) active @else fade @endif" id="tab22">

                                        <form method="POST" id="creatorsEditForm" action="{{ route('creator.profile-service-save', auth()->user()->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                        <div class="col-sm-12 col-12 row g-2 mt-0">
                                            <h4>About My Service</h4>
                                            <div class="col-md-12 col-12 mt-0 mb-2" style="display:none;">
                                                <input type="hidden" name="tab" value="2">
                                                <label for="label" class="form-label">What will you create?</label>
                                                <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose type of content ..." name="content_type[]">
                                                    <option value="">Select type of content</option>
                                                    @foreach($content_types as $content_type)
                                                    <option @if(in_array($content_type->id, old('content_type', $selected_content_types))) selected @endif value="{{$content_type->id}}">{{$content_type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 col-12 mb-2">
                                                <label for="label" class="form-label">What are your social channel about?</label>
                                                <select  class="form-control select2 select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose category ..." name="category[]">
                                                    <option value="">Select your category</option>
                                                    @foreach($categories as $category)
                                                    <option @if(in_array($category->id, old('category', $selected_categories))) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 col-12 mb-3">
                                                <label for="label" class="form-label">Get discovered<span>*</span> <span class="ovisible">(Brands will find your with these keywords)</span></label>
                                                <select required class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose tags ..." name="tag[]">
                                                    <option value="">Select tags</option>
                                                    @foreach($tags as $tag)
                                                    <option @if(in_array($tag->id, old('tag', $selected_tags))) selected @endif value="{{$tag->id}}">{{$tag->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-sm-6 col-6 text-start">
                                                <a href="{{ route('creator.my-services', ['tab' => 1]) }}" class='btn btn-default button-previous'>Back</a>
                                            </div>
                                            <div class="col-sm-6 col-6 text-end">
                                                <input type='submit' class='btn btn-primary button-next' name='next' value='Continue' />

                                            </div>
                                        </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane @if(request()->get('tab') == 3) active @else fade @endif" id="tab32">

                                        <form method="POST" id="creatorsEditForm" action="{{ route('creator.profile-service-save', auth()->user()->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                            <div class="col-sm-12 col-12 g-2 mt-0">
                                                    <div class="row">
                                                        <input type="hidden" name="tab" value="3">
                                                        <div class="col-sm-7 col-12">
                                                            <div class="show-work">
                                                                <h4>Showcase of your work</h4>
                                                                <input type="hidden" name="tab" value="3">
                                                                <p>In order to increase the likelihood of being hired, upload high quality content.<br/>
                                                                    Please upload atleast 4 assets to save and continue</p>

                                                                    @if ($message = Session::get('error'))
                                                                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                        <strong><i class="dripicons-wrong me-2"></i> </strong>{{ $message }}
                                                                    </div>
                                                                    @endif
                                                                <div class="row">
                                                                    @if($showcase_works && count($showcase_works))
                                                                    @foreach($showcase_works as $showcase_work)
                                                                    <div class="col-sm-3 col-6">
                                                                        <div class="uploaded-image">
                                                                            @if(checkFileTypeIsImage(asset('storage/uploads/creators/service/showcase/'.$showcase_work->image_video)))
                                                                            <img src="{{ asset('storage/uploads/creators/service/showcase/'.$showcase_work->image_video) }}" class="img-fluid" />
                                                                            @else

                                                                                @if($showcase_work->image_video)
                                                                                <video width="100%" height="297px" controls muted loop>
                                                                                    <source src="{{ asset('storage/uploads/creators/service/showcase/'.$showcase_work->image_video) }}" type="video/mp4">
                                                                                </video>
                                                                                @else
                                                                                <video width="100%" height="297px" controls muted loop>
                                                                                    <source src="{{ asset('assets/images/frontend/instagram_video_dashinit.mp4') }}" type="video/mp4">
                                                                                </video>
                                                                                @endif

                                                                            @endif
                                                                            <div class="remove">
                                                                                <a href="{{ route('creator.delete-showase-work', $showcase_work->id) }}">Remove</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                    @endif

                                                                    @if(count($showcase_works) < 3)
                                                                    {!! str_repeat('
                                                                    <div class="col-sm-3 col-6">
                                                                        <div class="form-group">
                                                                            <div class="upload-image">
                                                                                <div class="uploadimg">
                                                                                    <input type="file" id="default_file" />
                                                                                    <div class="upbtns">
                                                                                        <img src="/assets/images/frontend/icons/upload.png" />
                                                                                        <p>upload video or an image</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    ', 3 - count($showcase_works)) !!}
                                                                    @endif

                                                                    <div class="col-sm-3 col-6">
                                                                        <div class="form-group">
                                                                            <div class="upload-image">
                                                                                <div class="uploadimg">
                                                                                    <input type="file" id="default_file" />
                                                                                    <div class="upbtns">
                                                                                        <img src="{{ asset('assets/images/frontend/icons/upload.png') }}" />
                                                                                        <p>upload video or an image</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="client-logo mb-3 mt-4">
                                                                <h4>Top Client Logo's</h4>
                                                                <p>Boost your visibility by displaying the client you have worked before.</p>
                                                                <div class="row">

                                                                    @if($client_logos && count($client_logos))
                                                                    @foreach($client_logos as $client_logo)
                                                                    <div class="col-sm-3 col-6">
                                                                        <div class="uploaded-brand">
                                                                            <img src="{{ asset('storage/uploads/creators/service/brands/'.$client_logo->image) }}" class="img-fluid" />
                                                                            <div class="remove">
                                                                                <a href="{{ route('creator.delete-client-logo', $client_logo->id) }}">Remove</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                    @endif

                                                                    @if(count($client_logos) < 3)
                                                                    {!! str_repeat('
                                                                    <div class="col-sm-3 col-6">
                                                                        <div class="form-group">
                                                                            <div class="upload-brand">
                                                                                <div class="uploadimg">
                                                                                    <input type="file" id="default_file_logo" />
                                                                                    <div class="upbtns">
                                                                                        <img src="/assets/images/frontend/icons/upload.png" />
                                                                                        <p>upload brand</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="text-center" style="font-size:11px; color:#777;">Dimension 250 X 130</p>
                                                                        </div>
                                                                    </div>
                                                                    ', 3 - count($client_logos)) !!}
                                                                    @endif

                                                                    <div class="col-sm-3 col-6">
                                                                        <div class="form-group">
                                                                            <div class="upload-brand">
                                                                                <div class="uploadimg">
                                                                                    <input type="file" id="default_file_logo"  />
                                                                                    <div class="upbtns">
                                                                                        <img src="{{ asset('assets/images/frontend/icons/upload.png') }}" />
                                                                                        <p>upload brand</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="text-center" style="font-size:11px; color:#777;">Dimension 250 X 130</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5 col-12">
                                                            <div class="showcase-example">
                                                                <h4 class="mb-3">Showcase Example</h4>
                                                                <div class="row">
                                                                    @if($showcase_works && count($showcase_works))
                                                                    @foreach($showcase_works as $showcase_work)
                                                                    <div class="col-sm-3 col-6">
                                                                        <div class="uploaded-image">

                                                                            @if(checkFileTypeIsImage(asset('storage/uploads/creators/service/showcase/'.$showcase_work->image_video)))
                                                                            <img src="{{ asset('storage/uploads/creators/service/showcase/'.$showcase_work->image_video) }}" class="img-fluid" />
                                                                            @else
                                                                            <video width="100%" height="297px" controls muted loop>
                                                                                <source src="{{ asset('storage/uploads/creators/service/showcase/'.$showcase_work->image_video) }}" type="video/mp4">
                                                                            </video>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-6 text-start">
                                                            <a href="{{ route('creator.my-services', ['tab' => 2]) }}" class='btn btn-default button-previous'>Back</a>
                                                        </div>
                                                        <div class="col-sm-6 col-6 text-end">
                                                            <input type='submit' class='btn btn-primary button-next' name='next' value='Continue' />
                                                        </div>
                                                    </div>

                                            </div>
                                            </div>
                                        </form>

                                </div>
                                <div class="tab-pane @if(request()->get('tab') == 4) active @else fade @endif" id="tab42">
                                    <form method="POST" id="creatorsEditForm" action="{{ route('creator.profile-service-save', auth()->user()->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12 col-12 g-2 mt-0 pricinglist">
                                                <h4>Pricing</h4>

                                                

                                                @if($pricings && count($pricings))
                                                @foreach($pricings as $key => $pricing)
                                                @php
                                                $social_platform = json_decode($pricing->social_platform);
                                                @endphp
                                                <div id="my-service-price">
                                                    <div class="row row1">
                                                        <input type="hidden" value="4" name="tab">
                                                        <div class="col-sm-4 servicecol">
                                                            @if($key == 0)<label for="label" class="form-label">Service detail</label>@endif
                                                            <select class="form-control" name="addMorePricing[{{$key}}][service_detail]">
                                                                <option value="">Select type of content</option>
                                                                @foreach($content_types as $content_type)
                                                                <option @if($content_type->name == $pricing->service_detail) selected @endif value="{{$content_type->name}}">{{$content_type->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            @if($key == 0)<label for="label" class="form-label">Delivery Time</label>@endif
                                                            <input type="text" class="form-control" required name="addMorePricing[{{$key}}][delivery_time]" value="{{ $pricing->delivery_time }}" placeholder="7 days">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            @if($key == 0)<label for="label" class="form-label">Social Media Platform</label>@endif
                                                            <div class="SocialPlatformSelect">
                                                                <div class="form-check form-check-inline radio">
                                                                    <label>
                                                                        <input type="radio" @if (in_array('youtube', $social_platform ?? [] )) checked @endif id="check1{{$key}}" class="btn-check" name="addMorePricing[{{$key}}][social_platform][]" value="youtube">
                                                                        <label class="form-check-label forcustom" for="check1{{$key}}"> YouTube</label>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline radio">
                                                                    <label>
                                                                        <input type="radio" @if (in_array('instagram', $social_platform ?? [] )) checked @endif id="check2{{$key}}" class="btn-check"  name="addMorePricing[{{$key}}][social_platform][]" value="instagram">
                                                                        <label class="form-check-label forcustom" for="check2{{$key}}"> Instagram</label>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline radio">
                                                                    <label>
                                                                        <input type="radio" @if (in_array('tiktok', $social_platform ?? [] )) checked @endif id="check3{{$key}}" class="btn-check"  name="addMorePricing[{{$key}}][social_platform][]" value="tiktok">
                                                                        <label class="form-check-label forcustom" for="check3{{$key}}"> TikTok</label>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-2">
                                                            @if($key == 0)<label for="label" class="form-label">Price</label>@endif
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                                <input type="text" class="form-control" required name="addMorePricing[{{$key}}][price]" value="{{ $pricing->price }}" placeholder="100">
                                                            </div>
                                                        </div>
                                                        @if($key == 0)
                                                        <div class="col-sm-1 p-0">
                                                            <div class="pricelist-addmore" style="display:none;">
                                                                <button type="button" class="btn btn-primary dynamic-ar-pricing" id="dynamic-ar-pricing" data-count="{{ count($pricings) }}">+ Add More</button>
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
                                                <div id="dynamicAddRemovePricing">
                                                </div>
                                                @else
                                                <div>
                                                    <div class="row row1">
                                                        <input type="hidden" value="4" name="tab">
                                                        <div class="col-sm-4 servicecol">
                                                            <label for="label" class="form-label">Service detail</label>

                                                            <select class="form-control" name="addMorePricing[0][service_detail]">
                                                                <option value="">Select type of content</option>
                                                                @foreach($content_types as $content_type)
                                                                <option value="{{$content_type->name}}">{{$content_type->name}}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label for="label" class="form-label">Delivery Time</label>
                                                            <input type="text" class="form-control" required name="addMorePricing[0][delivery_time]" placeholder="7 days">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="label" class="form-label">Social Media Platform</label>
                                                            <div class="SocialPlatformSelect">
                                                                <div class="form-check form-check-inline radio">
                                                                    <label>
                                                                        <input type="radio" id="check1" class="btn-check" name="addMorePricing[0][social_platform][]" value="youtube">
                                                                        <label class="form-check-label forcustom" for="check1"> YouTube</label>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline radio">
                                                                    <label>
                                                                        <input type="radio" id="check2" class="btn-check" name="addMorePricing[0][social_platform][]" checked value="instagram">
                                                                        <label class="form-check-label forcustom" for="check2"> Instagram</label>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline radio">
                                                                    <label>
                                                                        <input type="radio" id="check3" class="btn-check" name="addMorePricing[0][social_platform][]" value="tiktok">
                                                                        <label class="form-check-label forcustom" for="check3"> TikTok</label>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label for="label" class="form-label">Price</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                                <input type="text" class="form-control" required name="addMorePricing[0][price]" placeholder="100">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 p-0">
                                                            <div class="pricelist-addmore">
                                                                <button type="button" class="btn btn-primary" id="dynamic-ar-pricing" data-count="0">+ Add More</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="dynamicAddRemovePricing">
                                                    </div>
                                                </div>
                                                @endif

                                                    

                                                <div class="back-more-save mt-3">
                                                    <div class="service_back">
                                                        <a href="{{ route('creator.my-services', ['tab' => 3]) }}" class='btn btn-default button-previous'>Back</a>
                                                    </div>
                                                    <div class="save_continue">
                                                        <div class="button-group">
                                                        <button  type="button" class="btn btn-primary dynamic-ar-pricing" id="dynamic-ar-pricing" data-count="{{ count($pricings) }}">+ Add More</button>
                                                            <button type="submit" class="btn btn-primary">Save and Continue</button>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane @if(request()->get('tab') == 5) active @endif" id="tab52">
                                    <form method="POST" id="creatorsEditForm" action="{{ route('creator.upgarde-save') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="tab" value="5">
                                        <h1>Choose upgrades for your profile (optional)</h1>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            @if($badges && count($badges))
                                            @foreach($badges as $badge)
                                            <div class="upgrade-box mb-2">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="featured-checkbox">
                                                            <input type="hidden" value="0" name="badges[checked][{{$badge->id}}]" />
                                                            @if(in_array($badge->id, $badge_ids??[])) <input type="hidden" value="2" @if(in_array($badge->id, $badge_ids??[])) checked @endif name="badges[checked][{{$badge->id}}]" /> @endif

                                                            @if(!in_array($badge->id, $badge_ids??[])) <input type="checkbox" value="1" @if(in_array($badge->id, $badge_ids??[])) checked @endif name="badges[checked][{{$badge->id}}]" /> @endif <span style="background-color:{{ $badge->color ?? "#f07238" }}">{{ $badge->name }}</span>@if(in_array($badge->id, $badge_ids??[])) <h6>Activated</h6>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        @if(isset($badge->icon))
                                                        <p><img style="max-width: 70px;" src="{{ asset('storage/uploads/badges/'.$badge->icon)  }}"> </p>
                                                        @endif
                                                    </div>
                                                    <div class="col-sm-6 mt-2">
                                                        <p>{{ $badge->description }}</p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="hidden" name="badges[name][{{$badge->id}}]" value="{{ $badge->name }}">
                                                        <input type="hidden" name="badges[price][{{$badge->id}}]" value="{{ $badge->price }}">
                                                        <h3>${{ $badge->price }} USD</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="upgrade-box">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="featured-checkbox">
                                                            <input type="checkbox" /> <span style="background-color:#f07238">Open to Collabs</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p>One of our representative will check your profile and featured on our home page to boost your collab. Take out the guess work and save the time with our paid services.</p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <h3>$20 USD</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                        </div>

                                        <ul class="list-inline wizard mt-4 mb-0">
                                            <li class="previous list-inline-item">
                                                <a href="{{ route('creator.my-services', ['tab' => 4]) }}" class='btn btn-default button-previous'>Back</a>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <button type="submit" class="btn btn-primary" @if(allBadgesPerchagedCreator()) disabled @endif>Proceed to buy</button>
                                                <a href="{{ route('creator.dashboard') }}" class="btn btn-default">Skip</a>
                                            </li>
                                        </ul>
                                            </div>
                                        </div>


                                            <!-- LOOP STARTS -->

                                    </form>
                                </div>

                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')

<!-- bundle -->
<!-- <script src="{{ asset('assets/js/vendor.min.js') }}"></script> -->
{{--  <script src="{{ asset('assets/js/app.min.js') }}"></script>   --}}


<script type="text/javascript">

    $(".dynamic-ar-pricing").click(function () {
        var k = $(this).attr('data-count');
        var variable = '<div class="row row2"><div class="col-sm-4 servicecol"><select class="form-control" name="addMorePricing[' + k + '][service_detail]"><option value="">Select type of content</option>@foreach($content_types as $content_type)<option value="{{$content_type->name}}">{{$content_type->name}}</option>@endforeach</select></div><div class="col-sm-2"><input type="text" required name="addMorePricing[' + k + '][delivery_time]" class="form-control" placeholder="Enter delivery time"></div><div class="col-sm-3"><div class="SocialPlatformSelect"><div class="form-check form-check-inline radio"><label><input type="checkbox" id="check1' + k + '" class="btn-check"  name="addMorePricing[' + k + '][social_platform][]" value="youtube"><label class="form-check-label forcustom" for="check1' + k + '"> YouTube</label></label></div><div class="form-check form-check-inline radio"><label><input type="checkbox" id="check2' + k + '" class="btn-check"  name="addMorePricing[' + k + '][social_platform][]"  value="instagram"><label class="form-check-label forcustom" for="check2' + k + '"> Instagram</label></label></div><div class="form-check form-check-inline radio"><label><input type="checkbox" id="check3' + k + '" class="btn-check" name="addMorePricing[' + k + '][social_platform][]" value="tiktok"><label class="form-check-label forcustom" for="check3' + k + '"> TikTok</label></label></div></div></div><div class="col-sm-2"><div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">$</span><input type="text" required name="addMorePricing[' + k + '][price]" class="form-control" placeholder="Enter price"></div></div><div class="col-sm-1 p-0"><div class="pricelist-remove"><button type="button" class="btn btn-danger remove-input-field-pricing">Remove</button></div></div></div>';

        $("#dynamicAddRemovePricing").append(variable);
        ++k;
        $(".dynamic-ar-pricing").attr('data-count',k);
    });
    $(document).on('click', '.remove-input-field-pricing', function () {
        $(this).parent().parent().parent().remove();
    });


    $('#default_file').change(function(){
        formdata = new FormData();
        if($(this).prop('files').length > 0)
        {
            file =$(this).prop('files')[0];
            formdata.append("_token", "{{ csrf_token() }}");
            formdata.append("image", file);
        }

        jQuery.ajax({
            url: "{{ route('creator.upload-showase-work') }}",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (result) {
                location = "{{ route('creator.my-services') }}?tab=3";
            }
        });
    });

      $('#default_file_logo').change(function(){
        formdata = new FormData();
        if($(this).prop('files').length > 0)
        {
            file =$(this).prop('files')[0];
            formdata.append("_token", "{{ csrf_token() }}");
            formdata.append("image", file);
        }

        jQuery.ajax({
            url: "{{ route('creator.upload-client-logo') }}",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (result) {
                location = "{{ route('creator.my-services') }}?tab=3";
            }
        });
    });


    $('#default_file_example').change(function(){
        formdata = new FormData();
        if($(this).prop('files').length > 0)
        {
            file =$(this).prop('files')[0];
            formdata.append("_token", "{{ csrf_token() }}");
            formdata.append("image", file);
        }

        jQuery.ajax({
            url: "{{ route('creator.upload-showcase-example') }}",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (result) {
                location = "{{ route('creator.my-services') }}?tab=3";
            }
        });
    });

/*
    $('.continue').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});
$('.back').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});*/


   /* $(".button-next").click(function(event) {
        event.preventDefault();
        if($("#talent_title").val() == ''){
            $("#error-talent-title").html("Talent title field required!");
            return false;
        }else{
            $("#error-talent-title").html("");
            return true;
        }
    });*/
    $(document).ready(function() {
        $('.select2-multiple').select2();
    });

</script>
<!-- demo app -->
{{-- <script src="{{ asset('assets/js/pages/demo.form-wizard.js') }}"></script> --}}

<!-- end demo js-->
@endpush
