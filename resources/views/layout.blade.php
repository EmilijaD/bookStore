<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <script rel="/js/jquery.min-2.1.3.js"></script>
    <script rel="/js/bootstrap.min.js"></script>

    <style>

    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Book Store</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/books/') }}">Books</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li>
                            <a href="{{ url('/auth/login') }}">Login</a>
                        </li>
                        <li>
                            <a href="{{ url('/auth/register') }}">Register</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                {{--@if (Auth::user()->can_post())--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ url('/new-post') }}">Add new post</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ url('/user/'.Auth::id().'/posts') }}">My Posts</a>--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                                {{--<li>--}}
                                    {{--<a href="{{ url('/user/'.Auth::id()) }}">My Profile</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="{{ url('/auth/logout') }}">Logout</a>--}}
                                {{--</li>--}}

                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 text-center">
            <p>Copyright &copy; 2016 | Book Store</p>
        </div>
    </div>

</div>

</body>
</html>
