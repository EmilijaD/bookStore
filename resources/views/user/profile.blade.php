@extends('layout')

@section('content')

<div class="" id="profileContent">
    @if($admin == true)

        @unless(empty($booksToApprove))
            <h3 class="text-danger">Books to approve:</h3>
            <table class="table table-condensed" id="tableOfBooks">
                <thead>
                <tr class="danger">
                    <th width="40%">Book Title</th>
                    <th width="50%">Authors</th>
                    <th class="" width="10%">Approve</th>
                </tr>
                </thead>
                <tbody>
                @foreach($booksToApprove as $book)
                    <form action="" method="POST">
                        <input type="text" hidden name="bookId" value="{{$book->id}}">
                    <tr>
                        <td>
                            <a href="{{ url('/book/'.$book->id) }}">{{ $book->title}}</a>
                        </td>
                        <td>
                            {{$book->authors}}
                        </td>
                        <td class=" text-center">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                        </td>
                    </tr>
                    </form>
                @endforeach
                </tbody>
            </table>


            @else
                <h4>There are no new nooks to be approved.</h4>
        @endunless


        <h3 class="text-info">All Books</h3>

        <table class="table table-condensed" id="tableOfBooks">
            <thead>
            <tr class="info">
                <th width="40%">Book Title</th>
                <th width="50%">Authors</th>
                <th width="10%">Approved</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allBooks as $book)
                <tr>
                    <td>
                        <a href="{{ url('/book/'.$book->id) }}"> {{ $book->title}}</a>
                    </td>
                    <td>
                        {{$book->authors}}
                    </td>
                    <td>
                        {{$book->approved}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>



        @else
        @unless(empty($books))
                        <h3 class="text-info">Books you own:</h3>


                        <table class="table table-condensed" id="tableOfBooks">
                            <thead>
                            <tr class="info">
                                <th width="50%">Book Title</th>
                                <th width="50%">Authors</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>
                                        <a href="{{ url('/book/'.$book->id) }}">{{ $book->title}}</a>
                                    </td>
                                    <td>
                                        {{$book->authors}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
        @endunless
    @endif
</div>
@stop