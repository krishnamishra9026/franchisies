@extends('layouts.app')
@section('title', 'Become a influencer and earn online | Winwinpromo')
@section('description', '')

@section('content')

<div class="ppc-page">
    <div class="inf-banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>The best way to market yourself and be a Game-changer</h1>
                    <p>Showcase your talent and services directly to consumers and reach to millions of hearts. We believe in empowering our creators with the freedom to express themselves authentically. Whether you're into vlogging, podcasting, writing, or any other form of content creation, our platform is designed to amplify your voice. Become part of a vibrant community of like-minded creators and enthusiasts. Share experiences, collaborate on projects, and build lasting relationships with fellow creatives.</p>
                    <div class="trustedby">
                        <ul class="list-inline">
                            <li><span>Trusted by:</span></li>
                            <li><a href="javascript:void(0)" target="_blank"><span><img
                                            src="{{ asset('assets/images/frontend/youtube.png') }}" class="custom-scale"
                                            alt="YouTube" width="130" height="41" /></span></a></li>
                            <li><a href="javascript:void(0)" target="_blank"><span><img
                                            src="{{ asset('assets/images/frontend/tiktok.png') }}" class="custom-scale"
                                            alt="YouTube" width="130" height="41" /></span></a></li>
                            <li><a href="javascript:void(0)" target="_blank"><span><img
                                            src="{{ asset('assets/images/frontend/instagram.png') }}"
                                            class="custom-scale" alt="YouTube" width="130" height="41"/></span></a></li>
                        </ul>
                    </div>
                    <div class="action-button">
                        <a href="{{ route('register') }}" class="btn btn-primary ppc-button">Join as an influencer</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('assets/images/become-an-influencer.jpeg') }}" alt="The best way to market yourself" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="how-it-work">
            <h2>How It Works</h2>
            <div class="row">
                <div class="col-sm-3">
                    <div class="work-grid">
                        <div class="image">
                            <img src="{{ asset('assets/images/cr1.jpeg') }}" class="img-fluid" alt="Create an account" width="312" height="226" />
                        </div>
                        <div class="number">1</div>
                        <div class="caption">
                            <h4>Create an account</h4>
                            <p>Content creator or a sponsor, it's as easy as 1-2-3 to create your account and describe what you are looking for. You are 3 steps away from getting your promo deal done.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="work-grid">
                        <div class="image">
                            <img src="{{ asset('assets/images/cr2.jpeg') }}" class="img-fluid" alt="Find the right promo match" width="312" height="226" />
                        </div>
                        <div class="number">2</div>
                        <div class="caption">
                            <h4>Find the right promo match</h4>
                            <p>Search for multi-platform opportunities to place your advertisement and promote a product. It's a win-win opportunity to promote a product the best way.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="work-grid">
                        <div class="image">
                            <img src="{{ asset('assets/images/cr3.jpeg') }}" class="img-fluid" alt="Discuss all the details" width="312" height="226" />
                        </div>
                        <div class="number">3</div>
                        <div class="caption">
                            <h4>Discuss all the details</h4>
                            <p>Find multiple opportunities and decide on the best one to execute a successful promo campaign.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="work-grid">
                        <div class="image">
                            <img src="{{ asset('assets/images/cr4.jpeg') }}" class="img-fluid" alt="Get the deal done" width="312" height="226" />
                        </div>
                        <div class="number">4</div>
                        <div class="caption">
                            <h4>Get the deal done</h4>
                            <p>You decide who you work with. Choose what works best for you and your product.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('register') }}" class="btn btn-primary ppc-button" style="margin-top: 0">Join now</a>
        </div>
        <div class="revolutionize">
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ asset('assets/images/h5_hard.png') }}" alt="The best way to market yourself" class="img-fluid">
                </div>
                <div class="col-sm-6">
                    <div class="rp-platform">
                        <h4>ABOUT OUR PLATFORM</h4>
                        <h2>Revolutionize Your Business Success with Influencer Marketing</h2>
                        <p>Whether you are a business owner or an influencer, Winwinpromo collaborates to make a perfect match. Let's make a successful influencer marketing campaign for advertising!</p>
                        <p>Unlike the regular influencer marketing approach, Winwinpromo offers brands an array of promotion channels, such as paid ads, sponsored content, or featured listings, for enhanced visibility. Brands can use their flexible kit to tailor strategies for increased effect. Combining Influencer Marketing and Winwinpromo marketplace page delivers extraordinary results as brands embark on a journey toward innovation in mastering digital marketing. "Because every business product deserves to be promoted by Trendsetters."</p>
                        <div><a href="{{ route('register') }}" class="btn btn-primary ppc-button">Enroll now</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ppc-wordings">
            <h3>What people say about us</h3>
            <p class="revp">We strive to compensate for every second that you waste in searching for influencers here and there on social media. Hear the words of our users. </p>
            <div class="word-grid">
                <div class="d-flex">
                    <div class="word-avatar">
                        <img src="{{ asset('assets/images/users/av1.png') }}" alt="Piret Luts" class="img-fluid avatar">
                    </div>
                    <div class="word-name">
                        <h4>Piret Luts</h4>
                        <p>CEO at The Rossy <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </p>
                    </div>
                </div>
                <h4>Amazing experience</h4>
                <p class="word-desc">We have been in the beauty products business for three years. In 2021, after the COVID bubble, searching for social media influencers was overwhelming when we began our journey. As it is one of the ideal marketing methods in our industry, it takes days to collect information on trending beauty influencers. I've tried many ways and platforms, but WinwinPromo seems smoother</p>
            </div>
            <div class="word-grid">
                <div class="d-flex">
                    <div class="word-avatar">
                        <img src="{{ asset('assets/images/users/av2.png') }}" alt="Maria" class="img-fluid avatar">
                    </div>
                    <div class="word-name">
                        <h4>Maria</h4>
                        <p>Apparel and Clothing Influencer <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </p>
                    </div>
                </div>
                <h4>Quick and easy to deal with the sponsors</h4>
                <p class="word-desc">It gives you pure profit! I've worked with WinwinPromo for the past few months, and you should try it. I love the filters; they make my search more compatible and dynamic.</p>
            </div>
            <div class="word-grid">
                <div class="d-flex">
                    <div class="word-avatar">
                        <img src="{{ asset('assets/images/users/av3.png') }}" alt="Zara" class="img-fluid avatar">
                    </div>
                    <div class="word-name">
                        <h4>Zara</h4>
                        <p>Digital Marketing Influencer <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </p>
                    </div>
                </div>
                <h4>I am very happy with the results</h4>
                <p class="word-desc">Marketing becomes more challenging in a specific business-like publishing. 'I should never get great authors,' I told myself last month. However, WinwinPromo helped me get 150+ leads, and I've closed ten deals in the past month. Thanks a lot!"</p>
            </div>
        </div>
        <div class="ppc-invitation">
            <h3>Connecting customers to your talent</h3>
            <p>Getting started is easy! Simply create an account and start uploading your content. We are confident that your unique perspective and talent would be a fantastic addition to our growing community. Join us in shaping the future of content creation!</p>
            <div class="text-center">
                <a href="{{ route('register') }}" class="btn btn-primary ppc-button" id="ppcregister">Register Now</a>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')

@endpush
