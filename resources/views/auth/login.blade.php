@extends('layouts.master')

@section('content')

    <form class="tweet-container" method="POST" action="{{ route('login') }}">

        {{ csrf_field() }}

        <h1>Login</h1>

        <p>Don't have an account? <a href='/register'>Register here...</a></p>

        <label for="email">E-Mail Address</label>
        <input id="email" class="tweet-input" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @include('modules.error-field', ['fieldName' => 'email'])

        <label for="password">Password</label>
        <input id="password" class="tweet-input" type="password" name="password" value='helloworld' required>
        @include('modules.error-field', ['fieldName' => 'password'])

        <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>

        <button type="submit" class="tweet-button">Login</button>

        <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>

    </form>

@endsection