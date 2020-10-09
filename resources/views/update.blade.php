@extends('layout')

@section('content')
    <div class="row">
        <div class="col">
            <form method="POST" action="{{route('update',[$link->id])}}">
                @csrf
                <h2>Link id: {{$link->id}}</h2>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" name="link" class="form-control" id="link" aria-describedby="titleHelp" value="{{$link->link}}">
                    <small id="titleHelp" class="form-text text-muted">link</small>
                </div>
                <div class="form-group">
                    <label for="short_link">Short link</label>
                    <input type="text" name="short_link" class="form-control" id="short_link" aria-describedby="titleHelp" value="{{$link->short_link}}">
                    <small id="titleHelp" class="form-text text-muted">short link</small>
                </div>
                <div class="form-group">
                    <label for="clicks">Clicks</label>
                    <input type="text" name="clicks" class="form-control" id="clicks" aria-describedby="titleHelp" value="{{$link->clicks_link}}">
                    <small id="titleHelp" class="form-text text-muted">clicks</small>
                </div>
                <input type="submit" class="btn btn-primary" value="Update"/>
            </form>
        </div>
    </div>
@endsection
