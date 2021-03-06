@extends('main')

<?php $name = Auth::user()->name; ?>

@section('title', "| $name - Edit")

@section('head')

	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet" />

@endsection

@section('content')

	<ul class="nav nav-tabs">
	    <li role="presentation"><a href="{{ route('profile.index') }}">Public profile</a></li>
	    <li role="presentation" class="active"><a href="{{ route('profile.edit') }}">Edit profile</a></li>
	</ul>
	<div class="container-fluid" style="margin-top: 20px;">
	  	<div class="row">
	    	<div class="col-sm-3 col-lg-2">
	      		<nav class="navbar navbar-fixed-side container text-center">
	        		<img src="{{ Auth::user()->pro_pic }}" id="image" style="border-radius: 4px;">
	        		<div>
	        			{!! Form::open(['method' => 'PUT', 'route' => ['profile.image', Auth::user()->id], 'files' => true]) !!}
	        				{{ csrf_field() }}
							<label for="file-upload" class="btn btn-primary btn-block" style="margin-top: 10px; margin-bottom: 10px;">
							    Upload Image
							</label>
							<input id="file-upload" name='pro_pic' type="file" style="display:none;">
							{{ Form::submit('Change Image', ['class' => 'btn btn-success btn-block']) }}
						{!! Form::close() !!}
	        		</div>
	      		</nav>
	    	</div>
	    	<div class="col-sm-9 col-lg-10">
	      		<h2><b>Edit your profile</b></h2>
	      		<hr>
	      		<h4>Public information</h4>
	      		<div style="padding: 30px;">
		      		{!! Form::open(['method' => 'PUT', 'route' => ['profile.details', Auth::user()->id]]) !!}

						{{ Form::label('name', 'Display name') }}
						{{ Form::text('name', Auth::user()->name, ['class' => 'form-control', 'placeholder' => 'name....', 'style' => 'margin-bottom: 20px;']) }}

						{{ Form::label('bio', 'About me') }}
						{{ Form::textarea('bio', Auth::user()->bio, ['class' => 'form-control', 'placeholder' => 'bio....']) }}

						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;']) }}

		      		{!! Form::close() !!}
		      	</div>
	    	</div>
	  	</div>
	</div>

@endsection

@section('js')

	<script>
		CKEDITOR.replace( 'bio', {
			toolbar : [
				{ name: 'document', items : [ 'NewPage','Preview' ] },
				{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
				{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
				{ name: 'insert', items : [ 'Image','HorizontalRule','Smiley','SpecialChar'] },
		                '/',
				{ name: 'styles', items : [ 'Styles','Format', 'Source' ] },
				{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
				{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
				{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
				{ name: 'tools', items : [ 'Maximize' ] }
			]
		});
		var img = $('#image');
		if (img.attr('src').startsWith('https://www.gravatar.com/avatar/') || img.attr('src').startsWith('http://www.gravatar.com/avatar/')) {
			img.attr('src', img.attr('src') + '&s=180');
		}
		else {
			img.attr('width', '100%');
			img.attr('height', 200);
		}
		$('#file-upload').change(function() {
		  	var i = $(this).prev('label').clone();
		  	var file = $('#file-upload')[0].files[0].name;
		  	$(this).prev('label').text(file);
		});
	</script>

@endsection
