<!DOCTYPE html>
<html>
	<head>
		@include('partials._head')
	</head>
	<body>
		@include('partials._nav')
		<div class="container w3-margin-top w3-margin-bottom">
			<div class="col-md-8 col-md-offset-2">
				<div class="w3-container w3-white w3-card-2 w3-margin-top w3-padding">
					<div style="margin-bottom: 10px;">
						<a href="" style="color: #222; text-decoration: none;"><i class="fa fa-camera-retro"></i> Add photo</a>
					</div>
					<img src="{{ Auth::user()->pro_pic }}" alt="" width="50" height="50" class="w3-margin-0" style="vertical-align: top;" draggable="false">
					{!! Form::open(['style' => 'display: inline-block; width: calc(100% - 55px);', 'route' => ['posts.store', Auth::user()->id]]) !!}
						{{ Form::text('title', null, ['style' => 'outline: none; border: none; border-bottom: 1px solid #444; margin-left: 10px; width: calc(100% - 10px);', 'placeholder' => 'title', 'id' => 'title']) }}
						{{ Form::textarea('body', null, ['style' => 'height: 50px; min-width: 100%; max-width: 100%; border: none; outline: none; padding-left: 10px;', 'placeholder' => "What's on your mind?", 'onkeyup' => 'textAreaAdjust(this)', 'id' => 'post']) }}
						{{ Form::hidden('slug', null, ['id' => 'slug']) }}
						<div class="text-center">
							{{ Form::submit('Post', ['class' => 'w3-indigo w3-btn']) }}
						</div>
					{!! Form::close() !!}
				</div>
				@foreach ($posts as $post)
					<div class="w3-container w3-white w3-card-2 w3-margin-top w3-padding">
						<img src="{{ $post->user->pro_pic }}" alt="" width="50" height="50" class="w3-margin-0" style="vertical-align: top;" draggable="false">
						<div style="display: inline-block; margin-top: 5px;">
							&nbsp;<b>{{ $post->user->name }}</b> created this post on {{ date('h:i a, M j Y ', strtotime($post->created_at)) }}
						</div>
						<div style="margin-top: 10px;">{!! $post->body !!}</div>
					</div>
				@endforeach
			</div>
		</div>
		@include('partials._message')
		<script>
			function textAreaAdjust(o) {
			  	o.style.height = "1px";
			  	o.style.height = (25+o.scrollHeight)+"px";
			}
			$('form').submit(function() {
				var str = $('#title').val();
				$('#slug').val(getWords(str));
				function getWords(str) {
					str = str.split(/\s+/).slice(0,5).join(" ");
					str = str.replace(/\s+/g, '-').toLowerCase();
				    return str;
				}
			});
		</script>
	</body>
</html>