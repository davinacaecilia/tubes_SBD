<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mediums — Google Arts & Culture</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('media/media.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="icon" href="https://www.gstatic.com/culturalinstitute/stella/apple-touch-icon-180x180-v1.png"
    type="image/x-icon">
</head>

<body>

  @include('user.partials.navbar2')

  <section class="headline">
    <h1>Mediums</h1>
    <div class="tabs">
      <a class="active" href="{{ route('user.mediums.all') }}">All</a>
      <a href="{{ route('user.mediums.AZ') }}">A–Z</a>
    </div>
  </section>

  <div class="container">
    <div class="grid">
      @foreach ($mediums as $medium)
      <div class="card">
        <a href="{{ route('user.mediums.detail', $medium->id) }}">
          <img src="{{ $medium->img_url }}" alt="{{ $medium->name }}">
        </a>
        <div class="info">
          <h4>{{ $medium->name }}</h4>
          <p>{{ $medium->art_count ?? 'N/A' }} items</p>
        </div>
      </div>
      @endforeach

      <script>
        const isLoggedIn = false; // Simulasi status login

        const favoritesLink = document.getElementById('favoritesLink');
        const loginPopup = document.getElementById('loginPopup');
        const notNowBtn = document.getElementById('notNowBtn');
        const signInBtn = document.getElementById('signInBtn');

        favoritesLink.addEventListener('click', function (e) {
          e.preventDefault();
          if (!isLoggedIn) {
            loginPopup.style.display = 'flex';
          } else {
            window.location.href = 'profil.html'; // Ganti jika halaman profile berbeda
          }
        });

        notNowBtn.addEventListener('click', () => {
          loginPopup.style.display = 'none';
        });

        signInBtn.addEventListener('click', () => {
          window.location.href = 'halaman_login.html'; // Ganti sesuai file login kamu
        });

        loginPopup.addEventListener('click', (e) => {
          if (e.target === loginPopup) {
            loginPopup.style.display = 'none';
          }
        });
      </script>

</body>

</html>