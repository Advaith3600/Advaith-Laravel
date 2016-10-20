@extends('main')

@section('title', 'Edit Post')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}
	<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
	<script>
		tinymce.init({ 
			selector:'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>
	<style type="text/css">
		span.select2.select2-container.select2-container--default {
			width: 100%!Important;
		}
	</style>

@endsection

@section('content')

	<div class="row">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
			<div class="col-md-8">
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control input-lg', 'placeholder' => 'title...')) }}
				{{ Form::label('slug', 'Url:', ['style' => 'margin-top: 20px;']) }}
				{{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'url...']) }}
				{{ Form::label('category_id', 'Category', ['style' => 'margin-top: 20px;']) }}
				{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
				{{ Form::label('tags', 'Tags:', ['style' => 'margin-top: 20px;']) }}
				{{ Form::select('tags[]', $tags, null, ['class' => 'select2-multi form-control', 'multiple' => 'multiple']) }}
				{{ Form::label('body', 'Body:', array('style' => 'margin-top: 20px;')) }}
				{{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'body...')) }}
			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Created At: </dt>
						<dd>{{ date('M j, Y h:i a', strtotime($post->created_at)) }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Last Updated At: </dt>
						<dd>{{ date('M j, Y h:i a', strtotime($post->updated_at)) }}</dd>
					</dl><hr>
					<div class="row">
						<div class="col-sm-6">
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
						</div>
					</div>
				</div>
			</div>
		{!! Form::close() !!}
	</div>

@endsection

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}
	<script type="text/javascript">
		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
	</script>

@endsection