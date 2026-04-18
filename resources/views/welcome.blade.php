<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nagham Blog | Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ربط ملف التنسيقات الخارجي --}}
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/antigravity.css') }}">
</head>
<body>
  <div class="welcome-wrapper">
    <div class="status-tag">
        <span class="status-dot"></span>
        System Online
    </div>
    
    <div class="glass-card">
        <div class="decoration dec-1"></div>
        <div class="decoration dec-2"></div>
        
        <span class="brand">Nagham_Engine.v1</span>
        
        <h1 class="title">Welcome to Nagham Blog</h1>
        <p class="subtitle">Explore the latest in technology, coding, and digital insights from our specialized writers.</p>

        <a href="{{ route('login') }}" class="login-btn">Initialize Login</a>
    </div>
</div>
    <script src="{{ asset('js/antigravity.js') }}"></script>
</body>
</html>
