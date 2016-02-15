@extends('layout')

@section('content')


    <link rel="stylesheet" href="/css/addBook.css">

    <div class="row addBookContent">
        <div class="panel panel-default">
            <div class="panel-heading">Add Book</div>
            <div class="panel-body">

            <form enctype="multipart/form-data" class="form-horizontal" action="/books/add" method="POST">

                @if($warning)
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="label label-danger" id="emptyFieldsWarning">Please fill the empty fields, choose at least one category and upload a file.</div>
                        </div>
                    </div>
                @endif

                @if($fileSizeWarning)
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="label label-danger" id="emptyFieldsWarning">File size not allowed.</div>
                        </div>
                    </div>
                @endif

                    @if($fileExtensionWarning)
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="label label-danger" id="emptyFieldsWarning">Only pdf files allowed.</div>
                            </div>
                        </div>
                    @endif

                @if($success)
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="label label-success" id="successInfo">Book added successfully.</div>
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label for="title" class="col-md-4 control-label">Book Title:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                    </div>
                </div>

                <div class="form-group">
                    <label for="authors" class="col-md-4 control-label">Authors:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="authors" id="authors" placeholder="Enter authors">
                    </div>
                </div>

                <div class="form-group">
                    <label for="categories" class="col-md-4 control-label">Category:</label>
                    <div class="col-md-6">
                        <select multiple="multiple" name="categories[]" id="categories">
                            <option value="Applications and Software">Applications and Software</option>
                            <option value="Artificial Intelligence (AI)">Artificial Intelligence (AI)</option>
                            <option value="Computers General">Computers - General</option>
                            <option value="Database Management">Database Management</option>
                            <option value="Design Patterns">Design Patterns</option>
                            <option value="Enterprise Systems">Enterprise Systems</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Networking">Networking</option>
                            <option value="Operating Systems">Operating Systems</option>
                            <option value="WWW and Internet">WWW and Internet</option>
                        </select>
                        <p class="help-block">Hold down the Ctrl (windows) / Command (Mac) button to select multiple categories.</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="summary" class="col-md-4 control-label">Summary:</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="summary" id="summary" rows="4" cols="50"> </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tags" class="col-md-4 control-label">Tags:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="tags" id="tags" placeholder="Enter tags">
                        <p class="help-block">Tags are keywords used when searching for books. Use commas when separating tags in the input field!</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="upload" class="col-md-4 control-label">Attachment:</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control" name="userfile" id="userfile" placeholder="">

                        <p class="help-block">Limit: 495 MB (only pdf allowed)</p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>

            </form>
            <!-- /input-group -->


            </div>
        </div>
    </div>

@stop