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


  @include('user.partials.navbar')
  @include('user.partials.sidebar')

  <section class="headline">
    <h1>Collections</h1>
    <div class="tabs">
      <a href="{{ route('user.collections.all') }}">All</a>
      <a id="az-tab" class="active" href="{{ route('user.collections.AZ') }}">A–Z</a>
      <a href="#">Map</a>
    </div>
    <div class="alphabet-filter-wrapper">
      <div class="active-marker"></div>
      @php
        $active = request()->query('starts_with', 'A');
      @endphp

      <div class="alphabet-filter">
        @foreach (range('A', 'Z') as $letter)
          <a data-letter="{{ $letter }}" href="#" class="{{ $active === $letter ? 'active' : '' }}">
            {{ $letter }}
          </a>
        @endforeach
      </div>
    </div>
  </section>

  <div class="gallery-container">
    @foreach($museums as $museum)
      <div class="gallery-card">
        <div class="img-wrapper">
          <img src="{{ $museum->logo_url }}" alt="{{ $museum->name }}" />
        </div>
        <h2>{{ $museum->name }}</h2>
        <p class="location">{{ $museum->location }}</p>
      </div>
      @endforeach 
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