@extends('layout')

@section('content')
    <form method="POST" action="{{route('link')}}">
        @csrf
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" class="form-control" id="link" name="link" aria-describedby="link">
        </div>
        @guest()
            <h2>To use the service please login</h2>
        @endguest
        @auth()
            <button type="submit" class="btn btn-primary">Generate</button>
        @endauth
    </form>
@endsection
