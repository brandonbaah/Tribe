@extends('layouts.app')

@section('content')
    <div align="center">
        <p>{{ $post->name }}</p>
        <p>{{$post->start_time}} - {{$post->end_time}}</p>
        <p>{{ $post->date }}</p>
    </div>  
        <b><p>Attending:</p></b>
        <ul>
            @foreach($post->users->toArray() as $user)
                <li>{{$user['name']}}</li>
            @endforeach
        </ul>
     

@endsection
