@extends('layouts.master')

@section('content')
    <div class='tweet-container'>
        <p class='user-welcome'>Hello @<span>{{ $user['name'] }}</span>, welcome to Buzz</p>

        <form class='tweet-button' method='POST' id='logout' action='/logout'>
            {{csrf_field()}}
            <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
        </form>

        <div class='user-info center-between'>
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

  @if (isset($edit_message))
  <form class='tweet-container' method='POST' action='/tweet/{{ $edit_message->id }}'>

      {{ method_field('put') }}
      {{ csrf_field() }}

      <p class='tweet-label'>Edit Message</p>

      <textarea id='message' name='message' class='tweet-text' maxlength='140' rows='10' cols='50' placeholder='What is happening?'>{{ $edit_message->message }}</textarea>

      <p class='tweet-label'>Mentions (comma separated)</p>

      <input name='mentions' value='{{ $edit_mentions }}' class='mention-text'/>

      <div class='tweet-info'>
          <p class='tweet-char'>140</p>

          <input type='submit' value='Update' class='tweet-button'/>
      </div>
  </form>
  @else
  <form class='tweet-container' method='POST' action='/tweet'>

      {{ csrf_field() }}

      <p class='tweet-label'>Tweet</p>

      <textarea id='message' name='message' class='tweet-text' maxlength='140' rows='10' cols='50' placeholder='What is happening?'></textarea>

      <p class='tweet-label'>Mentions (comma separated)</p>

      <input name='mentions' class='mention-text'/>

      <div class='tweet-info'>
          <p class='tweet-char'>140</p>

          <input type='submit' value='Tweet' class='tweet-button'/>
      </div>
  </form>
  @endif

  @if (isset($latest))
  <div class='tweet-container'>
      <p class='tweet-label'>Latest Tweet Options</p>

      <div class='center-between'>
          <form method='POST' id='delete' action='/tweet/{{ $latest->id }}'>

              {{ method_field('delete') }}
              {{ csrf_field() }}
              
              <input type='submit' value='Delete' class='tweet-button'/>       
          </form>

          <a  class='tweet-button' href='/tweet/{{ $latest->id }}'>Edit</a>
      </div>
  </div>
  @endif
  
  <div class='tweet-container'>
      @foreach($messages as $message)
        <div class='message-container'>
            <div class='message-head'>
                <p class='message-user'>@<span>{{ $message['user']['name'] }}</span> </p>

                <p class='message-date'>{{ $message['created_at'] }}</p>
            </div>
            
            <div class='message-body'>
                <p class='message-text'>{{ $message['message'] }}</p>
            </div>
        </div>
      @endforeach
  </div>
@endsection