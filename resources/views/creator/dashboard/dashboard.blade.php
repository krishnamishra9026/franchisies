@extends('layouts.creator')
@section('title', 'Welcome to Collab Marketplace Dashboard')
@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
@endsection
@section('content')
<style>
    #more {display: none;}
</style>
<div class="dashboard">
   <div class="container">
      <h1>Dashboard</h1>
      @if (($message = Session::get('success')) || strpos(url()->previous(), 'upgarde-save') !== false)
      <div class="alert alert-success" role="alert">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <strong>{{ $message ?? 'Your Payment Successfull!' }}</strong>
      </div>
      @endif
      <div class="row">
         <div class="col-md-7 col-12">
            <div class="recently BoxShadow">
               <div class="row">
                  <div class="col-sm-6 col-6">
                     <h2>{{ @$creator_setting->header }}</h2>
                  </div>
                  <div class="col-sm-6 col-6">
                     <div class="edit text-end">
                        @if(auth()->guard('creator')->user()->pricingData->count() > 0)
                        <a href="{{ route('creator.my-services') }}">Edit</a>
                        @else
                        <a href="{{ route('creator.my-services') }}">Add your Talent</a>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="promote-content">
                        <h4>{{ @$creator_setting->title }}</h4>
                        <p>{{ @$creator_setting->description }}</p>
                     </div>
                     <div class="creatormyservice">
                        <div class="table-responsive">
                           <table class="table table-striped tablestyle">
                              <tbody>
                                 <tr>
                                    <td>Service detail</td>
                                    <td>Delivery Time</td>
                                    <td>Social Media Platform</td>
                                    <td>Price</td>
                                 </tr>
                                 @if ($pricings && count($pricings))
                                 @foreach ($pricings as $pricing)
                                 @php
                                 $social_platform = json_decode($pricing->social_platform);
                                 @endphp
                                 <tr>
                                    <td><span><b>{{ $pricing->service_detail }}</b></span></td>
                                    <td><b>{{ $pricing->delivery_time }}</b></td>
                                    <td><b>{{ ucwords(implode(', ', $social_platform ?? [])) }}</b>
                                    </td>
                                    <td><span class="price"><b>${{ $pricing->price }}</b></span>
                                    </td>
                                 </tr>
                                 @endforeach
                                 @else
                                 <tr>
                                    <td colspan="4">
                                       No data available
                                    </td>
                                 </tr>
                                 @endif
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="creatormywork">
               <div class="mywork BoxShadow mt-3 mb-3">
                  <h2>My work showcase</h2>
                  <div id="mywork" class="splide">
                     <div class="splide__track">
                        <div class="splide__list">
                           @if ($showcase_works && count($showcase_works))
                           @foreach ($showcase_works as $showcase_work)
                           @php
                           $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief', 'jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd', 'webp'];
                           $explodeImage = explode('.', $showcase_work->image_video);
                           $extension = end($explodeImage);
                           if (in_array($extension, $imageExtensions)) {
                           $is_image = true;
                           } else {
                           $is_image = false;
                           }
                           @endphp
                           <div class="col-sm-3 splide__slide">
                              @if ($is_image)
                              @if ($showcase_work->image_video)
                              <img src="{{ asset('storage/uploads/creators/service/showcase/' . $showcase_work->image_video) }}"
                                 class="img-fluid custom-scale" />
                              @else
                              <img src="{{ asset('assets/images/frontend/showcase1.jpg') }}"
                                 class="img-fluid custom-scale" />
                              @endif
                              @else
                              @if ($showcase_work->image_video)
                              <video width="100%" height="160px" controls muted loop>
                                 <source
                                    src="{{ asset('storage/uploads/creators/service/showcase/' . $showcase_work->image_video) }}"
                                    type="video/mp4">
                              </video>
                              @else
                              <video width="100%" height="160px" controls muted loop>
                                 <source
                                    src="{{ asset('assets/images/frontend/instagram_video_dashinit.mp4') }}"
                                    type="video/mp4">
                              </video>
                              @endif
                              @endif
                           </div>
                           @endforeach
                           @else
                           <div>
                              No data available
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-5 col-12">
            <div class="DRight-Sec BoxShadow">
               <div class="sponsor-Profile">
                  <div class="card">
                     <div class="card-header">
                        <div class="avtar-profile-image">
                           @if (auth()->user()->avatar)
                           <img src="{{ asset('storage/uploads/creators/' . auth()->user()->avatar) }}"
                              alt="User" />
                           @else
                           <img src="{{ asset('assets/images/thumbnails/user-profile-placeholder.png') }}"
                              alt="User" />
                           @endif
                        </div>
                        <div class="userName pl-2">
                           <h5>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h5>
                           <a href="{{ route('creator.profileview', auth()->user()->slug ?? auth()->user()->id) }}"> <span>View my
                           profile</span> </a>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="profile-info">
                           <p><img src="{{ asset('assets/images/frontend/icons/cmap.png') }}"
                              alt="Location" />
                              {{ auth()->user()->city }} {{ auth()->user()->state }},
                              {{ auth()->user()->country }}
                           </p>
                        </div>
                        <div class="profile-info">
                           <p><img src="{{ asset('assets/images/frontend/icons/outline-email.png') }}"
                              alt="Email" /> {{ auth()->user()->email }}</p>
                        </div>
                        <div class="profile-info">
                           <p><img src="{{ asset('assets/images/frontend/icons/call.png') }}"
                              alt="Call" />
                              {{ auth()->user()->phone }}
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="RecentChats">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h4>Inbox</h4>
                        @if (count($chats) > 5)
                        <a href="{{ url('/creator/message') }}">View All</a>
                        @endif
                     </div>
                     <div class="panel-body">
                        @if ($chats && count($chats))
                        @foreach ($chats as $key => $chat)
                        <div class="chatp active">
                           <a href="{{ url('/creator/message/' . $chat->message_from) }}">
                              <div class="chatpname">
                                 <div class="user-profile-image">
                                    @if (isset($chat->user->avatar))
                                    <img src="{{ asset('storage/uploads/sponsors/' . $chat->user->avatar) }}"
                                       class="rounded-circle"
                                       alt="{{ @$chat->user->username }}" />
                                    @else
                                    <img src="{{ asset('assets/images/frontend/chat1.png') }}"
                                       class="rounded-circle"
                                       alt="{{ @$chat->user->username }}" />
                                    @endif
                                 </div>
                                 <div class="uname" style="margin-left: 10px;">
                                    <h5>{{ \Str::limit(@$chat->message, $limit = 25, $end = '...') }}
                                    </h5>
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
                        <div class="chatp">
                           No data available
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="RecentChats connected-account mt-3">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h4>Connected Accounts</h4>
                     </div>
                     <div class="panel-body">
                        <div class="connectedaccount">
                           <ul class="list-inline">
                              <li>
                                 <span>
                                    <img src="{{ asset('assets/images/frontend/youtube.png') }}"
                                       alt="YouTube" class="img-fluid" />
                                    @if (auth()->user()->youtube_connected)
                                    <p class="connect">Connected</p>
                                    @else
                                    <p class="notconnect">Not Connected</p>
                                    @endif
                                 </span>
                              </li>
                              <li>
                                 <span>
                                    <img src="{{ asset('assets/images/frontend/tiktok.png') }}"
                                       alt="tiktok" class="img-fluid" />
                                    @if (auth()->user()->tiktok_connected)
                                    <p class="connect"> Connected</p>
                                    @else
                                    <p class="notconnect">Not Connected</p>
                                    @endif
                                 </span>
                              </li>
                              <li>
                                 <span>
                                    <img src="{{ asset('assets/images/frontend/instagram.png') }}"
                                       alt="instagram" class="img-fluid" />
                                    @if (auth()->user()->instagram_connected)
                                    <p class="connect"> Connected</p>
                                    @else
                                    <p class="notconnect">Not Connected</p>
                                    @endif
                                 </span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12 col-12">
            <div class="popular-services popular-servicesD BoxShadow">
               <h2>Sponsor Ad Campaigns</h2>
               <div class="row" @if(auth() && auth()->guard('creator') && auth()->guard('creator')->user()->badge_ids != null) style="display: block;" @else style="display: none;" @endif>
               <div id="sponsor-campaigns" class="splide">
                  <div class="splide__track">
                     <div class="splide__list">
                        @if ($campaigns && count($campaigns))
                        @foreach ($campaigns as $key => $campaign)
                        <div class="col-sm-3 splide__slide">
                           <div class="FProfile SCProfile">
                                 <div class="LProfile">
                                    <div class="image">
                                       <div class="listing-image-box">
                                          @if(isset($campaign->image))
                                          <img src="{{ asset('storage/uploads/campaigns/'.$campaign->image) }}" class="img-fluid" alt="{{ $campaign->title }}">
                                          @else
                                          <img src="{{ asset('assets/images/frontend/creator-placeholder.jpeg') }}" class="img-fluid" alt="{{ $campaign->title }}">
                                          @endif
                                       </div>
                                       {{--
                                       <div class="open-collabs">
                                          <img src="{{ asset('assets/images/frontend/icons/shield.png') }}" alt="Featured Sponsor">
                                          <span>Featured Sponsor</span>
                                       </div>
                                       --}}
                                    </div>
                                 </div>

                              <div class="caption">
                                 <div class="Lcaption">
                                    <h2>{{ $campaign->title }}</h2>
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
                                             @if(auth()->guard('creator')->user() && auth()->guard('creator')->user()->badge_ids != null)
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
                                            @endif
                                          </div>
                                       </div>
                                    </div>
                                    <div class="locatio mt-2">
                                       <ul class="list-inline">
                                          <li><span>{{ @$campaign->sponsorData->username }}</span></li>
                                          @if($campaign->sponsorData && ($campaign->sponsorData->state || $campaign->sponsorData->country))
                                          <li><span><img src="{{ asset('assets/images/frontend/icons/map.png') }}" alt="Location"> {{ @$campaign->sponsorData->state }}, {{ @$campaign->sponsorData->country }}</span></li>
                                          @endif
                                       </ul>
                                    </div>

                                    <div class="disc">
                                       <p>{{ substr($campaign->description, 0, 54) }}<span id="dots">@if(strlen($campaign->description) > 200)...@else.@endif</span><span id="more">{{substr($campaign->description, 54 , -1)}}.@if(strlen($campaign->description) > 54)</span> <a id="myBtn">Read more</a>@endif</p>
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
                                 <div class="LRight">
                                 @if($campaign->price)
                                 <div class="price">
                                    <p><span>${{ $campaign->price }} USD</span></p>
                                 </div>
                                 @endif
                                 <div class="viewbtn">
                                    @if(auth()->user() && auth()->guard('web')->check() && $campaign->sponsor == auth()->user()->id)
                                    <a href="{{ route('campaigns.edit',$campaign->id) }}" class="btn btn-primary btn-lg">Edit</a>
                                    @else
                                    <a href="#" data-bs-toggle="modal" data-id="{{ $campaign->sponsor }}" data-bs-target="#exampleModal" class="btn btn-primary btn-lg modal_contact">Send Quote</a>
                                    @endif
                                 </div>
                              </div>
                              </div>

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
            <!-- <div class="col-sm-3 splide__slide" @if(auth() && auth()->guard('creator') && auth()->guard('creator')->user()->badge_ids != null) style="display: nono;" @else style="display: block;" @endif>
               No data available
               </div> -->
         </div>
      </div>
   </div>
