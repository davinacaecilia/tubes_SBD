<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Paper — Google Arts & Culture</title>
  <link rel="stylesheet" href="{{ asset('media/isiMedia.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon" href="https://www.gstatic.com/culturalinstitute/stella/apple-touch-icon-180x180-v1.png"
    type="image/x-icon">
</head>

<body data-is-logged-in="{{ auth()->check() ? 'true' : 'false' }}" data-login-url="{{ route('login') }}"
  data-profile-url="{{ route('profile.custom') }}">
  @include('media.navbar')

  @include('media.sidebar')

  <div class="hero-image">
    <img src="{{ asset('sbd.jpg') }}" alt="Gambar Kertas">
  </div>

  <div class="judul-kertas">
    <h1>Paper</h1>
    <div class="icon-bar">
      <i class='bx bx-heart' id="favoriteIcon"></i>
      <i class='bx bx-link'></i>
      <i class='bx bxl-facebook'></i>
      <i class='bx bx-x'></i>
      <i class='bx bx-share'></i>
    </div>
  </div>

  <div class="description-section">
    <p id="paperDescription">
    </p>
    <div class="read-more-footer">
      <button id="toggleReadMore" class="read-more-button">Read more</button>
      <span id="copyrightNotice" class="copyright-text">© Grove Art / OUP</span>
    </div>
  </div>
  <h2 class="section-title">Discover this medium</h2>

  <div class="scroll-wrapper">
    <button class="scroll-arrow left" onclick="scrollLeft()">
      <i class='bx bx-left-arrow-alt'></i>
    </button>

    <div class="scroll-container" id="scroll-container">
      <div class="cards-wrapper">

        <div class="card card-1">
          <div class="img-row full-width">
            <a href="{{route('collections.karya')}}">
              <img src="{{ asset('sbd.jpg') }}" class="img-horizontal" alt="img1" />
            </a>
          </div>
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-square" alt="img2" />
            <img src="{{ asset('sbd.jpg') }}" class="img-vertical" alt="img3" />
          </div>
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-small" alt="img4" />
            <img src="{{ asset('sbd.jpg') }}" class="img-small" alt="img5" />
          </div>
        </div>

        <div class="card card-2">
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-vertical" alt="img6" />
            <div class="img-stack">
              <img src="{{ asset('sbd.jpg') }}" class="img-horizontal-half" alt="img7" />
              <img src="{{ asset('sbd.jpg') }}" class="img-square-half" alt="img8" />
            </div>
          </div>
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-vertical" alt="img9" />
            <div class="img-stack">
              <img src="{{ asset('sbd.jpg') }}" class="img-horizontal-half" alt="img10" />
              <img src="{{ asset('sbd.jpg') }}" class="img-square-half" alt="img11" />
            </div>
          </div>
        </div>

        <div class="card card-1">
          <div class="img-row full-width">
            <img src="{{ asset('sbd.jpg') }}" class="img-horizontal" alt="img1" />
          </div>
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-square" alt="img2" />
            <img src="{{ asset('sbd.jpg') }}" class="img-vertical" alt="img3" />
          </div>
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-small" alt="img4" />
            <img src="{{ asset('sbd.jpg') }}" class="img-small" alt="img5" />
          </div>
        </div>

        <div class="card card-2">
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-vertical" alt="img6" />
            <div class="img-stack">
              <img src="{{ asset('sbd.jpg') }}" class="img-horizontal-half" alt="img7" />
              <img src="{{ asset('sbd.jpg') }}" class="img-square-half" alt="img8" />
            </div>
          </div>
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-vertical" alt="img9" />
            <div class="img-stack">
              <img src="{{ asset('sbd.jpg') }}" class="img-horizontal-half" alt="img10" />
              <img src="{{ asset('sbd.jpg') }}" class="img-square-half" alt="img11" />
            </div>
          </div>
        </div>

        <div class="card card-1">
          <div class="img-row full-width">
            <a href="{{route('collections.karya')}}">
              <img src="{{ asset('sbd.jpg') }}" class="img-horizontal" alt="img1" />
            </a>
          </div>
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-square" alt="img2" />
            <img src="{{ asset('sbd.jpg') }}" class="img-vertical" alt="img3" />
          </div>
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-small" alt="img4" />
            <img src="{{ asset('sbd.jpg') }}" class="img-small" alt="img5" />
          </div>
        </div>

        <div class="card card-2">
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-vertical" alt="img6" />
            <div class="img-stack">
              <img src="{{ asset('sbd.jpg') }}" class="img-horizontal-half" alt="img7" />
              <img src="{{ asset('sbd.jpg') }}" class="img-square-half" alt="img8" />
            </div>
          </div>
          <div class="img-row">
            <img src="{{ asset('sbd.jpg') }}" class="img-vertical" alt="img9" />
            <div class="img-stack">
              <img src="{{ asset('sbd.jpg') }}" class="img-horizontal-half" alt="img10" />
              <img src="{{ asset('sbd.jpg') }}" class="img-square-half" alt="img11" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="scroll-arrow right" onclick="scrollRight()">
      <i class='bx bx-right-arrow-alt'></i>
    </button>
  </div>
  <h2 class="section-title">More mediums</h2>

  <div class="card-grid-container">
    <div class="scroll-wrapper-media-others">
      <button class="scroll-arrow left" onclick="scrollLeftMediaOthers()">
        <i class='bx bx-left-arrow-alt'></i>
      </button>

      <div class="scroll-container-media-others" id="mediaOthersScrollContainer">
        <div class="card-grid">
          <div class="card-grid-item">
            <div class="img-wrapper">
              <a href="{{route('collections.isi_media')}}">
                <img src="{{ asset('sbd.jpg') }}" alt="Tinta">
              </a>
            </div>
            <div class="info">
              <h4>Vellum</h4>
              <p>99.300 items</p>
            </div>
          </div>
          <div class="card-grid-item">
            <div class="img-wrapper">
              <img src="{{ asset('sbd.jpg') }}" alt="Kertas">
            </div>
            <div class="info">
              <h4>Laid paper</h4>
              <p>354.000 items</p>
            </div>
          </div>
          <div class="card-grid-item">
            <div class="img-wrapper">
              <img src="{{ asset('sbd.jpg') }}" alt="Pensil">
            </div>
            <div class="info">
              <h4>Pensil</h4>
              <p>80.000 items</p>
            </div>
          </div>
          <div class="card-grid-item">
            <div class="img-wrapper">
              <img src="{{ asset('sbd.jpg') }}" alt="Kuas">
            </div>
            <div class="info">
              <h4>Kuas</h4>
              <p>27.000 item</p>
            </div>
          </div>
          <div class="card-grid-item">
            <div class="img-wrapper">
              <img src="{{ asset('sbd.jpg') }}" alt="Palet">
            </div>
            <div class="info">
              <h4>Palet</h4>
              <p>45.500 item</p>
            </div>
          </div>
          <div class="card-grid-item">
            <div class="img-wrapper">
              <img src="{{ asset('sbd.jpg') }}" alt="Palet">
            </div>
            <div class="info">
              <h4>Palet</h4>
              <p>45.500 item</p>
            </div>
          </div>
        </div>
      </div>
      <button class="scroll-arrow right" onclick="scrollRightMediaOthers()">
        <i class='bx bx-right-arrow-alt'></i>
      </button>
    </div>
  </div>

  <div id="loginPopup" class="popup-overlay">
    <div class="popup-content">
      <h2>Sign in required</h2>
      <p>You need to sign in to add favorites and make collections to share</p>
      <div class="popup-buttons">
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
      // Cek apakah pengguna sudah login (ini mungkin perlu disesuaikan dengan cara Laravel Anda)
      // Untuk sementara, kita anggap pengguna belum login agar pop-up bisa diuji.
      const bodyElement = document.body;
      const isLoggedIn = bodyElement.dataset.isLoggedIn === 'true';
      const loginUrl = '{{ route('login') }}'; // Pastikan route ini ada

      // Elemen Pop-up
      const loginPopup = document.getElementById('loginPopup');
      const notNowBtn = document.getElementById('notNowBtn');
      const signInBtn = document.getElementById('signInBtn');

      // Elemen Interaktif Halaman
      const favoriteIcon = document.getElementById('favoriteIcon');

      // Elemen 'Read More'
      const paperDescription = document.getElementById('paperDescription');
      const toggleReadMoreButton = document.getElementById('toggleReadMore');
      const copyrightNotice = document.getElementById('copyrightNotice');

      const scrollContainer = document.getElementById('scroll-container');
      const leftArrow = document.querySelector('.scroll-wrapper .scroll-arrow.left');
      const rightArrow = document.querySelector('.scroll-wrapper .scroll-arrow.right');

      function scrollLeft() {
        scrollContainer.scrollBy({ left: -300, behavior: 'smooth' });
      }

      function scrollRight() {
        scrollContainer.scrollBy({ left: 300, behavior: 'smooth' });
      }

      function updateArrows() {
        if (!scrollContainer || !leftArrow || !rightArrow) return;

        if (Math.round(scrollContainer.scrollLeft) <= 1) {
          leftArrow.style.display = 'none';
        } else {
          leftArrow.style.display = 'flex';
        }

        const maxScrollLeft = scrollContainer.scrollWidth - scrollContainer.clientWidth;
        if (maxScrollLeft <= 1) {
          leftArrow.style.display = 'none';
          rightArrow.style.display = 'none';
        } else if (Math.round(scrollContainer.scrollLeft) >= Math.round(maxScrollLeft) - 1) {
          rightArrow.style.display = 'none';
        } else {
          rightArrow.style.display = 'flex';
        }
      }

      leftArrow.addEventListener('click', scrollLeft);
      rightArrow.addEventListener('click', scrollRight);

      scrollContainer.addEventListener('scroll', updateArrows);
      window.addEventListener('resize', updateArrows);

      scrollContainer.scrollLeft = 0;
      updateArrows();


      // Scroll logic for the bottom section (Media lainnya)
      const mediaOthersScrollContainer = document.getElementById('mediaOthersScrollContainer');
      const leftArrowMediaOthers = document.querySelector('.scroll-wrapper-media-others .scroll-arrow.left');
      const rightArrowMediaOthers = document.querySelector('.scroll-wrapper-media-others .scroll-arrow.right');

      function scrollLeftMediaOthers() {
        mediaOthersScrollContainer.scrollBy({ left: -300, behavior: 'smooth' });
      }

      function scrollRightMediaOthers() {
        mediaOthersScrollContainer.scrollBy({ left: 300, behavior: 'smooth' });
      }

      function updateArrowsMediaOthers() {
        if (!mediaOthersScrollContainer || !leftArrowMediaOthers || !rightArrowMediaOthers) return;

        if (Math.round(mediaOthersScrollContainer.scrollLeft) <= 1) {
          leftArrowMediaOthers.style.display = 'none';
        } else {
          leftArrowMediaOthers.style.display = 'flex';
        }

        const maxScrollLeft = mediaOthersScrollContainer.scrollWidth - mediaOthersScrollContainer.clientWidth;
        if (maxScrollLeft <= 1) {
          leftArrowMediaOthers.style.display = 'none';
          rightArrowMediaOthers.style.display = 'none';
        } else if (Math.round(mediaOthersScrollContainer.scrollLeft) >= Math.round(maxScrollLeft) - 1) {
          rightArrowMediaOthers.style.display = 'none';
        } else {
          rightArrowMediaOthers.style.display = 'flex';
        }
      }

      leftArrowMediaOthers.addEventListener('click', scrollLeftMediaOthers);
      rightArrowMediaOthers.addEventListener('click', scrollRightMediaOthers);

      mediaOthersScrollContainer.addEventListener('scroll', updateArrowsMediaOthers);
      window.addEventListener('resize', updateArrowsMediaOthers);

      mediaOthersScrollContainer.scrollLeft = 0;
      updateArrowsMediaOthers();

      // ===============================================
      // BAGIAN 2: LOGIKA POP-UP (Diambil dari karya.blade.php)
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
      // BAGIAN 3: LOGIKA FITUR (FAVORIT, READ MORE)
      // ===============================================

      // Logika untuk Ikon Favorit
      if (favoriteIcon) {
        favoriteIcon.addEventListener('click', () => {
          if (!isLoggedIn) {
            openLoginPopup();
          } else {
            // Logika jika sudah login (misalnya, toggle favorit)
            favoriteIcon.classList.toggle('bxs-heart');
            favoriteIcon.classList.toggle('bx-heart');
          }
        });
      }

      // Logika untuk "Read More"
      const fullText = "Lembaran serat nabati yang diisolasi atau dikempa yang diproduksi dengan cara menyaring serat nabati yang telah dihaluskan dari bubur berair. Kriteria tertentu harus dipenuhi agar suatu zat dapat disebut kertas: yang terpenting, seratnya harus nabati, seratnya harus diproses dengan cara tertentu untuk memecah bahan menjadi serat-serat tersendiri, dan lembarannya harus dibentuk dengan cara menuang campuran serat-air yang telah dihaluskan pada saringan, biasanya saringan yang dicelupkan ke dalam campuran berair dan memungkinkan kelebihan air mengalir keluar. Kertas merupakan media yang paling umum untuk menggambar, mencetak, membuat cetakan, melukis dengan cat air, dan menulis; bersama dengan perkamen, kertas juga banyak digunakan untuk manuskrip abad pertengahan, dan untuk pengembangan buku cetak sejak abad ke-15 dan seterusnya.";
      const truncatedText = "Lembaran serat nabati yang diisolasi atau dikempa yang diproduksi dengan cara menyaring serat nabati yang telah dihaluskan dari bubur berair. Kriteria tertentu harus dipenuhi agar suatu zat dapat disebut kertas: yang terpenting, seratnya harus nabati, seratnya harus diproses dengan cara tertentu untuk memecah bahan menjadi serat-serat tersendiri, dan lembarannya harus dibentuk dengan cara menuang campuran serat-air yang telah dihaluskan pada saringan, biasanya saringan yang dicelupkan ke dalam campuran berair dan memungkinkan kelebihan air mengalir keluar.";
      let isFullTextDisplayed = false;

      function updateTextDisplay() {
        if (!paperDescription) return; // Pengaman jika elemen tidak ada
        if (isFullTextDisplayed) {
          paperDescription.textContent = fullText;
          toggleReadMoreButton.textContent = "Tampilkan lebih sedikit";
          copyrightNotice.style.display = 'inline';
        } else {
          paperDescription.textContent = truncatedText;
          toggleReadMoreButton.textContent = "Baca lebih banyak";
          copyrightNotice.style.display = 'none';
        }
      }

      if (toggleReadMoreButton) {
        updateTextDisplay(); // Inisialisasi teks saat halaman dimuat
        toggleReadMoreButton.addEventListener('click', () => {
          isFullTextDisplayed = !isFullTextDisplayed;
          updateTextDisplay();
        });
      }

    });

    // NOTE: Semua logika scroll Anda sebelumnya sebaiknya juga dimasukkan ke dalam 'DOMContentLoaded' di atas,
    // namun untuk fokus memperbaiki pop-up, kita pisahkan dulu. Jika scroll masih berfungsi, biarkan saja.
    // Jika tidak, pindahkan semua kode dari window.addEventListener('load', ...) ke dalam document.addEventListener('DOMContentLoaded', ...).
  </script>
</body>


<script src="{{ asset('media/js/sidebar.js') }}"></script>

</html>