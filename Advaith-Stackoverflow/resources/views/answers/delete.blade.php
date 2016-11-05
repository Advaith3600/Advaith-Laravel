@extends('main')

@section('title', "| Delete Answer?")

@section('content')

	<div class="row">
		<div class="col-md-12 text-center">
			<h1>
				Are You sure you want to delete the following question?
			</h1><br><br>
			<h3>
				<div class="text-left">{!! $answer->answer !!}</div>
				<small>created by {{ $answer->user_email }}</small>
			</h3>
			{!! Form::open(['method' => 'DELETE', 'route' => ['answers.destroy', $answer->id]]) !!}
				@if (!Auth::guest())
					@if (Auth::user()->email == $answer->user_email)
						{{ Form::submit('Delete', ['class' => 'btn-block btn btn-danger']) }}
					@endif
				@endif
			{!! Form::close() !!}
		</div>
	</div>

@endsection