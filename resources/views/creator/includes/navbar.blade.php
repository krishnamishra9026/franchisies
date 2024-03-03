<header class="headerinner headerinnerdesktop">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('assets/images/frontend/winlogo-white.png')}}" alt="logo" width="300" height="61" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ url('/marketplace') }}">Explore Marketplace</a>
          </li>
          <li class="nav-item">
            <a class="nav-link openBtn" href="javascript:void(0)" onclick="openSearchHero()"><img src="{{ asset('assets/images/frontend/icons/search.png') }}" alt="Search" /></a>
          </li> --}}
          @if (Route::has('login'))
              @auth
            <li class="nav-item">
                <a @if(profileCompletedCreator() == 'completed') href="{{ url('creator/dashboard') }}" @else href="javascript:void(0)" @endif  class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
                <a @if(profileCompletedCreator() == 'completed')  href="{{ url('creator/marketplace/creator') }}" @else href="javascript:void(0)" @endif class="nav-link">Marketplace</a>
            </li>
            <li class="nav-item">
                <a @if(profileCompletedCreator() == 'completed')  href="{{ route('creator.marketplace.campaigns') }}" @else href="javascript:void(0)" @endif class="nav-link">Sponsor Ad Campaigns</a>
            </li>
            <li class="nav-item">
                <a @if(profileCompletedCreator() == 'completed')  href="{{ url('creator/message') }}" @else href="javascript:void(0)" @endif class="nav-link">Messages <span class="badge badge-message">{{ getUnReadCreatorMessages() ?? 0 }}</span></a>
            </li>
            <li class="nav-item">
                <a @if(profileCompletedCreator() == 'completed') href="{{ url('/creator/favorites') }}" @else href="javascript:void(0)" @endif class="nav-link"> Favorites <span class="badge"> {{ auth()->guard('creator')->user()->creators()->count()}} </span></a>
            </li>
            <!--
            <li class="nav-item">
                <a @if(profileCompletedCreator() == 'completed')  href="{{ url('creator/payments') }}" @else href="javascript:void(0)" @endif class="nav-link">Payments</a>
            </li>-->
            <li class="nav-item" style="display: none;">
                <a class="nav-link openBtn" href="javascript:void(0)" onclick="openSearchHero()"><img src="{{ asset('assets/images/frontend/icons/search.png') }}" alt="Search" /></a>
            </li>


            <li class="dropdown">
                <a id="navbarDropdown" class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" v-pre>
                    
                        @if(isset(Auth::user()->avatar))
                        <div class="avtar-profile-image">
                            <img src="{{ url('storage/uploads/creators/'.Auth::user()->avatar) }}"/>
                        </div>
                        @else
                        <div class="avtar-profile-image">
                            <img src="{{ url('assets/images/thumbnails/user-profile-placeholder.png') }}"/>
                        </div>
                         @endif
                        <span><span class="account-user-name">{{ substr(Auth::guard('creator')->user()->firstname,0,1) }}. 
                    {{ Auth::guard('creator')->user()->lastname }}<span>Creator</span></span></span> <span class="caret"></span>

                </a>

                <ul class="dropdown-menu login-dropdown" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('creator.account-setting') }}">
                            {{ __('Account Settings') }}
                        </a>
                        </li>
                        <li>
                        <a class="dropdown-item" href="{{ url('creator/upgrades') }}">
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
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/marketplace') }}">Explore Marketplace</a>
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
                          <img src="{{ url('storage/uploads/creators/'.Auth::user()->avatar) }}"/>
                      </div>
                      @else
                      <div class="avtar-profile-image">
                          <img src="{{ url('assets/images/thumbnails/user-profile-placeholder.png') }}"/>
                      </div>
                      @endif
                      <span><span class="account-user-name">{{ Auth::guard('creator')->user()->firstname }}
                  {{ Auth::guard('creator')->user()->lastname }}<span>Creator</span></span></span> <span class="caret"></span>

                </a>

                  <ul class="dropdown-menu login-dropdown" aria-labelledby="navbarDropdown">
                      <li>
                          <a class="dropdown-item" href="{{ route('creator.account-setting') }}">
                              {{ __('Account Setting') }}
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




                @endauth

              @endif
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--Menu-->
    <div id="mySidebar">
        <nav id="menu">
            <ul>
                @if (Route::has('login'))
              @auth
            <li>
                <a href="{{ url('creator/dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('creator/marketplace/creator') }}">Marketplace</a>
            </li>
            <li>
                <a href="{{ route('creator.marketplace.campaigns') }}">Sponsor Ad Campaigns</a>
            </li>
            <li>
                <a href="{{ url('creator/message') }}">Messages <span class="badge">{{ getUnReadCreatorMessages() ?? 0 }}</span></a>
            </li>
            <!--
            <li>
                <a href="{{ url('creator/payments') }}">Payments</a>
            </li>
            -->
            {{-- <li>
                <a class="nav-link openBtn" href="javascript:void(0)" onclick="openSearchHero()"><img src="{{ asset('assets/images/frontend/icons/search.png') }}" alt="Search" /></a>
              </li> --}}


            {{-- <li class="dropdown">
                <a id="navbarDropdown" class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" v-pre>
                    <img src="{{ url('assets/images/frontend/profile-img.jpg') }}" width="40" height="40" /> <span><span class="account-user-name">{{ Auth::guard('creator')->user()->firstname }}
                    {{ Auth::guard('creator')->user()->lastname }}<span>Creator</span></span></span> <span class="caret"></span>

                </a>

                <ul class="dropdown-menu login-dropdown" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('creator.account-setting') }}">
                            {{ __('Account Setting') }}
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
            </li> --}}
              @else
              <li>
                <a href="{{ url('/marketplace') }}">Explore Marketplace</a>
              </li>
              {{-- <li>
                <a class="nav-link openBtn" href="javascript:void(0)" onclick="openSearchHero()"><img src="{{ asset('assets/images/frontend/icons/search.png') }}" alt="Search" /></a>
              </li> --}}
              <li>
                <a href="{{ route('login') }}">Sign In</a>
             </li>


                @if (Route::has('register'))

                <a href="{{ route('register') }}" class="btn btn-primary">Join</a>

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
            url: "{{ route('creator.getUnReadCreatorMessages') }}",
            method: "get",
            success: function(data){
                $(".badge-message").html(data);
            }
        })
    }, 1500); 


</script>
@endpush
