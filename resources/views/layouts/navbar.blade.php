@php
use App\Models\WebsiteSetting;
$setting = WebsiteSetting::first();
$logo = $setting ? asset('storage/uploads/logo/'.$setting->logo) : asset('assets/images/frontend/winlogo-white.png');
$footer_logo = $setting ? asset('storage/uploads/logo/'.$setting->footer_logo) : asset('assets/images/frontend/winlogo-black.png');
@endphp
<header class="@if(request()->is('/')) header desktopheader  @else headerinner headerinnerdesktop @endif ">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ $logo }}" class="before" alt="logo" width="300" height="61" />
                <img src="{{ $logo }}" style="display: none;" class="after" alt="logo" width="300" height="61" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                      <a class="nav-link btn btn-primary" href="{{ url('category/all') }}">Explore Brands</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('franchisor.register') }}" class="nav-link btn btn-primary">Join</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('become-state-partner') }}" class="nav-link btn btn-primary">Become State partner</a>
                    </li>
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
	            <div class="col-9 mobilepadding">
	                <div class="text-right">
	                  <a href="{{ url('/') }}">
	                    <img src="{{  $logo }}" alt="logo" class="before img-fluid">
	                    <img src="{{ $logo }}" alt="logo" style="display: none;" class="after img-fluid">
	                </a>
	                </div>
	            </div>
	          	<div class="col-3 m-auto">
		            <div class="m-triger">
			            <a class="navbar-toggle float-end" type="button" class="openbtn" onclick="openNav()" href="javascript:openMMenu();">
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
    <!--Menu-->
    <div id="mySidebar">
        <nav id="menu">
            <ul>
                <li>
                    <a href="{{ route('categories.index', 'all') }}">Explore Brands</a>
                </li>

                <li >
  
                <a href="{{ route('franchisor.register') }}" >Join</a>

                </li>
                <li >
                        <a href="{{ route('become-state-partner') }}" >Become State partner</a>
                    </li>
            </ul>
        </nav>
    </div>
</div>
