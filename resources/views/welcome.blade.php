<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nagham Blog | Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ربط ملف التنسيقات الخارجي --}}
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <div class="welcome-wrapper">
        <div class="glass-card">
            <h1 class="title">
                Welcome to Nagham Blog Website
            </h1>

            <a href="{{ route('login') }}" class="login-btn" style="position:relative; z-index:999;">
  Login
</a>
        </div>
    </div>
</body>
</html>
