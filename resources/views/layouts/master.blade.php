<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Buzz Micro Social Network')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <link href="/css/buzz.css" type='text/css' rel='stylesheet'>
        @stack('head')
    </head>
    <body>

        @if(session('alert'))
          <div class="alert">
            {{ session('alert') }}
          </div>
        @endif

        <header>
          <h1>Buzz Micro Social Network</h1>
        </header>

        <div id="main">
          @yield('content')
        </div>

        <footer>
          <a href='https://github.com/mfs780/project-4'><i class='fa fa-github'></i></a>&nbsp;
          &copy; {{ date('Y') }}
        </footer>

        <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        @stack('body')
    </body>
</html>
