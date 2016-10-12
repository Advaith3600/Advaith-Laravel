@extends('main')

@section('title', 'Contact Me')

@section('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1>Welcome to my Blog</h1>
                        <p class="lead">This is my first laravel blog.</p>
                        <p><a class="btn btn-primary btn-lg" href="#" role="button">Latest Post</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Contact Advaith A J</h1>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label for="email" name="email">Email: </label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="*email...">
                            </div>
                            <div class="form-group">
                                <label for="subject" name="subject">Subject: </label>
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="*subject...">
                            </div>
                            <div class="form-group">
                                <label for="message" name="message">Message: </label>
                                <textarea placeholder="*message..." class="form-control" name="message" id="message"></textarea>
                            </div>
                            <input type="submit" value="Send Message" class="btn btn-success">
                        </form>
                    </div>
                </div>
                </div>

@endsection