@extends('layouts.homeapp')

@if ($settings->page_title) @section('title')
    {{ $settings->page_title ?? 'Best online Influencer marketer for Youtube | Instagram video promotion - Winwinpromo' }}
    @endsection @endif
@if ($settings->meta_description) @section('description')
    {{ $settings->meta_description }}
    @endsection @endif

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endsection
@section('content')
    @if (isset($settings->background_image))
        <div class="mainbanner"
            style="background-image: url('{{ asset('storage/uploads/homebanner/' . $settings->background_image) }}')">
        @else
            <div class="mainbanner" style="background-image: url('{{ asset('assets/images/frontend/home-banner.jpg') }}')">
    @endif
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-12">
                <div class="BannerCaption">
                    <h1>{{ $settings->banner_title ?? "Find the World's Best Talent in your Fingertips" }}</h1>
                    <div class="find-world">
                        <form id="serchForm" action="{{ route('category-search') }}">
                        <div class="input-group">
                            <input type="text" id="searchUser" required name="search" class="form-control"
                                placeholder="{{ $settings->search_placeholder ?? 'Search by keyword (Beauty, Freelancing, Promotion)' }}">
                            <span class="input-group-text"
                                style="background-color: {{ $settings->search_button_background }};" id="find"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg></span>
                        </div>
                        </form>
                    </div>
                    <div class="exp-platform desktop-P">
                        <ul class="list-inline">
                            <li><span>Explore by Categories: Healthcare, Automobile, Foodtech, Explore All</span></li>
                           
                        </ul>
                    </div>
                    <div class="exp-platform mobile-P">
                        <h6><span>Explore by platform:</span></h6>
                        <ul class="list-inline">
                            <li><a
                                    @if (auth() &&
                                            auth()->guard('creator')->user()) href="creator/marketplace/creator?platform%5B%5D=instagram" @else href="marketplace/creator?platform%5B%5D=instagram" @endif><span><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                            class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                        </svg> Instagram</span></a></li>
                            <li><a
                                    @if (auth() &&
                                            auth()->guard('creator')->user()) href="creator/marketplace/creator?platform%5B%5D=tiktok" @else href="marketplace/creator?platform%5B%5D=tiktok" @endif><span><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                            class="bi bi-youtube" viewBox="0 0 16 16">
                                            <path
                                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                        </svg> YouTube</span></a></li>
                            <li><a
                                    @if (auth() &&
                                            auth()->guard('creator')->user()) href="creator/marketplace/creator?platform%5B%5D=tiktok" @else href="marketplace/creator?platform%5B%5D=tiktok" @endif><span><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                            class="bi bi-tiktok" viewBox="0 0 16 16">
                                            <path
                                                d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" />
                                        </svg> TikTok</span></a></li>
                            <li>
                                <a
                                    @if (auth() &&
                                            auth()->guard('creator')->user()) href="creator/marketplace/creator" @else href="marketplace/creator" @endif>
                                    <span>
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M9 6C9 7.65685 10.3431 9 12 9C13.6569 9 15 7.65685 15 6C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6Z"
                                                    fill="#fff"></path>
                                                <path
                                                    d="M2.5 18C2.5 19.6569 3.84315 21 5.5 21C7.15685 21 8.5 19.6569 8.5 18C8.5 16.3431 7.15685 15 5.5 15C3.84315 15 2.5 16.3431 2.5 18Z"
                                                    fill="#fff"></path>
                                                <path
                                                    d="M18.5 21C16.8431 21 15.5 19.6569 15.5 18C15.5 16.3431 16.8431 15 18.5 15C20.1569 15 21.5 16.3431 21.5 18C21.5 19.6569 20.1569 21 18.5 21Z"
                                                    fill="#fff"></path>
                                                <path
                                                    d="M7.20468 7.56231C7.51523 7.28821 7.54478 6.81426 7.27069 6.5037C6.99659 6.19315 6.52264 6.1636 6.21208 6.43769C4.39676 8.03991 3.25 10.3865 3.25 13C3.25 13.4142 3.58579 13.75 4 13.75C4.41421 13.75 4.75 13.4142 4.75 13C4.75 10.8347 5.69828 8.89187 7.20468 7.56231Z"
                                                    fill="#fff"></path>
                                                <path
                                                    d="M17.7879 6.43769C17.4774 6.1636 17.0034 6.19315 16.7293 6.5037C16.4552 6.81426 16.4848 7.28821 16.7953 7.56231C18.3017 8.89187 19.25 10.8347 19.25 13C19.25 13.4142 19.5858 13.75 20 13.75C20.4142 13.75 20.75 13.4142 20.75 13C20.75 10.3865 19.6032 8.03991 17.7879 6.43769Z"
                                                    fill="#fff"></path>
                                                <path
                                                    d="M10.1869 20.0217C9.7858 19.9184 9.37692 20.1599 9.27367 20.561C9.17043 20.9622 9.41192 21.3711 9.81306 21.4743C10.5129 21.6544 11.2458 21.75 12 21.75C12.7542 21.75 13.4871 21.6544 14.1869 21.4743C14.5881 21.3711 14.8296 20.9622 14.7263 20.561C14.6231 20.1599 14.2142 19.9184 13.8131 20.0217C13.2344 20.1706 12.627 20.25 12 20.25C11.373 20.25 10.7656 20.1706 10.1869 20.0217Z"
                                                    fill="#fff"></path>
                                            </g>
                                        </svg>
                                        Explore all
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="trusted">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="trustedby">
                        <ul class="list-inline">
                            <li><span>Business Failed? We've got your back.</span></li>
                            <li><span>Get your full investment back from Franchisee Bazaar and turn setbacks into future success.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="how-it-work">
            <h2>How It Works</h2>
            <div id="hiw" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <div class="work-grid">
                                <div class="image">
                                    <img src="{{ asset('storage/uploads/works/' . $settings->works_image1) }}"
                                        class="img-fluid" alt="{{ $settings->works_title1 }}" width="312" height="226" />
                                </div>
                                <div class="number">1</div>
                                <div class="caption">
                                    <h4>{{ $settings->works_title1 }}</h4>
                                    <p>{{ $settings->works_description1 }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="work-grid">
                                <div class="image">
                                    <img src="{{ asset('storage/uploads/works/' . $settings->works_image2) }}"
                                        class="img-fluid" alt="{{ $settings->works_title2 }}" width="312" height="226" />
                                </div>
                                <div class="number">2</div>
                                <div class="caption">
                                    <h4>{{ $settings->works_title2 }}</h4>
                                    <p>{{ $settings->works_description2 }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="work-grid">
                                <div class="image">
                                    <img src="{{ asset('storage/uploads/works/' . $settings->works_image3) }}"
                                        class="img-fluid" alt="{{ $settings->works_title3 }}" width="312" height="226" />
                                </div>
                                <div class="number">3</div>
                                <div class="caption">
                                    <h4>{{ $settings->works_title3 }}</h4>
                                    <p>{{ $settings->works_description3 }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="work-grid">
                                <div class="image">
                                    <img src="{{ asset('storage/uploads/works/' . $settings->works_image4) }}"
                                        class="img-fluid" alt="{{ $settings->works_title4 }}" width="312" height="226" />
                                </div>
                                <div class="number">4</div>
                                <div class="caption">
                                    <h4>{{ $settings->works_title4 }}</h4>
                                    <p>{{ $settings->works_description4 }}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="popular-services">
        <div class="container">
            <h2>Popular Categories</h2>
            <div class="row">
                <div id="popular-services" class="splide">
                    <div class="splide__track">
                        <div class="splide__list">
                            @if ($services)
                                @foreach ($services as $service)
                                    <div class="col-sm-2 splide__slide">
                                        
                                        <a href="{{ route('categories.index', ($service->categoryData->slug ?? 'music')) }}">
                                        <div class="slide-caption">
                                            <h5>{{ $service->title }}</h5>
                                        </div>
                                        @if ($service->image)
                                            <img src="{{ asset('storage/uploads/services/' . $service->image) }}"
                                                class="img-fluid custom-scale" width="246" height="330" alt="{{ $service->title }}" />
                                        @else
                                            <img src="{{ asset('assets/images/frontend/2.png') }}"
                                                class="img-fluid custom-scale" width="246" height="330" alt="{{ $service->title }}" />
                                        @endif
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-profiles">
        <div class="container">
            <h3>Featured Profiles</h3>
            <div class="row">
                <div id="featured-profiles" class="splide">
                    <div class="splide__track">
                        <div class="splide__list">
                            @if ($brands)
                                @foreach ($brands as $key => $brand)
                                    <div class="col-sm-3 splide__slide">
                                        <div class="FProfile custom-scale">
                                            <div class="image">
                                                @if (isset($brand->logo))
                                                    <a href="">
                                                        <img src="{{ asset('storage/uploads/brands/'.$brand->id.'/logo/' . $brand->logo) }}"
                                                            class="img-fluid" alt="{{ $brand->brandname }}">
                                                    </a>
                                                @else
                                                    <a href="">
                                                        <img src="{{ asset('assets/images/frontend/creator-placeholder.jpeg') }}"
                                                            class="img-fluid" alt="{{ $brand->firstname }}
                                                            {{ $brand->lastname }}">
                                                    </a>
                                                @endif
                                            </div>
                                            <a href="{{ route('brands.index', $brand->slug) }}">
                                                <div class="caption">
                                                    <div class="user">
                                                        
                                                        <div class="userN">
                                                            <div class="col-badges">
                                                                <h5 class="username">{{ $brand->categoryData->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                        <p><h4 class="price">{{ $brand->brandname }}</h4></p>
                                                        <p class="price">Investment: 
                                                            <span>{{ $brand->investment }}</span>
                                                        </p>
                                                        <p class="price">Space Required: 
                                                            <span>{{ $brand->space_req }}</span>
                                                        </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center button-center mt-2">
                    <a href="{{ route('marketplace.creators') }}" class="btn btn-secondary btn-lg">EXPLORE ALL</a>
            </div>
        </div>
    </div>

    <div class="business-grow">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-12">
                    <h5>{{ $settings->banner1_title }}</h5>
                    <a href="{{ route('join') }}"
                        style="background-color:{{ $settings->banner1_button_bg_color }}; color:{{ $settings->banner1_button_text_color }};"
                        class="btn btn-primary btn-lg">{{ $settings->banner1_button_text }}</a>
                </div>
                <div class="col-sm-4 col-12">
                    <div class="BG-image">
                        <img src="{{ asset('storage/uploads/settings/banner1/' . $settings->banner1_image) }}"
                            class="img-fluid" width="388" height="345" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="best-for-less">
        <div class="container">
            <h5>Get the best for less</h5>
            <div class="row">
                <div class="col-sm-3 col-12">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="getthe-best step1">
                                <h6>{{ $settings->title1 }}</h6>
                                <p>{{ $settings->description1 }}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <div class="getthe-best step2">
                                <h6>{{ $settings->title2 }}</h6>
                                <p>{{ $settings->description2 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12 m-auto">
                    <div class="comm-image">
                        <img src="{{ asset('storage/uploads/settings/best-for-less/' . $settings->image) }}"
                            class="img-fluid" width="526" height="354" />
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="getthe-best step3">
                                <h6>{{ $settings->title3 }}</h6>
                                <p>{{ $settings->description3 }}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <div class="getthe-best step4">
                                <h6>{{ $settings->title4 }}</h6>
                                <p>{{ $settings->description4 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-clients">
        <div class="container">
            <h5>Hear from our Client</h5>
            <p>We strive to compensate for every second that you waste in searching for influencers here and there on social media. Hear the words of our users.</p>
            <div class="row">
                <div id="client-hearing" class="splide">
                    <div class="splide__track">
                        <div class="splide__list">
                            @if ($reviews)
                                @foreach ($reviews as $review)
                                    <div class="col-sm-4 col-12 splide__slide">
                                        <div class="our-client">
                                            <div class="Quote">
                                                <img src="{{ asset('assets/images/frontend/icons/quote.svg') }}" alt="Quote" />
                                            </div>
                                            <p>{{ $review->description }}</p>
                                            <div class="client">
                                                @if(!isset($review->image))
                                                <img src="{{ @$review->image }}"
                                                    alt="{{ $review->author_name }}" class="client-author-image" />
                                                    @else
                                                    <img src="/storage/uploads/settings/reviews/review-img.jpg"
                                                    alt="{{ $review->author_name }}" class="client-author-image" />
                                                    @endif
                                                <div class="userD">
                                                    <h6>{{ $review->author_name }}</h6>
                                                    <span>{{ $review->designation }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="contactbg"
                        style="background-image: url('{{ asset('storage/uploads/settings/banner2/' . $settings->banner2_image) }}')">
                        <h5>{{ $settings->banner2_title }}</h5>
                        <p>{{ $settings->banner2_description }}</p>
                        <a href="{{ route('join') }}"
                            style="background-color:{{ $settings->banner2_button_bg_color }}; color:{{ $settings->banner2_button_text_color }};"
                            class="btn btn-primary btn-lg">{{ $settings->banner2_button_text }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="faq" @if($faqs && count($faqs)) style="display:block;" @else style="display:none;" @endif>
        <div class="container">
            <h6>Frequently Asked Questions</h6>
            <div class="row">
                <div class="accordion" id="accordionExample">
                    @if($faqs && count($faqs))
                    @foreach($faqs as $key => $faq)
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $faq->id }}" aria-expanded="@if(!$key) true @else false @endif" aria-controls="collapse{{ $faq->id }}">
                                {{$faq->title}}
                            </button>
                        </div>
                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse @if(!$key) show @else  @endif"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>{!!$faq->description!!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
            </div>
            <div class="morebtn" style="text-align:center;">
                <a target="_blank" href="/faq" class="btn btn-primary">View More</a>
            </div>
        </div>
    </div>


    <div class="blogs">
        <div class="container">
            <h5>Blogs</h5>
            <p>Let's discover updates in the industry. Unlock the never-ending knowledge base on our company's blog.</p>
            <div class="row">
                <div id="win-blogs" class="splide">
                    <div class="splide__track">
                        <div class="splide__list">
                            @if ($responses)
                                @php $i=0; @endphp
                                @foreach ($responses as $response)
                                    @if ($i < 3)
                                        <div class="col-sm-4 col-12 splide__slide">
                                            <a href="{{ $response->link }}">
                                                <div class="blog-grid">
                                                    <div class="image">
                                                        @if (isset($response->image))
                                                            <img src="{{ @$response->image }}"
                                                                class="img-fluid custom-scale" alt="{!! html_entity_decode($response->title->rendered) !!}" width="421" height="281" />
                                                        @else
                                                            <img src="{{ asset('assets/images/frontend/creator-placeholder.jpeg') }}"
                                                                class="img-fluid custom-scale" alt="{!! html_entity_decode($response->title->rendered) !!}" width="421" height="281">
                                                        @endif

                                                    </div>
                                                    <div class="caption">
                                                        <div class="BDate">
                                                            {{ date('d F, Y', strtotime($response->date)) }}</div>
                                                        <h4>{!! html_entity_decode($response->title->rendered) !!}</h4>
                                                        @php
                                                            $description = Str::of($response->content->rendered)->words(20, '...');
                                                            $dt = \Carbon\Carbon::parse($response->date);
                                                            $new_date = $dt->diffForHumans();
                                                        @endphp
                                                        <p>{!! $description !!}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                    @php  $i++;  @endphp
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="morebtn" style="text-align:center;">
                <a target="_blank" href="/blogs" class="btn btn-primary">Discover More</a>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        var path = "{{ route('get-search-keywords') }}";
        $("#searchUser").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#searchUser').val(ui.item.label);
                return false;
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#hiw', {
                type: 'loop',
                perPage: 4,
                perMove: 1,
                gap: '1rem',
                pagination: false,
                breakpoints: {
                    991: {
                        perPage: 3,
                        gap: '.8rem',
                    },
                    767: {
                        perPage: 2,
                        gap: '.8rem',
                    },
                    575: {
                        perPage: 1,
                        gap: '.8rem',
                    },
                },
            }).mount();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#popular-services', {
                type: 'loop',
                perPage: 5,
                perMove: 1,
                gap: '1rem',
                pagination: false,
                breakpoints: {
                    991: {
                        perPage: 3,
                        gap: '.8rem',
                    },
                    767: {
                        perPage: 2,
                        gap: '.8rem',
                    },
                    575: {
                        perPage: 1,
                        gap: '.8rem',
                    },
                },
            }).mount();
            // var splide = new Splide( '.splide', {
            // type   : 'loop',
            // perPage: 5,
            // perMove: 1,
            // gap    : '1rem',
            // breakpoints: {
            //     640: {
            //     perPage: 1,
            //     gap    : '.7rem',
            //     },
            //     480: {
            //     perPage: 1,
            //     gap    : '.7rem',
            //     },
            // },
            // } );
            // splide.mount();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#featured-profiles', {
                type: 'loop',
                perPage: 4,
                perMove: 1,
                gap: '1rem',
                pagination: false,
                breakpoints: {
                    991: {
                        perPage: 3,
                        gap: '.8rem',
                    },
                    767: {
                        perPage: 2,
                        gap: '.8rem',
                    },
                    575: {
                        perPage: 1,
                        gap: '.8rem',
                    },
                },
            }).mount();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#client-hearing', {
                type: 'loop',
                perPage: 3,
                perMove: 1,
                gap: '1rem',
                pagination: false,
                breakpoints: {
                    767: {
                        perPage: 2,
                        gap: '.8rem',
                    },
                    575: {
                        perPage: 1,
                        gap: '.8rem',
                    },
                },
            }).mount();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#win-blogs', {
                type: 'loop',
                perPage: 3,
                perMove: 1,
                gap: '1rem',
                pagination: false,
                breakpoints: {
                    767: {
                        perPage: 2,
                        gap: '.8rem',
                    },
                    575: {
                        perPage: 1,
                        gap: '.8rem',
                    },
                },
            }).mount();
        });
    </script>
    <script type="text/javascript">
        $("#find").click(function() {
            if ($("#serchForm input").val() == '') {
                return false;
            } else {
                $("#serchForm").submit();
            }
        });

        /* $(".wishlist").click(function() {
             $(this).toggleClass('fa-heart-o');
             $(this).toggleClass('fa-heart');
         });*/


        $(".wishlist").click(function() {

            var user_id = "{{ auth()->user() ? auth()->user()->id : '' }}";
            var url = "{{ route('add-to-favorite') }}";
            if (user_id == '') {
                var user_id = "{{ auth()->guard('creator')->user()? auth()->guard('creator')->user()->id: '' }}";
                var url = "{{ route('creator.add-to-favorite') }}";
            }

            if (user_id == '') {
                window.location.href = "{{ url('/login') }}";
                return false;
            }

            var creator_id = $(this).data('creator-id');

            var token = "{{ csrf_token() }}";


            var status = 0;
            if ($(this).attr('class') === 'fa  fa-heart-o  wishlist') {
                status = 1;
            }

            $(this).toggleClass('fa-heart-o');
            $(this).toggleClass('fa-heart');

            $.ajax({
                method: 'post',
                url: url,
                data: {
                    user_id: user_id,
                    creator_id: creator_id,
                    status: status,
                    _token: token
                },
                success: function(msg) {
                    if (msg.success) {
                        setTimeout(() => {
                            alert(msg.message)
                            location.reload();
                        }, 500)
                    } else {
                        alert('Something went wrong!');
                    }
                    console.log(msg);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("some error");
                }
            });
        });
    </script>
@endpush
