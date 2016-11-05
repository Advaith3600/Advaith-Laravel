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
				<div class="text-left">{!! $question->question !!}</div>
			</h3>
			{!! Form::open(['method' => 'DELETE', 'route' => ['questions.destroy', $question->id]]) !!}
				@if (Auth::guest())
				@else
					@foreach ($users as $user)
						@if (Auth::user()->email == $user->email)
							{{ Form::submit('Delete', ['class' => 'btn-block btn btn-danger']) }}
						@endif
					@endforeach
				@endif
			{!! Form::close() !!}
		</div>
	</div>

@endsection