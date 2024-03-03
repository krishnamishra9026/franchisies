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
                        <h5 class="text-muted fw-normal mt-0" title="Number of Creators">Creators</h5>
                        <h3 class="mt-3 mb-3">{{ $creators_count }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Sponsors">Sponsors</h5>
                        <h3 class="mt-3 mb-3">{{ $sponsor_count }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Campaign">Campaign</h5>
                        <h3 class="mt-3 mb-3">{{ $campaign_count }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Earning">Earning</h5>
                        <h3 class="mt-3 mb-3">${{ $earning_count }}</h3>
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

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="page-title">Sponsors</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sponsors as $sponsor)
                                        <tr>
                                            <td>{{ date('d-m-Y',strtotime($sponsor->created_at)) }}</td>
                                            <td>{{ $sponsor->first_name }} {{ $sponsor->last_name }}</td>
                                            <td>{{ $sponsor->username }}</td>
                                            <td>{{ $sponsor->email }}</td>
                                            <td>{{ $sponsor->phone_number }}</td>
                                            <td>@if($sponsor->status) Active @else In-active @endif</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="page-title">Campaigns</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Title</th>
                                            <th>Sponsor</th>
                                            <th>Category</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($campaigns as $campaign)
                                            <tr>
                                                <td>{{ date('d-m-Y', strtotime($campaign->created_at)) }}</td>
                                                <td>{{ $campaign->title }}</td>
                                                <td>{{ @$campaign->sponsorData->first_name }} {{ @$campaign->sponsorData->last_name }}</td>
                                                <td>{{ @$campaign->categoryData->name }}</td>
                                                <td>@if($campaign->status) Active @else In-active @endif</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="page-title">Creators</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($creators as $creator)
                                            <tr>
                                                <td>{{ date('d-m-Y',strtotime($creator->created_at)) }}</td>
                                                <td>{{ $creator->firstname }} {{ $creator->lastname }}</td>
                                                <td>{{ $creator->username }}</td>
                                                <td>{{ $creator->email }}</td>
                                                <td>{{ $creator->phone }}</td>
                                                <td>@if($creator->status) Active @else In-active @endif</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end page title -->

</div> <!-- container -->
@endsection
