@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Forum Threads</div>

                    <div class="panel-body">
                        <form method="POST" action="/threads">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="title">
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea rows="5" id="body" class="form-control" name="body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection