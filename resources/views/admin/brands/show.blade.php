@extends('layouts.admin')
@section('title', 'View Buyer')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    <!-- end Topbar -->

    <div class="container-fluid">
        <ul class="mt-3 nav nav-pills bg-nav-pills nav-justified mb-3">
            <li class="nav-item">
                <a href="#buyer" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                    <span class="d-none d-md-block">Buyer Info</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#order" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                    <span class="d-none d-md-block">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#invoice" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                    <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                    <span class="d-none d-md-block">Invoices</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show active" id="buyer">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <h4>{{ $buyer->firstname }} {{ $buyer->lastname }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <h4>{{ $buyer->email }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <h4>{{ $buyer->phone }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <h4>{{ $buyer->address }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <h4>{{ $buyer->city }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Postcode</label>
                                    <h4>{{ $buyer->postcode }}</h4>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Joined on</label>
                                    <h4>{{ date('d-m-Y', strtotime($buyer->created_at)) }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Login credentials</label>
                                    <h4>Email : {{ $buyer->email }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="order">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-panel table table-bordered table-striped table-centered">
                                <thead>
                                    <th class="text-center"><strong>Order ID</strong></th>
                                    <th><strong>Created at</strong></th>
                                    <th><strong>Vehicle</strong></th>
                                    <th class="text-center"><strong>Seller Assigned</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </thead>
                                <tbody>
                                    @foreach($buyer->orders as $order)
                                    <tr>
                                        <td class="text-center"><a href="{{ route('admin.orders.show', $order->id) }}">#{{ $order->id }}</a></td>
                                        <td>{{ date('F d, Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->car->carMake->name }} {{ $order->car->carModel->name }}</td>
                                        @if(isset($order->seller) && !empty($order->seller->id))
                                        <td class="text-center">{{ $order->seller->firstname }} {{ $order->seller->lastname }}</td>
                                        @else
                                        <td class="text-center">To be assigned</td>
                                        @endif
                                        <td><h4><span class="badge bg-info text-light">{{ getStatus($order->status) }}</span></h4></td>
                                        <td class="text-center">
                                            @if(!isset($order->seller) || !isset($order->quentity))
                                            <a href="{{ route('admin.generate-purchase-order', $order->id) }}" class="btn btn-success btn-sm">Generate PO</a>
                                            @endif
                                            <a class="ms-2 btn btn-primary btn-sm" href="{{ route('admin.orders.show', $order->id) }}"><i class="dripicons-preview"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="invoice">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-panel table table-bordered table-striped table-centered">
                                <thead>
                                    <th class="text-center"><strong>Invoice ID</strong></th>
                                    <th><strong>Created at</strong></th>
                                    <th>Buyer</th>
                                    <th><strong>Vehicle</strong></th>
                                    <th><strong>Seller</strong></th>
                                    <th class="text-center"><strong>Total</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </thead>
                                <tbody>
                                    @if(($buyer->invoices && count($invoices))
                            @foreach(($buyer->invoices as $invoice)
                                    <tr>
                                        <td class="text-center"><a href="{{ route('admin.invoices.show', $invoice->id) }}">#{{ $invoice->id }}</a></td>
                                        <td>{{ date('F d, Y', strtotime($invoice->created_at)) }}</td>
                                        <td>John Doe</td>
                                        <td>{{ $invoice->car->carMake->name }} {{ $invoice->car->carModel->name }}</td>
                                        <td>Daniel Fernandes</td>
                                        <td class="text-center">£{{ $invoice->total }}</td>
                                        <td><h4><span class="badge bg-success text-light">{{ getInvoiceStatus($invoice->status) }}</span></h4></td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.invoices.show', $invoice->id) }}"><i class="dripicons-preview"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                            @else
                            <tr>
                                <td colspan="6">
                                    <div class="no-data">
                                        <img src="{{ asset('assets/images/icons/no-data.png') }}" alt="No data available" class="img-fluid">
                                        <h3>No data available</h3>
                                        <p>Sorry, The data which you are searching for <br/>is not available at the moment</p>
                                    </div>
                                </td>
                            </tr>
                            @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection