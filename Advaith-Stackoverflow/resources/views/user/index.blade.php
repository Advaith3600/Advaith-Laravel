@extends('main')

@section('title', '| All users')

@section('content')

	<div class="row">
		<div class="col-md-12">
			@foreach ($users as $user)
				<div class="ad-user">
					<img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($user->name))) . "?s=50&d=identicon"}}" alt="avatar" style="margin-right: 15px;">
					<a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
				</div>
			@endforeach
		</div>
	</div>

@endsection