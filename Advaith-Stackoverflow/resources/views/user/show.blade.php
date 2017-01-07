@extends('main')

@section('title', "| $user->name")

@section('content')

	<div class="col-md-12 row" style="margin-top: 100px;">
		<div class="col-md-4">
			<div class="ad-img-holder">
				<div class="ad-img-container">
					<a href="" style="text-decoration: none;">
						<img src="{{ $user->pro_pic }}" alt="profile picture" id="image">
						<h3 style="margin-bottom: 0;">{{ $user->name }}</h3>
						<h4 style="margin-bottom: 0;">{{ $user->reputation }}</h4>
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
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Questions</a></li>
					<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Answers</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home" style="padding-top: 20px;">
						{{ $user->questions()->count() }} Questions asked
						@if ($user->questions()->count() > 0)
							@foreach ($user->questions as $question)
								<hr>
								<ul>
									<li class="ad-q">
										<a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a><br>
										@foreach ($question->tags as $tag)
											<a href="{{ route('tags.show', $tag) }}" class="ad-btn-label">{{ $tag->name }}</a>
										@endforeach
									</li>
								</ul>
							@endforeach
						@endif
					</div>
					<div role="tabpanel" class="tab-pane" id="profile" style="padding-top: 20px;">
						{{ $user->answers()->count() }} {{ $user->answers()->count() > 1 ? 'answers' : 'answer' }}
						@if ($user->answers()->count() > 0)
							@foreach ($user->answers as $answer)
								<hr>
								<ul>
									<li>
										<a href="">{{ $answer->question->title }}</a>
									</li>
								</ul>
							@endforeach
						@endif
					</div>
				</div>
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

@section('js')

	<script>
		var img = $('#image');
		if (img.attr('src').startsWith('https://www.gravatar.com/avatar/') || img.attr('src').startsWith('http://www.gravatar.com/avatar/')) {
			img.attr('src', img.attr('src') + '&s=200');
		}
		else {
			img.attr('width', 200);
			img.attr('height', 200);
		}
	</script>

@endsection
