@extends('layouts.creator')

@section('title', 'Welcome to Collab Marketplace Campaigns')

@if($information->meta_description) @section('meta_description'){{ $information->meta_description }}@endsection @endif
@if($information->meta_description) @section('meta_title'){{ $information->meta_title }}@endsection @endif
@section('content')

<section class="productlist informationpage">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-12 hidden-xs">
                <div class="informationcontent">
                <h1>{{ $information->name }}</h1>
                <p>{!! $information->editor !!}</p>

                @if($information->name == 'Contact Us')
                <br></br>
                <br></br>
                <br></br>
                <br></br>
                <a href="/support" class="nav-link btn btn-primary">Support</a>
                @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')

@endpush
