@extends('layouts.app')

@section('title', 'Ad Campaigns Unleashed: Strategies to Make Your Brand Go Viral - Winwinpromo')
@section('description', 'From Clicks to Conversions Crafting Ad Campaigns, That Truly Resonate, How Innovative Ad Campaigns Are Redefining Marketing Strategies to Make Your Brand Go Viral - Winwinpromo')
@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endsection
@section('content')
<style>
    #more {display: none;}
</style>
<div class="campaigns">
    <div class="MSearch">
        <div class="container">
            <h1>Sponsor Ad Campaigns</h1>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="searchbar BoxShadow">
                        <form action="{{ route('marketplace.campaigns') }}">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ request()->get('search') }}" name="search" placeholder="Search for Campaign">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text"><img src="{{ asset('assets/images/frontend/icons/search-black.png') }}" alt="Search" /></button>
                                </div>
                            </div>
                        </form>
                        <div class="creators-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link" href="{{ route('marketplace.creators') }}">Content Creators</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active" href="{{ route('marketplace.campaigns') }}">Ad Campaigns</a>
                                </li>
                              </ul>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 col-12">
                    <form action="{{ route('marketplace.campaigns') }}" id="" method="GET">
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
                                                    <li><a href="javascript:void(0)" id="clear-filter-price">Clear</a></li>
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

                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Category</span></li>
                                                    <li><a href="javascript:void(0)" id="clear-category-filter">Clear</a></li>
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
                                                    @php $checked = ( !empty($_GET['category']) && in_array($category->id, $_GET['category'] )) ? 'checked' : ''; @endphp
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
                                                    <li><span>Location</span></li>
                                                    <li><a href="javascript:void(0)" id="clear-state-country-filter">Clear</a></li>
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
                                                                <input type="text" class="form-control filter-records" id="searchCity" placeholder="Enter City" name="city" value="{{ request()->get('city') }}"><button class="city-check input-group-text"><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="clear-filter">

                                                <button type="button" id="clear_filter" class="wt-btn btn btn-default" >Clear Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-12" id="Creator-list">
                                    <div class="row display-control">
                                        <div class="col-sm-3 col-12">
                                            <div class="result">
                                                <span>Top results {{ $campaigns->firstItem() }}-{{ $campaigns->lastItem() }} of {{ $campaigns->total() }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="sortby">
                                                <select id="input-sort" name="sortby"  class="form-select">
                                                    <option value="" selected>Sort by (Default)</option>
                                                    <option @if(request()->get('sortby') == 'asc') selected @endif  value="asc">Older to Newer</option>
                                                    <option @if(request()->get('sortby') == 'desc') selected @endif  value="desc">Newer to Older</option>
                                                    <option @if(request()->get('sortby') == 'price-asc') selected @endif  value="price-asc">Price (Low &gt; High)</option>
                                                    <option @if(request()->get('sortby') == 'price-desc') selected @endif  value="price-desc">Price (High &gt; Low)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @if($campaigns && count($campaigns))
                                    @foreach($campaigns as $campaign)
                                    <div class="row creatorlist Sponsorlist @if(isset($campaign->sponsorData) && $campaign->sponsorData->badge_ids && count(json_decode($campaign->sponsorData->badge_ids))) paidUser @endif">
                                        <div class="col-sm-3 col-12 paddingleft">
                                            <div class="LProfile">
                                                <div class="image">
                                                    <div class="listing-image-box">
                                                        @if(isset($campaign->image))
                                                        <img src="{{ asset('storage/uploads/campaigns/'.$campaign->image) }}" class="img-fluid" alt="{{ $campaign->title }}">
                                                        @else
                                                        <img src="{{ asset('assets/images/frontend/creator-placeholder.jpeg') }}" class="img-fluid" alt="{{ $campaign->title }}">
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="Lcaption">
                                                <div class="panel-heading">{{ $campaign->title }}</div>
                                                <div class="user">
                                                    <div class="avtar-profile-image">
                                                        @if(isset($campaign->sponsorData->avatar))
                                                        <img src="{{ asset('storage/uploads/sponsors/'.$campaign->sponsorData->avatar) }}" class="img-fluid" alt="{{ @$campaign->sponsorData->first_name.' '.@$campaign->sponsorData->last_name }}">
                                                        @else
                                                        <img src="{{ asset('assets/images/frontend/user-profile-placeholder.png') }}" class="img-fluid" alt="{{ @$campaign->sponsorData->first_name.' '.@$campaign->sponsorData->last_name }}">
                                                        @endif
                                                    </div>
                                                    <div class="userN">
                                                        <div class="col-badges">
                                                            <h5 class="username">{{ @$campaign->sponsorData->first_name.' '.@$campaign->sponsorData->last_name }}</h5>
                                                            @if($campaign->sponsorData && $campaign->sponsorData->badge_ids && count(json_decode($campaign->sponsorData->badge_ids)))

                                                            @php
                                                            $badge_ids = json_decode($campaign->sponsorData->badge_ids);
                                                            @endphp
                                                            @if($badge_ids)
                                                            @foreach($badge_ids as $key => $badge)
                                                            @if(getBadgeById($badge)->icon)
                                                            <div class="tooltip collabs">
                                                                <img src="{{ asset('storage/uploads/badges/'.getBadgeById($badge)->icon) }}" style="max-height:26px;" alt="Featured Sponsor">
                                                                <span class="tooltiptext">{{ getBadgeById($badge)->name }}</span>
                                                            </div>
                                                            @endif
                                                            @endforeach
                                                            @endif
                                                            @endif
                                                        </div>

                                                        <div class="location">
                                                            <ul class="list-inline">
                                                                <li><span> {{ @$campaign->sponsorData->username }}</span></li>
                                                                @if($campaign->sponsorData && ($campaign->sponsorData->state || $campaign->sponsorData->country))<li><span><img src="{{ asset('assets/images/frontend/icons/map.png') }}" alt="Location"> {{ @$campaign->sponsorData->state }}, {{ @$campaign->sponsorData->country }}</span></li>@endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="disc">
                                                    <p>{{ substr($campaign->description, 0, 200) }}<span id="dots">@if(strlen($campaign->description) > 200)...@else.@endif</span><span id="more">{{substr($campaign->description, 201 , -1)}}.@if(strlen($campaign->description) > 200)</span> <a id="myBtn">Read more</a>@endif</p>

                                                </div>

                                               @if($campaign->content_types && count($campaign->content_types))
                                                <div class="creator-Category">
                                                    <ul class="list-inline">
                                                        @foreach($campaign->content_types as $content_type)
                                                        <li class="list-inline-item"><span>{{ $content_type->content_type->name }}</span></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="LRight">

                                                @if($campaign->price)
                                                <div class="price">
                                                    <p><span>${{ $campaign->price }} USD</span></p>
                                                </div>
                                                @endif

                                                <div class="viewbtn">
                                                    @if(auth()->user() && auth()->guard('web')->check() && $campaign->sponsor == auth()->user()->id)
                                                    <a href="{{ route('campaigns.edit',$campaign->id) }}" class="btn btn-primary btn-lg">Edit</a>
                                                    @elseif(auth()->user() && auth()->user()->id)
                                                    <a href="#" data-bs-toggle="modal" data-id="{{ $campaign->sponsor }}" data-bs-target="#exampleModal" class="btn btn-primary btn-lg modal_contact">Send Quote</a>
                                                    @else
                                                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg modal_contact">Send Quote</a>
                                                    @endif
                                                </div>

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
                                                {{ $campaigns->appends(request()->query())->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2>Unleashing the Power of Sponsor Ad Campaigns: Boost Your Brand Beyond Limits!</h2>
                        <p>Winwinpromo is a platform where sponsors can elevate their brand with powerful sponsorship and ad campaigns. Drive engagement and reach new heights in your marketing strategy.</p>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>
</div>


<!--Contact-Modal-->

<!-- Modal -->
<div class="modal stymodal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modalform">
            <div class="modal-header">
                <button type="button" class="btn-close" id="click-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <h5>Contact me</h5>
            <div class="alert alert-success show-sucess-message" style="display:none;">
                {{ session()->get('success') }}
            </div>
            <form method="POST" action="{{ route('save-quote') }}" id="contactForm">
                @csrf
                @method('POST')
                <!--
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} mb-1">
                    <label for="label" class="col-form-label">Name<span>*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter your name" required>
                    @error('name')
                        <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label for="label" class="col-form-label">Email<span>*</span></label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email address" required>
                    @error('email')
                        <span id="email-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label for="label" class="col-form-label">Make an offer</label>
                    <input type="number" class="form-control" name="price" value="{{ old('price') }}"  placeholder="Enter your offer price" required>
                </div>-->
                <div class="form-group mb-2">
                    <label for="label" class="col-form-label">Message</label>
                    <textarea class="form-control" name="message" required placeholder="Enter your message here..." rows="3">{{ old('message') }}</textarea>
                    @error('message')
                        <span id="message-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group d-grid">
                    <button  type="submit"  class="btn btn-primary">Send</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
    $(".wishlist").click(function() {
        $(this).toggleClass('fa-heart-o');
        $(this).toggleClass('fa-heart');
    });

    $(document).on('click', '.wt-searchgbtn', function(event) {
        event.preventDefault();
        $("#filter_me").trigger('click');
    });

     $("#clear_filter").click(function() {
        window.location.href = "{{ route('marketplace.campaigns') }}";
    });

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

</script>

<script>

    $(document).on('submit','#contactForm',function(e){
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: "{{ route('save-quote') }}",
            data: $(this).serialize(),
            success: function(msg) {
                if(msg.success){
                    $(".show-sucess-message").show().html(msg.message);
                    setTimeout(() => {
                        $("#contactForm")[0].reset();
                        $(".show-sucess-message").hide().html('');
                        $("#click-close").trigger('click');
                    }, 1200)
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

/*$(document).ready(function(){
    var maxLength = 180;
    $(".show-read-more").each(function(){
        var myStr = $(this).text();
        if($.trim(myStr).length > maxLength){
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
            $(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
            $(this).append('<span class="more-text">' + removedStr + '</span>');
        }
    });
    $(".read-more").click(function(){
        $(this).siblings(".more-text").contents().unwrap();
        $(this).remove();
    });
});*/

    $(document).on('click', '#myBtn', function(event) {
        event.preventDefault();
        $(this).parent().find('#dots').toggle();
        if($(this).parent().find('#dots').is(":visible")){
            $(this).text('Read more');
            $(this).parent().find('#more').hide();
        }else{
            $(this).text('Read less');
            $(this).parent().find('#more').show();
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

            window.location.href = "{{ route('marketplace.campaigns') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.append('category[]', value);
            window.location.href = "{{ route('marketplace.campaigns') }}"+'?'+paramsStr;
        }


    });


    $('.country-check').on('change', function () {
        var value = $(this).val();
        var country = $("#country").val();

        var paramName = 'country';
        var paramValue = value;

        const url = new URL(window.location.href);
        const queryMap = url.searchParams;


        if (queryMap.has(paramName)) {

            let parms = queryMap.get(paramName);

            let url1 = new URL(location.href);
            url1.searchParams.delete('country');


            let paramsStr = new URLSearchParams(url1.search);

            paramsStr.set('country', country);

            window.location.href = "{{ route('marketplace.campaigns') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.set('country', country);
            window.location.href = "{{ route('marketplace.campaigns') }}"+'?'+paramsStr;
        }


    });

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


            let paramsStr = new URLSearchParams(url1.search);

            paramsStr.set('max-price', max);
            paramsStr.set('min-price', min);

            window.location.href = "{{ route('marketplace.campaigns') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.set('max-price', max);
            paramsStr.set('min-price', min);
            window.location.href = "{{ route('marketplace.campaigns') }}"+'?'+paramsStr;
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

            window.location.href = "{{ route('marketplace.campaigns') }}"+'?'+paramsStr;


        } else {
            let url1 = new URL(location.href);
            let paramsStr = new URLSearchParams(url1.search);
            paramsStr.set('sortby', value);
            window.location.href = "{{ route('marketplace.campaigns') }}"+'?'+paramsStr;
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


    $("#clear-filter-price").on('click', function (e) {
        e.preventDefault();
        let url = new URL(location.href);
        url.searchParams.delete('max-price');
        url.searchParams.delete('min-price');
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

function check_slider(text_id,range_id) {
  document.getElementById('input-right').value=document.getElementById(range_id).value;
}

var path = "{{ route('get-search-city-sposnor') }}";
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

@endpush
