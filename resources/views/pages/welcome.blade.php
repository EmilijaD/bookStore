@extends('layout')

@section('content')

    <link rel="stylesheet" href="/css/homePage.css">

    <div class="homePageImgDiv">
        <img class="img-responsive center-block" id="homePageImg" src="/images/homePage.jpg">
    </div>
    @unless(empty($users))
        There are some people.
    @else
        Something else here.
    @endunless


    @foreach ($users as $user)
        <li>{{$user->name}}</li>
    @endforeach


    @unless(empty($books))
        @foreach($books as $book)
            <div>
                <a href="/books">{{ $book->title . " - " . $book->authors }}</a>
            </div>
        @endforeach
    @endunless

@stop