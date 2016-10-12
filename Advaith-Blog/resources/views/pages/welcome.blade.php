@extends('main')

@section('title', 'Advaith-Blog')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1>Welcome to my Blog</h1>
                        <p class="lead">This is my first laravel blog.</p>
                        <p><a class="btn btn-primary btn-lg" href="#" role="button">Latest Post</a></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">

                    <div class="post">
                        <h3>Post Title</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab sunt natus veniam, eaque voluptatibus beatae debitis ut laudantium qui, porro quae assumenda harum excepturi doloremque maxime unde explicabo et ipsum.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div><hr>

                    <div class="post">
                        <h3>Post Title</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab sunt natus veniam, eaque voluptatibus beatae debitis ut laudantium qui, porro quae assumenda harum excepturi doloremque maxime unde explicabo et ipsum.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div><hr>

                    <div class="post">
                        <h3>Post Title</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab sunt natus veniam, eaque voluptatibus beatae debitis ut laudantium qui, porro quae assumenda harum excepturi doloremque maxime unde explicabo et ipsum.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div><hr>

                    <div class="post">
                        <h3>Post Title</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab sunt natus veniam, eaque voluptatibus beatae debitis ut laudantium qui, porro quae assumenda harum excepturi doloremque maxime unde explicabo et ipsum.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div><hr>

                </div>
                <div class="col-md-3 col-md-offset-1">
                    <h2>SideBar</h2>
                </div>
            </div>
        </div>
@endsection