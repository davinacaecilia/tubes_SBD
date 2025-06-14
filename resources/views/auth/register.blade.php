<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a Google Account</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('create.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <picture>
                <source srcset="{{ asset('R-dark.png')}}" media="(prefers-color-scheme: dark)">
                <img src="{{ asset('R.png')}}" alt="Google Logo" class="google-g">
            </picture>
            <div class="logo-text">
                <h1>Create an Account</h1>
                <p class="subtitle">to continue to Arts & Culture</p>
            </div>
        </div>
        <div class="right-section">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="submit-group">
                    <a href="{{ route('login') }}" class="sign-in-link">Sign in instead</a>
                    <button type="submit" class="btn-next">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
