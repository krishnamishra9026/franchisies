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
                            <li><span>Explore by Categories: Healthcare, Automobile, Foodtech, <a href="{{ url('category/music') }}"> Explore All</a></span></li>
                           
                        </ul>
                    </div>
                    <div class="exp-platform mobile-P">
                        <h6><span>Explore by Categories: Healthcare, Automobile, Foodtech, <a href="{{ url('category/music') }}"> Explore All</a></span></h6>
                        
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
                            </br>
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
                                                    <a href="{{ route('brands.index', $brand->slug) }}">
                                                        <img src="{{ asset('storage/uploads/brands/'.$brand->id.'/logo/' . $brand->logo) }}"
                                                            class="img-fluid" alt="{{ $brand->brandname }}">
                                                    </a>
                                                @else
                                                    <a href="{{ route('brands.index', $brand->slug) }}">
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
                                            <div style="text-align: center;">
                                            <a class="btn btn-primery" href="{{ route('brands.index', $brand->slug) }}">View Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center button-center mt-2">
                    <a href="{{ route('categories.index', 'music') }}" class="btn btn-secondary btn-lg">EXPLORE ALL</a>
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

    <div class="best-for-less" style="display: none;">
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


    <div class="best-for-less">
        <div class="container">
            <h5>Why Franchisee Bazaar</h5>
            <div class="row">
                <div class="col-sm-3 col-12">

                    <h4>Franchisees</h4>
                    @if($wf_left && count($wf_left))
                    @foreach($wf_left as $key => $wfLeft)
                    <div class="getthe-best left-text">
                        <p>{{ $wfLeft->title }}</p>
                    </div>
                    @endforeach
                    @endif

                </div>
                <div class="col-sm-6 col-12 m-auto">
                    <div class="comm-image text-center">
                        <img src="{{ asset('storage/uploads/settings/best-for-less/' . $settings->image) }}"
                        class="img-fluid" width="526" height="354" />
                    </div>
                </div>
                <div class="col-sm-3 col-12">

                    <h4>Francisors</h4>

                    @if($wf_right && count($wf_right))
                    @foreach($wf_right as $key => $wfRight)      
                    <div class="getthe-best right-text">
                        <p>{{ $wfRight->title }}</p>
                    </div>
                    @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        .getthe-best.left-text p,
        .getthe-best.right-text p{
            font-size: 15px;
        }
        .getthe-best.left-text:nth-child(odd) p{color: #000;}
        .getthe-best.left-text:nth-child(even) p{}
        .getthe-best.right-text:nth-child(odd) p{color: #000;}
        .getthe-best.right-text:nth-child(even) p{}
    </style>

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


  
    </script>
@endpush
