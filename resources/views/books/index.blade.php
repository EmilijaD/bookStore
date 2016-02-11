@extends('layout')

@section('content')
   {{--<h1>All Books</h1>--}}

   @unless(empty($books))
        @foreach($books as $book)
            <div>
                <a href="">{{ $book->title }}</a>
            </div>
        @endforeach
    @endunless

   {{--<h1>Tags</h1>--}}

   {{--@unless(empty($tags))--}}
       {{--@foreach($tags as $tag)--}}
           {{--<div>--}}
               {{--<a href="">{{ $tag->tag }}</a>--}}
           {{--</div>--}}
       {{--@endforeach--}}
   {{--@endunless--}}

   {{--<h1>AllCategories</h1>--}}

   <div id="cont">
   <table cellpadding="4">
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

@stop