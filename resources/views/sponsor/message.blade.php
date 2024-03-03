@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Messages')

@section('content')
<div class="messages">
    <div class="container">
        <h1>Messages</h1>
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="chat-app BoxShadow">
                    <div class="row">
                        <!-- start chat users-->
                        <div class="col-sm-4 col-12 paddingright">
                            <div class="card">
                                <div class="card-body">
                                    <!-- start search box -->
                                    <div class="app-search">
                                        <form>
                                            <div class="mb-2 position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Search people" />
                                                <span class="mdi mdi-magnify search-icon"></span>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end search box -->

                                    <!-- users -->
                                    <div class="row">
                                        <div class="col">
                                            <div data-simplebar style="max-height: 550px">
                                                <a href="javascript:void(0);" class="text-body">
                                                    <div class="d-flex chatuserlist align-items-start bg-active mt-1 p-2">
                                                        <div class="proimg">
                                                            <img src="assets/images/users/avatar-2.jpg" class="me-2 rounded-circle" height="48" alt="Brandon Smith" />
                                                            <span class="online"></span>
                                                        </div>
                                                        <div class="w-100 overflow-hidden">
                                                            <h5 class="mt-1 mb-0 font-13">
                                                                <span class="float-end font-11 usertime">08:05</span>
                                                                Promote your content
                                                            </h5>
                                                            <p class="mb-0 text-muted font-11">
                                                                <span class="w-75 userid">@joney123</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="javascript:void(0);" class="text-body">
                                                    <div class="d-flex chatuserlist align-items-start p-2">
                                                        <div class="proimg">
                                                            <img src="assets/images/users/avatar-3.jpg" class="me-2 rounded-circle" height="48" alt="Shreyu N" />
                                                            <span class="offline"></span>
                                                        </div>
                                                        <div class="w-100 overflow-hidden">
                                                            <h5 class="mt-1 mb-0 font-13">
                                                                <span class="float-end font-11 usertime">05:30</span>
                                                                Promote your content
                                                            </h5>
                                                            <p class="mt-0 mb-0 text-muted font-11">
                                                                <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">2</span></span>
                                                                <span class="w-75 userid">@joney123</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="javascript:void(0);" class="text-body">
                                                    <div class="d-flex chatuserlist align-items-start mt-1 p-2">
                                                        <div class="proimg">
                                                            <img src="assets/images/users/avatar-7.jpg" class="me-2 rounded-circle" height="48" alt="Maria C" />
                                                            <span class="offline"></span>
                                                        </div>
                                                        <div class="w-100 overflow-hidden">
                                                            <h5 class="mt-1 mb-0 font-13">
                                                                <span class="float-end font-11 usertime">08:30</span>
                                                                Promote your content
                                                            </h5>
                                                            <p class="mt-0 mb-0 font-11">
                                                                <span class="w-75 userid">@joney123</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="javascript:void(0);" class="text-body">
                                                    <div class="d-flex chatuserlist align-items-start mt-1 p-2">
                                                        <div class="proimg">
                                                            <img src="assets/images/users/avatar-10.jpg" class="me-2 rounded-circle" height="48" alt="Maria C" />
                                                            <span class="offline"></span>
                                                        </div>
                                                        <div class="w-100 overflow-hidden">
                                                            <h5 class="mt-1 mb-0 font-13">
                                                                <span class="float-end font-11 usertime">08:30</span>
                                                                Promote your content
                                                            </h5>
                                                            <p class="mt-0 mb-0 font-11">
                                                                <span class="w-75 userid">@joney123</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="javascript:void(0);" class="text-body">
                                                    <div class="d-flex chatuserlist align-items-start mt-1 p-2">
                                                        <div class="proimg">
                                                            <img src="assets/images/users/avatar-3.jpg" class="me-2 rounded-circle" height="48" alt="Maria C" />
                                                            <span class="notactive"></span>
                                                        </div>
                                                        <div class="w-100 overflow-hidden">
                                                            <h5 class="mt-1 mb-0 font-13">
                                                                <span class="float-end font-11 usertime">08:30</span>
                                                                Promote your content
                                                            </h5>
                                                            <p class="mt-0 mb-0 font-11">
                                                                <span class="w-75 userid">@joney123</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="javascript:void(0);" class="text-body">
                                                    <div class="d-flex chatuserlist align-items-start mt-1 p-2">
                                                        <div class="proimg">
                                                            <img src="assets/images/users/avatar-6.jpg" class="me-2 rounded-circle" height="48" alt="Maria C" />
                                                            <span class="notactive"></span>
                                                        </div>
                                                        <div class="w-100 overflow-hidden">
                                                            <h5 class="mt-1 mb-0 font-13">
                                                                <span class="float-end font-11 usertime">08:30</span>
                                                                Promote your content
                                                            </h5>
                                                            <p class="mt-0 mb-0 font-11">
                                                                <span class="w-75 userid">@joney123</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="javascript:void(0);" class="text-body">
                                                    <div class="d-flex chatuserlist align-items-start mt-1 p-2">
                                                        <div class="proimg">
                                                            <img src="assets/images/users/avatar-8.jpg" class="me-2 rounded-circle" height="48" alt="Maria C" />
                                                            <span class="notactive"></span>
                                                        </div>
                                                        <div class="w-100 overflow-hidden">
                                                            <h5 class="mt-1 mb-0 font-13">
                                                                <span class="float-end font-11 usertime">08:30</span>
                                                                Promote your content
                                                            </h5>
                                                            <p class="mt-0 mb-0 font-11">
                                                                <span class="w-75 userid">@joney123</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="javascript:void(0);" class="text-body">
                                                    <div class="d-flex chatuserlist align-items-start mt-1 p-2">
                                                        <div class="proimg">
                                                            <img src="assets/images/users/avatar-1.jpg" class="me-2 rounded-circle" height="48" alt="Maria C" />
                                                            <span class="notactive"></span>
                                                        </div>
                                                        <div class="w-100 overflow-hidden">
                                                            <h5 class="mt-1 mb-0 font-13">
                                                                <span class="float-end font-11 usertime">08:30</span>
                                                                Promote your content
                                                            </h5>
                                                            <p class="mt-0 mb-0 font-11">
                                                                <span class="w-75 userid">@joney123</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                            </div> <!-- end slimscroll-->
                                        </div> <!-- End col -->
                                    </div>
                                    <!-- end users -->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                        <!-- end chat users-->

                        <!-- chat area -->
                        <div class="col-sm-6 col-12 borderleftright paddingleft paddingright">
                            <div class="conversation">
                                <div class="chatuser">
                                    <h5>Alex Andreidu</h5>
                                    <p>@joney123</p>
                                </div>
                                <ul class="conversation-list" data-simplebar style="max-height: 537px">
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt="Shreyu N" />
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                {{-- <i>Shreyu N</i> --}}
                                                <p>
                                                    Hi George! Nice to hear you again!
                                                </p>
                                            </div>
                                            <div class="ctext-wrap">
                                                <p>
                                                    I'm fine, thank you! And what about you? Is everything ok?
                                                </p>
                                            </div>
                                            <p class="messtime font-12">09:42</p>
                                        </div>



                                    </li>
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            <img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt="dominic" />
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <p>
                                                    Hi, How are you? What about our next meeting?
                                                </p>
                                            </div>
                                            <p class="messtime font-12">10:01</p>
                                        </div>

                                    </li>
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <img src="assets/images/users/avatar-7.jpg" class="rounded-circle" alt="Shreyu N" />

                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <p>
                                                    Yeah everything is fine
                                                </p>
                                            </div>
                                            <p class="messtime font-12">10:01</p>
                                        </div>

                                    </li>
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle" alt="dominic" />
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <p>
                                                    Wow that's great
                                                </p>
                                            </div>
                                            <p class="messtime font-12">10:01</p>
                                        </div>

                                    </li>
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <img src="assets/images/users/avatar-6.jpg" alt="Shreyu N" class="rounded-circle" />

                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">

                                                <p>
                                                    Let's have it today if you are free
                                                </p>
                                            </div>
                                            <p class="messtime font-12">10:05</p>
                                        </div>

                                    </li>
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            <img src="assets/images/users/avatar-8.jpg" alt="dominic" class="rounded-circle" />
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <p>
                                                    Sure thing! let me know if 2pm works for you
                                                </p>
                                            </div>
                                            <p class="messtime font-12">10:03</p>
                                        </div>

                                    </li>
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <img src="assets/images/users/avatar-2.jpg" alt="Shreyu N" class="rounded-circle" />
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <p>
                                                    Sorry, I have another meeting scheduled at 2pm. Can we have it
                                                    at 3pm instead?
                                                </p>
                                            </div>
                                            <p class="messtime font-12">10:02</p>
                                        </div>

                                    </li>
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <img src="assets/images/users/avatar-2.jpg" alt="Shreyu N" class="rounded-circle" />
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <p>
                                                    We can also discuss about the presentation talk format if you have some extra mins
                                                </p>
                                            </div>
                                            <p class="messtime font-12">10:04</p>
                                        </div>

                                    </li>
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            <img src="assets/images/users/avatar-1.jpg" alt="dominic" class="rounded-circle" />
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <p>
                                                    3pm it is. Sure, let's discuss about presentation format, it would be great to finalize today.
                                                    I am attaching the last year format and assets here...
                                                </p>
                                            </div>
                                            <p class="messtime font-12">10:04</p>

                                        </div>

                                    </li>
                                </ul>

                                <div class="row">
                                    <div class="col">
                                        <div class="mt-2 p-2">
                                            <form class="needs-validation chatform" novalidate="" name="chat-form"
                                                id="chat-form">
                                                <div class="row">
                                                    <div class="col mb-2 mb-sm-0">
                                                        <input type="text" class="form-control border-0" placeholder="Enter your message here" required="">
                                                        <div class="invalid-feedback">
                                                            Please enter your messsage
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-auto">
                                                        <div class="btn-group chatbtn">
                                                            <a href="#" class="btn btn-light"> <i class='uil uil-smile'></i> </a>
                                                            <a href="#" class="btn btn-light"><i class="uil uil-paperclip"></i></a>
                                                            <div class="d-grid">
                                                                <button type="submit" class="btn btn-primary chat-send"><i class='uil uil-message'></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end chat area-->

                        <!-- start user detail -->
                        <div class="col-sm-2 col-12 paddingleft">
                            <div class="collabD">
                                <h5>Collab Details</h5>
                                <div class="FProfile">
                                        <div class="image">
                                            <img src="{{ asset('assets/images/frontend/Profile2.jpg') }}" class="img-fluid" alt="Featured Profile">
                                        </div>
                                        <div class="caption">
                                            <p>Promote your content</p>
                                            <div class="followers">
                                                <ul class="list-inline">
                                                    <li><a href="https://www.instagram.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/instagram.svg') }}" alt="instagram" /> 365K</span></a></li>
                                                    <li><a href="https://youtube.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/youtube-icon.svg') }}" alt="instagram" /> 9.8M</span></a></li>
                                                    <li><a href="https://www.tiktok.com/login" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/tiktok-icon.svg') }}" alt="instagram" /> 3.2M</span></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="category">
                                            <p><b>Category:</b> Film and Animation</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush
