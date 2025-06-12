<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Paper — Google Arts & Culture</title>
  <link rel="stylesheet" href="{{ asset('media/isiMedia.css') }}"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon" href="https://www.gstatic.com/culturalinstitute/stella/apple-touch-icon-180x180-v1.png" type="image/x-icon">
</head>
<body>
  <header class="topbar">
    <div class="left">
      <div class="menu-icon menu-open">&#9776;</div> <div class="logo">Google <span>Arts & Culture</span></div>
    </div>
    <nav class="nav-menu">
      <a href="#">Home</a>
      <a href="#">Explore</a>
      <a href="#">Play</a>
      <a href="#">Nearby</a>
      <a href="#" id="favoritesNavLink">Favorites</a>
      <div class="search-signin-group">
        <div class="search-icon">
          <img src="{{ asset('img/icon.svg') }}" alt="search-icon">
        </div>
        <a href="#" class="sign-in-button">Sign in</a>
      </div>
    </nav>
  </header>

  <div id="sidebar" class="sidebar">
    <div class="menu-icon menu-close">&#9776;</div>

    <div class="sidebar-scrollable">
      <hr class="full-divider"/>
      <ul>
        <li><i class='bx bx-home-alt sidebar-icon'></i> Home</li>
      <li><i class='bx bx-compass sidebar-icon'></i> Explore</li>
      <li><i class='bx bx-map sidebar-icon'></i> Nearby</li>
      <li class="profil-link">
  <a href="#" id="profileLink" style="text-decoration: none; color: inherit;">
    <i class='bx bx-user sidebar-icon'></i> Profile
  </a>
</li>
      <li><i class='bx bx-trophy sidebar-icon'></i> Achievements</li>
       <li class="collection-link"> <a href="{{ url('/az') }}" style="text-decoration: none; color: inherit;"> <i class='bx bx-collection sidebar-icon'></i> Collections
            </a>
        </li>
      <li><i class='bx bx-collection sidebar-icon'></i> Themes</li>
      <li><i class='bx bx-test-tube sidebar-icon'></i> Experiments</li>
      <hr class="short-divider"/>
      <li><i class='bx bx-user sidebar-icon'></i> Artists</li>
      <li class="media-link"> <a href="{{ url('/media_home') }}" style="text-decoration: none; color: inherit;"> <i class='bx bx-image sidebar-icon'></i> Mediums
            </a>
        </li>
      <li><i class='bx bx-palette sidebar-icon'></i> Art movements</li>
      <li><i class='bx bx-time sidebar-icon'></i> Historical events</li>
      <li><i class='bx bx-user sidebar-icon'></i> Historical figures</li>
      <li><i class='bx bx-map sidebar-icon'></i> Places</li>
      <hr class="short-divider"/>
      <li><i class='bx bx-error-circle sidebar-icon'></i> About</li>
      <li><i class='bx bx-cog sidebar-icon'></i> Settings</li>
      <li><i class='bx bx-home-alt sidebar-icon'></i> View activity</li>
      <li><i class='bx bx-message-square-dots sidebar-icon'></i> Send feedback</li>
      </ul>
    </div>

    <hr class="full-divider" />
    <div class="sidebar-footer">
      <p>Privacy & Terms • Generative AI Terms</p>
    </div>
  </div>
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
           <a href="{{ url('/karya') }}">
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
            <a href="{{ url('/karya') }}">
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
            <a href="{{ url('/isi_media') }}">
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
        <button id="notNowBtn" class="popup-button secondary">Not now</button>
        <button id="signInBtn" class="popup-button primary">Sign in</button>
      </div>
    </div>
  </div>

</body>

