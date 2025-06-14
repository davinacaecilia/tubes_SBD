<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in - Google</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <picture>
                <source srcset="{{ asset('R-dark.png')}}" media="(prefers-color-scheme: dark)">
                <img src="{{ asset('R.png')}}" alt="Google Logo" class="google-g">
            </picture>
            <div class="logo-text">
                <h1>Sign in</h1>
                <p class="subtitle">to continue to Arts & Culture</p>
            </div>
        </div>
        <div class="right-section">
            <form method="POST" id="loginForm" action="{{ route('login.check-email') }}">
                @csrf
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="input-group">
                    <input type="email" name="email" id="email" placeholder="Email or phone" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="info-text">
                    Not your computer? Use Guest mode to sign in privately.<br>
                    <a href="#">Learn more about using Guest mode</a>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot email?</a>
                </div>
                <div class="submit-group">
                    <a href="{{ route('register') }}">Create account</a>
                    <button type="submit" class="btn">Next</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
