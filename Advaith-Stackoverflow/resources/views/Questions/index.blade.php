@extends('main')

@section('title', '| All Questions')

@section('head')

	<style>
		.ad-links > .pagination {
			margin: 0;
		}
	</style>

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">
					@foreach ($questions as $question)
						<div class="panel panel-info">
							<div class="panel-heading">
								<b><a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a></b>
							</div>
							<div class="panel-body">
								{{ substr(strip_tags($question->question), 0, 150) }}{{ strlen(strip_tags($question->question)) > 150 ? "....." : "" }}
							</div>
							<div class="panel-footer">
								<div class="text-right">
									By: {{ $question->user->name }}
								</div>
							</div>
						</div>
					@endforeach
				</div>
				@if (count($questions) > 10)
					<div class="panel-footer ad-links">
						{!! $questions->links() !!}
					</div>
				@endif
			</div>
		</div>
		<div class="col-md-4">

		</div>
	</div>

@endsection
