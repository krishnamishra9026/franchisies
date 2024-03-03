@extends('layouts.admin')
@section('title', 'Edit Sponsor')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.sponsors.index') }}">Sponsors</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Sponsor</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Sponsor</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" id="sponsorsEditForm" action="{{ route('admin.sponsors.update', $sponsor->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-end">
                                <a href="{{ route('admin.sponsors.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-primary" form="sponsorsEditForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">First Name </label>
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name',$sponsor->first_name) }}" placeholder="Enter Sponsor First Name">
                                @error('first_name')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="last_name" class="form-label">Last Name </label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name',$sponsor->last_name) }}" placeholder="Enter Sponsor Last Name">
                                @error('last_name')
                                    <code id="last_name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="username" class="form-label">Username </label>
                                <input type="text" class="form-control" name="username" value="{{ old('username',$sponsor->username) }}" placeholder="Enter Sponsor User Name">
                                @error('username')
                                    <code id="username-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="avatar">Profile Picture</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="avatar" name="avatar"
                                    onchange="loadPreview(this);">
                                </div>
                                @error('avatar')
                                <code id="avatar-error" class="text-danger">{{ $message }}</code>
                                @enderror

                                @if($sponsor->avatar)
                                <img id="preview_img" src="{{ asset('storage/uploads/sponsors/'.$sponsor->avatar)  }}" class="mt-2" width="100"
                                height="100" />
                                @else
                                <img id="preview_img" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                                @endif
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" class="form-control" name="email" value="{{ old('email',$sponsor->email) }}" placeholder="Enter Sponsor Email">
                                @error('email')
                                    <code id="email-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="password" class="form-label">Password </label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter Sponsor password">
                                @error('password')
                                    <code id="password-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="city" class="form-label">City </label>
                                <input type="text" class="form-control" name="city" value="{{ old('city',$sponsor->city) }}" placeholder="Enter City">
                                @error('city')
                                    <code id="city-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-2">
                                <label for="country" class="form-label">Country </label>
                                <select class="form-control" name="country">
                                    <option value="">Please select Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->country }}"  @if(old('country', $sponsor->country) == $country->country) selected @endif>{{ $country->country }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                <code id="country-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="creator" class="form-label">Favourites </label>
                                <select class="form-control creator" multiple="multiple" name="creators[]" id="creator" >
                                    <option value="">Please select Favourites</option>
                                    @foreach($creators as $creator)
                                    <option value="{{ $creator->id }}"  @if (in_array($creator->id, old('creators', $selected_creators))) selected @endif>{{ $creator->firstname }} {{ $creator->lastname }}</option>
                                    @endforeach
                                </select>
                                @error('creator')
                                <code id="creator-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="state" class="form-label">Province </label>
                                <select class="form-control" name="state">
                                    <option value="">Please select Province</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->state }}"  @if(old('state', $sponsor->state) == $state->state) selected @endif>{{ $state->state }}</option>
                                    @endforeach
                                </select>
                                @error('state')
                                <code id="state-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="phone_number" class="form-label">Phone Number </label>
                                <input type="number" class="form-control" name="phone_number" value="{{ old('phone_number',$sponsor->phone_number) }}" placeholder="Enter Mobile Number">
                                @error('phone_number')
                                    <code id="phone_number-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="alt_phone_number" class="form-label">Alternate Phone Number</label>
                                <input type="number" class="form-control" name="alt_phone_number" value="{{ old('alt_phone_number',$sponsor->alt_phone_number) }}" placeholder="Enter Alternate Phone Number">
                                @error('alt_phone_number')
                                    <code id="alt_phone_number-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $sponsor->status) == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status', $sponsor->status) == 0 ) selected @endif value="0">Disable</option>
                                </select>
                                @error('status')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

        $(document).ready(function() {
            $('.creator').select2({
                placeholder: "Please select Favourites",
                allowClear: true
            });

        });
        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id)
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
