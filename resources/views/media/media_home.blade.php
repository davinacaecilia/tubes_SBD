<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mediums — Google Arts & Culture</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('media/media.css') }}"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="icon" href="https://www.gstatic.com/culturalinstitute/stella/apple-touch-icon-180x180-v1.png" type="image/x-icon">
</head>
<body>

@include('media.navbar2')

  <section class="headline">
    <h1>Mediums</h1>
    <div class="tabs">
      <a class="active" href="#">All</a>
      <a href="{{ url('/mediaa') }}">A–Z</a>
    </div>
  </section>

 <div class="container">
  <div class="grid">
    <div class="card">
  <a href="{{ url('/isi_media') }}">
    <img src="{{ asset('sbd.jpg') }}" alt="Kertas">
  </a>
  <div class="info">
    <h4>Kertas</h4>
    <p>354.000 item</p>
  </div>
</div>
    <div class="card">
      <img src="{{ asset('sbd.jpg') }}" alt="Lukisan Cat Minyak">
      <div class="info">
        <h4>Lukisan Cat Minyak</h4>
        <p>158.000 item</p>
      </div>
    </div>
    <div class="card">
      <img src="{{ asset('sbd.jpg') }}" alt="Gambar">
      <div class="info">
        <h4>Gambar</h4>
        <p>108.000 item</p>
      </div>
    </div>

 <div id="loginPopup" class="popup-overlay" style="display: none;">
  <div class="popup-content">
    <h2>Sign in required</h2>
    <p>You need to sign in to add favorites and make collections to share</p>
    <div class="popup-buttons">
      <button id="notNowBtn" class="popup-button secondary">Not now</button>
      <button id="signInBtn" class="popup-button primary">Sign in</button>
    </div>
  </div>
</div>

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
