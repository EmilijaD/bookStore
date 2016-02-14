@extends('layout')

@section('content')

    <link rel="stylesheet" href="/css/homePage.css">

    <div class="homePageImgDiv">
        <img class="img-responsive center-block" id="homePageImg" src="/images/homePage.jpg">
    </div>

    <div class="homeContainer">
    @unless(empty($recommendedBooks))
        <div class="booksContainer">
        <h3 class="text-success">Recommended Books:</h3>
        <table class="table table-condensed homePageTable">
            <thead>
            <tr class="success">
            </tr>
            </thead>
            <tbody>
            @foreach ($recommendedBooks as $mybook)
                <tr>
                    <td><a href="{{ url('/book/'.$mybook->id) }}">{{ $mybook->title}} - {{$mybook->authors}}</a></td>
                    <td>{{ $mybook->authors }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

    @endunless
    @unless(empty($books))
            <div class="booksContainer">
        <h3 class="text-info">Latest Books:</h3>

        <table class="table table-condensed homePageTable">
            <thead>
            <tr class="info">
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td href="{{ url('/book/'.$book->id) }}"><a
                                href="{{ url('/book/'.$book->id) }}">{{ $book->title}} - {{$book->authors}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
                </div>
    @endunless

    </div>
@stop