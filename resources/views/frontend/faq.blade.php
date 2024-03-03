@extends('layouts.app')
@section('title', 'Frequently Asked Questions | winwinpromo')
@section('description', 'Frequently asked questions when using winpromo. Find influencers to create Instagram, TikTok, YouTube and User Generated Content | winwinpromo')


@section('content')

<div class="faqpage">
    <div class="faq">
        <div class="container">
            <h1>Frequently Asked Questions</h1>
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
