@extends('layout')

@section('content')
    <div class="container">
        @forelse ($links as $item)
            <div class="row">
                <div class="col-2">
                @auth()
                    @if($user->id === $item->user_id || $user->admin === 'admin')
                            <span>
                    <p>
                        <a href="{{route('update',[$item->id])}}" type="submit" class="btn btn-primary">Update</a>
                    </p>
                    <p>
                        <a href="{{route('delete',[$item->id])}}" type="submit" class="btn btn-primary">Delete</a>
                    </p>
                </span>

                    @endif
                @endauth
                </div>
                    <div class="col-2" style="word-wrap: break-word">
                        <p>User</p>
                        <span>{{\App\Models\User::find($item->user_id)->name}}</span>
                    </div>
                <div class="col-3" style="word-wrap: break-word">
                    <p>link</p>
                    <span>{{$item->link}}</span>
                </div>
                <div class="col-3" style="word-wrap: break-word">
                    <p>short link</p>
                    <span class="col-4"><a href="{{$item->short_link}}">{{$item->short_link}}</a></span>
                </div>
                <div class="col-2" style="word-wrap: break-word">
                    <p>clicks</p>
                    <span class="col-2">{{$item->clicks_link}}</span>
                </div>
                <hr align="center" width="100%" size="2" color="black"/>
                <br>
            </div>


        @empty
            <p>No Links.</p>
        @endforelse
    </div>
@endsection
