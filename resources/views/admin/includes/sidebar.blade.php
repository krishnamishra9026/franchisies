<div class="leftside-menu">
@php
use App\Models\WebsiteSetting;
$setting = WebsiteSetting::first();
$logo = $setting ? asset('storage/uploads/logo/'.$setting->logo) : asset('assets/images/frontend/winlogo-white.png');
@endphp
    <!-- LOGO -->
    <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ $logo }}" alt="Franchisee Bazaar" height="40">
        </span>
        <span class="logo-sm">
            <img src="{{ $logo }}" alt="Franchisee Bazaar" height="40">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ $logo }}" alt="Franchisee Bazaar" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ $logo }}" alt="Franchisee Bazaar" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                <i class="dripicons-meter"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.brands.index') }}" class="side-nav-link">
                    <i class="mdi mdi-account-tie"></i>
                    <span> Brands </span>
                </a>
            </li>

            


            <li class="side-nav-item">
                <a href="{{ route('admin.categories.index') }}" class="side-nav-link">
                    <i class="mdi mdi-collage"></i>
                    <span> Categories </span>
                </a>
            </li>           



            <li class="side-nav-item">
                <a href="{{ route('admin.enquiries.index') }}" class="side-nav-link">
                    <i class="mdi mdi-headset"></i>
                    <span> Enquiries </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.faqs.index') }}" class="side-nav-link">
                    <i class="mdi mdi-help-circle-outline"></i>
                    <span> FAQs </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.blogs.index') }}" class="side-nav-link">
                    <i class="mdi mdi-help-circle-outline"></i>
                    <span> Blogs </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.information-page-management.index') }}" class="side-nav-link">
                    <i class="mdi mdi-note-multiple-outline"></i>
                    <span> Information Pages </span>
                </a>
            </li>
            
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#ContentManagement" aria-expanded="false"
                    aria-controls="ContentManagement" class="side-nav-link">
                    <i class="mdi mdi-account-supervisor-outline"></i>
                    <span> Content Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="ContentManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.contact-setting.index') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </li>

  
            

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#userManagement" aria-expanded="false"
                    aria-controls="userManagement" class="side-nav-link">
                    <i class="mdi mdi-account-supervisor-outline"></i>
                    <span> User Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="userManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.roles.index') }}">Roles</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.user-management.index') }}">Users</a>
                        </li>
                    </ul>
                </div>
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
                            <a href="{{ route('admin.website-settings.index') }}">General</a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#file-management-tracking" aria-expanded="false" aria-controls="file-management-tracking" class="">
                                <span> Home Page </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse hide" id="file-management-tracking" style="">
                                <ul class="side-nav-third-level">

                                    <li>
                                        <a href="{{ route('admin.settings.basic') }}">Basic settings</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.settings.homebanner') }}">Home Banner</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.settings.works') }}">How it works</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.services-setting.index') }}">Popular Services</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.settings.banner1') }}">Banner 1</a>
                                    </li>


                                    <li>
                                        <a href="{{ route('admin.settings.get-best-for-less') }}">Get the best for less</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.reviews-setting.index') }}">Reviews</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.settings.banner2') }}">Banner 2</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.settings.seo-content') }}">Seo Content</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="{{ route('admin.my-account.edit', Auth::guard('administrator')->id()) }}">My Account</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.password.form') }}">Change Password</a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

</div>
