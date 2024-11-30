<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BMKG Geofisika Yogyakarta')</title>

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    @yield('styles')

    <!-- Scripts -->
    @vite(['public/css/app.css', 'public/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="py-6 bg-white shadow dark:bg-gray-800">
            <div class="flex items-center px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mr-auto">
                    {{ $header }}
                </div>

                <span class="font-bold dark:text-white">{{ now()->toFormattedDateString() }}</span>
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="relative">
            {{ $slot }}

            @if (Auth::user()->role != 'admin' || !request()->is('admin/*'))
            <a href="https://wa.link/j5p51g" target="_blank"
                class="fixed px-4 py-2 text-white transition duration-200 bg-green-500 rounded shadow-xl group hover:bg-green-600 bottom-5 right-5">
                <i class="fa-regular fa-circle-question"></i>
                Ada pertanyaan?
            </a>
            @endif
        </main>
    </div>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/1191ef92be.js" crossorigin="anonymous"></script>

    @yield('scripts')
</body>

</html>