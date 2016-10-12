@extends('main')

@section('title', 'Create new Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create new Post</h1><hr>
			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'title...', 'required' => '', 'maxlength' => '255')) }}
				{{ Form::label('body', 'Post Body:') }}
				{{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'post body...', 'required' => '')) }}
				{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection