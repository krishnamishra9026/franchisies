@extends('layouts.app')
@section('title', @$brand->firstname.' '. @$brand->lastname.' - '.@$brand->talent_title.' | Winwinpromo')
@section('description', \Str::limit(@$brand->bio, 200))

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
                                    <h1>{{ @$brand->brandname }}</h1>
                                    <div class="createUF">
                                    <div class="createUF">
                                        <div class="user">
                                            <div class="user-profile-image">
                                                @if(isset($brand->avatar))
                                                <img src="{{ asset('storage/uploads/creators/'.@$brand->avatar) }}" class="img-fluid" alt="Featured Profile">
                                                @else
                                                <img src="{{ asset('assets/images/frontend/profile-img.jpg') }}" alt="Andreidu">
                                                @endif
                                            </div>
                                            <div class="userN">
                                                <div class="col-badges">
                                                    <h2 class="username">{{ @$brand->firstname }} {{ @$brand->lastname }}</h2>
                                                    @if(auth()->user() && auth()->user()->badge_ids != null)
                                                    @if(@$brand->badge_ids)
                                                    @foreach(@$brand->badge_ids as $key => $badge)
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
                                                        <li><span><span>@</span>{{ @$brand->username }}</span></li>
                                                        @if(@$brand->state || @$brand->country)<li><span><img src="{{ asset('assets/images/frontend/icons/map.png') }}" alt="Location"> {{ @$brand->state }}, {{ @$brand->country }}</span></li>@endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="followers">
                                            <ul class="list-inline">
                                                @if(@$brand->instagram_connected)
                                                <li><a href="https://www.instagram.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/instagram.svg') }}" alt="instagram" /> {{ @$brand->instagram_subscribers_or_followers }}</span><span class="follow">Followers</span></a></li>
                                                @endif
                                                @if(@$brand->youtube_connected)
                                                <li><a href="https://youtube.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/youtube-icon.svg') }}" alt="instagram" /> {{ @$brand->youtube_subscribers_or_followers }}</span><span class="follow">Followers</span></a></li>
                                                @endif
                                                @if(@$brand->tiktok_connected)
                                                <li><a href="https://www.tiktok.com/login" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/tiktok-icon.svg') }}" alt="instagram" /> {{ @$brand->tiktok_subscribers_or_followers }}</span><span class="follow">Followers</span></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="disc">
                                        <p>{{ @$brand->bio }} </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-12">
                            <div class="createR">
                                <div class="add-favorites">
                                    <p>Add to favorites</p>
                                    {{-- <i class="fa fa-heart-o wishlist"></i> --}}
                                    <i class="fa @if(@$brand->favorite) fa-heart @else fa-heart-o @endif wishlist" data-creator-id="{{ @$brand->id }}"></i>
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
                                

                                <div class="col-sm-3 splide__slide">
                                   
                                        <video width="100%" height="297px" controls muted loop>
                                            <source src="{{ asset('assets/images/frontend/instagram_video_dashinit.mp4') }}" type="video/mp4">
                                        </video>
                                    
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(@$brand->pricingData || @$brand->categories)
        <div class="row margintop">
            <div class="col-sm-12 col-12">
                <div class="ContentType BoxShadow">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <h5>Content Type</h5>
                            @if(@$brand->pricingData && count(@$brand->pricingData))
                            <div class="creator-Category">
                                <ul class="list-inline">
                                    @foreach(@$brand->pricingData as $charges)
                                    <li>{{ $charges->service_detail }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-6 col-12">
                            <h5>About my Social Media Platform</h5>
                            @if(@$brand->categories && count(@$brand->categories))
                            <div class="creator-Category">
                                <ul class="list-inline">
                                    @foreach(@$brand->categories as $category)
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
                                      
                                      <tr>
                                        <td><span><b>{{@$pricing->service_detail}}</b></span></td>
                                        <td><b>{{@$pricing->delivery_time}}</b></td>
                                        <td><b>{{ ucwords(implode(", ", $social_platform ?? [])) }}</b></td>
                                        <td><span class="price"><b>${{@$pricing->price}}</b></span></td>
                                      </tr>
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
                                <a href="tel:{{ @$brand->phone }}">
                                <div class="cuser-left">
                                    <img src="{{ asset('assets/images/frontend/icons/call.png') }}" />
                                </div>
                                <div class="cuser-right">
                                    <p><b>Phone</b> <span>{{ @$brand->phone }}</span></p>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12 mb-2">
                            <div class="connect textcenter">
                                <a href="mailto:{{ @$brand->email }}">
                                <div class="cuser-left">
                                    <img src="{{ asset('assets/images/frontend/icons/outline-email.png') }}" />
                                </div>
                                <div class="cuser-right">
                                    <p><b>Email Address</b> <span>{{ @$brand->email }}</span></p>
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
                                    <p><b>Location</b> <span>{{ @$brand->city }} {{ @$brand->state }}, {{ @$brand->country }}</span></p>
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
                <input type="hidden" name="user_id" id="creator-id" value="{{ @$brand->id }}">
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
                <input type="hidden" name="user_id" id="creator-id" value="{{ @$brand->id }}">
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
