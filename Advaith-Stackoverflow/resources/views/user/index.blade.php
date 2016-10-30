@extends('main')

@section('title', '| All users')

@section('content')

	<div class="row">
		<div class="col-md-12">
			@foreach ($users as $user)
				<div class="ad-user">
					<img src="{{ $user->pro_pic }}" alt="avatar" style="margin-right: 15px;" width="50" height="50">
					<a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
				</div>
			@endforeach
		</div>
	</div>

@endsection