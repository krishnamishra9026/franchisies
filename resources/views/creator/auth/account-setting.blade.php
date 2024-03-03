@extends('layouts.creator')
@section('title', 'Welcome to Collab Marketplace Account Setting')
@php
$states = \DB::table('states')->get(['id', 'state']);
$countries = \DB::table('countries')->get(['country', 'id']);
@endphp
@section('content')
<div class="CreateCampaign CreatorInfo">
    <div class="container">
        <h1>Creator Information</h1>
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="Campaignadd BoxShadow formstyle">

                        <div id="basicwizard">

                            <ul class="nav nav-pills nav-justified form-wizard-header">
                                <li class="nav-item">
                                    <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab"  class="nav-link @if(request()->get('tab') == 1 || empty(request()->get('tab')) ) active @else @if(profileCompletedCreator() == 'not completed') disabled @endif  @endif rounded-0 pt-2 pb-2">
                                        <span class="d-inline">Account Information</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 2 ) active @else @if(profileCompletedCreator() == 'not completed') disabled @endif  @endif rounded-0 pt-2 pb-2">
                                        <span class="d-inline">Contact Information</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#basictab3" data-bs-toggle="tab" data-toggle="tab" class="nav-link @if(request()->get('tab') == 3 ) active @else @if(profileCompletedCreator() == 'not completed') disabled @endif  @endif rounded-0 pt-2 pb-2">
                                        <span class="d-inline">Linked Account</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#basictab4" data-bs-toggle="tab" data-toggle="tab" class="nav-link @if(request()->get('tab') == 4 ) active @else @if(profileCompletedCreator() == 'not completed') disabled @endif  @endif rounded-0 pt-2 pb-2">
                                        <span class="d-inline">Profile Upgrade</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane @if(request()->get('tab') == 1 || empty(request()->get('tab'))) active @endif" id="basictab1">
                                    <form method="POST" id="creatorsEditForm" action="{{ route('creator.profile-save', auth()->user()->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="tab" value="1">
                                        <div class="row">
                                            <h4>Tell us about yourself</h4>
                                                <div class="col-md-6 col-12 mb-2">
                                                <label for="label" class="form-label">First Name<span>*</span> <span class="ovisible">(Only visible to you)</span></label>
                                                <input type="text" class="form-control" required name="firstname" value="{{ auth()->user()->firstname }}" placeholder="Enter your first name">
                                                </div>
                                                <div class="col-md-6 col-12 mb-2">
                                                    <label for="label" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" required name="lastname" value="{{ auth()->user()->lastname }}" placeholder="Enter your last name">
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <label for="label" class="form-label">Username<span>*</span> <span class="ovisible">(Public)</span></label>
                                                    <input type="text" class="form-control" required name="username" value="{{ auth()->user()->username }}" placeholder="Enter your username">
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <label for="label" class="form-label">Bio<span>*</span> <span class="ovisible">(Public)</span></label>
                                                    <textarea class="form-control" name="bio" required  placeholder="Enter your bio">{{ auth()->user()->bio }}</textarea>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <label for="label" class="form-label">Profile Picture<span>*</span></label>
                                                    <div class="form-group">
                                                        <div class="upload">
                                                            <div class="uploadimg">
                                                                <input type="file" onchange="loadPreview(this);" name="avatar" @if(!isset(auth()->user()->avatar)) required @endif />
                                                                @if(isset(auth()->user()->avatar))
                                                                <img id="preview_img" src="{{ asset('storage/uploads/creators/'.auth()->user()->avatar) }}" height="45" />
                                                                @else
                                                                <img id="preview_img" src="{{ asset('assets/images/frontend/icons/user-filled.png') }}" />
                                                                @endif
                                                            </div>
                                                            <div class="upbtn">
                                                                <img src="{{ asset('assets/images/frontend/icons/camera.png') }}" />
                                                            </div>
                                                            <p>Upload profile picture</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <label for="label" class="form-label">Gender<span>*</span></label>
                                                    <div class="radio-inline">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender" value="Male" id="male" @if(auth()->user()->gender == 'Male') checked @else checked @endif>
                                                            <label class="form-check-label" for="male">
                                                              Male
                                                            </label>
                                                          </div>
                                                          <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender" value="Female" id="female" @if(auth()->user()->gender == 'Female') checked @endif>
                                                            <label class="form-check-label" for="female">
                                                              Female
                                                            </label>
                                                          </div>
                                                          <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender" value="Other" id="prefer" @if(auth()->user()->gender == 'Other') checked @endif>
                                                            <label class="form-check-label" for="prefer">
                                                                I prefer not to say
                                                            </label>
                                                          </div>
                                                    </div>
                                                </div>

                                                <ul class="list-inline wizard mt-4 mb-0">
                                                    <li class="next list-inline-item float-end">
                                                        <input type='submit' class='btn btn-primary button-next' name='next' value='Continue' />
                                                    </li>
                                                </ul>

                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane @if(request()->get('tab') == 2) active @endif" id="basictab2">

                                    <form method="POST" id="creatorsEditForm" action="{{ route('creator.profile-save', auth()->user()->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="tab" value=2>
                                        <div class="row g-2 mt-0">

                                                <h4 class="mb-0 mt-0">Mailing address<span class="userrequired">*</span></h4>
                                                <div class="col-md-4 col-12">
                                                    <input type="text" class="form-control" name="city" value="{{ auth()->user()->city }}" placeholder="Enter your city" required>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                  <select class="form-control" id="country" required name="country">
                                                    <option value="">Please select Country</option>
                                                    @foreach($countries as $country)
                                                    <option data-country-id="{{ $country->id }}" value="{{ $country->country }}"  @if(old('country', auth()->user()->country) == $country->country) selected @endif>{{ $country->country }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                  <select class="form-control" id="state" required name="state">
                                                    <option value="">Please select Province</option>
                                                    @foreach($states as $state)
                                                    <option value="{{ $state->state }}"  @if(old('state', auth()->user()->state) == $state->state) selected @endif>{{ $state->state }}</option>
                                                    @endforeach

                                                </select>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <input type="text" required class="form-control" name="phone" value="{{ old('phone',auth()->user()->phone) }}"  placeholder="Enter your contact number">
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <input type="text" class="form-control" name="alt_phone_number" value="{{ old('alt_phone_number', auth()->user()->alt_phone_number) }}" placeholder="Enter your other number (Optional)">
                                                </div>
                                        </div>
                                        <ul class="list-inline wizard mt-4 mb-0">
                                            <li class="previous list-inline-item">
                                                <a href="{{ route('creator.account-setting', ['tab' => 1]) }}" class='btn btn-default button-previous'>Back</a>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <input type='submit' class='btn btn-primary button-next' name='next' value='Continue' />
                                            </li>
                                        </ul>
                                    </form>
                                </div>

                                <div class="tab-pane @if(request()->get('tab') == 3) active @endif" id="basictab3">
                                    <form method="POST" id="creatorsEditForm" action="{{ route('creator.profile-save', auth()->user()->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="tab" value="3">
                                        <div class="row">
                                                <div class="text-center account-dec">
                                                    <p>Taking the time to verify and link your accounts can upgrade your credibility and having more clients and project</p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="Yoursocial">
                                                        <h4>Your social presence</h4>
                                                        <div class="social-presence">
                                                            <div class="social-logo">
                                                                <img src="{{ asset('assets/images/frontend/youtube.png') }}" alt="YouTube" />
                                                            </div>
                                                            <div class="social-connect">
                                                                @if($user->youtube_connected)
                                                                <button type="button" class="btn btn-success" style="padding: 4px 12px">Verified</button>
                                                                <button type="button" class="btn btn-link" id="connect-youtube">Manage</button>
                                                                @else
                                                                <button type="button" class="btn btn-link" id="connect-youtube">Connect</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="social-presence">
                                                            <div class="social-logo">
                                                                <img src="{{ asset('assets/images/frontend/instagram.png') }}" alt="Instagram" />
                                                            </div>
                                                            <div class="social-connect">
                                                                @if($user->instagram_connected)
                                                                <button type="button" class="btn btn-success" style="padding: 4px 12px">Verified</button>
                                                                <button type="button" class="btn btn-link" id="connect-instagarm">Manage</button>
                                                                @else
                                                                <button type="button" class="btn btn-link" id="connect-instagarm">Connect</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="social-presence">
                                                            <div class="social-logo">
                                                                <img src="{{ asset('assets/images/frontend/tiktok.png') }}" alt="TikTok" />
                                                            </div>
                                                            <div class="social-connect">
                                                                <div class="btn-inline">
                                                                    @if($user->tiktok_connected)
                                                                    <button type="button" class="btn btn-success" style="padding: 4px 12px">Verified</button>
                                                                    <button type="button" class="btn btn-link" id="connect-tiktok">Manage</button>
                                                                    @else
                                                                    <button type="button" class="btn btn-link" id="connect-tiktok">Connect</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div> <!-- end row -->
                                        <ul class="list-inline wizard mt-4 mb-0">
                                            <li class="previous list-inline-item">
                                                <a href="{{ route('creator.account-setting', ['tab' => 2]) }}" class='btn btn-default button-previous'>Back</a>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </li>
                                        </ul>
                                    </form>
                                </div>

                                <div class="tab-pane @if(request()->get('tab') == 4) active @endif" id="basictab4">
                                    <form method="POST" id="creatorsEditForm" action="{{ route('creator.upgarde-save') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="tab" value="4">

                                        <div class="row">
                                            <h4>Choose upgrades for your profile (optional)</h4>
                                            <!-- LOOP STARTS -->
                                            @if($badges && count($badges))
                                            @foreach($badges as $badge)
                                            <div class="upgrade-box">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="featured-checkbox">
                                                            <input type="hidden" value="0" name="badges[checked][{{$badge->id}}]" />
                                                            @if(in_array($badge->id, $badge_ids??[])) <input type="hidden" value="2" @if(in_array($badge->id, $badge_ids??[])) checked @endif name="badges[checked][{{$badge->id}}]" /> @endif

                                                            @if(!in_array($badge->id, $badge_ids??[])) <input type="checkbox" value="1" @if(in_array($badge->id, $badge_ids??[])) checked @endif name="badges[checked][{{$badge->id}}]" /> @endif <span style="background-color:{{ $badge->color ?? "#f07238" }}">{{ $badge->name }}</span> @if(in_array($badge->id, $badge_ids??[])) <h6 class="text-success">Badge Taken</h6>@endif
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="col-sm-1">
                                                    @if(isset($badge->icon))
                                                        <p><img style="max-width: 70px;" src="{{ asset('storage/uploads/badges/original/original_'.$badge->icon)  }}"> </p>
                                                    @endif
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p>{{ $badge->description }}</p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="hidden" name="badges[name][{{$badge->id}}]" value="{{ $badge->name }}">
                                                        <input type="hidden" name="badges[price][{{$badge->id}}]" value="{{ $badge->price }}">
                                                        <h3>${{ $badge->price }} USD</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="upgrade-box">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="featured-checkbox">
                                                            <input type="checkbox" /> <span style="background-color:#f07238">Open to Collabs</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <p>One of our representative will check your profile and featured on our home page to boost your collab. Take out the guess work and save the time with our paid services.</p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <h3>$20 USD</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                        </div>

                                        <ul class="list-inline wizard mt-4 mb-0">
                                            <li class="previous list-inline-item">
                                                <a href="{{ route('creator.account-setting', ['tab' => 3]) }}" class='btn btn-default button-previous'>Back</a>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <button type="submit" class="btn btn-primary" @if(allBadgesPerchagedCreator()) disabled @endif>Proceed to buy</button>
                                                <a href="{{ route('creator.dashboard') }}" class="btn btn-default">Skip</a>
                                            </li>
                                        </ul>
                                    </form>
                                </div>

                            </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- bundle -->
{{--  <script src="{{ asset('assets/js/vendor.min.js') }}"></script>  --}}
{{--  <script src="{{ asset('assets/js/app.min.js') }}"></script>  --}}

<!-- demo app -->
{{-- <script src="{{ asset('assets/js/pages/demo.form-wizard.js') }}"></script> --}}
<!-- end demo js-->


<script type="text/javascript">

    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(id)
                .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#country').on('change', function () {
        var idCountry = $(this).find(':selected').data('country-id');
        $("#state").html('');
        $.ajax({
            url: "{{route('fetch-states')}}",
            type: "POST",
            data: {
                country_id: idCountry,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (result) {
                $('#state').html('<option value="">Select State</option>');
                $.each(result.states, function (key, value) {
                    $("#state").append('<option value="' + value
                        .state + '">' + value.state + '</option>');
                });
            }
        });
    });
