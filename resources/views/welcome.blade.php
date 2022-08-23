<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>miniLibrary</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-purple-100 sm:items-center sm:pt-0 text-purple-700">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/books') }}" class="text-lg">Books</a>
                        <a href="{{ url('/dashboard') }}" class="ml-4 text-lg">Dashboard</a>

                    @else
                        <a href="{{ url('/books') }}" class="text-lg">Books</a>
                        <a href="{{ route('login') }}" class="ml-4 text-lg">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-lg">Register</a>
                        @endif
                    @endif
                </div>
            @endif
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <h1 class="font-semibold sm:text-5xl md:text-7xl lg:text-9xl text-purple-800 leading-tight font-serif">
                    {{ __('miniLibrary') }}
                </h1>
            </div>
        </div>
    </body>
</html>
