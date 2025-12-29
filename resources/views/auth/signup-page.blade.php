<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nagham Blog | Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-card">
            <h1 class="auth-title">Sign up</h1>

            {{-- Errors --}}
            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                  action="{{ route('register') }}"
                  class="auth-form"
                  enctype="multipart/form-data">
                @csrf

                {{-- Name --}}
                <div class="form-group">
                    <label for="name" class="form-label">Full name</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        class="form-input"
                        value="{{ old('name') }}"
                        required
                        autocomplete="name"
                    >
                </div>

                {{-- Image --}}
                <div class="form-group">
                    <label for="image" class="form-label">Profile image</label>
                    <input
                        id="image"
                        type="file"
                        name="image"
                        class="form-input file-input"
                        accept="image/*"
                    >
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-input"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                    >
                </div>

                {{-- Birth date --}}
                <div class="form-group">
                    <label for="birth_date" class="form-label">Birth date</label>
                    <input
                        id="birth_date"
                        type="date"
                        name="birth_date"
                        class="form-input"
                        value="{{ old('birth_date') }}"
                    >
                </div>

                {{-- Bio --}}
                <div class="form-group">
                    <label for="bio" class="form-label">Short bio about you</label>
                    <textarea
                        id="bio"
                        name="bio"
                        class="form-input form-textarea"
                        rows="3"
                        placeholder="Write a short description about yourself..."
                    >{{ old('bio') }}</textarea>
                </div>

    {{-- Password --}}
<div class="form-group">
    <label for="password" class="form-label">Password</label>

    <div class="input-wrap">
        <input
            id="password"
            type="password"
            name="password"
            class="form-input has-toggle"
            required
            autocomplete="new-password"
        >
        <button type="button" class="toggle-btn" data-toggle="password" aria-label="Show password">
  👁
</button>
    </div>
</div>

{{-- Password confirmation --}}
<div class="form-group">
    <label for="password_confirmation" class="form-label">Confirm password</label>

    <div class="input-wrap">
        <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            class="form-input has-toggle"
            required
            autocomplete="new-password"
        >
        <button type="button" class="toggle-btn" data-toggle="password_confirmation" aria-label="Show password confirmation">
  👁
</button>
    </div>
</div>

                <button type="submit" class="auth-btn">
                    Create account
                </button>
            </form>

            <p class="helper-text">
                Already have an account?
                <a href="{{ route('login') }}" class="helper-link">
                    Login here
                </a>
            </p>
        </div>
    </div>
<script>
  document.querySelectorAll('.toggle-btn').forEach((btn) => {
    btn.addEventListener('click', () => {
      const inputId = btn.getAttribute('data-toggle');
      const input = document.getElementById(inputId);
      if (!input) return;

      const hidden = input.type === 'password';
      input.type = hidden ? 'text' : 'password';

      btn.textContent = hidden ? '🙈' : '👁';
      btn.setAttribute('aria-label', hidden ? 'Hide password' : 'Show password');
    });
  });
</script>


</body>
</html>
