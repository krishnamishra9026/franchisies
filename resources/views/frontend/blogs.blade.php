@extends('layouts.app')
@section('title', 'Frequently Asked Questions | Franchisee Bazaar')
@section('description', 'Frequently asked questions when using winpromo. Find influencers to create Instagram, TikTok, YouTube and User Generated Content | Franchisee Bazaar')


@section('content')

<div class="blogpage">
    <div class="blog">
        <div class="container">
            <h1 class="mt-2">Blogs</h1>
            <div class="row mt-2">
                <div class="accordion" id="accordionExample">
                    @if($blogs && count($blogs))
                    @foreach($blogs as $key => $blog)
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $blog->id }}" aria-expanded="@if(!$key) true @else false @endif" aria-controls="collapse{{ $blog->id }}">
                                {{$blog->title}}
                            </button>
                        </div>
                        <div id="collapse{{ $blog->id }}" class="accordion-collapse collapse @if(!$key) show @else  @endif"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>{!! \Str::limit($blog->description, 1000, '...') !!}</p>
                            <p><a type="button" class="btn btn-info" href="{{ route('blog', $blog->id) }}">View Details</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="accordion-item" style="display: none;">
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Why do we use it?
                            </button>
                        </div>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>It is a long established fact that a reader will be distracted by the readable content of
                                    a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                    more-or-less normal distribution of letters, as opposed to using 'Content here, content
                                    here', making it look like readable English. Many desktop publishing packages and web
                                    page editors now use Lorem Ipsum as their default model text, and a search for 'lorem
                                    ipsum' will uncover many web sites still in their infancy. Various versions have evolved
                                    over the years, sometimes by accident, sometimes on purpose</p>
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
