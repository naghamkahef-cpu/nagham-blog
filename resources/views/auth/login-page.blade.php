<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nagham Blog | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/antigravity.css') }}">
</head>
<body>
    <div class="login-wrapper">
    <div class="status-tag">
        <span class="status-dot"></span>
        Secure Access
    </div>

    <div class="login-card">
        <div class="login-header">
            <h1 class="login-title">Welcome back </h1>
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
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" name="email" class="form-input" placeholder="name@example.com" required autofocus value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="password-field-wrapper">
                    <input id="password" type="password" name="password" class="form-input" placeholder="••••••••" required>
                    <button type="button" id="togglePassword" class="toggle-password-btn">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </button>
                </div>

                <div class="form-row">
                    <label class="checkbox">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>
            </div>

            <button type="submit" class="login-btn">Authorize Login</button>
        </form>

        <p class="helper-text">
            Don't have an account?
            <a href="{{ route('register') }}" class="helper-link">Create Account</a>
        </p>
    </div>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.style.color = type === 'text' ? 'var(--accent-cyan)' : 'var(--text-dim)';
    });
</script>
    <script src="{{ asset('js/antigravity.js') }}"></script>
</body>
</html>