</div>
</div>
<!--Contact-Modal-->
<!-- Modal -->
<div class="modal stymodal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body">
            <div class="modalform">
               <div class="modal-header">
                  <button type="button" class="btn-close" id="click-close" data-bs-dismiss="modal"
                     aria-label="Close"></button>
               </div>
               <h5>Contact me</h5>
               <div class="alert alert-success show-sucess-message" style="display:none;">
                  {{ session()->get('success') }}
               </div>
               <form method="POST" action="{{ route('creator.save-quote') }}" id="contactForm">
                  @csrf
                  @method('POST')
                  <input type="hidden" name="user_id" value="" id="receiver_id">
                  <div class="form-group mb-2">
                     <label for="label" class="col-form-label">Message</label>
                     <textarea class="form-control" name="message" required placeholder="Enter your message here..." rows="3">{{ old('message') }}</textarea>
                     @error('message')
                     <span id="message-error" class="error invalid-feedback">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="form-group d-grid">
                     <button type="submit" class="btn btn-primary">Send</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">

   $('.modal_contact').on('click', function() {
        var id = $(this).data('id');
        $("#contactForm #receiver_id").val(id);
    });

   $(document).on('submit','#contactForm',function(e){
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: "{{ route('creator.save-quote') }}",
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

</script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
       new Splide('#popular-services', {
           type: 'loop',
           perPage: 4,
           perMove: 1,
           gap: '1rem',
           pagination: false,
           breakpoints: {
               640: {
                   perPage: 1,
                   gap: '.7rem',
               },
               480: {
                   perPage: 1,
                   gap: '.7rem',
               },
           },
       }).mount();

   });
