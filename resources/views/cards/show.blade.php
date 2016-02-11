@extends('layout')

@section('content')
    <h1>Card {{ $card->id }}</h1>

        <div>
            {{ $card->title }}
        </div>

    <br>

    @foreach($card->notes as $note)
        <li>{{ $note->body }}</li>
    @endforeach
@stop