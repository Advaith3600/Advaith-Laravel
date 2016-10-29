@extends('main')

@section('title', '| Register') 

@section('content')

	<div class="row">
		<ul class="nav nav-tabs" style="margin-bottom: 100px;">
			<li role="presentation"><a href="{{ route('login') }}">Login</a></li>
			<li role="presentation" class="active"><a href="{{ route('register') }}">Register</a></li>
		</ul>
		<div class="col-md-6 col-md-offset-3">
			<div class="ad-well">
				{!! Form::open() !!}
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control', 'style' => 'margin-bottom: 15px;', 'placeholder' => 'name...', 'autofocus']) }}
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email', null, ['class' => 'form-control', 'style' => 'margin-bottom: 15px;', 'placeholder' => 'email...']) }}
					{{ Form::label('password', 'Password:') }}
					{{ Form::password('password', ['class' => 'form-control', 'style' => 'margin-bottom: 15px;', 'placeholder' => 'password....']) }}
					{{ Form::label('password_confirmation', 'Re-enter Your Password') }}
					{{ Form::password('password_confirmation', ['class' => 'form-control', 'style' => 'margin-bottom: 15px;', 'placeholder' => 'renter your passsword...']) }}
					{{ Form::submit('Register', ['class' => 'btn btn-success']) }}
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection