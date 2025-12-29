<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nagham Blog | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ملف تنسيقات خاص باللوغ ان --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <h1 class="login-title">Welcome back 👋</h1>
                <p class="login-subtitle">Login to continue to Nagham Blog.</p>
            </div>
               @if ($errors->any())
  <div class="error-box">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-input"
                        required
                        autofocus
                        value="{{ old('email') }}"
                    >
                    
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-input"
                        required
                    >
                   
                </div>

                <button type="submit" class="login-btn">
                    Login
                </button>
            </form>

            <p class="helper-text">
                Don't have an account?
                <a href="{{ route('register') }}" class="helper-link">
                    Click here!
                </a>
            </p>
        </div>
    </div>
</body>
</html>
