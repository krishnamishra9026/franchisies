@extends('layouts.app')
@if(isset($filter_category) && !empty($filter_category))
@section('title', $category_meta_title)
@section('description', $category_meta_description)
@else
@section('title', 'Revolutionize Your Channel: Content Creators Are Dominating the Digital Landscape! - Winwinpromo')
@section('description', "The ultimate guide for content creators! We unravel the secrets and proven strategies that can elevate your content to new heights. Whether you're a seasoned creator or just starting, unleash your creative potential and pave the way for success - Winwinpromo")
@endif
@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endsection
@section('content')

<div class="marketplace">
    <div class="MSearch">
        <div class="container">
            @if(isset($category_h1_title))
            <h1>{{ $category_h1_title }}</h1>
            @else
            <h1>Marketplace Magic: Turning Browsers into Buyers with Expert Strategies</h1>
            @endif
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="searchbar BoxShadow">
                        <form action="{{ route('marketplace.creators') }}">
                            <div class="input-group mb-3">
                                <input type="text" id="searchUser" value="{{ request()->get('search') }}" name="search" class="form-control" placeholder="Search for Creator">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text"><img src="{{ asset('assets/images/frontend/icons/search-black.png') }}" alt="Search" /></button>
                                </div>
                            </div>
                        </form>
                        <div class="creators-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" href="{{ route('marketplace.creators') }}">Content Creators</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{{ route('marketplace.campaigns') }}">Ad Campaigns</a>
                                </li>
                              </ul>
                        </div>
                    </div>

                </div>


                <div class="col-sm-12 col-12">
                    <form action="{{ route('marketplace.creators') }}" id="" method="GET">
                    <div class="search-creators">
                        <button type="button" id="ShowFilter" class="btn btn-primary mb-2  d-sm-none">Show Filter</button>
                        <button type="button" id="HideFilter" class="btn btn-primary mb-2 d-sm-none">Hide Filter</button>
                        <div class="BoxShadow">
                            <div class="row">
                                <div class="col-sm-3 col-12" id="filter">
                                    <div class="filter">
                                        <h4>Filter </h4>

                                        <div class="filter-content">
                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Quotation Price</span></li>
                                                    <li><a href="" id="clear-filter-price">Clear</a></li>
                                                </ul>
                                            </div>
                                            <div class="filterlist">
                                                <div class="pricerange">
                                                    <input type="range" id="pixels" min="0" max="1000" value="{{ request()->get('max-price') ?? 0 }}" oninput="check_slider('pixels_val','pixels');">

                                                    <div class="minmax-price">
                                                        <div class="form-group">
                                                            <label for="label" class="form-label">Min</label>
                                                            <input type="text" name="min-price" id="input-left" class="form-control" value="{{ request()->get('min-price') ?? 0 }}" placeholder="$0">
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="label" class="form-label">Max</label>
                                                            <input type="text" name="max-price" id="input-right" class="form-control" value="{{ request()->get('max-price') ?? 0 }}" placeholder="$1000">
                                                          </div>
                                                          <div class="form-group">
                                                            <button type="button" id="filter_price" style="margin-top:26px;" class="wt-btn btn btn-primary" ><i class="fa fa-filter" title="Filter Price" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="filter-content">
                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Platform</span></li>
                                                    <li><a href="#" id="clear-platform-filter">Clear</a></li>
                                                </ul>
                                            </div>
                                            <div class="filterlist">
                                                <ul>
                                                    <li>
                                                        <div class="form-group platform-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input plateform-check" type="checkbox" {{ ( !empty($_GET['platform']) && in_array('youtube', $_GET['platform'] )) ? 'checked' : '' }} name="platform[]" value="youtube">
                                                                <span class="form-check-label">
                                                                    YouTube
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group platform-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input plateform-check" type="checkbox" {{ ( !empty($_GET['platform']) && in_array('tiktok', $_GET['platform'] )) ? 'checked' : '' }} name="platform[]" value="tiktok">
                                                                <span class="form-check-label">
                                                                TikTok
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check platform-filter">
                                                                <input class="form-check-input plateform-check" type="checkbox" {{ ( !empty($_GET['platform']) && in_array('instagram', $_GET['platform'] )) ? 'checked' : '' }} name="platform[]" value="instagram">
                                                                <span class="form-check-label">
                                                                Instagram
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Followers Count</span></li>
                                                    <li><a href="#" id="clear-followers-filter">Clear</a></li>
                                                </ul>
                                            </div>
                                            <div class="filterlist">
                                                <ul>
                                                    <li>
                                                        <div class="form-group followers-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input followers-check" type="checkbox" {{ ( !empty($_GET['followers']) && in_array('1k+', $_GET['followers'] )) ? 'checked' : '' }} name="followers[]" value="1k+">
                                                                <span class="form-check-label">
                                                                    1k+
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group followers-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input followers-check" type="checkbox" {{ ( !empty($_GET['followers']) && in_array('10k+', $_GET['followers'] )) ? 'checked' : '' }} name="followers[]" value="10k+">
                                                                <span class="form-check-label">
                                                                10k+
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group followers-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input followers-check" type="checkbox" {{ ( !empty($_GET['followers']) && in_array('20k+', $_GET['followers'] )) ? 'checked' : '' }} name="followers[]" value="20k+">
                                                                <span class="form-check-label">
                                                                20k+
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group followers-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input followers-check" type="checkbox" {{ ( !empty($_GET['followers']) && in_array('50k+', $_GET['followers'] )) ? 'checked' : '' }} name="followers[]" value="50k+">
                                                                <span class="form-check-label">
                                                                50k+
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group followers-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input followers-check" type="checkbox" {{ ( !empty($_GET['followers']) && in_array('100k+', $_GET['followers'] )) ? 'checked' : '' }} name="followers[]" value="100k+">
                                                                <span class="form-check-label">
                                                                100k+
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group followers-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input followers-check" type="checkbox" {{ ( !empty($_GET['followers']) && in_array('500k+', $_GET['followers'] )) ? 'checked' : '' }} name="followers[]" value="500k+">
                                                                <span class="form-check-label">
                                                                500k+
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Location</span></li>
                                                    <li><a href="#" id="clear-state-country-filter">Clear</a></li>
                                                </ul>
                                            </div>
                                            <div class="filterlist">
                                                <ul>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-select country-check" id="country" name="country">
                                                                <option value="">Select Country</option>
                                                                @foreach($countries as $country)
                                                                <option data-country-id="{{ $country->id }}" value="{{ $country->country }}"  @if(old('country', request()->get('country')) == $country->country) selected @endif>{{ $country->country }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="form-group mt-2 Csearch">
                                                            <div class="input-group">
                                                                <input type="text" id="searchCity" class="form-control filter-records" name="city" placeholder="Enter City" value="{{ request()->get('city') }}"><button class="city-check input-group-text"><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Category</span></li>
                                                    <li><a href="#" id="clear-category-filter">Clear</a></li>
                                                </ul>
                                            </div>
                                            <div class="filterlist over-category">
                                                <div class="Csearch">
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control filter-records" placeholder="Search by category">
                                                        <span class="input-group-text wt-searchgbtn" id="basic-addon2"><i class="fa fa-search"></i></span>
                                                    </div>
                                                </div>
                                                <ul>
                                                    @if($categories)
                                                    @foreach($categories as $category)
                                                    @php
                                                    $checked = ( !empty($_GET['category']) && in_array($category->id, $_GET['category'] )) ? 'checked' : '';
                                                    if(empty($checked)){
                                                        $checked = ($category->id == @$filter_category)  ? 'checked' : '';
                                                    }
                                                    @endphp
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check wt-checkbox">
                                                                <input {{ $checked }} class="form-check-input category-check" name="category[]" type="checkbox" value="{{ $category->id }}">
                                                                <span class="form-check-label">
                                                                    {{ $category->name }}
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>

                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Gender</span></li>
                                                    <li><a href="#" id="clear-gender-filter">Clear</a></li>
                                                </ul>
                                            </div>
                                            <div class="filterlist">
                                                <ul>
                                                    <li>
                                                        <div class="form-group gender-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input gender-check" type="checkbox" {{ ( !empty($_GET['gender']) && in_array('Male', $_GET['gender'] )) ? 'checked' : '' }} name="gender[]" value="Male">
                                                                <span class="form-check-label">
                                                                    Male
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group gender-filter">
                                                            <label class="form-check">
                                                                <input class="gender-check form-check-input" type="checkbox" {{ ( !empty($_GET['gender']) && in_array('Female', $_GET['gender'] )) ? 'checked' : '' }} name="gender[]" value="Female">
                                                                <span class="form-check-label">
                                                                Female
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group gender-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input gender-check" type="checkbox" {{ ( !empty($_GET['gender']) && in_array('Other', $_GET['gender'] )) ? 'checked' : '' }} name="gender[]" value="Other">
                                                                <span class="form-check-label">
                                                                Other
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Rating</span></li>
                                                    <li><a href="#" id="clear-rating-filter">Clear</a></li>
                                                </ul>
                                            </div>
                                            <div class="filterlist">
                                                <ul>
                                                    <li>
                                                        <div class="form-group rating-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input rating-check" type="checkbox"  {{ ( !empty($_GET['rating']) && in_array('1', $_GET['rating'] )) ? 'checked' : '' }} name="rating[]" value="1">
                                                                <span class="form-check-label">
                                                                    1 Star
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group rating-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input rating-check" type="checkbox"  {{ ( !empty($_GET['rating']) && in_array('2', $_GET['rating'] )) ? 'checked' : '' }} name="rating[]" value="2">
                                                                <span class="form-check-label">
                                                                2 Star
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group rating-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input rating-check" type="checkbox"  {{ ( !empty($_GET['rating']) && in_array('3', $_GET['rating'] )) ? 'checked' : '' }} name="rating[]" value="3">
                                                                <span class="form-check-label">
                                                                3 Star
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group rating-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input rating-check" type="checkbox"  {{ ( !empty($_GET['rating']) && in_array('4', $_GET['rating'] )) ? 'checked' : '' }} name="rating[]" value="4">
                                                                <span class="form-check-label">
                                                                4 Star
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group rating-filter">
                                                            <label class="form-check">
                                                                <input class="form-check-input rating-check" type="checkbox"  {{ ( !empty($_GET['rating']) && in_array('5', $_GET['rating'] )) ? 'checked' : '' }} name="rating[]" value="5">
                                                                <span class="form-check-label">
                                                                5 Star
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-flex custom-flex">
                                        <!-- <button type="submit" id="filter_me" class="wt-btn btn btn-primary" >Apply Filter</button> -->
                                        <button type="button" id="clear_filter" class="wt-btn btn btn-default" >Clear Filter</button>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-12" id="Creator-list">
                                    <div class="row display-control">
                                        <div class="col-sm-3 col-12">
                                            <div class="result">
                                                <span>Top results {{ $creators->firstItem() }}-{{ $creators->lastItem() }} of {{ $creators->total() }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="sortby">
                                                <select id="input-sort" name="sortby"  class="form-select">
                                                    <option value="" selected>Sort by (Default)</option>
                                                    <option @if(request()->get('sortby') == 'price-asc') selected @endif  value="price-asc">Price (Low &gt; High)</option>
                                                    <option @if(request()->get('sortby') == 'price-desc') selected @endif  value="price-desc">Price (High &gt; Low)</option>
                                                    <option @if(request()->get('sortby') == 'instagram-followers') selected @endif  value="instagram-followers">Number of instagram followers</option>
                                                    <option @if(request()->get('sortby') == 'youtube-followers') selected @endif  value="youtube-followers">Number of youtube followers</option>
                                                    <option @if(request()->get('sortby') == 'tiktok-followers') selected @endif  value="tiktok-followers">Number of tiktok followers</option>
                                                    <option @if(request()->get('sortby') == 'rating') selected @endif  value="rating">Rating</option>
                                                    <option @if(request()->get('sortby') == 'latest') selected @endif  value="latest">New on site</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    @if($creators && count($creators))
                                    @foreach($creators as $creator)
                                    <div class="row creatorlist @if($creator->badge_ids && count(json_decode($creator->badge_ids))) paidUser @endif">
                                        <div class="col-sm-3 col-12 paddingleft">
                                            <div class="LProfile">
                                                <div class="image">
                                                    <div class="listing-image-box">

                                                            @if(isset($creator->showCaseData) && isset($creator->showCaseData[0]))
                                                            <a href="{{ route('profileview', $creator->slug) }}">
                                                                <img src="{{ asset('storage/uploads/creators/service/showcase/'.$creator->showCaseData[0]->image_video) }}" class="img-fluid" alt="{{ $creator->talent_title }}">
                                                            </a>
                                                            @else
                                                            <a href="{{ route('profileview', $creator->slug) }}">
                                                                <img src="{{ asset('assets/images/frontend/creator-placeholder.jpeg') }}" class="img-fluid" alt="{{ $creator->talent_title }}">
                                                            </a>
                                                            @endif

                                                    </div>
                                                    {{--  <div class="open-collabs">
                                                        <a href="{{ route('profileview', $creator->slug) }}">
                                                            <img src="{{ asset('assets/images/frontend/icons/handshake.png') }}" alt="Open to Collabs">
                                                            <span>Open to collabs</span>
                                                        </a>
                                                    </div>  --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="Lcaption">
                                                <div class="panel-heading"><a href="{{ route('profileview', $creator->slug) }}">{{ $creator->talent_title }}</a></div>
                                                <div class="user">
                                                    <div class="avtar-profile-image">
                                                        @if(isset($creator->avatar))
                                                        <a href="{{ route('profileview', $creator->slug) }}">
                                                            <img src="{{ asset('storage/uploads/creators/'.$creator->avatar) }}"  alt="{{$creator->firstname.' '.$creator->lastname }}">
                                                        </a>
                                                        @else
                                                        <a href="{{ route('profileview', $creator->slug) }}">
                                                            <img src="{{ asset('assets/images/frontend/user-profile-placeholder.png') }}"  alt="{{$creator->firstname.' '.$creator->lastname }}">
                                                        </a>
                                                        @endif
                                                    </div>
                                                    <div class="userN">
                                                        <div class="col-badges">
                                                            <h5 class="username"><a href="{{ route('profileview', $creator->slug) }}">{{$creator->firstname.' '.$creator->lastname }}</a></h5>
                                                            @if($creator->badge_ids && count(json_decode($creator->badge_ids)))
                                                            @php
                                                            $badge_ids = json_decode($creator->badge_ids);
                                                            @endphp
                                                            @if($badge_ids)
                                                            @foreach($badge_ids as $key => $badge)
                                                            
                                                            @if(getBadgeById($badge) && getBadgeById($badge)->icon)
                                                            <div class="tooltip collabs">
                                                                <img src="{{ asset('storage/uploads/badges/'.getBadgeById($badge)->icon) }}" style="max-height:26px;" alt="Featured Sponsor">
                                                                <span class="tooltiptext">{{ getBadgeById($badge)->name }}</span>
                                                            </div>
                                                            @endif
                                                            @endforeach
                                                            @endif
                                                            @endif
                                                        </div>
                                                        <div class="rating">
                                                            <a href="{{ route('profileview', $creator->slug) }}">
                                                                {!! str_repeat('<span><i class="fa fa-star checked"></i></span>', round($creator->reviews->avg('rating'))) !!}
                                                                {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - round($creator->reviews->avg('rating'))) !!}
                                                                {{ number_format($creator->reviews->avg('rating'),1) }}
                                                            </a>
                                                        </div>
                                                        <div class="location">
                                                            <ul class="list-inline">
                                                                <li><span> {{ $creator->username ? '@'.$creator->username : ''  }}</span></li>
                                                                @if($creator->state || $creator->country)<li><span><img src="{{ asset('assets/images/frontend/icons/map.png') }}" alt="Location"> {{ $creator->state }}, {{ $creator->country }}</span></li>@endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if($creator->pricingData && count($creator->pricingData))
                                                <div class="creator-Category">
                                                    <ul class="list-inline">
                                                        @foreach($creator->pricingData as $charges)
                                                        <li class="list-inline-item"><span>{{ $charges->service_detail }}</span></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif

                                                <div class="followers">
                                                    <ul class="list-inline">

                                                @if($creator->instagram_connected)
                                                <li><a href="{{ route('profileview', $creator->slug) }}" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/instagram.svg') }}" alt="instagram" /> {{ $creator->instagram_subscribers_or_followers }}</span></a></li>
                                                @endif
                                                @if($creator->youtube_connected)
                                                <li><a href="{{ route('profileview', $creator->slug) }}" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/youtube-icon.svg') }}" alt="instagram" /> {{ $creator->youtube_subscribers_or_followers }}</span></a></li>
                                                @endif
                                                @if($creator->tiktok_connected)
                                                <li><a href="{{ route('profileview', $creator->slug) }}" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/tiktok-icon.svg') }}" alt="instagram" /> {{ $creator->tiktok_subscribers_or_followers }}</span></a></li>
                                                @endif


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="LRight">
                                                <div class="wish-list">
                                                    <p>Add to favorites</p>
                                                    <i class="fa @if($creator->favorite) fa-heart @else fa-heart-o @endif wishlist" data-creator-id="{{ $creator->id }}"></i>
                                                </div>

                                                @if( $creator->pricingData && isset($creator->pricingData[0]))
                                                <div class="price">
                                                    <p>Starting from <span>{{ '$'.$creator->pricingData[0]->price ??'' }}</span></p>
                                                </div>
                                                @endif



                                            </div>
                                            <div class="viewbtn">
                                                    <a href="{{ route('profileview', $creator->slug) }}" class="btn btn-primary btn-lg">View Details</a>
                                                </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div>No data Available</div>
                                    @endif



                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="pagination">
                                                {{ $creators->appends(request()->query())->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!isset($category_h2_tag))
                        <h2>Winwinpromo: Where customers meet content creators</h2>
                        <p>Winwinpromo is a platform where content creators can connect with individuals or businesses looking for creative services. These marketplaces serve as a bridge between those seeking content and those who can produce it. Here are some key features and aspects commonly found in content creator marketplaces</p>
                        @endif
                    </div>
                   </form>
                </div>


                @if(isset($category_h2_tag))
                <h2>{{ $category_h2_tag }}</h2>
                @endif


                @if(isset($category_page_description))
                <p>{{ $category_page_description }}</p>
                @endif

            </div>

        </div>
    </div>
</div>


@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    var path = "{{ route('get-search-keywords') }}";
    $( "#searchUser" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
             search: request.term
         },
         success: function(data) {
             response(data);
         }
     });
      },
      select: function (event, ui) {
         $('#searchUser').val(ui.item.label);
         return false;
     }
 });
</script>


<script type="text/javascript">
    var path = "{{ route('get-search-city') }}";
    $( "#searchCity" ).autocomplete({
        source: function( request, response ) {
            $.ajax({
                url: path,
                type: 'GET',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {


                    if(!data.length){
                        var result = [
                        {
                            label: 'No matches found',
                            value: response.term
                        }
                        ];
                        response(result);
                    }
                    else{


                        response(data);
                    }
                }
            });
        },
        select: function (event, ui) {
            $('#searchCity').val(ui.item.label);
            return false;
        }
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.wt-searchgbtn', function(event) {
        event.preventDefault();
        $("#filter_me").trigger('click');
    });


    $(document).on('click', '#clear-category-filter', function(event) {
        event.preventDefault();
        $('.wt-checkbox input:checkbox').prop('checked', false);
        $("#filter_me").trigger('click');
    });


    $(document).on('click', '#clear-platform-filter', function(event) {
        event.preventDefault();
        $('.platform-filter input:checkbox').prop('checked', false);
        $("#filter_me").trigger('click');
    });


    $(document).on('click', '#clear-gender-filter', function(event) {
        event.preventDefault();
        $('.gender-filter input:checkbox').prop('checked', false);
        $("#filter_me").trigger('click');
    });

    $(document).on('click', '#clear-rating-filter', function(event) {
        event.preventDefault();
        $('.rating-filter input:checkbox').prop('checked', false);
        $("#filter_me").trigger('click');
    });

    $(document).on('click', '#clear-followers-filter', function(event) {
        event.preventDefault();
        $('.followers-filter input:checkbox').prop('checked', false);
        $("#filter_me").trigger('click');
    });

