@extends('main')

@section('title', 'About Me')

@section('content')

                <div class="row">
                    <div class="col-md-12">
                        <h1>About {{ $data['fullname'] }}</h1>
                        <p>You can contact me at {{ $data['email'] }}</p>
                    </div>
                </div>


@endsection