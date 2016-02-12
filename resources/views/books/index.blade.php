@extends('layout')

@section('content')
    {{--<h1>All Books</h1>--}}

    {{--@unless(empty($books))--}}
    {{--@foreach($books as $book)--}}
    {{--<div>--}}
    {{--<a href="">{{ $book->title }}</a>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--@endunless--}}

    {{--<h1>Tags</h1>--}}

    {{--@unless(empty($tags))--}}
    {{--@foreach($tags as $tag)--}}
    {{--<div>--}}
    {{--<a href="">{{ $tag->tag }}</a>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--@endunless--}}

    {{--<h1>AllCategories</h1>--}}
    <div class="row">
        <div class="col-lg-4 col-md-4" id="contentLeft">
            <table cellpadding="4" class="table table-responsive table-striped">
                <thead>
                <tr>
                    <th style="padding-left:8px;">Category</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td><a href="/books/category/{{$category->id}}">{{ $category->category_name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-lg-8 col-md-8" id="contentRight">
            {{--@unless(empty($books))--}}
            {{--@foreach($books as $book)--}}
            {{--<div>--}}
            {{--<a href="">{{ $book->title }}</a>--}}
            {{--</div>--}}
            {{--@endforeach--}}
            {{--@endunless--}}

            <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter title, author...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Search
                        {{--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>--}}
                    </button>
                  </span>
            </div>
            <!-- /input-group -->

            @unless(empty($books))
                <div id="tableOfBooks">
                    <table cellpadding="3" class="table table-responsive table-striped">
                        <thead>
                        <tr>
                            <th style="width:30%;">Title</th>
                            <th style="width:17%;">Author</th>
                            <th style="width:10%;">View details</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($books as $book)
                            <tr>
                                <td><p>{{ $book->title }}</p></td>
                                <td>{{ $book->authors }}</td>
                                <td><a class="" href="">Details</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


                </div>
                @else
                    <div class="label label-danger" id="noBooksInfo">There are no books from this category.</div>

            @endunless
        </div>


        {{--<div id="cont">--}}
        {{--<table cellpadding="4">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th style="padding-left:8px;">Category</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@foreach($categories as $category)--}}
        {{--<tr>--}}
        {{--<td><a href="/books/category/{{$category->id}}">{{ $category->category_name }}</a></td>--}}
        {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
        {{--</table>--}}
        {{--</div>--}}

@stop