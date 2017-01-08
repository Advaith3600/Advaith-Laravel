@extends('main')

@section('title', "| $question->title")

@section('head')

	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

@endsection

@section('content')
	<div style="z-index: 9; position: fixed; top: 0; left: 0; background: rgba(0, 0, 0, 0.8);; height: 100vh; width: 100vw; display: none;" id="error">
		<div style="position: fixed; top: 20%; left: 20%; width: 60%; height: 60%; z-index: 10; background-color: #ccc; box-shadow: 0 0 5px 5px grey; padding: 20px;">
			<span class="close" style="font-size: 30px;" onclick="$('#error').hide('fast')">&times;</span>
			<div style="font-size: 36px;" id="e-heading"></div>
			<div style="font-size: 25px; margin-top: 10px;" id="e-body"></div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<h2>{{ $question->title }}</h2>
			<hr>
		</div>
		<div class="col-md-8">
			<div style="display: block;">
				<div style="width: 10%; display: inline-block; float: left; padding: 5px;" class="text-center" id="qvote">
					<?php
						if (Auth::check() && Auth::user()->email == $question->user->email) {
							echo '<span class="glyphicon glyphicon-chevron-up" style="font-size: 50px; color: #bbb;"></span>';
						}
						else if ($question->qvotes()->count() > 0) {
							foreach ($question->qvotes as $qvote) {
								if (Auth::check() && Auth::user()->email == $qvote->user->email) {
									echo '<span class="glyphicon glyphicon-chevron-up" style="font-size: 50px; color: orange;"></span>';
									break;
								}
								else {
									echo '<a href="#" style="color: #bbb;"><span class="glyphicon glyphicon-chevron-up" style="font-size: 50px;"></span></a>';
									break;
								}
							}
						}
						else {
							echo '<a href="#" style="color: #bbb;"><span class="glyphicon glyphicon-chevron-up" style="font-size: 50px;"></span></a>';
						}
					?>
					<h2 style="margin: 0;">{{ $question->qvotes()->count() }}</h2>
				</div>
				<div style="width: 90%; display: inline-block; float: right;" id="question">
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
									@if (Auth::user()->email == $question->user->email)
										<a href="{{ route('questions.delete', $question->id) }}">Delete</a>
									@endif
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
								<a href="{{ route('users.show', $question->user->id) }}">
									<img src="{{ $question->user->pro_pic }}" alt="profile picture" width="50" height="50">
									<div style="display: inline-block; vertical-align: middle;">
										<div>{{ $question->user->reputation }}</div>
										{{ $question->user->name }}
									</div>
								</a>
							</div>
						</div>
					</div>
					<hr style="margin-top: 100px;">
				</div>
			</div>
			<div><br>
				<h1>{{ $question->answers()->count() }} {{ $question->answers()->count() > 1 ? 'answers' : 'answer' }}</h1> <hr>
				@foreach ($question->answers as $answer)
					<div>
						{!! $answer->answer !!}
						<div style="float: right;" class="ad-user-info">
							<small><?php
								$full = false;
								$now = new DateTime;
								$ago = new DateTime($answer->created_at);
								$diff = $now->diff($ago);
								$diff->w = floor($diff->d / 7);
								$diff->d -= $diff->w * 7;
								$string = array(
									'y' => 'year',
									'm' => 'month',
									'w' => 'week',
									'd' => 'day',
									'h' => 'hour',
									'i' => 'minute',
									's' => 'second',
								);
								foreach ($string as $k => &$v) {
									if ($diff->$k) {
										$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
									} else {
										unset($string[$k]);
									}
								}
								if (!$full) $string = array_slice($string, 0, 1);
								echo $string ? implode(', ', $string) . ' ago' : 'just now';
							?></small>
							<br>
							<a href="{{ route('users.show', $answer->user->id) }}">
								<img src="{{ $answer->user->pro_pic }}" alt="profile picture" width="50" height="50">
								<div style="display: inline-block; vertical-align: middle;">
									<div>{{ $answer->user->reputation }}</div>
									{{ $answer->user->name }}
								</div>
							</a>
						</div>
						<div>
							<small><a href="{{ route('answers.edit', $answer->id) }}">Edit</a></small>
							@if (!Auth::guest())
								@if (Auth::user()->id == $answer->user_id)
									<small><a href="{{ route('answers.delete', $answer->id) }}">Delete</a></small>
								@endif
							@endif
						</div>
					</div><hr style="margin-top: 100px;">
				@endforeach
			</div>
			<div>
				<h3>Your Answer</h3>
				{!! Form::open(['route' => ['answers.store', $question->id]]) !!}
					{{ Form::textarea('answer', null, ['class' => 'form-control']) }}
					{{ Form::submit('Post your answer', ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px;']) }}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="col-md-4">

	</div>

@endsection

@section('js')

	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script>
		CKEDITOR.replace( 'answer', {
			toolbar : [
				{ name: 'document', items : [ 'NewPage','Preview' ] },
				{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
				{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
				{ name: 'insert', items : [ 'Image','HorizontalRule','Smiley','SpecialChar'] },
		                '/',
				{ name: 'styles', items : [ 'Styles','Format', 'Source' ] },
				{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
				{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
				{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
				{ name: 'tools', items : [ 'Maximize' ] }
			]
		});
		$('#qvote > a').click(function(e) {
			e.preventDefault();
			@if (Auth::check())
				$request = {
					_token: '{{ csrf_token() }}',
					user_id: {{ Auth::user()->id }},
					question_id: {{ $question->id }},
				}
				$.post("{{url('/qvote')}}", $request, function(result) {
			        $('#qvote h2').html(result);
					$('#qvote a span').css('color', 'orange');
					$('#qvote a span').unwrap();
			    });
			@else
				$('#error').show('fast');
				var er = $('#error #e-heading');
				er.css('border-bottom', '2px solid red');
				er.css('color', 'red');
				er.html('Error!');
				$('#error #e-body').html('Please <a href="/login">sign in</a> to vote');
			@endif
		})
		$('#qvote').css('height', $('#question').height());
	</script>

@endsection
