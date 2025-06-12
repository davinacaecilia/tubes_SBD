<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create a Google Account</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="create.css">
</head>
<body>
        <div class="login-container">
        <div class="logo-container">
            <picture>
                <source srcset="{{ asset('R-dark.png')}}" media="(prefers-color-scheme: dark)">
                <img src="{{ asset('R.png')}}" alt="Google Logo" class="google-g">
            </picture>
            <div class="logo-text">
                <h1>Create a Google Account</h1>
                <p class="subtitle">Enter your Email</p>
            </div>
        </div>
        <div class="right-section">
      <form method="POST" action="{{ route('create.submit') }}">
        @csrf

        <div class="input-group">
          <label for="Email">Email</label>
          <input type="text" id="Emil" name="Email" required>
        </div>

        <div class="input-group">
          <label for="password">password <span class="optional">(optional)</span></label>
          <input type="text" id="password" name="password">
        </div>


        @error('Email')
        <p class="error">{{ $message }}</p>
        @enderror
 <div class="submit-group">
        <button type="submit"  class="btn-next">Sign In</button>
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
</div>
  </div>
</body>
</html>