</script>

<script>
$(document).ready(function(){
  $(".tabone2").click(function(){
        $('.before').css("display", "none");
        $('.after').css("display", "inline-flex");
        // $('.before').css("display", "block");
  });
  $(".tabone1").click(function(){
        $('.before').css("display", "inline-flex");
        $('.after').css("display", "none");
        // $('.before').css("display", "block");
  });

});
</script>
<script type="text/javascript">


    /*$(document).on('change', '#state', function(event) {
        event.preventDefault();
        window.location.href = "{{ url('marketplace/creator?state=') }}"+$(this).val();
    });

    $(document).on('change', '#country', function(event) {
        event.preventDefault();
        window.location.href = "{{ url('marketplace/creator?country=') }}"+$(this).val();
    });*/

    $('.filter-records').on('keyup', function () {
        var content1 = $(this).val();
        if(content1.length > 0){
        var content = content1.charAt(0).toUpperCase() + content1.slice(1);
    }else{
        var content = content1.charAt(0).toUpperCase();
    }
        $(this).parents('.filterlist').find('.wt-checkbox:contains(' + content + ')').show();
        $(this).parents('.filterlist').find('.wt-checkbox:not(:contains(' + content + '))').hide();
    });

    $("#clear_filter").click(function() {
        window.location.href = "{{ route('marketplace.creators') }}";
    });

    $(".wishlist").click(function() {

        var user_id = "{{ auth()->user() ? auth()->user()->id : '' }}";

        if(user_id == ''){
            window.location.href = "{{ url('/login') }}";
            return false;
        }

        var creator_id  = $(this).data('creator-id');

        var token = "{{ csrf_token() }}";


        var status = 0;
        if($(this).attr('class') === 'fa  fa-heart-o  wishlist'){
            status = 1;
        }

        $(this).toggleClass('fa-heart-o');
        $(this).toggleClass('fa-heart');

        $.ajax({
            method: 'post',
            url: "{{ route('add-to-favorite') }}",
            data: { user_id: user_id, creator_id: creator_id, status: status, _token: token},
            success: function(msg) {
                if(msg.success){
                    setTimeout(() => {
                        alert(msg.message)
                        location.reload();
                    }, 500)
                }else{
                    alert('Something went wrong!');
                }
                console.log(msg);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("some error");
            }
        });
    });


    $('.plateform-check').on('click', function () {
        var value = $(this).val();

        var paramName = 'platform[]';
        var paramValue = value;

        const url = new URL(window.location.href);
        const queryMap = url.searchParams;

        if (queryMap.has(paramName)) {

            let parms = queryMap.getAll(paramName);
            console.log('parms',parms);

            const newId=value;

            if(!parms.includes(newId)){
                parms.push(newId);
            }else{
                parms.splice(parms.indexOf(newId), 1);
            }

            let url1 = new URL(location.href);
            url1.searchParams.delete('platform[]');

            let paramsStr = new URLSearchParams(url1.search);

            parms.forEach(function(parm) {
                console.log('parm',parm);
                paramsStr.append('platform[]', parm);
            });

            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.append('platform[]', value);
            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;
        }


    });


    $('.category-check').on('click', function () {
        var value = $(this).val();

        var paramName = 'category[]';
        var paramValue = value;

        const url = new URL(window.location.href);
        const queryMap = url.searchParams;

        console.log(queryMap.has(paramName));

        if (queryMap.has(paramName)) {

            let parms = queryMap.getAll(paramName);
            console.log('parms',parms);

            const newId=value;

            if(!parms.includes(newId)){
                parms.push(newId);
            }else{
                parms.splice(parms.indexOf(newId), 1);
            }

            let url1 = new URL(location.href);
            url1.searchParams.delete('category[]');

            let paramsStr = new URLSearchParams(url1.search);

            parms.forEach(function(parm) {
                console.log('parm',parm);
                paramsStr.append('category[]', parm);
            });

            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.append('category[]', value);
            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;
        }


    });


    $('.country-check').on('change', function () {
        var value = $(this).val();

        var paramName = 'country';
        var paramValue = value;

        const url = new URL(window.location.href);
        const queryMap = url.searchParams;


        if (queryMap.has(paramName)) {

            let parms = queryMap.get(paramName);

            let url1 = new URL(location.href);
            url1.searchParams.delete('country');


            let paramsStr = new URLSearchParams(url1.search);

            paramsStr.set('country', value);

            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.set('country', value);
            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;
        }


    });


    $('.state-check').on('change', function () {
        var value = $(this).val();

        var paramName = 'state';
        var paramValue = value;

        const url = new URL(window.location.href);
        const queryMap = url.searchParams;


        if (queryMap.has(paramName)) {

            let parms = queryMap.get(paramName);

            let url1 = new URL(location.href);
            url1.searchParams.delete('state');


            let paramsStr = new URLSearchParams(url1.search);

            paramsStr.set('state', value);

            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.set('state', value);
            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;
        }


    });

    $('.city-check').on('change', function () {
        var value = $(this).val();

        var paramName = 'city';
        var paramValue = value;

        const url = new URL(window.location.href);
        const queryMap = url.searchParams;


        if (queryMap.has(paramName)) {

            let parms = queryMap.get(paramName);

            let url1 = new URL(location.href);
            url1.searchParams.delete('city');


            let paramsStr = new URLSearchParams(url1.search);

            paramsStr.set('city', value);

            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.set('city', value);
            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;
        }


    });

     $('.gender-check').on('click', function () {
        var value = $(this).val();

        var paramName = 'gender[]';
        var paramValue = value;

        const url = new URL(window.location.href);
        const queryMap = url.searchParams;

        console.log(queryMap.has(paramName));

        if (queryMap.has(paramName)) {

            let parms = queryMap.getAll(paramName);
            console.log('parms',parms);

            const newId=value;

            if(!parms.includes(newId)){
                parms.push(newId);
            }else{
                parms.splice(parms.indexOf(newId), 1);
            }

            let url1 = new URL(location.href);
            url1.searchParams.delete('gender[]');

            let paramsStr = new URLSearchParams(url1.search);

            parms.forEach(function(parm) {
                console.log('parm',parm);
                paramsStr.append('gender[]', parm);
            });

            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.append('gender[]', value);
            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;
        }


    });


     $('.followers-check').on('click', function () {
        var value = $(this).val();

        var paramName = 'followers[]';
        var paramValue = value;

        const url = new URL(window.location.href);
        const queryMap = url.searchParams;

        console.log(queryMap.has(paramName));

        if (queryMap.has(paramName)) {

            let parms = queryMap.getAll(paramName);
            console.log('parms',parms);

            const newId=value;

            if(!parms.includes(newId)){
                parms.push(newId);
            }else{
                parms.splice(parms.indexOf(newId), 1);
            }

            let url1 = new URL(location.href);
            url1.searchParams.delete('followers[]');

            let paramsStr = new URLSearchParams(url1.search);

            parms.forEach(function(parm) {
                console.log('parm',parm);
                paramsStr.append('followers[]', parm);
            });

            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.append('followers[]', value);
            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;
        }


    });


      $('.rating-check').on('click', function () {
        var value = $(this).val();

        var paramName = 'rating[]';
        var paramValue = value;

        const url = new URL(window.location.href);
        const queryMap = url.searchParams;

        console.log(queryMap.has(paramName));

        if (queryMap.has(paramName)) {

            let parms = queryMap.getAll(paramName);
            console.log('parms',parms);

            const newId=value;

            if(!parms.includes(newId)){
                parms.push(newId);
            }else{
                parms.splice(parms.indexOf(newId), 1);
            }

            let url1 = new URL(location.href);
            url1.searchParams.delete('rating[]');

            let paramsStr = new URLSearchParams(url1.search);

            parms.forEach(function(parm) {
                console.log('parm',parm);
                paramsStr.append('rating[]', parm);
            });

            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.append('rating[]', value);
            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;
        }


    });

    $('#country').on('change', function () {
        var idCountry = $(this).find(':selected').data('country-id');
        $("#state").html('');
        $.ajax({
            url: "{{route('fetch-states')}}",
            type: "POST",
            data: {
                country_id: idCountry,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (result) {
                $('#state').html('<option value="">Select State</option>');
                $.each(result.states, function (key, value) {
                    $("#state").append('<option value="' + value
                        .state + '">' + value.state + '</option>');
                });
            }
        });
    });

    function check_slider(text_id,range_id) {
      document.getElementById('input-right').value=document.getElementById(range_id).value;
    }

    $('#filter_price').on('click', function () {
        var max = $("#input-right").val();
        var min = $("#input-left").val();

        var paramName = 'max-price';
        var paramValue = max;

        const url = new URL(window.location.href);

        const queryMap = url.searchParams;


        if (queryMap.has(paramName)) {

            let parms = queryMap.get(paramName);

            let url1 = new URL(location.href);
            url1.searchParams.delete('max-price');
            url1.searchParams.delete('min-price');


            let paramsStr = new URLSearchParams(url1.search);

            paramsStr.set('max-price', max);
            paramsStr.set('min-price', min);

            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.set('max-price', max);
            paramsStr.set('min-price', min);
            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;
        }
    });


     $(document).on('change', '#input-sort', function(event) {
        var value = $(this).val();

        var paramName = 'sortby';
        var paramValue = value;

        const url = new URL(window.location.href);

        const queryMap = url.searchParams;


        if (queryMap.has(paramName)) {

            let parms = queryMap.get(paramName);

            let url1 = new URL(location.href);
            url1.searchParams.delete('sortby');


            let paramsStr = new URLSearchParams(url1.search);

            paramsStr.set('sortby', value);

            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.set('sortby', value);
            window.location.href = "{{ route('marketplace.creators') }}"+'?'+paramsStr;
        }
    });

    $("#clear-filter-price").on('click', function (e) {
        e.preventDefault();
        let url = new URL(location.href);
        url.searchParams.delete('max-price');
        url.searchParams.delete('min-price');
        window.location.href = url;
    });

    $("#clear-platform-filter").on('click', function (e) {
        e.preventDefault();
        let url = new URL(location.href);
        url.searchParams.delete('platform[]');
        window.location.href = url;
    });

    $("#clear-followers-filter").on('click', function (e) {
        e.preventDefault();
        let url = new URL(location.href);
        url.searchParams.delete('followers[]');
        window.location.href = url;
    });

    $("#clear-state-country-filter").on('click', function (e) {
        e.preventDefault();
        let url = new URL(location.href);
        url.searchParams.delete('country');
        url.searchParams.delete('city');
        window.location.href = url;
    });

    $("#clear-category-filter").on('click', function (e) {
        e.preventDefault();
        let url = new URL(location.href);
        url.searchParams.delete('category[]');
        window.location.href = url;
    });

    $("#clear-gender-filter").on('click', function (e) {
        e.preventDefault();
        let url = new URL(location.href);
        url.searchParams.delete('gender[]');
        window.location.href = url;
    });

    $("#clear-rating-filter").on('click', function (e) {
        e.preventDefault();
        let url = new URL(location.href);
        url.searchParams.delete('rating[]');
        window.location.href = url;
    });


</script>
@endpush
