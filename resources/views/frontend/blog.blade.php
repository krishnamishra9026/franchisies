@extends('layouts.app')
@section('title', 'Frequently Asked Questions | Franchisee Bazaar')
@section('description', 'Frequently asked questions when using winpromo. Find influencers to create Instagram, TikTok, YouTube and User Generated Content | Franchisee Bazaar')


@section('content')

<div class="blogpage">
    <div class="blog">
        <div class="container">
            <h1>Blog Detail</h1>
            <div class="row">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $blog->id }}" aria-expanded="true" aria-controls="collapse{{ $blog->id }}">
                                {{$blog->title}}
                            </button>
                        </div>
                        <div id="collapse{{ $blog->id }}" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>{!!$blog->description!!}</p>
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
