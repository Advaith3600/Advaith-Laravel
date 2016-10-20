@extends('main')

@section('title', 'Delete Comment')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>ARE YOU SURE YOU WANT TO DELETE?</h1>
			<p>
				<strong>Name: </strong>{{$comment->name}}<br>
				<strong>Comment: </strong>{{$comment->comment}}
			</p>
			{{Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE'])}}
				{{Form::submit('Delete', ['class' => 'btn btn-block btn-danger'])}}
			{{Form::close()}}
		</div>
	</div>

@endsection