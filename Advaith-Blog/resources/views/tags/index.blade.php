@extends('main')

@section('title', 'All Tags')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tags as $tag)
						<tr>
							<th>{{$tag->id}}</th>
							<td>{{$tag->name}}</td>
							<td><a href="{{route('tags.show', $tag->id)}}" class="btn btn-default btn-sm">View</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<div class="well">
				{!!Form::open(['route' => 'tags.store', 'method' => 'POST'])!!}
					<h2>New Tag</h2>
					{{Form::label('name', 'Name:')}}
					{{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name..'])}}

					{{Form::submit('Create new Tag', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top: 20px;'])}}
				{!!Form::close()!!}
			</div>
		</div>
	</div>

@endsection