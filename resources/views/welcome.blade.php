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
  <span class="brand">Nagham Blog</span>
  <h1 class="title">Welcome to Nagham Blog</h1>
  <p class="subtitle">Discover stories, ideas, and posts from our writers.</p>

  <a href="{{ route('login') }}" class="login-btn">Login</a>
</div>
    </div>
</body>
</html>
