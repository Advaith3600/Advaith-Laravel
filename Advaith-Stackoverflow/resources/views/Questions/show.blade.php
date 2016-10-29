@extends('main')

@section('title', "| $question->title")

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h2>{{ $question->title }}</h2>
			<hr>
			<div>
				{{ $question->question }}
			</div>
			<hr>
			<div>
				<div>
					@foreach ($question->tags as $tag)
						<a href="{{ route('tags.show', $tag->id) }}" class="btn ad-btn-label">{{ $tag->name }}</a>
					@endforeach
				</div>
				<hr>
				<small>
					<a href="{{ route('questions.edit', $question->id) }}" style="margin-right: 10px;">Edit</a>
					<a href="{{ route('questions.delete', $question->id) }}">Delete</a>
				</small>
			</div>
		</div>
		<div class="col-md-4">
			
		</div>
	</div>

@endsection