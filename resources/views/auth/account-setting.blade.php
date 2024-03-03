@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Account Settings')
@php
$states = \DB::table('states')->get(['id', 'state']);
$countries = \DB::table('countries')->get(['country', 'id']);
@endphp
@section('content')
<div class="CreateCampaign SponsorInfo">
    <div class="container">
        <h1>Sponsor Information</h1>
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="Campaignadd BoxShadow formstyle">


                    <div id="basicwizard">

                            <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                                <li class="nav-item">
                                    <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab"  class="nav-link @if(request()->get('tab') == 1 || empty(request()->get('tab')) ) active @else   @endif rounded-0 pt-2 pb-2">
                                        <span class="d-inline">Account Information</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link  @if(request()->get('tab') == 2 ) active @else   @endif rounded-0 pt-2 pb-2">
                                        <span class="d-inline">Profile Upgrade</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane @if(request()->get('tab') == 1 || empty(request()->get('tab'))) active @endif" id="basictab1">

                                    <h4>Tell us about yourself</h4>
                                    <form method="POST" id="creatorsEditForm" action="{{ route('profile-save', auth()->user()->id) }}" enctype="multipart/form-data" class="row g-2">
                                        @csrf
                                        <div class="col-md-6 col-12">
                                            <label for="label" class="form-label">First Name<span>*</span> <span class="ovisible">(Only visible to you)</span></label>
                                            <input type="text" class="form-control" required name="first_name" value="{{ auth()->user()->first_name }}" placeholder="Enter your first name">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="label" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" required name="last_name" value="{{ auth()->user()->last_name }}" placeholder="Enter your last name">
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <label for="label" class="form-label">Username<span>*</span> <span class="ovisible">(Public)</span></label>
                                            <input type="text" class="form-control" required name="username" value="{{ auth()->user()->username }}" placeholder="Enter your username">
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <label for="label" class="form-label">Profile Picture<span>*</span></label>
                                            <div class="form-group">
                                                <div class="upload">
                                                    <div class="uploadimg">
                                                        <input type="file" onchange="loadPreview(this);" name="avatar" @if(!isset(auth()->user()->avatar)) required @endif />
                                                        @if(isset(auth()->user()->avatar))
                                                        <img id="preview_img" src="{{ asset('storage/uploads/sponsors/'.auth()->user()->avatar) }}" />
                                                        @else
                                                        <img id="preview_img" src="{{ asset('assets/images/thumbnails/user-profile-placeholder.png') }}" />
                                                        @endif
                                                    </div>
                                                    <div class="upbtn">
                                                        <img src="{{ asset('assets/images/frontend/icons/camera.png') }}" />
                                                    </div>
                                                    <p>Upload profile picture</p>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="mb-0 mt-3">Mailing address<span class="userrequired">*</span></h4>
                                        <div class="col-md-4 col-12">
                                            <input type="text" name="city" required value="{{ auth()->user()->city }}" class="form-control" placeholder="Enter your city">
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
                                            <input type="number" class="form-control" required name="phone_number" value="{{ old('phone_number',auth()->user()->phone_number) }}" placeholder="Enter your contact number">
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <input type="number" name="alt_phone_number" value="{{ old('alt_phone_number', auth()->user()->alt_phone_number) }}" class="form-control" placeholder="Enter your other number">
                                        </div>



                                        <div class="col-12 text-center mt-4">
                                            <button type="submit" class="btn btn-primary">Save & Continue</button>
                                        </div>

                                    </form>
                                </div>

                                <div class="tab-pane @if(request()->get('tab') == 2) active @endif" id="basictab2">
                                    <form method="POST" id="creatorsEditForm" action="{{ route('upgarde-save') }}" enctype="multipart/form-data">
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

                                                            @if(!in_array($badge->id, $badge_ids??[])) <input type="checkbox" value="1" @if(in_array($badge->id, $badge_ids??[])) checked @endif name="badges[checked][{{$badge->id}}]" /> @endif <span style="background-color:{{ $badge->color ?? "#f07238" }}">{{ $badge->name }}</span>@if(in_array($badge->id, $badge_ids??[])) <h6>Activated</h6>@endif

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
                                                <a href="{{ route('account-setting', ['tab' => 1]) }}" class='btn btn-default button-previous'>Back</a>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <button type="submit" class="btn btn-primary" @if(allBadgesPerchagedSponsor()) disabled @endif>Proceed to buy</button>
                                                <a href="{{ route('home') }}" class="btn btn-default">Skip</a>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
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
@endpush
