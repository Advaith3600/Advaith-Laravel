@extends('main')

@section('title', 'Edit Comment')

@section('content')

	<h2>Edit Comment</h2>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			{{Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT'])}}
				{{Form::label('name', 'Name:')}}
				{{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name...', 'disabled' => ''])}}
				{{Form::label('email', 'Email:')}}
				{{Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email', 'disabled' => ''])}}
				{{Form::label('comment', 'Comment:')}}
				{{Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'comment...'])}}
				{{Form::submit('Update Comment', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;'])}}
		
			{{Form::close()}}
		</div>
	</div>

@endsection