<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nagham Blog | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/antigravity.css') }}">
</head>
<body>

<div class="login-card">
    <div class="login-header">
        <h1 class="login-title">Join Us</h1>
        <p class="login-subtitle">Create your account to start blogging</p>
    </div>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-grid">
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-input" placeholder="John Doe" required>
            </div>

            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" placeholder="name@site.com" required>
            </div>

            <div class="form-group full-width">
                <label class="form-label">Birth Date</label>
                <div class="date-row">
                    <input type="number" name="day" class="form-input" placeholder="DD" min="1" max="31">
                    <select name="month" class="form-input">
                        <option value="" disabled selected>Month</option>
                        @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $key => $month)
                            <option value="{{ $key + 1 }}">{{ $month }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="year" class="form-input" placeholder="YYYY" min="1950" max="2026">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Profile Image</label>
                <input type="file" name="image" class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label">Bio (Short)</label>
                <input type="text" name="bio" class="form-input" placeholder="Blogger & Dev">
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="password-wrapper">
                    <input id="pass" type="password" name="password" class="form-input" required>
                    <button type="button" onclick="toggle('pass')" class="toggle-btn">👁</button>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Confirm</label>
                <div class="password-wrapper">
                    <input id="conf" type="password" name="password_confirmation" class="form-input" required>
                    <button type="button" onclick="toggle('conf')" class="toggle-btn">👁</button>
                </div>
            </div>
        </div>

        <button type="submit" class="login-btn">Create Account</button>
    </form>

    <p class="helper-text">
        Already have an account? <a href="{{ route('login') }}" class="helper-link">Login</a>
    </p>
</div>

<script>
    function toggle(id) {
        const input = document.getElementById(id);
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>

    <script src="{{ asset('js/antigravity.js') }}"></script>
</body>
</html>