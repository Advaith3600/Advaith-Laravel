@extends('main')

@section('title', '| All Tags')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>Tag name</th>
					<th>Tag description</th>
					<th></th>
				</thead>
				<tbody>
					@foreach ($tags as $tag)
						<tr>
							<th>{{ $tag->name }}</th>
							<td>{{ $tag->about_tag }}</td>
							<td><a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default">View</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-12">
			<div class="well">
				<div class="panel panel-default">
					<div class="panel-heading">
						Create a new Tag
					</div>
					<div class="panel panel-body">
						{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
							{{ Form::label('name', 'Name of your tag') }}
							{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name...', 'style' => 'margin-bottom: 15px;']) }}
							{{ Form::label('about_tag', 'Description your tag') }}
							{{ Form::textarea('about_tag', null, ['class' => 'form-control', 'placeholder' => 'description...', 'style' => 'margin-bottom: 15px;']) }}
							{{ Form::submit('Create new Tag', ['class' => 'btn btn-success']) }}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection