@extends('main')

@section('title', "| Edit Question - $question->title")

@section('head')
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	<style>
		form > select + span {
			width: 100%!Important;
			margin-bottom: 15px!Important;
		}
		form > select + span > span > span {
			border: 1px solid #ccd0d2!Important;
		}
	</style>
@endsection

@section('content')

	<div class="col-md-8">
		{!! Form::model($question, ['route' => ['questions.update', $question->id] ,'method' => 'PUT']) !!}

			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => "What's your programming question? Be specific....", 'style' => 'margin-bottom: 20px;']) }}

			{{ Form::label('question', 'Question:') }}
			{{ Form::textarea('question', null, ['class' => 'form-control', 'placeholder' => 'question...', 'style' => 'margin-bottom: 20px;']) }}

			{{ Form::label('tags', 'Tags:') }}
			{{ Form::select('tags[]', $tags, null, ['class' => 'select2-ad form-control', 'multiple' => 'multiple']) }}

			{{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
			{!! Html::linkRoute('questions.show', 'Cancel', array($question->id), array('class' => 'btn btn-danger')) !!}

			{{ Form::hidden('slug', null, ['id' => 'slug']) }}

		{!! Form::close() !!}
	</div>

@endsection

@section('js')
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script>
		$('.select2-ad').select2();
		$('.select2-ad').select2().val({!! json_encode($question->tags()->getRelatedIds()) !!}).trigger('change');
		CKEDITOR.replace( 'question', {
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
		$('form').submit(function() {
			var str = $('#title').val().replace(/[^a-zA-Z ]/g, "");
			$('#title').val(str);
			$('#slug').val(getWords(str));
			function getWords(str) {
				str = str.split(/\s+/).slice(0,5).join(" ");
				str = str.replace(/\s+/g, '-').toLowerCase();
				return str;
			}
		});
	</script>
@endsection
