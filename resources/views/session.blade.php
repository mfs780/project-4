@extends('layouts.master')

@section('content')
  <div class="tweet-container">
    <p class="user-welcome">Hello @<span>{{ $user['name'] }}</span>, welcome to Buzz</p>
    <form class="tweet-button" method='POST' id='logout' action='/logout'>
        {{csrf_field()}}
        <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
    </form>
    <div class="user-info">
      <div class="user-info-content">
        <p class="user-info-title">Tweets</p>
        <p class="user-info-text">16</p>
      </div>
    </div>
  </div>

  <form class="tweet-container" method="POST" action="/login">
    <textarea id="message" class="tweet-text" maxlength="140" rows="10" cols="50" placeholder="What's happening?"></textarea>
    <div class="tweet-info">
      <p class="tweet-char">140</p>
      <input type="submit" value="Tweet" class="tweet-button"/>
    </div>
  </form>
  
  <div class="tweet-container">
    <div class="message-container">
      <div class="message-head">
        <p class="message-user">@<span>{{ $user['name'] }}</span> </p>
        <p class="message-date">Sun Jul 12 2015 18:35:45:56 GMT-0700 (PDT)</p>
        <i class="fa fa-edit"></i>
      </div>
      <div class="message-body">
        <p class="message-text">Anyone there?</p>
      </div>
    </div>
    <div class="message-container">
      <div class="message-head">
        <p class="message-user">@<span>{{ $user['name'] }}</span> </p>
        <p class="message-date">Thur Feb 12 2011 02:30:01:12 GMT-0700 (PDT)</p>
        <i class="fa fa-edit"></i>
      </div>
      <div class="message-body">
        <p class="message-text">First!</p>
      </div>
    </div>
  </div>
@endsection