@extends('main')

@section('title', '| Create a new Questions')

@section('head')
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	<style>
		form > select + span {
			width: 100%!Important;
			margin-bottom: 15px!Important;
		}
		form > select + span > span > span {
			border: 1px solid #ccd0d2!Important;
		}
	</style>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8">
			{!! Form::open(['route' => 'questions.store', 'method' => 'POST']) !!}

				{{ Form::label('title', 'Title: ') }}
				{{ Form::text('title', null, ['class' => 'form-control', 'style' => 'margin-bottom: 15px', 'placeholder' => "What's your programming question? Be specific...."]) }}

				{{ Form::label('question', 'Question:') }}
				{{ Form::textarea('question', null, ['class' => 'form-control', 'style' => 'margin-bottom: 15px', 'placeholder' => 'question...', 'autofocus']) }}

				{{ Form::label('tags', 'Tags:') }}
				<select name="tags[]" class="form-control select2-ad" multiple="multiple">
					@foreach ($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>

				{{ Form::submit('Post your Question', ['class' => 'btn btn-primary']) }}
			{!! Form::close() !!}
		</div>
		<div class="col-md-4">
			
		</div>
	</div>

@endsection

@section('js')
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script>
		$('.select2-ad').select2();
	</script>
@endsection