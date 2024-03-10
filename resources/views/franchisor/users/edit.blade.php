@extends('layouts.franchisor')
@section('title', 'Edit User')
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
                            <li class="breadcrumb-item"><a href="{{ route('franchisor.user-management.index') }}">User</a>
                            </li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit User</h4>
                </div>
            </div>
        </div>
        @include('franchisor.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" action="{{ route('franchisor.user-management.update', $user->id) }}" id="userForm"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('franchisor.user-management.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="userForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 col-12 mb-2">
                                <label for="name" class="form-label">Name </label>
                                <input type="text" class="form-control"  name="name" value="{{ old('name', $user->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12 mb-2">
                                <label for="name" class="form-label">Email</label>
                                <input type="text" class="form-control"  name="email" value="{{ old('email', $user->email) }}" placeholder="Enter Email">
                                @error('email')
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

                            <div class="col-md-6 12 mb-2">
                                <label for="name" class="form-label">Group</label>
                                <select class="form-control" name="roles[]" id="example-select">
                                    <option value="">Select Group</option>
                                    @foreach($roles as $role)
                                    <option @if(in_array($role, $userRole)) selected @endif value="{{ $role }}">{{$role}} </option>
                                    @endforeach
                                </select>
                                @error('group')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            {{-- <div class="col-md-6 12 mb-2">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $user->status) == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status', $user->status) == 0 ) selected @endif value="0">Disable</option>
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
