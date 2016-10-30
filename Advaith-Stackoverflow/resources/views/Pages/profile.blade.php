@extends('main')

<?php $name = Auth::user()->name; ?>

@section('title', "| $name")

@section('content')

	<ul class="nav nav-tabs">
	    <li role="presentation" class="active"><a href="{{ route('profile.index') }}">Public profile</a></li>
	    <li role="presentation"><a href="{{ route('profile.edit') }}">Edit profile</a></li>
	</ul>
	<div class="col-md-12 row" style="margin-top: 100px;">
		<div class="col-md-4">
			<div class="ad-img-holder">
				<div class="ad-img-container">
					<a href="" style="text-decoration: none;">
						<img src="{{ Auth::user()->pro_pic }}" alt="profile picture" width="200" height="200">
						<h3 style="margin-bottom: 0;">{{ Auth::user()->name }}</h3>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<h2><b>{{ Auth::user()->email }}</b></h2>
			<div class="ad-bd" style="margin-bottom: 20px;">
				<h4>Bio:</h4><hr>
				@if (Auth::user()->bio == null)
					<small>No bio was created</small>
				@endif
			</div>
			<div class="ad-bd" style="margin-bottom: 20px;">
				{{ count($questions) }} Questions asked
				@if (count($questions) > 0)
					<hr>
					<ul>
						@foreach ($questions as $question)
							<li class="ad-q">
								<a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a><br>
								@foreach ($question->tags as $tag)
									<a href="" class="ad-btn-label">{{ $tag->name }}</a>
								@endforeach
							</li><hr>
						@endforeach
					</ul>
				@endif
			</div>
		</div>	
	</div>

@endsection