@extends('main')

@section('title', "| $question->title")

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h2>{{ $question->title }}</h2>
			<hr>
			<div>
				{!! $question->question !!}
			</div>
			<hr>
			<div>
				<div>
					@foreach ($question->tags as $tag)
						<a href="{{ route('tags.show', $tag->id) }}" class="btn ad-btn-label">{{ $tag->name }}</a>
					@endforeach
				</div>
				<hr>
				<div>
					<small>
						<a href="{{ route('questions.edit', $question->id) }}" style="margin-right: 10px;">Edit</a>
						@if (Auth::guest())
						@else
							@foreach ($users as $user)
								@if (Auth::user()->email == $user->email)
									<a href="{{ route('questions.delete', $question->id) }}">Delete</a>
								@endif
							@endforeach
						@endif
					</small>
					<div style="float: right;" class="ad-user-info">
						<small>
							asked 
							<?php 
								$time = strtotime($question->created_at);

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
						</small><br>
						@foreach ($users as $user)
							<a href="{{ route('users.show', $user->id) }}">
								<img src="{{ $user->pro_pic }}" alt="profile picture" width="50" height="50">
								{{ $user->name }}
							</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			
		</div>
	</div>

@endsection