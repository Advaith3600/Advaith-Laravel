@extends('main')

@section('title', 'About Me')

@section('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1>Welcome to my Blog</h1>
                        <p class="lead">This is my first laravel blog.</p>
                        <p><a class="btn btn-primary btn-lg" href="#" role="button">Latest Post</a></p>
                    </div>
                </div>
            </div>
            

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>About {{ $data['fullname'] }}</h1>
                        <p>You can contact me at {{ $data['email'] }}</p>
                    </div>
                </div>


@endsection