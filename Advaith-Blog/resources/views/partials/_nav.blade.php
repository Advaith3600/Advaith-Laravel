<nav class="navbar navbar-default">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Advaith-Blog</a>
                </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                        <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
                        <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
                        <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">Blog</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{Request::is('posts') ? "active" : ""}}"><a href="{{route('posts.index')}}">Posts</a></li>
                                    <li class="{{Request::is('categories') ? "active" : ""}}"><a href="{{route('categories.index')}}">Categories</a></li>
                                    <li class="{{Request::is('tags') ? "active" : ""}}"><a href="{{route('tags.index')}}">Tags</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{Request::is('auth/login') ? "active" : null}}"><a href="{{route('login')}}">Login</a></li>
                                    <li class="{{Request::is('auth/register') ? "active" : null}}"><a href="{{route('register')}}">Register</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>