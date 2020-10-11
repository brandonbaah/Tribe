@extends('layouts.app')

@section('content')

               <div>
                   <h4>{{$tribe->name}}</h4>
                   <h6>{{ $tribe->description }}</h6>
                   @foreach($tribe->users as $user)
                    <p>{{$user->name}}</p>
                   @endforeach
                </div>
                <br>
@endsection