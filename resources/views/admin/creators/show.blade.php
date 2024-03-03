@extends('layouts.admin')
@section('title', 'Show Enquiry')
@section('head')
    <link href="{{ asset('assets/css/vendor/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />
@endsection
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.creators.index') }}">Creators</a>
                            </li>
                            <li class="breadcrumb-item active">Show Creator</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Creator</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <!-- end page title -->

    </div>
    <form method="POST" action="{{ route('admin.creators.update', $creator->id) }}" id="contactEnqueryForm"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card show-creator">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="sponsorid">
                                    <h2>#{{ $creator->id }} {{ $creator->firstname }}</h2>
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ route('admin.creators.edit', $creator->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('admin.creators.index') }}" class="btn btn-sm btn-dark">Back</a>
                                <button type="submit" class="btn btn-sm btn-primary"
                                    form="contactEnqueryForm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="sp-info mb-4">
                            <div class="row">
                                <div class="col-sm-4 col-12">
                                    <div class="form-group mb-2">
                                        <label for="name">Name</label>
                                        <p>{{ $creator->firstname }} {{ $creator->lastname }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="form-group mb-2">
                                        <label for="name">Email </label>
                                        <p>{{ $creator->email }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="form-group mb-2">
                                        <label for="name">Phone Number</label>
                                        <p>{{ $creator->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="form-group mb-2">
                                        <label for="name">Address</label>
                                        <p>{{ $creator->address }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="form-group mb-2">
                                        <label for="name">City</label>
                                        <p>{{ $creator->city }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="form-group mb-2">
                                        <label for="name">State </label>
                                        <p>{{ $creator->state }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="form-group mb-2">
                                        <label for="name">Zipcode</label>
                                        <p>{{ $creator->zipcode }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="form-group mb-2">
                                        <label for="name">Country</label>
                                        <p>{{ $creator->country }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="allcampaigns BoxShadow">
                                    <div class="campaigns-tabs">
                                        <ul class="nav nav-pills" role="tablist">
                                            <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="pill" href="#SocialAccounts">Social Accounts</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="pill" href="#Services">Services</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="pill" href="#Bids">Bids on Campaigns</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="pill" href="#Subscription">Subscription</a>
                                            </li>
                                        </ul>

                                    </div>

                                      <!-- Tab panes -->
                                      <div class="tab-content">
                                        <div id="SocialAccounts" class="tab-pane active"><br>
                                            <div class="row">
                                                <div class="col-md-12 table-responsive">
                                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                @if($creator->instagram)<th>Instagram</th>@endif
                                                                @if($creator->youtube)<th>Youtube</th>@endif
                                                                @if($creator->tiktok)<th>Tiktok</th>@endif
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                @if($creator->instagram)
                                                                <td>
                                                                    <span class="connect">Instagram </span>
                                                                    <br>
                                                                    @if(!$creator->instagram_connected)
                                                                    <button id="connect-instagarm">Connect Instagram Account</button>
                                                                    @else
                                                                    <p>(Connected)</p>
                                                                    @endif
                                                                </td>
                                                                @endif
                                                                @if($creator->youtube)
                                                                <td><span class="connect">Youtube </span>
                                                                    <br>
                                                                    @if(!$creator->youtube_connected)
                                                                    <button id="connect-youtube">Connect Youtube Account</button>
                                                                    @else
                                                                    <p>(Connected)</p>
                                                                    @endif
                                                                </td>
                                                                @endif
                                                                @if($creator->tiktok)
                                                                <td><span class="notconnect">Tiktok</span>
                                                                    <br/>
                                                                    @if(!$creator->tiktok_connected)
                                                                    <button id="connect-tictok">Connect Tiktok Account</button>
                                                                    @else
                                                                    <p>(Connected)</p>
                                                                    @endif
                                                                </td>
                                                                @endif
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{-- <div class="col-12 bordertop">
                                                    {{ $sponsors->appends(request()->query())->links('pagination::bootstrap-4') }}
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div id="Services" class="tab-pane fade"><br>
                                            <div class="row">
                                                <div class="col-md-12 table-responsive">
                                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Date</th>
                                                                <th>Service name</th>
                                                                <th>Category</th>
                                                                <th>Impression</th>
                                                                <th>Clicks</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                    <td>{{$creator->id}}</td>
                                                                    <td>{{date('d-m-Y', strtotime($creator->created_at))}}</td>
                                                                    <td><span class="d-flex"><img src="{{ asset('assets/images/frontend/chat1.png') }}" /> <span class="uname">{{$creator->talent_title}}</span></span></td>
                                                                    <td>{{@$creator->categoryData->name}}</td>
                                                                    <td>128.8K</td>
                                                                    <td>56</td>
                                                                    <td>
                                                                        <div class="mb-2">
                                                                            <a href="{{ route('admin.creators.edit', $creator->id) }}" class="btn btn-sm btn-primary mr-1"><i class="mdi mdi-square-edit-outline"></i></a>
                                                                            {{-- <button type="button" class="btn btn-sm btn-danger cus-danger" onclick="confirmDelete({{ $creator->id }})"><i class="mdi mdi-trash-can"></i></button> --}}
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{-- <div class="col-12 bordertop">
                                                    {{ $sponsors->appends(request()->query())->links('pagination::bootstrap-4') }}
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div id="Bids" class="tab-pane fade"><br>
                                            <div class="row">
                                                <div class="col-md-12 table-responsive">
                                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Date</th>
                                                                <th>Campaign</th>
                                                                <th>Sponsor</th>
                                                                <th>Price</th>
                                                                <th>Category</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                    <td>001</td>
                                                                    <td>05-09-2023</td>
                                                                    <td><span class="d-flex"><img src="{{ asset('assets/images/frontend/chat1.png') }}" /> <span class="uname">Creator needed for Instagram promotion</span></span></td>
                                                                    <td>Sponsor User</td>
                                                                    <td>$150</td>
                                                                    <td>Music</td>

                                                                </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                {{-- <div class="col-12 bordertop">
                                                    {{ $sponsors->appends(request()->query())->links('pagination::bootstrap-4') }}
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div id="Subscription" class="tab-pane fade"><br>
                                            <div class="row">
                                                <div class="col-md-12 table-responsive">
                                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Duration</th>
                                                                <th>Package Type (Q/M/Y)</th>
                                                                <th>Payment Type (Stripe/paypal)</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                    <td>001</td>
                                                                    <td>Standard</td>
                                                                    <td>01 Aug 2023 to 31 Aug 2023</td>
                                                                    <td>6 Month</td>
                                                                    <td>Paypal</td>
                                                                    <td><span class="badge bg-success">Active</span></td>
                                                                </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{-- <div class="col-12 bordertop">
                                                    {{ $sponsors->appends(request()->query())->links('pagination::bootstrap-4') }}
                                                </div> --}}
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
    </form>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/vendor/summernote-bs4.min.js') }}"></script>
    <!-- Summernote demo -->
    <script src="{{ asset('assets/js/vendor/summernote-accordion.js') }}"></script>
    <!-- Summernote demo -->
    <script>
        $('#content').summernote({
            placeholder: 'Page Content',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['misc', ['accordion']]
            ]
        });
    </script>


    <script src="https://cdn.getphyllo.com/connect/v2/phyllo-connect.js"></script>

    <script>
        const config = {
            clientDisplayName: "WinWinPromo(N2R Technologies)",
            environment: "{{ env('INSIGHTIQ_ENVIRONMENT') }}",
            userId: "{{ $creator->phyllo_user_id }}",
            appName: "WinWinPromo",
            token: "{{ $creator->phyllo_token }}",
            workPlatformId: "9bb8913b-ddd9-430b-a66a-d74d846e6c66",

        };

        const phylloConnect = PhylloConnect.initialize(config);

        phylloConnect.on("accountConnected", (accountId, workplatformId, userId) => {  
            console.log(`onAccountConnected: ${accountId}, ${workplatformId}, ${userId}`);
            setTimeout(() => {
                location.reload();
            }, 1000);
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
            userId: "{{ $creator->phyllo_user_id }}",
            appName: "WinWinPromo",
            token: "{{ $creator->phyllo_token }}",
            workPlatformId: "14d9ddf5-51c6-415e-bde6-f8ed36ad7054",

        };

        const phylloConnectYoutube = PhylloConnect.initialize(configYoutube);

        phylloConnectYoutube.on("accountConnected", (accountId, workplatformId, userId) => {  
            console.log(`onAccountConnected: ${accountId}, ${workplatformId}, ${userId}`);
            setTimeout(() => {
                location.reload();
            }, 1000);
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
            userId: "{{ $creator->phyllo_user_id }}",
            appName: "WinWinPromo",
            token: "{{ $creator->phyllo_token }}",
            workPlatformId: "de55aeec-0dc8-4119-bf90-16b3d1f0c987",

        };

        const phylloConnectTictok = PhylloConnect.initialize(configTictok);

        phylloConnectTictok.on("accountConnected", (accountId, workplatformId, userId) => {  
            console.log(`onAccountConnected: ${accountId}, ${workplatformId}, ${userId}`);
            setTimeout(() => {
                location.reload();
            }, 1000);
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
