@extends('main')

@section('title', 'Create new Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
	<style type="text/css">
		form > select + span {
			width: 100%!Important;
		}
	</style>

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create new Post</h1><hr>
			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'title...', 'required' => '', 'maxlength' => '255')) }}
				{{ Form::label('slug', 'Url you want to show this post:') }}
				{{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'url...', 'required' => '', 'maxlength' => '255', 'minlength' => '5']) }}
				{{Form::label('category_id', 'Category:')}}
				<select class="form-control" name="category_id">
					@foreach ($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
				{{Form::label('tags', 'Tag:')}}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach ($tags as $tag)
						<option value="{{$tag->id}}">{{$tag->name}}</option>
					@endforeach
				</select>
				{{ Form::label('body', 'Post Body:') }}
				{{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'post body...', 'required' => '')) }}
				{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection