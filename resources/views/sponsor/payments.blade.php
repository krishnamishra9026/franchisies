@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Payments')

@section('content')

<div class="payments">
    <div class="container">
        <h1>Payments</h1>
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="subscription BoxShadow">
                    <div class="row">
                        <div class="col-sm-8 col-12">
                            <div class="Standard">
                                <p>Subscription: <b>Standard</b> <span class="badge bg-success">Active</span></p>

                                <ul class="list-unstyled">
                                    <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</span></li>
                                    <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</span></li>
                                    <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</span></li>
                                    <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="planprice">
                                <h4><span class="dollar">$</span>50<span>/ month</span></h4>
                                <p>Time period: <b>01 Aug 2023</b> to <b>31 Aug 2023</b></p>

                                <a href="{{ url('/packages') }}" class="btn btn-primary">Change Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="paymentD BoxShadow">
                    <h4>Payment Details</h4>
                    <div class="payimg">
                            <div class="payoption">
                                <div class="image">
                                    <img src="{{ asset('assets/images/frontend/stripepay-logo.png') }}" alt="Stripe" class="img-fluid" />
                                </div>
                                <div class="paylist">
                                    <ul class="list-inline">
                                        <li><p class="connect">Connected</p> <span>|</span></li>
                                        <li>Manage</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="payoption">
                                <div class="image">
                                    <img src="{{ asset('assets/images/frontend/paypal-logo.png') }}" alt="Paypal" class="img-fluid" />
                                </div>
                                <div class="paylist">
                                    <ul class="list-inline">
                                        <li><p class="notconnect">Not Connected</p></li>
                                    </ul>
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
