@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                    <div class="card" align="center">
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                        <h4>{{$post->name}}</h4>
                   </a>
                   <h6>{{$post->date}} at {{ $post->start_time }} - {{ $post->end_time }}</h6>
                   <form action="/postuser" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="submit" value="{{ in_array(Auth::user()->id, $post->users->pluck('id')->toArray()) == true ? 'Attending' : 'Attend' }}">
                   </form>
                   <p>{{$post->users->count()}} Attending
                   <h5>Hosted by {{ Auth::user()->id == $post->user_id ? 'You' :  $post->getUser($post->user_id) }}</h5>
                    </div><br><br>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection