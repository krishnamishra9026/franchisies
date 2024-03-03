@php
use App\Models\WebsiteSetting;
$setting = WebsiteSetting::first();
$logo = $setting ? asset('storage/uploads/logo/'.$setting->logo) : asset('assets/images/frontend/winlogo-white.png');
$footer_logo = $setting ? asset('storage/uploads/logo/'.$setting->footer_logo) : asset('assets/images/frontend/winlogo-black.png');
@endphp
<header class="headerinner headerinnerdesktop">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ $logo }}" alt="logo"  width="300" height="61"/>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @if (Route::has('login'))
              @auth
            <li class="nav-item">
                <a @if(profileCompletedSponsor() == 'completed') href="{{ url('/home') }}" @else href="javascript:void(0)" @endif class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
                <a @if(profileCompletedSponsor() == 'completed') href="{{ route('marketplace.creators') }}" @else href="javascript:void(0)" @endif class="nav-link">Marketplace</a>
            </li>
            <li class="nav-item">
                <a @if(profileCompletedSponsor() == 'completed') href="{{ url('/campaigns') }}" @else href="javascript:void(0)" @endif class="nav-link">My Ad Campaigns</a>
            </li>
            <li class="nav-item">
                <a @if(profileCompletedSponsor() == 'completed') href="{{ url('/message') }}" @else href="javascript:void(0)" @endif class="nav-link">Messages <span class="badge badge-message ">{{ getUnReadSponserMessages() ?? 0 }}</span></a>
            </li>
            <li class="nav-item">
                <a @if(profileCompletedSponsor() == 'completed') href="{{ url('/favorites') }}" @else href="javascript:void(0)" @endif class="nav-link"> Favorites <span class="badge"> {{ auth()->user()->creators()->count()}} </span></a>
            </li>
            <!--
            <li class="nav-item">
                <a @if(profileCompletedSponsor() == 'completed') href="{{ url('/payments') }}" @else href="javascript:void(0)" @endif class="nav-link">Payments</a>
            </li>-->
            <li class="nav-item" style="display: none;">
                <a class="nav-link openBtn" href="javascript:void(0)" onclick="openSearchHero()"><img src="{{ asset('assets/images/frontend/icons/search.png') }}" alt="Search" /></a>
              </li>

            <li class="dropdown">
                <a id="navbarDropdown" class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" v-pre>
                @if(isset(Auth::user()->avatar))
                <div class="avtar-profile-image">
                    <img src="{{ url('storage/uploads/sponsors/'.Auth::user()->avatar) }}"/>
                </div>
                @else
                <div class="avtar-profile-image">
                    <img src="{{ url('assets/images/thumbnails/user-profile-placeholder.png') }}" />
                </div>
                @endif <span><span class="account-user-name">{{ substr(Auth::user()->first_name,0,1) }}. {{ Auth::user()->last_name }} <span>Sponsor</span></span></span> <span class="caret"></span>

                </a>

                <ul class="dropdown-menu login-dropdown" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ url('account-setting') }}">
                            {{ __('Account Settings') }}
                        </a>
                        </li>
                    <li>
                    <li>
                        <a class="dropdown-item" href="{{ url('upgrades') }}">
                            {{ __('Profile Upgrade') }}
                        </a>
                    </li>
                    <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </li>
              @else

              @if(auth()->user() && auth()->guard('creator')->check())
              <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
            </li>
            @endif

              <li class="nav-item">
                <a class="nav-link" href="{{ route('marketplace.creators') }}">Explore Marketplace</a>
              </li>
              <li class="nav-item" style="display: none;">
                <a class="nav-link openBtn" href="javascript:void(0)" onclick="openSearchHero()"><img src="{{ asset('assets/images/frontend/icons/search.png') }}" alt="Search" /></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Sign In</a>
             </li>


                  @if (Route::has('register'))
                  <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link btn btn-primary">Join</a>
                </li>
                @endif
              @endauth

            @endif


        </ul>

      </div>
    </div>
  </nav>
</header>

<!--MOBILE HEADER-->
<div class="mobile-header-inner bg-body-tertiary">

    @if(Auth::check())
    <div class="midheader">
      <div class="container">
        <div class="row">
            <div class="col-6 mobilepadding">
                <div class="text-right">
                  <a href="{{ url('/') }}">
                    <img src="{{asset('assets/images/frontend/winlogo-white.png')}}" alt="logo" class="img-fluid">
                </a>
                </div>
            </div>
            <div class="col-1 paddingleft paddingright" style="display: none;">
              <div class="msearch">
                <a class="penBtn" href="javascript:void(0)" onclick="openSearchHero()"><img src="{{ asset('assets/images/frontend/icons/search.png') }}" alt="Search" /></a>
              </div>
            </div>
          <div class="col-1 paddingright">
            <div class="m-triger">
              <a class="navbar-toggle" type="button" class="openbtn" onclick="openNav()" href="javascript:openMMenu();">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
            </div>
          </div>
          <div class="col-4 paddingright">
            <div class="logeduser">
              <ul>
              @if (Route::has('login'))
                @auth

                <li class="dropdown">
                  <a id="navbarDropdown" class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" v-pre>
                  @if(isset(Auth::user()->avatar))
                  <div class="avtar-profile-image">
                      <img src="{{ url('storage/uploads/sponsors/'.Auth::user()->avatar) }}"/>
                  </div>
                  @else
                  <div class="avtar-profile-image">
                      <img src="{{ url('assets/images/thumbnails/user-profile-placeholder.png') }}" />
                  </div>
                  @endif <span><span class="account-user-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span>Sponsor</span></span></span> <span class="caret"></span>

                  </a>

                    <ul class="dropdown-menu login-dropdown" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ url('account-setting') }}">
                                {{ __('Account Setting') }}
                            </a>
                            </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form-mobile').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
                @else
                @endauth
                @endif
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
    @else
    <div class="midheader">
      <div class="container">
        <div class="row">
            <div class="col-9 mobilepadding">
                <div class="text-right">
                  <a href="{{ url('/') }}">
                    <img src="{{asset('assets/images/frontend/winlogo-white.png')}}" alt="logo" class="before img-fluid">
                    <img src="{{asset('assets/images/frontend/winlogo-black.png')}}" alt="logo" style="display: none;" class="after img-fluid">
                </a>
                </div>
            </div>
          <div class="col-3 mobilepadding">
            <div class="m-triger">
              <a class="navbar-toggle" style="padding: 18px 0;" type="button" class="openbtn" onclick="openNav()" href="javascript:openMMenu();">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
    @endif
    <!--Menu-->
    <div id="mySidebar">
        <nav id="menu">
            <ul>
                @if (Route::has('login'))
                @auth
                <li>
                    <a href="{{ url('/home') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('marketplace.creators') }}">Marketplace</a>
                </li>
                <li>
                    <a href="{{ url('/campaigns') }}">My Ad Campaigns</a>
                </li>
                <li>
                    <a href="{{ url('/message') }}">Messages <span class="badge badge-message">{{ getUnReadSponserMessages() ?? 0 }}</span></a>
                </li>
                <li>
                    <a href="{{ url('/favorites') }}">Favorites <span class="badge"> {{ auth()->user()->creators()->count()}} </span></a>
                </li>
                <!--<li>
                    <a href="{{ url('/payments') }}">Payments</a>
                </li>-->

                @else
                <li>
                    <a href="{{ route('marketplace.creators') }}">Explore Marketplace</a>
                </li>

                <li>
                    <a href="{{ route('login') }}">Sign In</a>
                </li>


                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="joinus btn btn-primary">Join</a>
                    @endif
                @endauth

                @endif
            </ul>
        </nav>
    </div>
<!--End-->
</div>

<div id="FullScreenOverlay" class="overlay">
    <span class="closebtn" onclick="closeSearchHero()" title="Close Overlay">×</span>
    <div class="overlay-content">
      <form>
        <input type="text" placeholder="Search by keyword (Beauty, Freelancing, Promotion)" name="search">
        <button type="submit"><img src="{{ asset('assets/images/frontend/icons/search.png') }}" alt="Search" /></button>
      </form>
    </div>
</div>

@push('scripts')
<script>
    function openSearchHero() {
        document.getElementById("FullScreenOverlay").style.display = "block";
    }

    function closeSearchHero() {
        document.getElementById("FullScreenOverlay").style.display = "none";
    }

    setInterval(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })

        $.ajax({
            url: "{{ route('getUnReadSponserMessages') }}",
            method: "get",
            success: function(data){
                $(".badge-message").html(data);
            }
        })
    }, 1500);

</script>
@endpush
