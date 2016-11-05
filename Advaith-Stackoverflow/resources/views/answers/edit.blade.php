@extends('main')

@section('title', "| Edit Answer")

@section('head')

	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

@endsection

@section('content')

	<div>
		{!! Form::model($answer, ['route' => ['answers.update', $answer->id], 'method' => 'PUT']) !!}
			{{ Form::label('answer', 'Answer:') }}
			{{ Form::textarea('answer', null, ['class' => 'form-control']) }}
			{{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top: 10px;']) }}
			{{ Form::hidden('question', $answer->question_id) }}
		{!! Form::close() !!}
	</div>

@endsection

@section('js')

	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script>
		CKEDITOR.replace( 'answer', {
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
	</script>

@endsection