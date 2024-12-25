<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>@yield('title', 'BMKG Geofisika Yogyakarta')</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

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
            <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
            <df-messenger
                intent="WELCOME"
                chat-title="Megabot"
                agent-id="c9f258c1-8808-4b8e-b660-8efdca1c1703"
                chat-icon="images/icon.png"
                language-code="en">
            </df-messenger>
            @endif
        </main>
    </div>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/1191ef92be.js" crossorigin="anonymous"></script>

    @yield('scripts')
</body>

</html>