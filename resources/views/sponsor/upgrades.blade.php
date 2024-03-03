@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Upgrades')

@section('content')

<div class="upgrades" id="content">
    <form method="POST" action="{{ route('upgarde-save') }}">
    @csrf
    <div class="container">
        <h1>Choose upgrades for your profile (optional)</h1>

        @if(Session::has('message'))
        <p  class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        
        
        <!-- LOOP STARTS -->
        @if($badges && count($badges))
        @foreach($badges as $badge)
        <div class="upgrade-box">
            <div class="row">
                <div class="col-sm-3">
                    <div class="featured-checkbox">
                        <input type="hidden" value="0" name="badges[checked][{{$badge->id}}]" />

                        @if(in_array($badge->id, $badge_ids??[])) <input type="hidden" value="2" @if(in_array($badge->id, $badge_ids??[])) checked @endif name="badges[checked][{{$badge->id}}]" /> @endif

                        @if(!in_array($badge->id, $badge_ids??[])) <input type="checkbox" value="1" @if(in_array($badge->id, $badge_ids??[])) checked @endif name="badges[checked][{{$badge->id}}]" /> @endif <span style="background-color:{{ $badge->color ?? "#f07238" }}">{{ $badge->name }}</span> @if(in_array($badge->id, $badge_ids??[])) <h6>Activated</h6>@endif

                    </div>
                </div>
                <div class="col-sm-1">
                    @if(isset($badge->icon))
                    <p><img style="max-width: 70px;" src="{{ asset('storage/uploads/badges/original/original_'.$badge->icon)  }}"> </p>
                    @endif
                </div>
                <div class="col-sm-6">
                <p>{{ $badge->description }}</p>
                </div>
                <div class="col-sm-2">
                    <input type="hidden" name="badges[name][{{$badge->id}}]" value="{{ $badge->name }}">
                    <input type="hidden" name="badges[price][{{$badge->id}}]" value="{{ $badge->price }}">
                    <h3>${{ $badge->price }} USD</h3>
                </div>
            </div>
        </div>
        @endforeach
        @else        
        <div class="upgrade-box">
            <div class="row">
                <div class="col-sm-3">
                    <div class="featured-checkbox">
                        <input type="checkbox" /> <span style="background-color:#f07238">Open to Collabs</span>
                    </div>
                </div>
                <div class="col-sm-7">
                    <p>One of our representative will check your profile and featured on our home page to boost your collab. Take out the guess work and save the time with our paid services.</p>
                </div>
                <div class="col-sm-2">
                    <h3>$20 USD</h3>
                </div>
            </div>
        </div>
        @endif

        <div class="text-center mt-4">
            <button type="submit" @if(allBadgesPerchagedSponsor()) disabled @endif class="btn btn-primary">Proceed to buy</button>
            <a href="/home" class="btn btn-default">Skip</a>
        </div>
    </div>
</form>
</div>

@endsection