@extends('layouts.master')

@section('content')
  <div class='tweet-container'>
    <p class='user-welcome'>Hello @<span>{{ $user['name'] }}</span>, welcome to Buzz</p>
    <form class='tweet-button' method='POST' id='logout' action='/logout'>
        {{csrf_field()}}
        <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
    </form>
    <div class='user-info'>
      <div class='user-info-content'>
        <p class='user-info-title'>Tweets</p>
        <p class='user-info-text'>{{ $message_count }}</p>
      </div>
      <div class='user-info-content'>
        <p class='user-info-title'>Mentions</p>
        <p class='user-info-text'>{{ $mention_count }}</p>
      </div>
    </div>
  </div>

  <form class='tweet-container' method='POST' action='/tweet'>

    {{ csrf_field() }}

    <textarea id='message' name='message' class='tweet-text' maxlength='140' rows='10' cols='50' placeholder='What is happening?'></textarea>
    <div class='tweet-info'>
      <p class='tweet-char'>140</p>
      <input type='submit' value='Tweet' class='tweet-button'/>
    </div>
  </form>
  
  <div class='tweet-container'>
    @foreach($messages as $message)
      <div class='message-container'>
        <div class='message-head'>
          <p class='message-user'>@<span>{{ $message['user']['name'] }}</span> </p>
          <p class='message-date'>{{ $message['created_at'] }}</p>
          <i class='fa fa-edit'></i>
        </div>
        <div class='message-body'>
          <p class='message-text'>{{ $message['message'] }}</p>
        </div>
      </div>
    @endforeach
    
  </div>
@endsection