<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nagham Blog | Reset Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="login-wrapper">
    <div class="login-card">

      <div class="login-header">
        <h1 class="login-title">Reset password ✨</h1>
        <p class="login-subtitle">Choose a new strong password for your account.</p>
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

      <form method="POST" action="{{ route('password.update') }}" class="login-form">
        @csrf

       <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input
            id="email"
            type="email"
            name="email"
            class="form-input"
            required
            value="{{ old('email', request('email')) }}"
            placeholder="you@example.com"
          >
        </div>

        <div class="form-group">
          <label for="password" class="form-label">New Password</label>
          <input
            id="password"
            type="password"
            name="password"
            class="form-input"
            required
            placeholder="••••••••"
          >
        </div>

        <div class="form-group">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            class="form-input"
            required
            placeholder="••••••••"
          >
        </div>

        <button type="submit" class="login-btn">
          Reset Password
        </button>
      </form>

      <p class="helper-text">
        <a href="{{ route('login') }}" class="helper-link">Back to login</a>
      </p>

    </div>
  </div>
</body>
</html>
