@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace My Ad Campaigns')

@section('content')

<div class="my-campaigns">
    <div class="container">
        <h1>My Ad Campaigns</h1>
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="allcampaigns BoxShadow">
                    <div class="campaigns-tabs">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#AllCampaigns">All Ad Campaigns</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#Active">Active</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#Inactive">Inactive</a>
                            </li>
                        </ul>
                        <a href="{{ route('campaigns.create') }}" class="btn btn-primary">Create an Ad campaign</a>
                    </div>

                      <!-- Tab panes -->
                      <div class="tab-content">


                        <div id="AllCampaigns" class="tab-pane active"><br>
                        @include('sections.flash-message')
                            <div class="table-responsive">
                                <table class="table table-striped tablestyle2">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Campaign</th>
                                            <th>Price</th>
                                            <th>Clicks</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($campaigns as $campaign)
                                        <tr>
                                            <td>
                                            @if(isset($campaign->image))
                                                <div class="user-profile-image">
                                                    <img src="{{ asset('storage/uploads/campaigns/'.$campaign->image) }}" class="img-fluid" />
                                                </div>
                                            @else
                                            <div class="user-profile-image">
                                                <img src="{{ asset('assets/images/frontend/campai-placeholder.png') }}" class="img-fluid" />
                                            </div>
                                            @endif
                                            </td>

                                            <td style="width: 25%">
                                                <span>{{ $campaign->title }}</span>
                                            </td>
                                            <td><span>${{ $campaign->price }}</span></td>
                                            <td><span>{{ @$campaign->clicks }}</span></td>
                                            <td><span>{{ @$campaign->categoryData->name }}</span></td>
                                            {{-- <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch1" checked data-switch="success"/>
                                                    <label for="switch1" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td> --}}
                                            <td>@if($campaign->status) Active @else In-active @endif</td>
                                            <td class="table-action text-end">
                                                <a href="{{ route('campaigns.edit', $campaign->id) }}" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger" onclick="confirmDelete({{ $campaign->id }})"><i class="fa fa-trash"></i></a>

                                                <form id='delete-form{{ $campaign->id }}'
                                                    action='{{ route('campaigns.destroy', $campaign->id) }}'
                                                    method='POST'>
                                                    <input type='hidden' name='_token'
                                                    value='{{ csrf_token() }}'>
                                                    <input type='hidden' name='_method' value='DELETE'>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="Active" class="tab-pane fade"><br>
                            <div class="table-responsive">
                                <table class="table table-striped tablestyle2">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Campaign</th>
                                            <th>Price</th>
                                            <th>Clicks</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($active_campaigns as $campaign)
                                        <tr>
                                            @if(isset($campaign->image))
                                            <td><img src="{{ asset('storage/uploads/campaigns/'.$campaign->image) }}" class="img-fluid" /></td>
                                            @else
                                            <td><img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" /></td>
                                            @endif
                                            <td style="width: 25%">
                                                <span>{{ $campaign->title }}</span>
                                            </td>
                                            <td><span>${{ $campaign->price }}</span></td>
                                            <td><span>26</span></td>
                                            <td><span>{{ @$campaign->categoryData->name }}</span></td>
                                            {{-- <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch1" checked data-switch="success"/>
                                                    <label for="switch1" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td> --}}
                                            <td>@if($campaign->status) Active @else In-active @endif</td>
                                            <td class="table-action text-end">
                                                <a href="{{ route('campaigns.edit', $campaign->id) }}" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger" onclick="confirmDelete({{ $campaign->id }})"><i class="fa fa-trash"></i></a>

                                                <form id='delete-form{{ $campaign->id }}'
                                                    action='{{ route('campaigns.destroy', $campaign->id) }}'
                                                    method='POST'>
                                                    <input type='hidden' name='_token'
                                                    value='{{ csrf_token() }}'>
                                                    <input type='hidden' name='_method' value='DELETE'>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="Inactive" class="tab-pane fade"><br>
                            <div class="table-responsive">
                                <table class="table table-striped tablestyle2">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Campaign</th>
                                            <th>Price</th>
                                            <th>Clicks</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inactive_campaigns as $campaign)
                                        <tr>
                                            @if(isset($campaign->image))
                                            <td><img src="{{ asset('storage/uploads/campaigns/'.$campaign->image) }}" class="img-fluid" /></td>
                                            @else
                                            <td><img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" /></td>
                                            @endif
                                            <td style="width: 25%">
                                                <span>{{ $campaign->title }}</span>
                                            </td>
                                            <td><span>${{ $campaign->price }}</span></td>
                                            <td><span>{{ $campaign->clicks ?? 0 }}</span></td>
                                            <td><span>{{ @$campaign->categoryData->name }}</span></td>
                                            {{-- <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch1" checked data-switch="success"/>
                                                    <label for="switch1" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td> --}}
                                            <td>@if($campaign->status) Active @else In-active @endif</td>
                                            <td class="table-action text-end">
                                                <a href="{{ route('campaigns.edit', $campaign->id) }}" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger" onclick="confirmDelete({{ $campaign->id }})"><i class="fa fa-trash"></i></a>

                                                <form id='delete-form{{ $campaign->id }}'
                                                    action='{{ route('campaigns.destroy', $campaign->id) }}'
                                                    method='POST'>
                                                    <input type='hidden' name='_token'
                                                    value='{{ csrf_token() }}'>
                                                    <input type='hidden' name='_method' value='DELETE'>
                                                </form>
                                            </td>
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
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
    function confirmDelete(no) {
        document.getElementById('delete-form' + no).submit();
    };
    </script>

@endpush
