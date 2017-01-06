<div class="col-md-12" style="margin-bottom: 25px;">
	<div class="col-md-3"><img src="{{ asset('images/stack.png') }}" alt="" width="100%"></div>
	<div class="col-md-9 ad-text-right" style="margin-top: 22px;">
		<a class="btn ad-btn-primary {{ Request::is('questions') ? 'active' : null }}" href="{{ route('questions.index') }}">Questions</a>
		<a class="btn ad-btn-primary {{ Request::is('users') ? 'active' : null }}" href="{{ route('users.index') }}">Users</a>
		<a class="btn ad-btn-primary {{ Request::is('tags') ? 'active' : null }}" href="{{ route('tags.index') }}">Tags</a>
		<a class="btn ad-btn-primary {{ Request::is('questions/create') ? 'active' : null }}" href="{{ route('questions.create') }}">Ask Question</a>
	</div>
</div>