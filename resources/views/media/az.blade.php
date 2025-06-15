<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Collections — Google Arts & Culture</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('media/az.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="icon" href="https://www.gstatic.com/culturalinstitute/stella/apple-touch-icon-180x180-v1.png"
    type="image/x-icon">
  <style>
    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 2000;
    }

    .modal-content {
      background-color: white;
      padding: 24px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      text-align: left;
      width: 350px;
      max-width: 90%;
    }

    .modal-buttons button {
      cursor: pointer;
    }
  </style>
</head>

<body data-is-logged-in="{{ auth()->check() ? 'true' : 'false' }}" data-login-url="{{ route('login') }}"
  data-profile-url="{{ route('profile.custom') }}">


  @include('media.navbar')

  @include('media.sidebar')

  <section class="headline">
    <h1>Collections</h1>
    <div class="tabs">
      <a href="{{ url('/') }}">All</a>
      <a id="az-tab" class="active" href="#">A–Z</a>
      <a href="#">Map</a>
    </div>
    <div class="alphabet-filter-wrapper">
      <div class="active-marker"></div>
      <div class="alphabet-filter">
        <a data-letter="A" href="#">A</a>
        <a data-letter="B" href="#">B</a>
        <a data-letter="C" href="#">C</a>
        <a data-letter="D" href="#">D</a>
        <a data-letter="E" href="#">E</a>
        <a data-letter="F" href="#">F</a>
        <a data-letter="G" href="#">G</a>
        <a data-letter="H" href="#">H</a>
        <a data-letter="I" href="#">I</a>
        <a data-letter="J" href="#">J</a>
        <a data-letter="K" href="#">K</a>
        <a data-letter="L" href="#">L</a>
        <a data-letter="M" href="#">M</a>
        <a data-letter="N" href="#">N</a>
        <a data-letter="O" href="#">O</a>
        <a data-letter="P" href="#">P</a>
        <a data-letter="Q" href="#">Q</a>
        <a data-letter="R" href="#">R</a>
        <a data-letter="S" href="#">S</a>
        <a data-letter="T" href="#">T</a>
        <a data-letter="U" href="#">U</a>
        <a data-letter="V" href="#">V</a>
        <a data-letter="W" href="#">W</a>
        <a data-letter="X" href="#">X</a>
        <a data-letter="Y" href="#">Y</a>
        <a data-letter="Z" href="#">Z</a>
      </div>
    </div>
  </section>

  <div class="gallery-container">
    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="https://i.pinimg.com/736x/d6/94/de/d694deb596d8f2e7166c2c1bcc3c9c6a.jpg" alt="MoMA" />
      </div>
      <div class="card-logo">
        <img src="https://i.pinimg.com/736x/d6/94/de/d694deb596d8f2e7166c2c1bcc3c9c6a.jpg" alt="Logo" />
      </div>
      <h2>MoMA The Museum of Modern Art</h2>
      <p class="location">Kota New York, Amerika Serikat</p>
    </div>

    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="{{ asset('sbd.jpg') }}" alt="Orsay" />
      </div>
      <div class="card-logo">
        <img
          src="https://lh3.googleusercontent.com/ci/AL18g_SHyoFjT-AsOo27-lnDhz0Wmel45piIq-EpffUC1i4P26bAgkVMkaQ-mQaOKaRoide0G8B5-w=fcrop64=1,00000000ffffff28"
          alt="Logo" />
      </div>
      <h2>Musée d’Orsay</h2>
      <p class="location">Paris, Prancis</p>
    </div>

    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="{{ asset('sbd.jpg') }}" alt="Van Gogh" />
      </div>
      <div class="card-logo">
        <img
          src="https://lh3.googleusercontent.com/ci/AL18g_SHyoFjT-AsOo27-lnDhz0Wmel45piIq-EpffUC1i4P26bAgkVMkaQ-mQaOKaRoide0G8B5-w=fcrop64=1,00000000ffffff28"
          alt="Logo" />
      </div>
      <h2>Van Gogh Museum</h2>
      <p class="location">Kota Amsterdam, Belanda</p>
    </div>

    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="{{ asset('sbd.jpg') }}" alt="Uffizi" />
      </div>
      <div class="card-logo">
        <img
          src="https://lh3.googleusercontent.com/ci/AL18g_SHyoFjT-AsOo27-lnDhz0Wmel45piIq-EpffUC1i4P26bAgkVMkaQ-mQaOKaRoide0G8B5-w=fcrop64=1,00000000ffffff28"
          alt="Logo" />
      </div>
      <h2>Uffizi Gallery</h2>
      <p class="location">Kota Firenze, Italia</p>
    </div>

    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="{{ asset('sbd.jpg') }}" alt="Chicago" />
      </div>
      <div class="card-logo">
        <img
          src="https://lh3.googleusercontent.com/ci/AL18g_SHyoFjT-AsOo27-lnDhz0Wmel45piIq-EpffUC1i4P26bAgkVMkaQ-mQaOKaRoide0G8B5-w=fcrop64=1,00000000ffffff28"
          alt="Logo" />
      </div>
      <h2>The Art Institute of Chicago</h2>
      <p class="location">Chicago, Amerika Serikat</p>
    </div>

    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="{{ asset('sbd.jpg') }}" alt="Uffizi" />
      </div>
      <div class="card-logo">
        <img
          src="https://lh3.googleusercontent.com/ci/AL18g_SHyoFjT-AsOo27-lnDhz0Wmel45piIq-EpffUC1i4P26bAgkVMkaQ-mQaOKaRoide0G8B5-w=fcrop64=1,00000000ffffff28"
          alt="Logo" />
      </div>
      <h2>Uffizi Gallery</h2>
      <p class="location">Kota Firenze, Italia</p>
    </div>

    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="{{ asset('sbd.jpg') }}" alt="Uffizi" />
      </div>
      <div class="card-logo">
        <img
          src="https://play-lh.googleusercontent.com/Rg1D7NrfQ63HNaKjWIHkXEOiYF2ZwXdvw58mg09Mf8D04zVIDdl0JhS4sClO7vdowP71=w526-h296-rw"
          alt="Logo" />
      </div>
      <h2>Uffizi Gallery</h2>
      <p class="location">Kota Firenze, Italia</p>
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
      // --- BAGIAN 1: PENGUMPULAN DATA & ELEMEN ---
      const bodyElement = document.body;
      const isLoggedIn = bodyElement.dataset.isLoggedIn === 'true';
      const loginUrl = bodyElement.dataset.loginUrl;
      const profileUrl = bodyElement.dataset.profileUrl;

      // --- BAGIAN 2: LOGIKA POP-UP & SIDEBAR ---
      const loginPopup = document.getElementById('loginPopup');
      const notNowBtn = document.getElementById('notNowBtn');
      const signInBtn = document.getElementById('signInBtn');
      const profileLink = document.getElementById('profileLink');

      function openLoginPopup() { if (loginPopup) loginPopup.style.display = 'flex'; }
      function closeLoginPopup() { if (loginPopup) loginPopup.style.display = 'none'; }

      if (notNowBtn) notNowBtn.addEventListener('click', closeLoginPopup);
      if (signInBtn) signInBtn.addEventListener('click', () => { window.location.href = loginUrl; });
      if (loginPopup) loginPopup.addEventListener('click', (event) => {
        if (event.target === loginPopup) closeLoginPopup();
      });

      if (profileLink) {
        profileLink.addEventListener('click', (event) => {
          if (!isLoggedIn) {
            event.preventDefault();
            openLoginPopup();
          }
        });
      }
    });
  </script>

  {{-- Memanggil file JavaScript eksternal milikmu --}}
  <script src="{{ asset('media/js/alfabet.js') }}"></script>
  <script src="{{ asset('media/js/sidebar.js') }}"></script>
</body>

</html>