@extends('layouts.admin')
@section('title', 'Edit Franchisor')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.franchisors.index') }}">Franchisor</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Franchisor</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Franchisor</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" action="{{ route('admin.franchisors.update', $franchisor->id) }}" id="userForm"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.franchisors.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="userForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 col-12 mb-2">
                                <label for="firstname" class="form-label">First Name </label>
                                <input type="text" class="form-control"  name="firstname" value="{{ old('firstname', $franchisor->firstname) }}" placeholder="Enter First Name">
                                @error('firstname')
                                    <code id="firstname-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12 mb-2">
                                <label for="lastname" class="form-label">Last Name </label>
                                <input type="text" class="form-control"  lastname="lastname" value="{{ old('lastname', $franchisor->lastname) }}" placeholder="Enter Last Name">
                                @error('lastname')
                                    <code id="lastname-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12 mb-2">
                                <label for="name" class="form-label">Email</label>
                                <input type="text" class="form-control"  name="email" value="{{ old('email', $franchisor->email) }}" placeholder="Enter Email">
                                @error('email')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12 mb-2">
                                <label for="phone" class="form-label">Mobile</label>
                                <input type="number" class="form-control" name="phone" value="{{ old('phone', $franchisor->phone) }}" placeholder="Enter Mobile">
                                @error('phone')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12 mb-2">
                                <label for="password" class="form-label">Password(Leave blank if not required to update)</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                @error('password')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                            {{-- <div class="col-md-6 12 mb-2">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $franchisor->status) == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status', $franchisor->status) == 0 ) selected @endif value="0">Disable</option>
                                </select>
                                @error('status')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
