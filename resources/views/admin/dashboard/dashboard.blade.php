@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">                        
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>



        </div>

        <div class="row">

            <div class="col-lg-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Creators">Brands</h5>
                        <h3 class="mt-3 mb-3">{{ $brands_count }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Sponsors">Categories</h5>
                        <h3 class="mt-3 mb-3">{{ $category_count }}</h3>
                    </div>
                </div>
            </div>

            

            <div class="col-lg-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Tickets">Tickets</h5>
                        <h3 class="mt-3 mb-3">{{ $enquiry_count }}</h3>
                    </div>
                </div>
            </div>
        </div>

 
    </div>
    <!-- end page title -->

</div> <!-- container -->
@endsection
