<!DOCTYPE html>
<html>
<head>
    @include('partials._head')
</head>
<body>
    <nav class="navbar navbar-default w3-card-2 w3-green w3-animate-opacity" style="border-color: transparent; margin: 0; border-radius: 0;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/" style="color: #fff">Advaith-Social Media</a>
            </div>
        </div>
    </nav>
    <div class="bgimg-1 w3-display-container">
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-bottom">Login</span>
        </div>
    </div>
    <div class="w3-display-container w3-white">
        <div style="white-space:nowrap;" class="container slideanim">
            <h2>Already have an account?</h2><hr>
            <div class="col-md-8 col-md-offset-2 w3-margin-bottom">
                {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                    <div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
                        {{ Form::label('email', 'Enter Your Email...', ['class' => 'control-label']) }}
                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email...', 'value' => old('email')]) }}
                        <span class="{{ $errors->has('email') ? 'glyphicon glyphicon-remove form-control-feedback' : '' }}"></span>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error has-feedback' : '' }}">
                        {{ Form::label('password', 'Enter Your Password...', ['class' => 'control-label']) }}
                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'password...']) }}
                        <span class="{{ $errors->has('password') ? 'glyphicon glyphicon-remove form-control-feedback' : '' }}"></span>
                    </div>
                    <a href="{{ url('/password/reset') }}">Forgot Password?</a><br>
                    {{ Form::submit('Log in', ['class' => 'btn btn-success w3-margin-top']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="bgimg-2 w3-display-container">
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide slideanim">Register</span>
        </div>
    </div>
    <div class="w3-display-container w3-white">
        <div style="white-space:nowrap;" class="container slideanim">
            <h2>New Here?</h2><hr>
            <div class="col-md-8 col-md-offset-2 w3-margin-bottom">
                {!! Form::open(['route' => 'register']) !!}
                    <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                        {{ Form::label('name', 'Username...', ['class' => 'control-label']) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'username...']) }}
                        <span class="{{ $errors->has('name') ? 'glyphicon glyphicon-remove form-control-feedback' : '' }}"></span>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
                        {{ Form::label('email', 'Email...', ['class' => 'control-label']) }}
                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email...']) }}
                        <span class="{{ $errors->has('email') ? 'glyphicon glyphicon-remove form-control-feedback' : '' }}"></span>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error has-feedback' : '' }}">
                        {{ Form::label('password', 'Password...', ['class' => 'control-label']) }}
                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'passsword...']) }}
                        <span class="{{ $errors->has('password') ? 'glyphicon glyphicon-remove form-control-feedback' : '' }}"></span>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error has-feedback' : '' }}">
                        {{ Form::label('password_confirmation', 'Confirm Password...', ['class' => 'control-label']) }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'confirm password...']) }}
                        <span class="{{ $errors->has('password') ? 'glyphicon glyphicon-remove form-control-feedback' : '' }}"></span>
                    </div>
                    {{ Form::submit('Sign Up', ['class' => 'btn btn-success w3-margin-top']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <footer class="w3-center w3-padding-16 w3-opacity w3-hover-opacity-off" style="background-color: green; color: #fff;">
        <div class="w3-xlarge">
            <a style="color: #fff; font-size: 40px; margin: 10px;" href="#" class="w3-hover-text-indigo"><i class="fa fa-facebook-official"></i></a>
            <a style="color: #fff; font-size: 40px; margin: 10px;" href="#" class="w3-hover-text-light-blue"><i class="fa fa-twitter"></i></a>
            <a style="color: #fff; font-size: 40px; margin: 10px;" href="#" class="w3-hover-text-indigo"><i class="fa fa-linkedin"></i></a>
        </div>
        <p>Copyright © 2016 | All rights reserved | Developed by <a href="http://advaitharunjeena.wixsite.com/advaith" style="color: #fff;">Advaith A J</a></p>
    </footer>
    @include('partials._message')
</body>
</html>