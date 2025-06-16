<!DOCTYPE html>

<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thirty-Six Views of Mount Fuji: The Great Wave Off the Coast of Kanagawa — Google Arts & Culture</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('media/karya.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="icon" href="https://www.gstatic.com/culturalinstitute/stella/apple-touch-icon-180x180-v1.png"
    type="image/x-icon">
</head>

<body data-is-logged-in="{{ auth()->check() ? 'true' : 'false' }}" data-login-url="{{ route('login') }}"
  data-profile-url="{{ route('profile.custom') }}">

  @include('user.partials.navbar2')

  <div class="main-content-wrapper">
    <section class="art-content-section">
      <div class="art-image-container"> <img src="{{ asset('sbd.jpg') }}"
          alt="Thirty-Six Views of Mount Fuji: The Great Wave Off the Coast of Kanagawa" class="zoomable" />
      </div>

      <hr class="content-divider" />

      <div class="art-info-block">
        <div class="art-left-column">
          <h1 class="art-title">Thirty-Six Views of Mount Fuji: The Great Wave Off the Coast of Kanagawa</h1>
          <p class="art-subtitle">Katsushika Hokusai · Periode Edo, abad ke-19</p>
          <div class="art-actions">
            <i class='bx bx-heart' id="favoriteIcon"></i>
            <i class='bx bx-dots-horizontal-rounded'></i>
          </div>
        </div>
        <div class="museum-info">
          <img src="{{ asset('sbd.jpg') }}" alt="Museum Logo" />
          <p><strong>Tokyo National Museum</strong><br>Tokyo, Jepang</p>
        </div>
      </div>

      <div class="art-description-block">
        <div class="desc-left">
          <p>
            Tiga Puluh Enam Pemandangan Gunung Fuji merupakan rangkaian 46 cetakan yang menggambarkan berbagai fitur <a
              href="#">Gunung Fuji</a>, gunung tertinggi di <a href="#">Jepang</a>. Dalam cetakan ini, biru nila, warna
            yang sangat populer saat itu, digunakan sebagai garis luar utama untuk menghasilkan efek yang tajam.
          </p>
          <p>
            Meskipun sering disalahpahami sebagai tsunami, gelombang tersebut sebenarnya adalah gelombang besar di laut
            lepas. Gelombang ini mengancam tiga perahu dengan gunung yang tertutup salju muncul di latar belakang. "The
            Great Wave" adalah cetakan pertama dan paling terkenal dari seri ini. Karya ini merupakan salah satu karya
            seni yang paling dikenal di dunia dan contoh yang paling terkenal dari cetakan balok kayu Jepang.
          </p>
        </div>
        <div class="desc-right">
          <p>
            Hokusai menggambar gelombang tersebut sebagai kerangka yang mengelilingi Gunung Fuji, memperlihatkan
            kekuatan alam dan kerapuhan manusia.
          </p>
          <p>
            Diyakini bahwa karya ini dibuat antara tahun 1829 dan 1833. Cetakan ini adalah bagian dari genre seni yang
            dikenal sebagai Ukiyo-e, yang merupakan gaya seni yang populer di Jepang dari abad ke-17 hingga ke-19.
            Cetakan Ukiyo-e biasanya menampilkan pemandangan dari "dunia mengambang", termasuk aktor kabuki, wanita
            cantik, dan pemandangan alam.
          </p>
        </div>
      </div>
    </section>
  </div>

  <a href="{{ route('user.art.detail') }}" class="nav-arrow left-arrow"><i class='bx bx-left-arrow-alt'></i></a>
  <a href="{{ route('user.mediums.all') }}" class="nav-arrow right-arrow"><i class='bx bx-right-arrow-alt'></i></a>

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
      // ===============================================
      // BAGIAN 1: PENGUMPULAN DATA & ELEMEN
      // ===============================================
      const bodyElement = document.body;
      const isLoggedIn = bodyElement.dataset.isLoggedIn === 'true';
      const loginUrl = bodyElement.dataset.loginUrl;
      const profileUrl = bodyElement.dataset.profileUrl;

      // Elemen Pop-up
      const loginPopup = document.getElementById('loginPopup');
      const notNowBtn = document.getElementById('notNowBtn');
      const signInBtn = document.getElementById('signInBtn');

      // Elemen Interaktif Halaman
      const favoriteIcon = document.getElementById('favoriteIcon');
      const profileLink = document.querySelector('a[href*="profil-saya"]'); // Mengambil link profile

      // ===============================================
      // BAGIAN 2: LOGIKA POP-UP
      // ===============================================
      function openLoginPopup() {
        if (loginPopup) loginPopup.style.display = 'flex';
      }

      function closeLoginPopup() {
        if (loginPopup) loginPopup.style.display = 'none';
      }

      // Event listener untuk tombol di dalam pop-up
      if (notNowBtn) {
        notNowBtn.addEventListener('click', closeLoginPopup);
      }
      if (signInBtn) {
        signInBtn.addEventListener('click', () => {
          window.location.href = loginUrl;
        });
      }
      // Event listener untuk menutup pop-up jika klik di luar area
      if (loginPopup) {
        loginPopup.addEventListener('click', (event) => {
          if (event.target === loginPopup) {
            closeLoginPopup();
          }
        });
      }

      // ===============================================
      // BAGIAN 3: LOGIKA FITUR (FAVORIT, PROFIL, DLL.)
      // ===============================================

      // Logika untuk Ikon Favorit
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

      // Logika untuk Link Profil di Sidebar
      if (profileLink) {
        profileLink.addEventListener('click', (event) => {
          if (!isLoggedIn) {
            event.preventDefault(); // Hentikan link
            openLoginPopup();     // Buka pop-up
          }
          // Jika sudah login, biarkan link berjalan normal
        });
      }

    });
  </script>

</body>

</html>