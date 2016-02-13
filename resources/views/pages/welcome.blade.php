@extends('layout')

@section('content')
    <div class="container">
        @unless(empty($people))
            There are some people.
        @else
            Something else here.
        @endunless


        @foreach ($people as $person)
            <li>{{$person}}</li>
        @endforeach
    </div>
@stop