</script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
       new Splide('#sponsor-campaigns', {
           type: 'loop',
           perPage: 4,
           perMove: 1,
           gap: '1rem',
           pagination: false,
           breakpoints: {
            767: {
                   perPage: 2,
                   gap: '.8rem',
               },
               575: {
                   perPage: 1,
                   gap: '.8rem',
               },
           },
       }).mount();

   });
</script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
       new Splide('#mywork', {
           perPage: 3,
           perMove: 1,
           gap: '1.5rem',
           pagination: false,
           breakpoints: {
               767: {
                   perPage: 2,
                   gap: '.8rem',
               },
               575: {
                   perPage: 1,
                   gap: '.8rem',
               },
           },
       }).mount();

   });
</script>
<script type="text/javascript">
   $(".wishlist").click(function() {
       $(this).toggleClass('fa-heart-o');
       $(this).toggleClass('fa-heart');
   });

   $(".alert").click(function(event) {
       $(this).alert('close');
   });

   /*setTimeout(function() {
       $('.alert').alert('close');
   }, 8000);*/
</script>
<script>
   $(document).on('click', '#myBtn', function(event) {
       event.preventDefault();
       $(this).parent().find('#dots').toggle();
       if ($(this).parent().find('#dots').is(":visible")) {
           $(this).text('Read more');
           $(this).parent().find('#more').hide();
       } else {
           $(this).text('Read less');
           $(this).parent().find('#more').show();
       }
   });



</script>
@endpush
