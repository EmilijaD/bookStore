@extends('layout')

@section('content')
   <h1>All Books</h1>

    @foreach($books as $book)
        <div>
            <a href="/books/{{ $book->id }}">{{ $book->title }}</a>
        </div>
    @endforeach
@stop