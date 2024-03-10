@extends('layouts.franchisor')
@section('title', 'Add Group')
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
                            <li class="breadcrumb-item"><a href="{{ route('franchisor.roles.index') }}">Groups</a>
                            </li>
                            <li class="breadcrumb-item active">Add Group</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Group</h4>
                </div>
            </div>
        </div>
        @include('franchisor.sections.flash-message')
        <!-- end page title -->

    </div> <!-- container -->
    <form method="POST" action="{{ route('franchisor.roles.store') }}" id="rolesForm"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('franchisor.roles.index') }}" class="btn btn-sm btn-dark">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-success" form="rolesForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Name </label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Role  Name">
                                @error('name')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Permissions </label>

                                @foreach($permission as $key => $value)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="{{ $value->id }}" class="custom-control-input" id="check{{ $key }}" name="permission[]">
                                    <label class="custom-control-label" for="check{{ $key }}">{{ $value->name }}</label>
                                </div>
                                @endforeach
                                

                                @error('permissions')
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
