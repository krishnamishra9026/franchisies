@extends('layouts.admin')
@section('title', 'Show Sponsor')

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
                        <li class="breadcrumb-item"><a href="{{ route('admin.sponsors.index') }}">Sponsor</a>
                        </li>
                        <li class="breadcrumb-item active">Show Sponsor</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Sponsor</h4>
            </div>
        </div>
    </div>
    @include('admin.sections.flash-message')
    <!-- end page title -->

</div>
<form method="POST" action="{{ route('admin.sponsors.update', $sponsor->id) }}" id="contactEnqueryForm"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="card show-creator">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 text-start">
                            <div class="sponsorid">
                                <h2>#{{ $sponsor->id }} {{ $sponsor->first_name }}</h2>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.sponsors.edit', $sponsor->id) }}" class="btn btn-sm btn-primary mr-1">Edit</a>
                            <a href="{{ route('admin.sponsors.index') }}" class="btn btn-sm btn-dark">Back</a>
                            <button type="submit" class="btn btn-sm btn-primary" form="contactEnqueryForm">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="sp-info mb-4">
                        <div class="row">
                            <div class="col-sm-4 col-12">
                             <div class="form-group mb-2">
                                 <label for="name">Name</label>
                                 <p>{{ $sponsor->first_name }} </p>
                             </div>
                            </div>
                            <div class="col-sm-4 col-12">
                             <div class="form-group mb-2">
                                 <label for="name">Email</label>
                                 <p>{{$sponsor->email}}</p>
                             </div>
                            </div>
                            <div class="col-sm-4 col-12">
                             <div class="form-group mb-2">
                                 <label for="name">Phone Number</label>
                                 <p>{{ $sponsor->phone_number }}</p>
                             </div>
                            </div>
                            <div class="col-sm-4 col-12">
                             <div class="form-group mb-2">
                                 <label for="name">Address</label>
                                 <p>{{$sponsor->address}}</p>
                             </div>
                            </div>
                            <div class="col-sm-4 col-12">
                             <div class="form-group mb-2">
                                 <label for="name">City</label>
                                 <p>{{$sponsor->city}}</p>
                             </div>
                            </div>
                            <div class="col-sm-4 col-12">
                             <div class="form-group mb-2">
                                 <label for="name">State</label>
                                 <p>{{$sponsor->state}}</p>
                             </div>
                            </div>
                            <div class="col-sm-4 col-12">
                             <div class="form-group mb-2">
                                 <label for="name">Zipcode</label>
                                 <p>{{$sponsor->zipcode}}</p>
                             </div>
                            </div>
                            <div class="col-sm-4 col-12">
                             <div class="form-group mb-2">
                                 <label for="name">Country</label>
                                 <p>{{$sponsor->country}}</p>
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
                                        <a class="nav-link active" data-bs-toggle="pill" href="#Campaigns">Campaigns</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="pill" href="#Connected">Connected with creators</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="pill" href="#Subscription">Active Subscription</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="pill" href="#Favourites">Favourites</a>
                                        </li>
                                    </ul>

                                </div>

                                  <!-- Tab panes -->
                                  <div class="tab-content">
                                    <div id="Campaigns" class="tab-pane active"><br>
                                        <div class="row">
                                            <div class="col-md-12 table-responsive">
                                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Date</th>
                                                            <th>Campaign</th>
                                                            <th>Price</th>
                                                            <th>Clicks</th>
                                                            <th>Category</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @if(count($sponsor->campaigns))
                                                            @foreach($sponsor->campaigns as $campaign)
                                                            <tr>
                                                                <td>{{ $campaign->id }}</td>
                                                                <td>{{ date('d-m-Y', strtotime($campaign->created_at)) }}</td>
                                                                <td>{{ $campaign->title }}</td>
                                                                <td>${{ $campaign->price }}</td>
                                                                <td>26</td>
                                                                <td>{{ $campaign->categoryData->name }}</td>
                                                                <td>@if($sponsor->status) Active @else In-active @endif</td>
                                                                {{-- <td><span class="d-flex"><img src="{{ asset('assets/images/frontend/chat1.png') }}" /><span class="uname">Creator needed for Instagram promotion</span></span></td> --}}
                                                                {{-- <td> --}}
                                                                    {{-- <div class="cusswitch">
                                                                        <input type="checkbox" id="switch4" checked data-switch="success"/>
                                                                        <label for="switch4" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                                    </div> --}}
                                                                {{-- </td> --}}

                                                            </tr>
                                                            @endforeach
                                                            @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- <div class="col-12 bordertop">
                                                {{ $sponsors->appends(request()->query())->links('pagination::bootstrap-4') }}
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div id="Connected" class="tab-pane fade"><br>
                                        <div class="row">
                                            <div class="col-md-12 table-responsive">
                                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Date</th>
                                                            <th>Creator</th>
                                                            <th>Service</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                <td>001</td>
                                                                <td>05-09-2023</td>
                                                                <td><span class="d-flex"><img src="{{ asset('assets/images/frontend/chat1.png') }}" /> <span class="uname">Alex Anderson</span></span></td>
                                                                <td>Instagram promotion</td>
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
                                    <div id="Favourites" class="tab-pane fade"><br>
                                        <div class="row">
                                            <div class="col-md-12 table-responsive">
                                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Date</th>
                                                            <th>Creator</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                <td>001</td>
                                                                <td>05-09-2023</td>
                                                                <td>Alex Anderson</td>
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

@endpush