<script>
  window.addEventListener('load', () => {
    // Scroll logic for the top section (Temukan media ini)
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
  });


  document.addEventListener('DOMContentLoaded', () => {
    const paperDescription = document.getElementById('paperDescription');
    const toggleReadMoreButton = document.getElementById('toggleReadMore');
    const copyrightNotice = document.getElementById('copyrightNotice');
    const topbar = document.querySelector('.topbar');
    const favoriteIcon = document.getElementById('favoriteIcon'); // Ambil elemen ikon hati
    const loginPopup = document.getElementById('loginPopup');
    const notNowBtn = document.getElementById('notNowBtn');
    const signInBtn = document.getElementById('signInBtn');
    const profileLink = document.getElementById('profileLink');
    const favoritesNavLink = document.getElementById('favoritesNavLink');
if (favoritesNavLink) {
  favoritesNavLink.addEventListener('click', function (e) {
    e.preventDefault();
    if (!isLoggedIn) {
      loginPopup.style.display = 'flex';
    } else {
      window.location.href = 'profil.html';
    }
  });
}

profileLink.addEventListener('click', (e) => {
  e.preventDefault(); // cegah navigasi langsung
  if (!isLoggedIn) {
    loginPopup.style.display = 'flex';
  } else {
    window.location.href = 'profil.html';
  }
});


    // SIMULASI STATUS LOGIN
    let isLoggedIn = false; // Ganti ini menjadi 'true' jika user sudah login

    const fullText = "Lembaran serat nabati yang diisolasi atau dikempa yang diproduksi dengan cara menyaring serat nabati yang telah dihaluskan dari bubur berair. Kriteria tertentu harus dipenuhi agar suatu zat dapat disebut kertas: yang terpenting, seratnya harus nabati, seratnya harus diproses dengan cara tertentu untuk memecah bahan menjadi serat-serat tersendiri, dan lembarannya harus dibentuk dengan cara menuang campuran serat-air yang telah dihaluskan pada saringan, biasanya saringan yang dicelupkan ke dalam campuran berair dan memungkinkan kelebihan air mengalir keluar. Kertas merupakan media yang paling umum untuk menggambar, mencetak, membuat cetakan, melukis dengan cat air, dan menulis; bersama dengan perkamen, kertas juga banyak digunakan untuk manuskrip abad pertengahan, dan untuk pengembangan buku cetak sejak abad ke-15 dan seterusnya.";

    const truncatedText = "Lembaran serat nabati yang diisolasi atau dikempa yang diproduksi dengan cara menyaring serat nabati yang telah dihaluskan dari bubur berair. Kriteria tertentu harus dipenuhi agar suatu zat dapat disebut kertas: yang terpenting, seratnya harus nabati, seratnya harus diproses dengan cara tertentu untuk memecah bahan menjadi serat-serat tersendiri, dan lembarannya harus dibentuk dengan cara menuang campuran serat-air yang telah dihaluskan pada saringan, biasanya saringan yang dicelupkan ke dalam campuran berair dan memungkinkan kelebihan air mengalir keluar.";

    let isFullTextDisplayed = false;

    function updateTextDisplay() {
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

    updateTextDisplay();

    toggleReadMoreButton.addEventListener('click', () => {
      isFullTextDisplayed = !isFullTextDisplayed;
      updateTextDisplay();
    });

    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        topbar.classList.add('scrolled');
      } else {
        topbar.classList.remove('scrolled');
      }
    });

    // --- JS untuk sidebar (Tambahkan ini) ---
    const sidebar = document.getElementById('sidebar');
    const openIcon = document.querySelector('.menu-open');
    const closeIcon = document.querySelector('.menu-close');

    if (openIcon && sidebar) {
      openIcon.addEventListener('click', () => {
        sidebar.classList.add('active');
      });
    }

    if (closeIcon && sidebar) {
      closeIcon.addEventListener('click', () => {
        sidebar.classList.remove('active');
      });
    }

    // --- JS untuk fungsionalitas ikon hati & pop-up login ---

    // Fungsi untuk memperbarui tampilan ikon hati
    function updateFavoriteIcon() {
      if (isLoggedIn) {
        favoriteIcon.classList.remove('bx-heart');
        favoriteIcon.classList.add('bxs-heart'); // bx-solid-heart
      } else {
        favoriteIcon.classList.remove('bxs-heart');
        favoriteIcon.classList.add('bx-heart'); // bx-regular-heart
      }
    }

    // Panggil saat DOMContentLoaded untuk mengatur status awal
    updateFavoriteIcon();

    favoriteIcon.addEventListener('click', () => {
      if (!isLoggedIn) {
        loginPopup.style.display = 'flex'; // Tampilkan pop-up jika belum login
      } else {
        if (favoriteIcon.classList.contains('bxs-heart')) {
          favoriteIcon.classList.remove('bxs-heart');
          favoriteIcon.classList.add('bx-heart');
          console.log('Item dihapus dari favorit');
        } else {
          favoriteIcon.classList.remove('bx-heart');
          favoriteIcon.classList.add('bxs-heart');
          console.log('Item ditambahkan ke favorit');
        }
      }
    });

    // Event listener untuk tombol "Not now" di pop-up
    notNowBtn.addEventListener('click', () => {
      loginPopup.style.display = 'none'; // Sembunyikan pop-up
    });

    // Event listener untuk tombol "Sign in" di pop-up
    signInBtn.addEventListener('click', () => {
      window.location.href = 'halaman_login.html';
      loginPopup.style.display = 'none'; // Sembunyikan pop-up setelah klik
    });

    // Tutup pop-up jika klik di luar area konten pop-up
    loginPopup.addEventListener('click', (event) => {
      if (event.target === loginPopup) {
        loginPopup.style.display = 'none';
      }
    });
  });
</script>
</html>
