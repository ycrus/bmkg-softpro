<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['public/css/app.css', 'public/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900">
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center !pt-[140px] !pb-[100px] sm:pt-0 bg-[linear-gradient(rgba(0,0,0,0.4),rgba(10,30,0,0.6)),url('/public/images/slides/8.jpg')] bg-cover bg-no-repeat bg-fixed bg-center">
        <div>
            <a href="/" class="flex flex-col items-center gap-3">
                {{-- <x-application-logo class="w-20 h-20 text-gray-500 fill-current" /> --}}
                <img src="{{ asset('/images/logo-bmkg.png') }}" alt="BMKG" width="100" height="100">
                <span class="text-2xl font-bold text-white">Stasiun Geofisika Yogyakarta</span>
            </a>
        </div>

        <div @class([ 'w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg' , 'sm:max-w-md'=> request()->route()->named('login'),
            'sm:max-w-screen-md' => request()->route()->named('register'),
            ])>
            {{ $slot }}
        </div>
    </div>
</body>

</html>