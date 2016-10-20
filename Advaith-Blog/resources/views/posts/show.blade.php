@extends('main')

@section('title', 'View Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class="lead">{!! $post->body !!}</p>
			<hr>
			<div class="tags">
				@foreach ($post->tags as $tag)
					<span class="label label-default" style="margin-right: 5px;">
						{{$tag->name}}
					</span>
				@endforeach
			</div>
			<div style="margin-top: 50px;" id="backend-comments">
				<h3>Comments <small>( {{ $post->comments()->count() }} comments total )</small></h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($post->comments as $comment)
						<tr>
							<td>{{$comment->name}}</td>
							<td>{{$comment->email}}</td>
							<td>{{$comment->comment}}</td>
							<td>
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Url: </dt>
					<dd><a href="{{ url('blog/'.$post->slug) }}">{{ $post->slug }}</a></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Category: </dt>
					<dd>{{$post->category->name}}</dd>
				</dl>
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
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
							{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
						{!! Form::close() !!}
					</div>
					<div class="col-md-12">
						<a href="{{route('posts.index')}}" class="btn btn-default btn-block" style="margin-top: 20px;"><< Go Back</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection