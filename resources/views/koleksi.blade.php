<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Koleksi</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body data-is-logged-in="{{ auth()->check() ? 'true' : 'false' }}" data-login-url="{{ route('login') }}"
  data-profile-url="{{ route('profile.custom') }}">
  </head>

  <body>
    @include('media.navbar')
    @include('media.sidebar')

    <!-- SECTION GALLERY -->
    <section class="headline">
      <h1>Collection</h1>
      <div class="tabs">
        <a class="active" href="{{ url('/') }}">All</a>
        <a href="{{ route('collections.az') }}">A–Z</a>
        <a href="#">Map</a>
      </div>
    </section>


    <div class="gallery-container" id="mainContent">
      <div class="gallery-card">
        <div class="img-wrapper">
          <img
            src="https://lh3.googleusercontent.com/ci/AL18g_S0DxG1MrIie55gKa4UatRWv9XdsPM47mrrY5Kbd_tAwQDKYlRRYpEkO6Q3ZHtsfSkW-AhMUQ=w190-c-h256-fcrop64=1"
            alt="MoMA" />
        </div>
        <h2>MoMA</h2>
        <p class="subtitle">MoMA The Museum of Modern Art</p>
        <p class="location">Kota New York, Amerika Serikat</p>
      </div>

      <div class="gallery-card">
        <div class="img-wrapper">
          <img src="{{asset('/sbd.jpg')}}" alt="Orsay" />
        </div>
        <h2>Musée d'Orsay, Paris</h2>
        <p class="subtitle">Paris, Prancis</p>
      </div>

      <div class="gallery-card">
        <div class="img-wrapper">
          <img
            src="https://lh3.googleusercontent.com/ci/AL18g_SbSDWiDDUnj_B5_rHUNQfO9H0nfcu5E6MtzYpk_LqFIq9D7K54ctJrWL1T2I_IVXz3oeP4=w373-c-h300-rw-v1"
            alt="Van Gogh" />
        </div>
        <h2>Van Gogh Museum</h2>
        <p class="subtitle">Kota Amsterdam, Belanda</p>
      </div>

      <div class="gallery-card">
        <div class="img-wrapper">
          <img src="{{asset('/sbd.jpg')}}" alt="Uffizi" />
        </div>
        <h2>Uffizi Gallery</h2>
        <p class="subtitle">Kota Firenze, Italia</p>
      </div>

      <div class="gallery-card">
        <div class="img-wrapper">
          <img src="{{asset('/sbd.jpg')}}" alt="Chicago" />
        </div>
        <h2>The Art Institute of Chicago</h2>
        <p class="subtitle">Chicago, Amerika Serikat</p>
      </div>
    </div>
    <div id="loginPopup" class="modal-overlay">
      <div class="modal-content">
        <h2 class="modal-title">Sign in required</h2>
        <p class="modal-message">You need to sign in to use this feature.</p>
        <div class="modal-buttons">
          <button id="notNowBtn" class="not-now">Not Now</button>
          <button id="signInBtn" class="sign-in">Sign In</button>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        // === BAGIAN 1: PENGUMPULAN DATA & ELEMEN ===
        const bodyElement = document.body;
        const isLoggedIn = bodyElement.dataset.isLoggedIn === 'true';
        const loginUrl = bodyElement.dataset.loginUrl;
        const profileUrl = bodyElement.dataset.profileUrl;

        const loginPopup = document.getElementById('loginPopup');
        const notNowBtn = document.getElementById('notNowBtn');
        const signInBtn = document.getElementById('signInBtn');
        const favoriteIcon = document.getElementById('favoriteIcon');
        const profileLink = document.getElementById('profileLink'); // Menargetkan link profile dengan ID

        // === BAGIAN 2: FUNGSI-FUNGSI UTAMA ===
        function openLoginPopup() {
          if (loginPopup) loginPopup.style.display = 'flex';
        }
        function closeLoginPopup() {
          if (loginPopup) loginPopup.style.display = 'none';
        }

        // === BAGIAN 3: EVENT LISTENERS ===

        // Event listener untuk tombol di dalam pop-up
        if (notNowBtn) notNowBtn.addEventListener('click', closeLoginPopup);
        if (signInBtn) signInBtn.addEventListener('click', () => { window.location.href = loginUrl; });
        if (loginPopup) loginPopup.addEventListener('click', (event) => {
          if (event.target === loginPopup) closeLoginPopup();
        });

        // Event listener untuk ikon favorit
        if (favoriteIcon) {
          favoriteIcon.addEventListener('click', () => {
            if (!isLoggedIn) {
              openLoginPopup();
            } else {
              favoriteIcon.classList.toggle('bxs-heart');
              favoriteIcon.classList.toggle('bx-heart');
            }
          });
        }

        // ===============================================
        // === PERBAIKAN UTAMA ADA DI SINI ===
        // ===============================================
        // Event listener untuk link "Profile" di sidebar
        if (profileLink) {
          profileLink.addEventListener('click', function (event) {
            // Jika pengguna BELUM login...
            if (!isLoggedIn) {
              // 1. HENTIKAN browser agar tidak pindah halaman
              event.preventDefault();
              // 2. Buka pop-up login
              openLoginPopup();
            }
            // Jika pengguna SUDAH login, biarkan link berjalan normal
            // (tidak perlu ada 'else', karena kita tidak melakukan apa-apa)
          });
        }
      });
    </script>
  </body>
  <script>

    const sidebar = document.getElementById('sidebar');
    const openMenu = document.querySelector('.menu-icon');
    const closeMenu = sidebar.querySelector('.menu-close');

    openMenu.addEventListener('click', () => {
      sidebar.classList.add('active');
    });

    closeMenu.addEventListener('click', () => {
      sidebar.classList.remove('active');
    });

  </script>

</html>