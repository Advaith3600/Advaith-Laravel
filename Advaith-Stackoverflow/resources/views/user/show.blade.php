@extends('main')

@section('title', "| $user->name")

@section('content')

	<div class="col-md-12 row" style="margin-top: 100px;">
		<div class="col-md-4">
			<div class="ad-img-holder">
				<div class="ad-img-container">
					<a href="" style="text-decoration: none;">
						<img src="{{ $user->pro_pic }}" alt="profile picture" width="200" height="200">
						<h3 style="margin-bottom: 0;">{{ $user->name }}</h3>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<h2><b>{{ $user->email }}</b></h2>
			<div class="ad-bd" style="margin-bottom: 20px;">
				<h4>Bio:</h4><hr>
				@if ($user->bio == null)
					<small>No bio was created</small>
				@else
					{!! $user->bio !!}
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
			<div class="ad-bd">
				Joined on
				<?php 
					$time = strtotime($user->created_at);

					echo created_at($time).' ago';

					function created_at ($time){

					    $time = time() - $time;
					    $time = ($time<1)? 1 : $time;
					    $tokens = array (
					        31536000 => 'year',
					        2592000 => 'month',
					        604800 => 'week',
					        86400 => 'day',
					        3600 => 'hour',
					        60 => 'minute',
					        1 => 'second'
					    );

					    foreach ($tokens as $unit => $text) {
					        if ($time < $unit) continue;
					        $numberOfUnits = floor($time / $unit);
					        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
					    }

					}
				?>
				<hr>
				Last profile edited 
				<?php 
					$time = strtotime($user->updated_at);

					echo updated_at($time).' ago';

					function updated_at ($time){

					    $time = time() - $time;
					    $time = ($time<1)? 1 : $time;
					    $tokens = array (
					        31536000 => 'year',
					        2592000 => 'month',
					        604800 => 'week',
					        86400 => 'day',
					        3600 => 'hour',
					        60 => 'minute',
					        1 => 'second'
					    );

					    foreach ($tokens as $unit => $text) {
					        if ($time < $unit) continue;
					        $numberOfUnits = floor($time / $unit);
					        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
					    }

					}
				?>
			</div>
		</div>	
	</div>

@endsection