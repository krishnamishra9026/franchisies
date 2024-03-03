@extends('layouts.creator')
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
			        <p>Thank you for your upgrading your profile. We are honored to gain you as a premium customer and hope to serve you for a long time.</p>
			        <div class="findButton">
						<a href="{{ route('creator.dashboard') }}" class="btn btn-primary btn-lg">Back to Home</a>
					</div>
			      </div>
			</div>
		</div>
	</div>
</div>


@endsection
