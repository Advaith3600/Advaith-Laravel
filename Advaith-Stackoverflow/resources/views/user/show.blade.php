@extends('main')

@section('title', "| $user->name")

@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1>
				{{ $user->name }}
			</h1>
			<hr>
			<h4><b>Email: </b>{{ $user->email }}</h4>
			<h5><b>Last Activity:</b> {{ date('M j, Y', strtotime($user->updated_at)) }}</h5>
			<h5><b>Created at:</b> {{ date('M j, Y', strtotime($user->created_at)) }}</h5>
		</div>
	</div>

@endsection