@extends('layout')

@section('content')
    @unless(empty($book))
        <div class="row" style="padding: 10px;">

            <div class="panel panel-info">
                {{--<div class="panel-heading">Book Details</div>--}}
                <div class="panel-body">

                    <form class="form-horizontal col-lg-6 col-md-6 col-sm-12 col-xs-12">

                        <div class="form-group">
                            <label class="col-lg-3 col-md-2 col-sm-12 col-xs-12 text-info">Book Title</label>
                            <label class="col-md-9 col-sm-12 col-xs-12" id="title"> {{ $book->title}}</label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-12 col-xs-12 text-info">Authors</label>
                            <label class="col-md-9 col-sm-12 col-xs-12" id="authors"> {{ $book->authors}}</label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-12 col-xs-12 text-info">Summary</label>
                            <label class="col-md-9 col-sm-12 col-xs-12" id="summary"> {{ $book->summary}}</label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-12 col-xs-12 text-info">Download</label>
                            <label class="col-md-9 col-sm-12 col-xs-12" id="download"> Download link</label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-12 col-xs-12 text-info">Rating</label>

                            <label class="col-md-4 col-sm-12 col-xs-12" id="rating">{{$rating}}</label>
                        </div>

                        <div class="form-group">
                            <form class="form-horizontal" action="" method="POST">

                                <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-info">Your rating</label>

                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3" id="rating">
                                    <input type="number" min="6" max="10" name="userRating" value="{{$currentUserRating}}">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                                    <button type="submit" class="btn btn-success">Rate this book</button>
                                </div>
                            </form>
                        </div>


                    </form>


                    <form class="form-horizontal col-lg-6 col-md-6 col-sm-12 col-xs-12" action="" method="post">
                        <div class="form-group">
                            <div class="panel panel-info">
                                <div class="panel-heading">Comments</div>
                                <div class="panel-body">
                                    {{--<label class="col-md-2 col-sm-12 col-xs-12 text-info">Comments:</label>--}}
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        @unless(empty($comments))
                                            @foreach($comments as $comment)

                                                <table class="table-responsive table table-striped table-condensed table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$comment->comment}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$comment->created_at}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            @endforeach
                                        @endunless


                                        <textarea class="form-control" name="summary" id="summary" rows="4"
                                                  cols="50"> </textarea>


                                    </div>
                                    <div class=" col-md-offset-8 col-sm-offset-8 col-md-4 col-sm-4 col-xs-6 col-xs-offset-6 text-right">
                                        {{--<div class="form-group ">--}}
                                        <button type="submit" class="btn btn-success">Post comment</button>
                                        {{--</div>--}}
                                    </div>

                                </div>


                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    @endunless
@stop