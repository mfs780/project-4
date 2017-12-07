@extends('layouts.master')

@section('content')

    <form class="tweet-container" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <h1>Register</h1>

        <p>Already have an account? <a href='/login'>Login here...</a></p>

        <label for="name">Name</label>
        <input id="name" class="tweet-input" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @include('modules.error-field', ['fieldName' => 'name'])

        <label for="email">E-Mail Address</label>
        <input id="email" class="tweet-input" type="email" name="email" value="{{ old('email') }}" required>
        @include('modules.error-field', ['fieldName' => 'email'])

        <label for="password">Password (min: 6)</label>
        <input id="password" class="tweet-input" type="password" name="password" required>
        @include('modules.error-field', ['fieldName' => 'password'])

        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" class="tweet-input" type="password" name="password_confirmation" required>

        <button type="submit" class="tweet-button">Register</button>
    </form>
@endsection
