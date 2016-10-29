@extends('main')

@section('title', '| Login')

@section('content')

	<div class="row">
		<ul class="nav nav-tabs" style="margin-bottom: 100px;">
			<li role="presentation" class="active"><a href="{{ route('login') }}">Login</a></li>
			<li role="presentation"><a href="{{ route('register') }}">Register</a></li>
		</ul>
		<div class="col-md-6 col-md-offset-3">
			<div class="ad-well">
				{!! Form::open() !!}
					{{ Form::label('email', 'Email:') }}
					{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email...', 'style' => 'margin-bottom: 15px;', 'autofocus']) }}
					{{ Form::label('password', 'Password:') }}
					{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'password...', 'style' => 'margin-bottom: 15px;']) }}
					{{Form::checkbox('remember')}}
					{{Form::label('remember', 'Keep me logged in.')}}<br>
					{{ Form::submit('Login', ['class' => 'btn btn-success']) }}<br>
					<a href="{{ url('password/reset') }}">Forgot Password?</a>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection