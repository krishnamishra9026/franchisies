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
                        <a href="{{ url('/create-campaign') }}" class="btn btn-primary">Create an Ad campaign</a>
                    </div>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div id="AllCampaigns" class="tab-pane active"><br>
                            <div class="table-responsive">
                                <table class="table table-striped tablestyle2">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Ad Campaign</th>
                                            <th>Price</th>
                                            <th>Clicks</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch1" checked data-switch="success"/>
                                                    <label for="switch1" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="{{ url('/create-campaign') }}" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch2" checked data-switch="success"/>
                                                    <label for="switch2" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch3" data-switch="success"/>
                                                    <label for="switch3" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch4" checked data-switch="success"/>
                                                    <label for="switch4" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch5" data-switch="success"/>
                                                    <label for="switch5" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

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
                                            <th>Ad Campaign</th>
                                            <th>Price</th>
                                            <th>Clicks</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch6" checked data-switch="success"/>
                                                    <label for="switch6" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch7" checked data-switch="success"/>
                                                    <label for="switch7" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch8" checked data-switch="success"/>
                                                    <label for="switch8" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch9" checked data-switch="success"/>
                                                    <label for="switch9" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch10" checked data-switch="success"/>
                                                    <label for="switch10" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

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
                                            <th>Ad Campaign</th>
                                            <th>Price</th>
                                            <th>Clicks</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch11" data-switch="success"/>
                                                    <label for="switch11" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch12" data-switch="success"/>
                                                    <label for="switch12" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch13" data-switch="success"/>
                                                    <label for="switch13" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch14" data-switch="success"/>
                                                    <label for="switch14" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/frontend/campai.png') }}" class="img-fluid" />
                                            </td>
                                            <td style="width: 25%">
                                                <span>Creator needed for Instagram promotion</span>
                                            </td>
                                            <td><span>$150</span></td>
                                            <td><span>26</span></td>
                                            <td><span>Music</span></td>
                                            <td>
                                                <div class="cusswitch">
                                                    <input type="checkbox" id="switch15" data-switch="success"/>
                                                    <label for="switch15" data-on-label="" data-off-label="" class="mb-0 d-block"></label>
                                                </div>
                                            </td>
                                            <td class="table-action text-end">
                                                <a href="javascript: void(0);" class="action-btn btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                <a href="javascript: void(0);" class="action-btn btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

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



@endpush
