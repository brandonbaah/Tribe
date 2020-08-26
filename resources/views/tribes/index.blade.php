@extends('layouts.app')

@section('content')


@foreach($yourTribes as $tribe)
               <div>
                   <h4>{{$tribe->name}}</h4>
                   <h6>{{ $tribe->description }}</h6>
                
        @endforeach


@endsection