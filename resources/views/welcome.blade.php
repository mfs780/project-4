@extends('layouts.master')

@section('content')
  <form class="tweet-container" method="POST" action="/login">

    {{ csrf_field() }} 

    <label for="user">*User Name:</label>
    <input id="user" class="tweet-input" name="user" type="text" value="{{ old('user') }}" required/>
    <input type="submit" value="Log In" class="tweet-button"/>
  </form>
@endsection