<header class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('assets/images/frontend/winlogo-white.png')}}" class="before" alt="logo" width="300" height="61" />
            <img src="{{asset('assets/images/frontend/winlogo-black.png')}}" style="display: none;" class="after" alt="logo" width="300" height="61" />
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
                      <a href="{{ url('/home') }}" class="nav-link">Dashboard</a>
                  </li>
                  
                  <li class="nav-item">
                      <a href="{{ url('/') }}" class="nav-link">Sponsor Ad Campaigns</a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('/') }}" class="nav-link">Messages</a>
                  </li>
                  <!--
                  <li class="nav-item">
                      <a href="{{ url('/') }}" class="nav-link">Payments</a>
                  </li>
                -->
                  <li class="dropdown">
                      <a id="navbarDropdown" class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" v-pre>
                          <img src="{{ url('assets/images/frontend/profile-img.jpg') }}" width="40" height="40" /> {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu login-dropdown" aria-labelledby="navbarDropdown">
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
