<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'Nagham Blog')</title>

    {{-- CSS مشترك --}}
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    {{-- CSS خاص بكل صفحة --}}
    @yield('styles')
</head>
<body>

    @include('partials.navbar')

    <main class="container page">
        @yield('content')
    </main>

    @include('partials.footer')

    @yield('scripts')
</body>
</html>
