@extends('main')

@section('title', '| Forgot my Password')

@section('content')

	<div class="row">
		<ul class="nav nav-tabs" style="margin-bottom: 100px;">
			<li role="presentation" class="active"><a href="{{ route('login') }}">Login</a></li>
			<li role="presentation"><a href="{{ route('register') }}">Register</a></li>
		</ul>
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Reset Password
				</div>
				<div class="panel-body">
					{!! Form::open(['url' => 'password/reset', 'method' => 'POST']) !!}

						{{Form::hidden('token', $token)}}
					
						{{Form::label('email', 'Email Address:')}}
						{{Form::email('email', $email, ['autofocus', 'class' => 'form-control', 'placeholder' => 'email...'])}}

						{{Form::label('password', 'New Password:')}}
						{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'new password...'])}}

						{{Form::label('password_confirmation', 'Re-enter your password')}}
						{{Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'confirm password...'])}}

						{{Form::submit('Reset Password', ['class' => 'btn btn-primary', 'style' => 'margin-top: 20px;'])}}
	
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>

@endsection