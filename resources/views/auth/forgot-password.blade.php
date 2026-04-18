<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nagham Blog | Forgot Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="login-wrapper">
    <div class="login-card">

      <div class="login-header">
        <h1 class="login-title">Forgot password? 🔐</h1>
        <p class="login-subtitle">Enter your email and we’ll send you a reset link.</p>
      </div>

      @if (session('status'))
        <div class="status-box">
          {{ session('status') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="error-box">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('password.email') }}" class="login-form">
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
            placeholder="you@example.com"
          >
        </div>

        <button type="submit" class="login-btn">
          Send Reset Link
        </button>
      </form>

      <p class="helper-text">
        Remembered your password?
        <a href="{{ route('login') }}" class="helper-link">Back to login</a>
      </p>

    </div>
  </div>
</body>
</html>
