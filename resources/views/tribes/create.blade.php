@extends('layouts.app')

@section('content')
@if (session('status') == "Tribe successfully created!")
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@else
<div class="alert alert-danger">
        Tribe Currently Exist. Choose another name.
    </div>
@endif

  <div align="center">
      <h1>Create a Tribe</h1>
 
  <br><br>
  <form action="/tribes" method="POST">
      @csrf

      <label for="event_name">Name of Tribe</label>
      <input type="text" name="name"><br><br>

      <label for="requested_day">Create a description for your tribe.</label>

      <input type="text" name="description">
      <br><br>
    
      <input type="submit" value="Create Tribe">
  </form>

  </div>
@endsection