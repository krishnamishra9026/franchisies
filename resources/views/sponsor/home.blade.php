@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Dashboard')
@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
@endsection
@section('content')
<div class="dashboard">
    <div class="container">
        <h1>Dashboard</h1>
        @if (($message = Session::get('success')) || (strpos( url()->previous(), 'upgarde-save' ) !== false))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message ?? 'Your Payment Successfull!' }}</strong>
        </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-12 mb-3">
                <div class="recently BoxShadow">
                    <h2>Recently Connected with content creators</h2>
                    <div class="row">
                        @if($chats && count($chats))
                        @foreach($chats as $key => $chat)
                        @php
                        if($key > 2){
                            break;
                        }
                        @endphp
                        <div class="col-sm-4 col-12">
                            <div class="FProfile">
                                    <div class="image">
                                        <a href="{{ route('profileview',($chat->user->slug ?? $chat->user->id) ) }}">
                                           @if(isset($chat->user->showCaseData) && isset($chat->user->showCaseData[0]))
                                           <img src="{{ asset('storage/uploads/creators/service/showcase/'.$chat->user->showCaseData[0]->image_video) }}" class="img-fluid" alt="{{ $chat->user->firstname.' '.$chat->user->lastname ?? $chat->user->username }}">
                                           @else
                                           <img src="{{ asset('assets/images/frontend/creator-placeholder.jpeg') }}" class="img-fluid" alt="{{ $chat->user->firstname.' '.$chat->user->lastname ?? $chat->user->username }}">
                                           @endif
                                       </a>
                                        <i class="fa @if($chat->favorite) fa-heart @else fa-heart-o @endif wishlist" data-creator-id="{{ $chat->user->id }}"></i>
                                    </div>
                                    <a href="{{ route('profileview',($chat->user->slug ?? $chat->user->id)) }}">
                                    <div class="caption">
                                        <div class="user">
                                            @if(isset($chat->user->avatar))
                                            <img src="{{ asset('storage/uploads/creators/'.$chat->user->avatar) }}" class="img-fluid ftp" alt="{{ $chat->user->firstname.' '.$chat->user->lastname ?? $chat->user->username }}">
                                            @else
                                            <img src="{{ asset('assets/images/frontend/user-profile-placeholder.png') }}" class="img-fluid ftp" alt="{{ $chat->user->firstname.' '.$chat->user->lastname ?? $chat->user->username }}">
                                            @endif
                                            <div class="userN">
                                                <div class="col-badges">
                                                    <h5 class="username">{{ $chat->user->firstname.' '.$chat->user->lastname ?? $chat->user->username }}</h5>
                                                    @php
                                                    $badge_ids = json_decode($chat->user->badge_ids);
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
                                                </div>
                                                <div class="rating">
                                                    {!! str_repeat('<span><i class="fa fa-star checked"></i></span>', round($chat->user->reviews->avg('rating'))) !!}
                                                    {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - round($chat->user->reviews->avg('rating'))) !!}
                                                    {{round($chat->user->reviews->avg('rating')) ?? 0}}
                                                </div>
                                            </div>
                                        </div>
                                        <p>{{ \Str::limit($chat->user->talent_description, 50, '...') }}</p>

                                        @if( $chat->user->pricingData && isset($chat->user->pricingData[0]))
                                        <p class="price">Starting from <span>{{ '$'.$chat->user->pricingData[0]->price ??'' }}</span></p>
                                        @endif

                                        <div class="followers">
                                            <ul class="list-inline">
                                                @if($chat->user->instagram && $chat->user->instagram_connected)
                                                <li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/instagram.svg') }}" alt="instagram"> {{ $chat->user->instagram_subscribers_or_followers }}</span></a>
                                                </li>
                                                @endif
                                                @if($chat->user->youtube && $chat->user->youtube_connected)
                                                <li class="list-inline-item"><a href="https://youtube.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/youtube-icon.svg') }}" alt="instagram"> {{ $chat->user->youtube_subscribers_or_followers }}</span></a>
                                                </li>
                                                @endif
                                                @if($chat->user->tiktok && $chat->user->tiktok_connected)
                                                <li class="list-inline-item"><a href="https://www.tiktok.com/login" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/tiktok-icon.svg') }}" alt="instagram"> {{ $chat->user->tiktok_subscribers_or_followers }}</span></a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>No data available</p>
                        @endif
                    </div>

                    <div class="my-campaigns">
                        <h2>My Ad Campaigns</h2>
                        <div class="table-responsive">
                            <table class="table table-striped tablestyle2">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Ad Campaign</th>
                                        <th>Price</th>
                                        <th>Clicks</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($campaigns && count($campaigns))
                                    @foreach ($campaigns as $campaign)
                                    <tr>
                                        <td>
                                        @if(isset($campaign->image))
                                            <div class="user-profile-image">
                                                <img src="{{ asset('storage/uploads/campaigns/'.$campaign->image) }}" class="img-fluid" alt="{{ $campaign->title }}" />
                                            </div>
                                        @else
                                        <div class="user-profile-image">
                                            <img src="{{ asset('assets/images/frontend/campai-placeholder.png') }}" class="img-fluid" alt="{{ $campaign->title }}" />
                                        </div>
                                        @endif
                                        </td>
                                        <td style="width: 25%">
                                            <span>{{ $campaign->title }}</span>
                                        </td>
                                        <td><span>${{ $campaign->price }}</span></td>
                                        <td><span>{{ $campaign->clicks ?? 0 }}</span></td>
                                        <td><span>{{ @$campaign->categoryData->name }}</span></td>
                                        <td>@if($campaign->status) Active @else In-active @endif</td>

                                        <td class="table-action text-end">
                                            <a href="{{ route('campaigns.edit', $campaign->id) }}" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                            <a href="javascript: void(0);" class="action-btn btn btn-danger" onclick="confirmDelete({{ $campaign->id }})"><i class="fa fa-trash"></i></a>

                                            <form id='delete-form{{ $campaign->id }}'
                                                action='{{ route('campaigns.destroy', $campaign->id) }}'
                                                method='POST'>
                                                <input type='hidden' name='_token'
                                                value='{{ csrf_token() }}'>
                                                <input type='hidden' name='_method' value='DELETE'>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7">No data available</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @if($campaign_count > 5)
                        <div class="text-center">
                            <a href="{{ url('/campaigns') }}" class="btn btn-primary">View All</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="DRight-Sec BoxShadow">
                    <div class="sponsor-Profile">
                        <div class="card">
                            <div class="card-header">
                                <div class="avtar-profile-image">
                                    @if(auth()->user()->avatar)
                                    <img src="{{ asset('storage/uploads/sponsors/'.auth()->user()->avatar) }}" alt="User" alt="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" />
                                    @else
                                    <img src="{{ asset('assets/images/thumbnails/user-profile-placeholder.png') }}" alt="User" alt="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" />
                                    @endif
                                </div>
                                <div class="userName pl-2">
                                    <h5>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
                                    <a href="{{ route('account-setting') }}"><span>View my profile</span></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="profile-info">
                                    <p><img src="{{ asset('assets/images/frontend/icons/cmap.png') }}" alt="Location" /> {{ auth()->user()->country }}, {{ auth()->user()->state }}</p>
                                </div>
                                <div class="profile-info">
                                    <p><img src="{{ asset('assets/images/frontend/icons/outline-email.png') }}" alt="Email" /> {{ auth()->user()->email }}</p>
                                </div>
                                <div class="profile-info">
                                    <p><img src="{{ asset('assets/images/frontend/icons/call.png') }}" alt="Call" /> {{ auth()->user()->phone_number }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="RecentChats">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Recent Chats</h4>
                                @if(count($chats) > 5)
                                <a href="{{ url('/message') }}">View All</a>
                                @endif
                            </div>
                            <div class="panel-body">
                                @if($chats && count($chats))
                                @foreach($chats as $chat)
                                <div class="chatp active">
                                    <a href="{{ url('/message/'.$chat->message_from) }}">
                                        <div class="chatpname">
                                            <div class="user-profile-image">
                                                @if(isset($chat->user->avatar))
                                                <img src="{{ asset('storage/uploads/creators/'.$chat->user->avatar) }}" class="rounded-circle" alt="{{ @$chat->user->username }}" />
                                                @else
                                                <img src="{{ asset('assets/images/frontend/chat1.png') }}" class="rounded-circle" alt="{{ @$chat->user->username }}" />
                                                @endif
                                            </div>
                                            <div class="uname" style="margin-left: 10px;">
                                                <h5>{{ \Str::limit(@$chat->message, $limit = 25, $end = '...') }}</h5>
                                                <span><span>@</span>{{ @$chat->user->username }}</span>
                                            </div>
                                        </div>
                                        <div class="chattime">
                                            {{ date('d-m-Y H:i', strtotime($chat->created_at)) }}
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                @else
                                <div class="chatp active">
                                    No data available
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
        <div class="col-sm-12 col-12">
            <div class="popular-services popular-servicesD popular-creators BoxShadow">
                <h2>Creator featured Profiles</h2>
                @if(auth()->user() && auth()->user()->badge_ids != null)
                <div class="row">
                    <div id="popular-creators" class="splide">
                        <div class="splide__track">
                            <div class="splide__list">
                                @if ($featureds && count($featureds))
                                    @foreach ($featureds as $key => $feature)
                                        <div class="col-sm-3 splide__slide">
                                            <div class="FProfile custom-scale">
                                                    <div class="image">
                                                    <a href="{{ route('profileview', $feature->slug) }}">
                                                        <div class="listing-image-box">
                                                            @if (isset($feature->showCaseData) && isset($feature->showCaseData[0]))
                                                                <img src="{{ asset('storage/uploads/creators/service/showcase/' . $feature->showCaseData[0]->image_video) }}"
                                                                    class="img-fluid" alt="{{ $feature->firstname }}
                                                                    {{ $feature->lastname }}">
                                                            @else
                                                                <img src="{{ asset('assets/images/frontend/creator-placeholder.jpeg') }}"
                                                                    class="img-fluid" alt="{{ $feature->firstname }}
                                                                    {{ $feature->lastname }}">
                                                            @endif
                                                        </div>
                                                        </a>
                                                        <i class="fa @if($feature->favorite) fa-heart @else fa-heart-o @endif wishlist" data-creator-id="{{ $feature->id }}"></i>
                                                    </div>
                                                    <a href="{{ route('profileview', $feature->slug) }}">
                                                    <div class="caption">
                                                        <div class="user">
                                                            @if (isset($feature->avatar))
                                                                <img src="{{ asset('storage/uploads/creators/' . $feature->avatar) }}"
                                                                    class="img-fluid ftp" alt="{{ $feature->firstname }}
                                                                    {{ $feature->lastname }}">
                                                            @else
                                                                <img src="{{ asset('assets/images/frontend/user-profile-placeholder.png') }}"
                                                                    class="img-fluid ftp" alt="{{ $feature->firstname }}
                                                                    {{ $feature->lastname }}">
                                                            @endif
                                                            <div class="userN">
                                                                <div class="col-badges">
                                                                    <h5 class="username">{{ $feature->firstname }}
                                                                        {{ $feature->lastname }}</h5>

                                                                        @php
                                                                        $badge_ids = json_decode($feature->badge_ids);
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
                                                                </div>
                                                                <div class="rating">
                                                                    {!! str_repeat('<span><i class="fa fa-star checked"></i></span>', round($feature->reviews->avg('rating'), 1)) !!}
                                                                    {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - round($feature->reviews->avg('rating'), 1)) !!}
                                                                    {{ number_format($feature->reviews->avg('rating'), 1) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>{{ \Str::limit($feature->bio, 60, '...') }}</p>
                                                        @if ($feature->pricingData && isset($feature->pricingData[0]))
                                                            <p class="price">Starting from
                                                                <span>{{ '$' . $feature->pricingData[0]->price ?? '' }}</span>
                                                            </p>
                                                        @endif
                                                        <div class="followers">
                                                            <ul class="list-inline">
                                                                @if ($feature->instagram && $feature->instagram_connected)
                                                                    <li class="list-inline-item"><a
                                                                            href="{{ route('profileview', $feature->slug) }}"
                                                                            target="_blank"><span><img
                                                                                    src="{{ asset('assets/images/frontend/icons/instagram.svg') }}"
                                                                                    alt="instagram">
                                                                                {{ $feature->instagram_subscribers_or_followers }}</span></a>
                                                                    </li>
                                                                @endif
                                                                @if ($feature->youtube && $feature->youtube_connected)
                                                                    <li class="list-inline-item"><a
                                                                            href="{{ route('profileview', $feature->slug) }}"
                                                                            target="_blank"><span><img
                                                                                    src="{{ asset('assets/images/frontend/icons/youtube-icon.svg') }}"
                                                                                    alt="youtube">
                                                                                {{ $feature->youtube_subscribers_or_followers }}</span></a>
                                                                    </li>
                                                                @endif
                                                                @if ($feature->tiktok && $feature->tiktok_connected)
                                                                    <li class="list-inline-item"><a
                                                                            href="{{ route('profileview', $feature->slug) }}"
                                                                            target="_blank"><span><img
                                                                                    src="{{ asset('assets/images/frontend/icons/tiktok-icon.svg') }}"
                                                                                    alt="tiktok">
                                                                                {{ $feature->tiktok_subscribers_or_followers }}</span></a>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-sm-3 splide__slide">
                                        No data available
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">Data not avilable</div>
                @endif
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="popular-services popular-servicesD BoxShadow">
                    <h2>Popular Services</h2>
                        <div class="row">
                            <div id="popular-services" class="splide">
                                <div class="splide__track">
                                      <div class="splide__list">
                                          @if($services && count($services))
                                          @foreach($services as $service)
                                          <div class="col-sm-2 splide__slide">
                                          <a href="{{ url('marketplace/creator?search='.($service->categoryData->name ?? '')) }}">
                                            <div class="slide-caption">
                                                <h5>{{ $service->title }}</h5>
                                            </div>
                                            @if($service->image)
                                            <img src="{{ asset('storage/uploads/services/'.$service->image) }}" class="img-fluid custom-scale" alt="{{ $service->title }}" />
                                            @else
                                            <img src="{{ asset('assets/images/frontend/2.png') }}" class="img-fluid custom-scale" alt="{{ $service->title }}" />
                                            @endif
                                          </a>
                                          </div>
                                          @endforeach
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
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
    document.addEventListener( 'DOMContentLoaded', function() {
         new Splide('#popular-services', {
            type   : 'loop',
            perPage: 5,
            perMove: 1,
            gap    : '1rem',
            pagination: false,
            breakpoints: {
            640: {
            perPage: 1,
            gap    : '.7rem',
            },
            480: {
            perPage: 1,
            gap    : '.7rem',
            },
        },
        }).mount();

    } );
  </script>

  <script>
    document.addEventListener( 'DOMContentLoaded', function() {
         new Splide('#popular-creators', {
            type   : 'loop',
            perPage: 4,
            perMove: 1,
            gap    : '1rem',
            pagination: false,
            breakpoints: {
            640: {
            perPage: 1,
            gap    : '.7rem',
            },
            480: {
            perPage: 1,
            gap    : '.7rem',
            },
        },
        }).mount();

    } );
  </script>

<script type="text/javascript">
    /*$(".wishlist").click(function() {
        $(this).toggleClass('fa-heart-o');
        $(this).toggleClass('fa-heart');
    });*/
</script>


<script type="text/javascript">
     $(".wishlist").click(function() {

        var user_id = "{{ auth()->user()->id }}";
        var url = "{{ route('add-to-favorite') }}";

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
            url: url,
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
</script>

<script type="text/javascript">
    function confirmDelete(no) {
        document.getElementById('delete-form' + no).submit();
    };

    $(".alert").click(function(event) {
        $(this).alert('close');
    });

    setTimeout(function () {
        $('.alert').alert('close');
    }, 8000);
    </script>

@endpush
