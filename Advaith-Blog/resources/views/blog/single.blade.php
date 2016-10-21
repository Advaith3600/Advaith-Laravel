@extends('main')

@section('title', "$post->title")

@section('stylesheets')

	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<img src="{{asset('images/Comment/' . $post->image)}}" alt="Image" width="100%" height="400">
			<h1>{{$post->title}}</h1>
			<p>{!!$post->body!!}</p>
			<hr>
			<p>
				Posted In: {{ $post->category->name }}
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="comment-title"><span class="glyphicon glyphicon-comment"></span> {{$post->comments->count()}} Comments</h2>
			@foreach ($post->comments as $comment)
				<div class="comment">

					<div class="author-info">
						<img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid"}}" alt="author-image" class="author-image">
						<div class="author-name">
							<h4>{{$comment->name}}</h4>
							<p class="author-time">{{date("F nS Y - G:iA", strtotime($comment->created_at))}}</p>
						</div>
					</div>


					<div class="comment-content">
						{{$comment->comment}}
					</div>


				</div>
			@endforeach
		</div>
	</div>
	<div class="row" style="margin-top: 50px;">
		<div id="comment-form" class="col-md-8 col-md-offset-2 well">
			{!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) !!}
				<div class="row">
					<div class="col-md-6">
						{{Form::label('name', 'Name:')}}
						{{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name...'])}}
					</div>
					<div class="col-md-6">
						{{Form::label('email', 'Email:')}}
						{{Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email...'])}}
					</div>
					<div class="col-md-12">
						{{Form::label('comment', 'Comment:')}}
						{{Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'comment...', 'rows' => '5'])}}
						{{Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;'])}}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection
