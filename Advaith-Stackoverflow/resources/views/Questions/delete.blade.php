@extends('main')

@section('title', "| Delete Question - $question->title")

@section('content')

	<div class="row">
		<div class="col-md-12 text-center">
			<h1>
				Are You sure you want to delete the following question?
			</h1><br><br>
			<h3>
				{{ $question->title }}
				<hr>
				{{ $question->question }}
			</h3>
			{!! Form::open(['method' => 'DELETE', 'route' => ['questions.destroy', $question->id]]) !!}
				{{ Form::submit('Delete', ['class' => 'btn-block btn btn-danger']) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection