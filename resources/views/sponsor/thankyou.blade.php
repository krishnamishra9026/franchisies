@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Thankyou')

@section('content')

<div class="success">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-12">
				<div class="card">
			      <div class="check-icon">
			        <i class="checkmark">✓</i>
			      </div>
			        <h1>Success</h1> 
			        <p>Thanks for upgrading your profile. Please allow us 2-5 business days for verification and we will put you on top of the listing.</p>
			        <div class="findButton">
						<a href="{{ route('home') }}" class="btn btn-primary btn-lg">Back to Home</a>
					</div>
			      </div>
			</div>
		</div>
	</div>
</div>


@endsection
