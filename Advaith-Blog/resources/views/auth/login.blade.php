@extends('main')

@section('title', 'Login')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!!Form::open()!!}

				{{Form::label('email', 'Email:')}}
				{{Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email...'])}}

				{{Form::label('password', 'Password:')}}
				{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'password...'])}}
				<br>
				{{Form::checkbox('remember')}}
				{{Form::label('remember', 'Keep me logged in.')}}

				{{Form::submit('Login', ['class' => 'btn btn-primary btn-block'])}}

				<p><a href="{{url('password/reset')}}">Forgot Password?</a></p>

			{!!Form::close()!!}
		</div>
	</div>

@endsection