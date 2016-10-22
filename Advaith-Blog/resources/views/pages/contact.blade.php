@extends('main')

@section('title', 'Contact Me')

@section('stylesheets')

  <script src='https://www.google.com/recaptcha/api.js'></script>
  <style media="screen">
    .g-recaptcha-outer{
      text-align: center;
      border-radius: 2px;
      background: #f9f9f9;
      border: 1px solid #ccc;
      box-shadow: 0 0 1px 1px #ddd;
      margin-bottom: 15px;
    }
    .g-recaptcha-inner{
      width: 154px;
      height: 70px;
      overflow: hidden;
      margin: 0 auto;
    }
    .g-recaptcha{
      position:relative;
      left: -2px;
      top: -1px;
    }
  </style>

@endsection

@section('content')
                <div class="row">
                    <div class="col-md-12">
                        <h1>Contact Advaith A J</h1>
                        <hr>
                        <form action="{{ url('contact') }}" method="POST">
                            {{csrf_field()}}
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
                            <div class="g-recaptcha-outer">
                                <div class="g-recaptcha-inner">
                                    <div class="g-recaptcha" data-sitekey="6LeT4wkUAAAAAAzjvCp1pte9halPczfRbLNYWkZ5"></div>
                                </div>
                            </div>
                          <input type="submit" value="Send Message" class="btn btn-success">
                        </form>
                    </div>
                </div>

@endsection
