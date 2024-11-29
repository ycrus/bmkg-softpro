<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title' . ' - BMKG Geofisika Yogyakarta', 'BMKG Geofisika Yogyakarta')</title>

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600|antic-didone:400&display=swap" rel="stylesheet" />

    {{-- Resource --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            font-family: 'Inter', sans-serif
        }
    </style>
</head>

<body>
    @include('components.nav')
    @yield('content')
    <!-- <iframe
        allow="microphone;"
        width="350"
        height="430"
        src="https://console.dialogflow.com/api-client/demo/embedded/1979a3d1-34b3-4f98-a245-20c3bea177c3">
    </iframe> -->

    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger
        intent="WELCOME"
        chat-title="Megabot"
        agent-id="1979a3d1-34b3-4f98-a245-20c3bea177c3"
        chat-icon="images/icon.png"
        language-code="en">
    </df-messenger>
    @include('components.footer')

    {{-- Font Awesome --}}
    {{-- <script src="https://kit.fontawesome.com/1191ef92be.js" crossorigin="anonymous"></script> --}}
</body>

</html>