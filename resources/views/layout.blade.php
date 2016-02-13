<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    {{--<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">


    <script src="/js/jquery.min-2.1.3.js" type="text/javascript"></script>
    <script src="/js/jquery-1.12.0.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <span><img alt="Brand" src="/images/logo.png"></span> Book Store
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" >
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/books/') }}">Books</a>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right" aria-labelledby="dropdownMenuDivider">
                    <li role="separator" class="nav-divider"></li>
                    @if (Auth::guest())
                        <li>
                            <a href="{{ url('/auth/login') }}">Login</a>
                        </li>
                        <li>
                            <a href="{{ url('/auth/register') }}">Register</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->can_post())
                                    {{--<li>--}}
                                        {{--<a href="{{ url('/new-post') }}">Add new post</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ url('/user/'.Auth::id().'/posts') }}">My Posts</a>--}}
                                    {{--</li>--}}
                                @endif
                                <li>
                                    <a href="{{ url('/user/'.Auth::id()) }}">My Profile</a>
                                </li>
                                <li>
                                    <a href="{{ url('/books/add') }}">Add Book</a>
                                </li>
                                <li>
                                    <a href="{{ url('/auth/logout') }}">Logout</a>
                                </li>

                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content">
        @yield('content')
    </div>

    <div class="row">
        <footer>
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 text-center">
                <p>Copyright &copy; 2016 | Book Store</p>
            </div>
        </footer>
    </div>

</body>
</html>
