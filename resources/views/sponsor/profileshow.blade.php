@extends('layouts.app')
@section('title', $profile->firstname.' '. $profile->lastname.' - '.$profile->talent_title.' | Winwinpromo')
@section('description', \Str::limit($profile->bio, 200))

@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
@endsection

@section('content')

<div class="Profileshow">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="FDetails BoxShadow">
                    <div class="row">
                        <div class="col-sm-9 col-12">
                            <div class="creatorPro">
                                <div class="Lcaption">
                                    <h1>{{ $profile->talent_title }}</h1>
                                    <div class="createUF">
                                        <div class="user">
                                            <div class="user-profile-image">
                                                @if(isset($profile->avatar))
                                                <img src="{{ asset('storage/uploads/creators/'.$profile->avatar) }}" class="img-fluid" alt="Featured Profile">
                                                @else
                                                <img src="{{ asset('assets/images/frontend/profile-img.jpg') }}" alt="Andreidu">
                                                @endif
                                            </div>
                                            <div class="userN">
                                                <div class="col-badges">
                                                    <h2 class="username">{{ $profile->firstname }} {{ $profile->lastname }}</h2>
                                                    @if(auth()->user() && auth()->user()->badge_ids != null)
                                                    @if($profile->badge_ids)
                                                    @foreach($profile->badge_ids as $key => $badge)
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
                                                <div class="rating">
                                                     {!! str_repeat('<span><i class="fa fa-star checked"></i></span>', round($reviews->avg('rating'))) !!}
                                                     {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - round($reviews->avg('rating'))) !!}
                                                     {{number_format($reviews->avg('rating'), 1)}}
                                                </div>
                                                <div class="location">
                                                    <ul class="list-inline">
                                                        <li><span><span>@</span>{{ $profile->username }}</span></li>
                                                        @if($profile->state || $profile->country)<li><span><img src="{{ asset('assets/images/frontend/icons/map.png') }}" alt="Location"> {{ $profile->state }}, {{ $profile->country }}</span></li>@endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="followers">
                                            <ul class="list-inline">
                                                @if($profile->instagram_connected)
                                                <li><a href="https://www.instagram.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/instagram.svg') }}" alt="instagram" /> {{ $profile->instagram_subscribers_or_followers }}</span><span class="follow">Followers</span></a></li>
                                                @endif
                                                @if($profile->youtube_connected)
                                                <li><a href="https://youtube.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/youtube-icon.svg') }}" alt="instagram" /> {{ $profile->youtube_subscribers_or_followers }}</span><span class="follow">Followers</span></a></li>
                                                @endif
                                                @if($profile->tiktok_connected)
                                                <li><a href="https://www.tiktok.com/login" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/tiktok-icon.svg') }}" alt="instagram" /> {{ $profile->tiktok_subscribers_or_followers }}</span><span class="follow">Followers</span></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="disc">
                                        <p>{{ $profile->bio }} </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-12">
                            <div class="createR">
                                <div class="add-favorites">
                                    <p>Add to favorites</p>
                                    {{-- <i class="fa fa-heart-o wishlist"></i> --}}
                                    <i class="fa @if($profile->favorite) fa-heart @else fa-heart-o @endif wishlist" data-creator-id="{{ $profile->id }}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row margintop">
            <div class="col-sm-12 col-12">
                <div class="mywork BoxShadow">
                    <div class="panel-heading">My work showcase</div>
                    <div id="mywork" class="splide">
                        <div class="splide__track">
                            <div class="splide__list">
                                @if($showcase_works && count($showcase_works))
                                @foreach($showcase_works as $showcase_work)

                                @php

                                    $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd', 'webp'];

                                    $explodeImage = explode('.', $showcase_work->image_video);
                                    $extension = end($explodeImage);

                                    if(in_array($extension, $imageExtensions))
                                    {
                                        $is_image = true;
                                    }else
                                    {
                                            $is_image = false;
                                    }

                                @endphp

                                <div class="col-sm-3 splide__slide">
                                    @if($is_image)
                                        @if($showcase_work->image_video)
                                            <img src="{{ asset('storage/uploads/creators/service/showcase/'.$showcase_work->image_video) }}" class="img-fluid" />
                                        @else
                                            <img src="{{ asset('assets/images/frontend/showcase1.jpg') }}" class="img-fluid" />
                                        @endif
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
                                </div>
                                @endforeach
                                @else
                                <div class="col-sm-3 splide__slide">
                                    No data avilable
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($profile->pricingData || $profile->categories)
        <div class="row margintop">
            <div class="col-sm-12 col-12">
                <div class="ContentType BoxShadow">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <h5>Content Type</h5>
                            @if($profile->pricingData && count($profile->pricingData))
                            <div class="creator-Category">
                                <ul class="list-inline">
                                    @foreach($profile->pricingData as $charges)
                                    <li>{{ $charges->service_detail }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-6 col-12">
                            <h5>About my Social Media Platform</h5>
                            @if($profile->categories && count($profile->categories))
                            <div class="creator-Category">
                                <ul class="list-inline">
                                    @foreach($profile->categories as $category)
                                    <li>{{ @$category->category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row margintop">
            <div class="col-sm-12 col-12">
                <div class="MyServices BoxShadow">
                    <h4>My Services</h4>
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="table-responsive">
                                <table class="table table-striped tablestyle">
                                    <tbody>
                                      <tr>
                                        <td>Service detail</td>
                                        <td>Delivery Time</td>
                                        <td>Social Media Platform</td>
                                        <td>Price</td>
                                      </tr>
                                      @if($pricings && count($pricings))
                                      @foreach($pricings as $pricing)
                                      @php
                                      $social_platform = json_decode($pricing->social_platform);
                                      @endphp
                                      <tr>
                                        <td><span><b>{{$pricing->service_detail}}</b></span></td>
                                        <td><b>{{$pricing->delivery_time}}</b></td>
                                        <td><b>{{ ucwords(implode(", ", $social_platform ?? [])) }}</b></td>
                                        <td><span class="price"><b>${{$pricing->price}}</b></span></td>
                                      </tr>
                                      @endforeach
                                      @else
                                      <tr>
                                          <td colspan="4"> No data avilable</td>
                                      </tr>
                                      @endif
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row margintop">
            <div class="col-sm-12 col-12">
                <div class="consumers BoxShadow">
                    <h4>My top Consumers</h4>
                    <div id="consumers" class="splide">
                        <div class="splide__track">
                              <div class="splide__list">
                                @if($client_logos && count($client_logos))
                                @foreach($client_logos as $client_logo)
                                <div class="col-sm-3 splide__slide">
                                    <div class="Consumer-logo">
                                        @if($client_logo->image)
                                        <img src="{{ asset('storage/uploads/creators/service/brands/'.$client_logo->image) }}" class="img-fluid" />
                                        @else
                                        <img src="{{ asset('assets/images/frontend/Consumer1.jpg') }}" class="img-fluid" />
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                @else

                                <div class="col-sm-3 splide__slide">
                                    <div class="Consumer-logo">
                                        <img src="{{ asset('assets/images/frontend/Consumer2.jpg') }}" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="col-sm-3 splide__slide">
                                    <div class="Consumer-logo">
                                        <img src="{{ asset('assets/images/frontend/Consumer3.jpg') }}" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="col-sm-3 splide__slide">
                                    <div class="Consumer-logo">
                                        <img src="{{ asset('assets/images/frontend/Consumer4.jpg') }}" class="img-fluid" />
                                    </div>
                                </div>
                                @endif

                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row margintop">
            <div class="col-sm-12 col-12">
                <div class="LetsConnect BoxShadow">
                    <h4>Let's Connect</h4>
                    <div class="row">
                        <div class="col-sm-4 col-12 mb-2">
                            <div class="connect textleft">
                                <a href="tel:{{ $profile->phone }}">
                                <div class="cuser-left">
                                    <img src="{{ asset('assets/images/frontend/icons/call.png') }}" />
                                </div>
                                <div class="cuser-right">
                                    <p><b>Phone</b> <span>{{ $profile->phone }}</span></p>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12 mb-2">
                            <div class="connect textcenter">
                                <a href="mailto:{{ $profile->email }}">
                                <div class="cuser-left">
                                    <img src="{{ asset('assets/images/frontend/icons/outline-email.png') }}" />
                                </div>
                                <div class="cuser-right">
                                    <p><b>Email Address</b> <span>{{ $profile->email }}</span></p>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="connect textright">
                                <a href="javascript:void(0)">
                                <div class="cuser-left">
                                    <img src="{{ asset('assets/images/frontend/icons/cmap.png') }}" />
                                </div>
                                <div class="cuser-right">
                                    <p><b>Location</b> <span>{{ $profile->city }} {{ $profile->state }}, {{ $profile->country }}</span></p>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center mt-3">
                                @if(auth()->user() && auth()->user()->id)
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{ asset('assets/images/frontend/icons/b-chat.png') }}" class="me-1" />Chat with me</a>
                                    @else

                                <a class="btn btn-primary" href="/login"><img src="{{ asset('assets/images/frontend/icons/b-chat.png') }}" class="me-1" />Chat with me</a>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row margintop">
            <div class="col-sm-12 col-12">
                <div class="CustomerReviews BoxShadow">
                    <div class="title-header">
                        <div class="customerR">
                            <h4>Customer Reviews</h4>
                            <div class="rating">
                                {!! str_repeat('<span><i class="fa fa-star checked"></i></span>', round($review_avg)) !!}
                                {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - round($review_avg)) !!}
                                {{number_format($review_avg, 1)}}
                            </div>
                        </div>
                        <div class="write-review">
                            @if(auth()->user() && auth()->user()->id)
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#RatingModal">Write a review</a>
                            @else
                            <a href="/login">Write a review</a>
                            @endif
                        </div>
                    </div>
                    @if($reviews)
                    @foreach($reviews as $review)
                    <div class="all-reviews">
                        <div class="cus-review">
                            <div class="customername">
                                <h4>{{ $review->subject }}</h4>
                                <div class="rating">
                                   {!! str_repeat('<span><i class="fa fa-star checked"></i></span>', $review->rating) !!}
                                   {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - $review->rating) !!}
                                    {{$review->rating.'.0'}}
                                </div>
                            </div>
                            <div class="reviewDate">
                                <span>{{ date('d-m-Y', strtotime($review->created_at)) }}</span>
                            </div>

                        </div>
                        <p>{{ $review->review }}</p>
                        <span class="Rname"><b>{{ $review->author }}</b></span>
                    </div>
                    @endforeach
                    @else
                    <div class="all-reviews">
                        <div class="cus-review">
                            <div class="customername">
                                <h4>Customer Reviews</h4>
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>
                                    4.1
                                </div>
                            </div>
                            <div class="reviewDate">
                                <span>27-08-2023</span>
                            </div>

                        </div>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                        <span class="Rname"><b>Gabriel Angelo</b></span>
                    </div>
                    <div class="all-reviews">
                        <div class="cus-review">
                            <div class="customername">
                                <h4>Customer Reviews</h4>
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>
                                    4.1
                                </div>
                            </div>
                            <div class="reviewDate">
                                <span>27-08-2023</span>
                            </div>

                        </div>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                        <span class="Rname"><b>Gabriel Angelo</b></span>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center mt-3">
                                <div class="pagination">
                                {{ $reviews->appends(request()->query())->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="vertical-btn">

    @if(auth()->user() && auth()->user()->id)
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{ asset('assets/images/frontend/icons/b-chat.png') }}" class="me-1" />Chat with me</a>
        @else
        <a class="btn btn-primary" href="/login"><img src="{{ asset('assets/images/frontend/icons/b-chat.png') }}" class="me-1" />Chat with me</a>
        @endif
    </div>

<!--Contact-Modal-->

<!-- Modal -->
<div class="modal stymodal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modalform">
            <div class="modal-header">
                <button type="button" id="click-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <h5>Contact me</h5>
            <div class="alert alert-success show-sucess-message" style="display:none;">
                {{ session()->get('success') }}
            </div>
            <form method="POST" action="{{ route('creator.save-conatct-us') }}" id="contactForm">
                @csrf
                @method('POST')
                <input type="hidden" name="user_id" id="creator-id" value="{{ $profile->id }}">
                <input type="hidden" name="user_type" value="Creator">
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
                </div> -->
                <div class="form-group mb-2">
                    <label for="label" class="col-form-label">Message</label>
                    <textarea class="form-control" name="message" placeholder="Enter your message here..." rows="3">{{ old('email') }}</textarea>
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

<!-- Modal-Rating -->
<div class="modal stymodal fade" id="RatingModal" tabindex="-1" aria-labelledby="RatingModal" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modalform">
            <div class="modal-header">
                <button type="button" class="btn-close" id="clickClose" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <h5>Rate your recent experience</h5>
            <form method="POST" action="{{ route('creator.save-conatct-us') }}" id="ReviewForm">
                @csrf
                @method('POST')

                <div class="alert alert-success show-sucess" style="display:none;">
                    {{ session()->get('success') }}
                </div>
                <input type="hidden" name="user_id" id="creator-id" value="{{ $profile->id }}">
                <div class="form-group mb-1">
                    <label for="label" class="col-form-label">Rating<span>*</span></label>
                    <select class="form-select" required name="rating">
                        <option selected value="">Select rating</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Star</option>
                        <option value="3">3 Star</option>
                        <option value="4">4 Star</option>
                        <option value="5">5 Star</option>
                      </select>
                </div>
                <div class="form-group mb-1">
                    <label for="label" class="col-form-label">Give your review a title<span>*</span></label>
                    <input type="text" class="form-control" name="subject" placeholder="Enter your review title" required>
                </div>
                <div class="form-group mb-2">
                    <label for="label" class="col-form-label">Tell us more about your experience</label>
                    <textarea class="form-control" name="review" placeholder="Enter your experience" rows="4"></textarea>
                </div>
                <div class="form-group text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
    document.addEventListener( 'DOMContentLoaded', function() {
         new Splide('#mywork', {
            perPage: 4,
            perMove: 1,
            gap    : '1rem',
            pagination: false,
            breakpoints: {
            767: {
            perPage: 2,
            gap    : '.8rem',
            },
            575: {
            perPage: 1,
            gap    : '.8rem',
            },
        },
        }).mount();

    } );
  </script>
<script>
    document.addEventListener( 'DOMContentLoaded', function() {
        new Splide('#consumers', {
            perPage: 4,
            perMove: 1,
            gap    : '1rem',
            pagination: false,
            breakpoints: {
            767: {
            perPage: 2,
            gap    : '.8rem',
            },
            575: {
            perPage: 1,
            gap    : '.8rem',
            },
        },
        }).mount();
    } );
  </script>

<script type="text/javascript">


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

    $(document).on('submit','#contactForm',function(e){
        e.preventDefault();
        console.log($(this).serialize())
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
                    }, 2000)
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

    $(document).on('submit','#ReviewForm',function(e){

        var user_id = "{{ auth()->user() ? auth()->user()->id : '' }}";

        if(user_id == ''){
            window.location.href = "{{ url('/login') }}";
            return false;
        }

        e.preventDefault();
        $.ajax({
            method: 'post',
            url: "{{ route('save-review') }}",
            data: $(this).serialize(),
            success: function(msg) {
                if(msg.success){
                    $(".show-sucess").show().html(msg.message);
                    setTimeout(function () {
                        location.reload(true);
                    }, 1500);
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
@endpush
