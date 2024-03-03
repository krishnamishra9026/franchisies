@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Packages')

@section('content')
<div class="packages">
    <div class="container">
        <h1>Packages</h1>
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="allpackages BoxShadow">
                    <h2>Choose Your Plan</h2>
                    <div class="packages-tabs">
                        <ul class="nav nav-pills nav-pills2" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#Monthly">Monthly</a>
                            </li>
                            <li class="nav-item">
                                <span class="off">20% OFF</span>
                            <a class="nav-link" data-bs-toggle="pill" href="#Quarterly">Quarterly</a>
                            </li>
                            <li class="nav-item">
                                <span class="off">30% OFF</span>
                            <a class="nav-link" data-bs-toggle="pill" href="#HalfYearly">Half Yearly</a>
                            </li>
                            <li class="nav-item">
                                <span class="off">40% OFF</span>
                                <a class="nav-link" data-bs-toggle="pill" href="#Annually">Annually</a>
                            </li>
                        </ul>

                    </div>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div id="Monthly" class="tab-pane active"><br>
                            <div class="row">
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Basic</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>50<span>/ month</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Standard</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>80<span>/ month</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Premium</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>100<span>/ month</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="Quarterly" class="tab-pane fade"><br>
                            <div class="row">
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Basic</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>120<span>/ quarter</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Standard</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>190<span>/ quarter</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Premium</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>240<span>/ quarter</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="HalfYearly" class="tab-pane fade"><br>
                            <div class="row">
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Basic</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>210<span>/ half year</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Standard</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>330<span>/ half year</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Premium</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>420<span>/ half year</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="Annually" class="tab-pane fade"><br>
                            <div class="row">
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Basic</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>360<span>/ year</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Standard</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>570<span>/ year</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="package-plan">
                                        <h3>Premium</h3>
                                        <div class="planprice">
                                            <h4><span class="dollar">$</span>720<span>/ year</span></h4>
                                        </div>
                                        <div class="Standard planD">
                                            <ul class="list-unstyled">
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>Collab with creators access to personal details</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                                <li><img src="{{ asset('assets/images/frontend/icons/checked.png') }}" alt="Check"/> <span>There are many variations of passages of Lorem Ipsum available,</span></li>
                                            </ul>
                                        </div>
                                        <div class="getbtn text-center mt-3">
                                            <a href="{{ url('/home') }}" class="btn btn-primary">Get Started</a>
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
</div>
@endsection

@push('scripts')

@endpush
