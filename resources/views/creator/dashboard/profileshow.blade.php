@extends('layouts.creator')
@section('title', 'Welcome to Collab Marketplace')

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
                                    <h2>{{ $profile->bio ?? "I create high quality content for social media and print." }}</h2>
                                    <div class="createUF">
                                        <div class="user">
                                            <div class="user-profile-image">
                                                @if(isset($profile->avatar))
                                                <img src="{{ asset('storage/creators/'.$profile->avatar) }}" class="img-fluid" alt="Featured Profile">
                                                @else
                                                <img src="{{ asset('assets/images/frontend/profile-img.jpg') }}" alt="Andreidu">
                                                @endif
                                            </div>
                                            <div class="userN">
                                                <h5 class="username">{{ $profile->username }}</h5>
                                                <div class="rating">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star-o"></span>
                                                    4.1
                                                </div>
                                                <div class="location">
                                                    <ul class="list-inline">
                                                        <li><span>@joney123</span></li>
                                                        <li><span><img src="{{ asset('assets/images/frontend/icons/map.png') }}" alt="Location"> Qatar, Doha</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="followers">
                                            <ul class="list-inline">
                                                <li><a href="javascript:void(0)"><span><img src="{{ asset('assets/images/frontend/icons/instagram.svg') }}" alt="instagram" /> 365K</span><span class="follow">Followers</span></a></li>
                                                <li><a href="javascript:void(0)"><span><img src="{{ asset('assets/images/frontend/icons/youtube-icon.svg') }}" alt="instagram" /> 9.8M</span><span class="follow">Followers</span></a></li>
                                                <li><a href="javascript:void(0)"><span><img src="{{ asset('assets/images/frontend/icons/tiktok-icon.svg') }}" alt="instagram" /> 3.2M</span><span class="follow">Followers</span></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="disc">
                                        <p>{{ $profile->description }} </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-12">
                            <div class="createR">
                                <div class="open-collabs">
                                    <img src="{{ asset('assets/images/frontend/icons/handshake.png') }}" alt="Open to Collabs">
                                    <span>Open to collabs</span>
                                </div>
                                <div class="add-favorites">
                                    <p>Add to favorites</p>
                                    <i class="fa fa-heart-o wishlist"></i>
                                    {{-- <i class="fa @if($creator->favorite) fa-heart @else fa-heart-o @endif wishlist" data-creator-id="{{ $creator->id }}"></i> --}}
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
                    <h2>My work showcase</h2>
                    <div id="mywork" class="splide">
                        <div class="splide__track">
                              <div class="splide__list">
                                  <div class="col-sm-3 splide__slide">
                                    <img src="{{ asset('assets/images/frontend/showcase1.jpg') }}" class="img-fluid" />
                                  </div>
                                  <div class="col-sm-3 splide__slide">
                                    <img src="{{ asset('assets/images/frontend/showcase2.jpg') }}" class="img-fluid" />
                                  </div>
                                  <div class="col-sm-3 splide__slide">
                                    {{-- <img src="{{ asset('assets/images/frontend/showcase3.jpg') }}" class="img-fluid" /> --}}
                                    <video width="100%" height="297px" controls muted loop>
                                        <source src="{{ asset('assets/images/frontend/instagram_video_dashinit.mp4') }}" type="video/mp4">
                                    </video>
                                  </div>
                                  <div class="col-sm-3 splide__slide">
                                    <img src="{{ asset('assets/images/frontend/showcase4.jpg') }}" class="img-fluid" />
                                  </div>

                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row margintop">
            <div class="col-sm-12 col-12">
                <div class="ContentType BoxShadow">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <h5>Content Type</h5>
                            <div class="creator-Category">
                                <ul class="list-inline">
                                    <li><span> Instagram Post</span></a></li>
                                    <li><span> Instagram Reel</span></a></li>
                                    <li><span> Instagram Story</span></a></li>
                                    <li><a href="#"><span> TikTok Feed</span></a></li>
                                    <li><a href="#"><span> YouTube Tutorial</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <h5>About my Social Media Platform</h5>
                            <div class="creator-Category">
                                <ul class="list-inline">
                                    <li><a href="#"><span> Lifestyle</span></a></li>
                                    <li><a href="#"><span> Beauty</span></a></li>
                                    <li><a href="#"><span> Sports</span></a></li>
                                    <li><a href="#"><span> Photography</span></a></li>
                                    <li><a href="#"><span> Fitness</span></a></li>
                                    <li><a href="#"><span> Music</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                        <td><span><b>2 Post, 2 Story</b></span></td>
                                        <td><b>7 Days</b></td>
                                        <td><b>Instagram, YouTube</b></td>
                                        <td><span class="price"><b>$100</b></span></td>
                                      </tr>
                                      <tr>
                                        <td><span><b>3 Story, 1 Post, 1 Reel</b></span></td>
                                        <td><b>7 Days</b></td>
                                        <td><b>Instagram, YouTube</b></td>
                                        <td><span class="price"><b>$200</b></span></td>
                                      </tr>
                                      <tr>
                                        <td><span><b>3 Story, 3 Post, 3 Reel</b></span></td>
                                        <td><b>7 Days</b></td>
                                        <td><b>Instagram, YouTube, TikTok</b></td>
                                        <td><span class="price"><b>$500</b></span></td>
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
                                        <img src="{{ asset('assets/images/frontend/Consumer1.jpg') }}" class="img-fluid" />
                                    </div>
                                  </div>
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
                        <div class="col-sm-4 col-12">
                            <div class="connect textleft">
                                <a href="tel:+1 901 502030">
                                <div class="cuser-left">
                                    <img src="{{ asset('assets/images/frontend/icons/call.png') }}" />
                                </div>
                                <div class="cuser-right">
                                    <p><b>Phone</b> <span>{{ $profile->phone }}</span></p>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="connect textcenter">
                                <a href="mailto:info@gmail.com">
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
                                    <p><b>Location</b> <span>{{ $profile->address }} {{ $profile->address1 }} {{ $profile->city }}, {{ $profile->state }} {{ $profile->country }} {{ $profile->zipcode }}</span></p>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center mt-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{ asset('assets/images/frontend/icons/b-chat.png') }}" class="me-1" />Chat with me</a>
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
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-o"></span>
                                4.1
                            </div>
                        </div>
                        <div class="write-review">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#RatingModal">Write a review</a>
                        </div>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center mt-3">
                                <div class="pagination">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                          <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-caret-left"></i></a></li>
                                          <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                                          <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-caret-right"></i></a></li>
                                        </ul>
                                      </nav>
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
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{ asset('assets/images/frontend/icons/b-chat.png') }}" class="me-1" />Chat with me</a>
</div>

<!--Contact-Modal-->

<!-- Modal -->
<div class="modal stymodal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="text" class="form-control" name="make_offer" value="{{ old('make_offer') }}"  placeholder="Enter your offer price" required>
                </div>
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
<div class="modal stymodal fade" id="RatingModal" tabindex="-1" aria-labelledby="RatingModal" aria-hidden="true">
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

        var user_id = "{{ auth()->user()->id }}";
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
            url: "{{ route('creator.save-conatct-us') }}",
            data: $(this).serialize(),
            success: function(msg) {
                if(msg.success){
                    $(".show-sucess-message").show().html(msg.message);
                    setTimeout(() => {
                        $("#contactForm")[0].reset();
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

    $(document).on('submit','#ReviewForm',function(e){
        e.preventDefault();
        console.log($(this).serialize())
        $.ajax({
            method: 'post',
            url: "{{ route('creator.save-review') }}",
            data: $(this).serialize(),
            success: function(msg) {
                if(msg.success){
                    $(".show-sucess").show().html(msg.message);
                    setTimeout(() => {
                        $("#ReviewForm")[0].reset();
                        $("#clickClose").trigger('click');
                    }, 1200);
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
