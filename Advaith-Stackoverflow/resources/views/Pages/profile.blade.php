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
						<img src="{{ Auth::user()->pro_pic }}" alt="profile picture" id="image">
						<h3 style="margin-bottom: 0;">{{ Auth::user()->name }}</h3>
						<h4 style="margin-bottom: 0;">{{ Auth::user()->reputation }}</h4>
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
				@else
					{!! Auth::user()->bio !!}
				@endif
			</div>
			<div class="ad-bd" style="margin-bottom: 20px;">
				<div>
				  	<ul class="nav nav-tabs" role="tablist">
				    	<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Questions</a></li>
				    	<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Answers</a></li>
				  	</ul>
				  	<div class="tab-content">
				    	<div role="tabpanel" class="tab-pane fade in active" id="home" style="padding-top: 20px;">
							{{ Auth::user()->questions()->count() }} Questions asked
							@if (Auth::user()->questions()->count() > 0)
								@foreach (Auth::user()->questions as $question)
									<hr>
									<ul>
										<li class="ad-q">
											<a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a>
											&nbsp; <span class="badge" style="background-color: #5fba7d; border-radius: 4px; width: 30px;">{{ $question->qvotes()->count() }}</span>
											<br>
											@foreach ($question->tags as $tag)
												<a href="{{ route('tags.show', $tag) }}" class="ad-btn-label">{{ $tag->name }}</a>
											@endforeach
										</li>
									</ul>
								@endforeach
							@endif
				    	</div>
				    	<div role="tabpanel" class="tab-pane fade" id="profile" style="padding-top: 20px;">
							{{ Auth::user()->answers()->count() }} {{ Auth::user()->answers()->count() > 1 ? 'answers' : 'answer' }}
							@if (Auth::user()->answers()->count() > 0)
								@foreach (Auth::user()->answers as $answer)
									<hr>
									<ul>
										<li>
											<a href="{{ route('questions.show', $answer->question->id) }}">{{ $answer->question->title }}</a>
											&nbsp; <span class="badge" style="background-color: #5fba7d; border-radius: 4px; width: 30px;">{{ $answer->avotes()->count() }}</span>
										</li>
									</ul>
								@endforeach
							@endif
				    	</div>
				  	</div>
				</div>
			</div>
			<div class="ad-bd">
				Joined before
				<?php
					$time = strtotime(Auth::user()->created_at);

					echo created_at($time).' ago';

					function created_at($time) {

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
				Last login was
				<?php
					$time = strtotime(Auth::user()->updated_at);

					echo viewed_at($time).' ago';

					function viewed_at($time) {

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
				Last profile edit was
				<?php
					$time = strtotime(Auth::user()->updated_at);

					echo updated_at($time).' ago';

					function updated_at($time) {

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
