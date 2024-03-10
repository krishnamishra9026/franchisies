<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('franchisor.dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="40">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="40">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('franchisor.dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-item">
                <a href="{{ route('franchisor.dashboard') }}" class="side-nav-link">
                <i class="dripicons-meter"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('franchisor.brands.index') }}" class="side-nav-link">
                    <i class="mdi mdi-account-tie"></i>
                    <span> Brands </span>
                </a>
            </li>




            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSettings" aria-expanded="false"
                    aria-controls="sidebarSettings" class="side-nav-link">
                    <i class="uil-cog"></i>
                    <span> Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSettings">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('franchisor.my-account.edit', Auth::guard('franchisor')->id()) }}">My Account</a>
                        </li>

                        <li>
                            <a href="{{ route('franchisor.password.form') }}">Change Password</a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

</div>
