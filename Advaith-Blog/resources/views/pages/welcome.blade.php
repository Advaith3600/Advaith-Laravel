@extends('main')

@section('title', 'Advaith-Blog')

@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1>Welcome to my Blog</h1>
                        <p class="lead">This is my first laravel blog.</p>
                        <p><a class="btn btn-primary btn-lg" href="/posts" role="button">Latest Post</a></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    @foreach ($posts as $post)

                        <div class="post">
                            <h3>{{ $post->title }}</h3>
                            <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? '.....' : '' }}</p>
                            <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                        </div><hr>

                    @endforeach

                </div>
                <div class="col-md-3 col-md-offset-1">
                    <h2>SideBar</h2>
                </div>
            </div>
@endsection