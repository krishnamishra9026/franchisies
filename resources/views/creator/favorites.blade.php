@extends('layouts.creator')
@section('title', 'Welcome to Collab Marketplace Favorites')

@section('content')
<div class="favorites">
    <div class="container">
        <h1>Favorites</h1>
        <div class="row">
            @if($favorites)
            @foreach($favorites as $favorit)
            @php
            $creator = $favorit->creator;
            @endphp
            <div class="col-sm-3">
                <div class="FProfile">
                    <a href="{{ route('creator.profileview',($creator->slug)) }}">
                        <div class="image">
                            @if(isset($creator->showCaseData) && isset($creator->showCaseData[0]))
                            <img src="{{ asset('storage/uploads/creators/service/showcase/'.$creator->showCaseData[0]->image_video) }}" class="img-fluid" alt="Featured Profile">
                            @else
                            <img src="{{ asset('assets/images/frontend/creator-placeholder.jpeg') }}" class="img-fluid" alt="Featured Profile">
                            @endif
                            <i class="fa fa-heart wishlist"></i>
                        </div>
                        <div class="caption">
                            <div class="user">
                                @if($creator->avatar)
                                <img src="{{ asset('storage/uploads/creators/'.$creator->avatar) }}" class="img-fluid ftp" alt="Andreidu">
                                @else
                                <img src="{{ asset('assets/images/frontend/profile-img.jpg') }}" class="img-fluid ftp" alt="{{$creator->firstname}}">
                                @endif
                                <div class="userN">
                                    <div class="col-badges">
                                        <h5 class="username">{{ $creator->firstname.' '.$creator->lastname ?? $creator->username}}</h5>
                                        @php
                                        $badge_ids = json_decode($creator->badge_ids);
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
                                        {!! str_repeat('<span><i class="fa fa-star checked"></i></span>', $creator->avg_rating) !!}
                                        {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - $creator->avg_rating) !!}
                                        {{ $creator->avg_rating ?? 0}}
                                    </div>
                                </div>
                            </div>
                            <p>{{ \Str::limit($creator->bio, 60, '...') }}</p>
                            @if( $creator->pricingData && isset($creator->pricingData[0]))
                            <p class="price">Starting from <span>{{ '$'.$creator->pricingData[0]->price ??'' }}</span></p>
                            @endif
                            <div class="followers">
                                <ul class="list-inline">
                                    @if($creator->instagram && $creator->instagram_connected)
                                    <li><a href="https://www.instagram.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/instagram.svg') }}" alt="instagram"> {{ $creator->instagram_subscribers_or_followers }}</span></a>
                                    </li>
                                    @endif
                                    @if($creator->youtube && $creator->youtube_connected)
                                    <li><a href="https://youtube.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/youtube-icon.svg') }}" alt="instagram"> {{ $creator->youtube_subscribers_or_followers }}</span></a>
                                    </li>
                                    @endif
                                    @if($creator->tiktok && $creator->tiktok_connected)
                                    <li><a href="https://www.tiktok.com/login" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/tiktok-icon.svg') }}" alt="instagram"> {{ $creator->tiktok_subscribers_or_followers }}</span></a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(".wishlist").click(function() {
        $(this).toggleClass('fa-heart');
        $(this).toggleClass('fa-heart-o');
    });
</script>
@endpush
