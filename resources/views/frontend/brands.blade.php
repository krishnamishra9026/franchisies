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
            <h1>{{ $category }}</h1>
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
                                           

                                           
                                            
                                            <div class="filterlist">
                                                <ul>
                                                    

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
                                                   
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check wt-checkbox">
                                                                <input class="form-check-input category-check" name="category" type="checkbox" @if($slug == $category->slug) checked @endif value="{{ $category->slug }}">
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
                                                <span>Top results {{ $brands->firstItem() }}-{{ $brands->lastItem() }} of {{ $brands->total() }}</span>
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

                                    @if($brands && count($brands))
                                    @foreach($brands as $brand)
                                    <div class="row creatorlist @if($brand->badge_ids && count(json_decode($brand->badge_ids))) paidUser @endif">
                                        <div class="col-sm-3 col-12 paddingleft">
                                            <div class="LProfile">
                                                <div class="image">
                                                    <div class="listing-image-box">
                                                          
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/frontend/creator-placeholder.jpeg') }}" class="img-fluid" alt="{{ $brand->talent_title }}">
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="Lcaption">
                                                <div class="panel-heading"><a href="#">{{ $category->name }}</a></div>
                                                <div class="user">
                                                    <div class="avtar-profile-image">
                                                        @if(isset($brand->logo))
                                                        <a href="#">
                                                            <img src="{{ asset('storage/uploads/brands/'.$brand->id.'/logo/'.$brand->logo) }}"  alt="{{$brand->firstname.' '.$brand->lastname }}">
                                                        </a>
                                                        @else
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/frontend/user-profile-placeholder.png') }}"  alt="{{$brand->firstname.' '.$brand->lastname }}">
                                                        </a>
                                                        @endif
                                                    </div>
                                                    <div class="userN">
                                                        <div class="col-badges">
                                                            <h5 class="username"><a href="#">{{$brand->brandname }}</a></h5>
                                                        </div>
                                                        
                                                    </div>


                                                </div>

                                               
                                            </div>

                                            <div>
                                                <ul class="list-group">
                                                  <li class="list-group-flush d-flex justify-content-between align-items-center">
                                                    Investment:
                                                    <span class=" " >{{ $brand->investment }}</span>
                                                </li>
                                                <li class="list-group-flush d-flex justify-content-between align-items-center">
                                                    Space req 
                                                    <span class=" ">{{ $brand->space_req }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        </div>

                                        <div class="col-sm-3 col-12">
                                            <div class="LRight">
                                               

                                                <div class="price">
                                                    <p>{{ $brand->investment }}</p>
                                                </div>



                                            </div>
                                            <div class="viewbtn">
                                                    <a href="{{ route('brands.index', $brand->slug) }}" class="btn btn-primary btn-lg">View Details</a>
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
                                                {{ $brands->appends(request()->query())->links('pagination::bootstrap-4') }}
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

        window.location.href = "{{ url('category') }}/"+value;
        return;
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