</script>

<script src="https://cdn.getphyllo.com/connect/v2/phyllo-connect.js"></script>

    <script>
        const config = {
            clientDisplayName: "WinWinPromo(N2R Technologies)",
            environment: "{{ env('INSIGHTIQ_ENVIRONMENT') }}",
            userId: "{{ auth()->user()->phyllo_user_id }}",
            token: "{{ auth()->user()->phyllo_token }}",
            workPlatformId: "9bb8913b-ddd9-430b-a66a-d74d846e6c66",

        };

        const phylloConnect = PhylloConnect.initialize(config);

        phylloConnect.on("accountConnected", (accountId, workplatformId, userId) => {
            console.log(`onAccountConnected: ${accountId}, ${workplatformId}, ${userId}`);
            setTimeout(() => {
                location = "{{ route('creator.account-setting', ['tab' => 3]) }}";
            }, 800);
        })
        phylloConnect.on("accountDisconnected", (accountId, workplatformId, userId) => {
            console.log(`onAccountDisconnected: ${accountId}, ${workplatformId}, ${userId}`);
        })
        phylloConnect.on("tokenExpired", (userId) => {
            console.log(`onTokenExpired: ${userId}`);
        })
        phylloConnect.on("exit", (reason, userId) => {
            console.log(`onExit: ${reason}, ${userId}`);
        })
        phylloConnect.on("connectionFailure", (reason, workplatformId, userId) => {
            console.log(`onConnectionFailure: ${reason}, ${workplatformId}, ${userId}`);
        })


        $("#connect-instagarm").on('click', function (e) {
            e.preventDefault();
            phylloConnect.open();
        });
    </script>



    <script>
        const configYoutube = {
            clientDisplayName: "WinWinPromo(N2R Technologies)",
            environment: "{{ env('INSIGHTIQ_ENVIRONMENT') }}",
            userId: "{{ auth()->user()->phyllo_user_id }}",
            token: "{{ auth()->user()->phyllo_token }}",
            workPlatformId: "14d9ddf5-51c6-415e-bde6-f8ed36ad7054",

        };

        const phylloConnectYoutube = PhylloConnect.initialize(configYoutube);

        phylloConnectYoutube.on("accountConnected", (accountId, workplatformId, userId) => {
            console.log(`onAccountConnected: ${accountId}, ${workplatformId}, ${userId}`);
            setTimeout(() => {
                location = "{{ route('creator.account-setting', ['tab' => 3]) }}";
            }, 800);
        })
        phylloConnectYoutube.on("accountDisconnected", (accountId, workplatformId, userId) => {
            console.log(`onAccountDisconnected: ${accountId}, ${workplatformId}, ${userId}`);
        })
        phylloConnectYoutube.on("tokenExpired", (userId) => {
            console.log(`onTokenExpired: ${userId}`);
        })
        phylloConnectYoutube.on("exit", (reason, userId) => {
            console.log(`onExit: ${reason}, ${userId}`);
        })
        phylloConnectYoutube.on("connectionFailure", (reason, workplatformId, userId) => {
            console.log(`onConnectionFailure: ${reason}, ${workplatformId}, ${userId}`);
        })


        $("#connect-youtube").on('click', function (e) {
            e.preventDefault();
            phylloConnectYoutube.open();
        });
    </script>



    <script>
        const configTictok = {
            clientDisplayName: "WinWinPromo(N2R Technologies)",
            environment: "{{ env('INSIGHTIQ_ENVIRONMENT') }}",
            userId: "{{ auth()->user()->phyllo_user_id }}",
            token: "{{ auth()->user()->phyllo_token }}",
            workPlatformId: "de55aeec-0dc8-4119-bf90-16b3d1f0c987",

        };

        const phylloConnectTictok = PhylloConnect.initialize(configTictok);

        phylloConnectTictok.on("accountConnected", (accountId, workplatformId, userId) => {
            console.log(`onAccountConnected: ${accountId}, ${workplatformId}, ${userId}`);
            setTimeout(() => {
                location = "{{ route('creator.account-setting', ['tab' => 3]) }}";
            }, 800);
        })
        phylloConnectTictok.on("accountDisconnected", (accountId, workplatformId, userId) => {
            console.log(`onAccountDisconnected: ${accountId}, ${workplatformId}, ${userId}`);
        })
        phylloConnectTictok.on("tokenExpired", (userId) => {
            console.log(`onTokenExpired: ${userId}`);
        })
        phylloConnectTictok.on("exit", (reason, userId) => {
            console.log(`onExit: ${reason}, ${userId}`);
        })
        phylloConnectTictok.on("connectionFailure", (reason, workplatformId, userId) => {
            console.log(`onConnectionFailure: ${reason}, ${workplatformId}, ${userId}`);
        })


        $("#connect-tictok").on('click', function (e) {
            e.preventDefault();
            phylloConnectTictok.open();
        });


    </script>
@endpush
