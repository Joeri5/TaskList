<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<nav class="bg-dark dark:bg-gray-700 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block h-10 w-auto fill-current text-white"/>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="flex space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('register')" :active="request()->routeIs('dashboard')">
                    @auth
                        {{ __('Dashboard') }}
                    @endauth

                    @guest
                        {{ __('Register') }}
                    @endguest
                </x-nav-link>
            </div>
        </div>
    </div>
</nav>
</body>
</html>
