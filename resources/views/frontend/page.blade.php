@extends('layouts.app')

@if($information->meta_title) @section('title'){{ $information->meta_title ?? 'Welcome to Collab Marketplace Ad Campaigns'}}@endsection @endif
@if($information->meta_description) @section('description'){{ $information->meta_description }}@endsection @endif

@section('content')

<section class="productlist informationpage">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-12 hidden-xs">
                <div class="informationcontent">
                <h1>{{ $information->name }}</h1>
                <p>{!! $information->editor !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')

@endpush
