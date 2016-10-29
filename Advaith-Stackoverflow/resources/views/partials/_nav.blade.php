<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Advaith Stack-Overflow</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? "active" : null }}"><a href="/">Home</a></li>
      </ul>
      <form class="navbar-form navbar-right">
        <div class="input-group">
          <div class="input-group-addon"><button class="glyphicon glyphicon-search ad-btn-no"></button></div>
          <input type="text" class="form-control" placeholder="Search" name="search">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{ Auth::guest() ? 'Account' : Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if (Auth::guest())
              <li class="{{ Request::is('login') ? "active" : null }}"><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              <li class="{{ Request::is('register') ? "active" : null }}"><a href="{{ route('register') }}"><span class="glyphicon glyphicon-cloud-upload"></span> Register</a></li>
            @else
              <li class="divider"></li>
              <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            @endif
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Help <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a href="#"><b>Contact us</b></a>
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>