<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Thirty-Six Views of Mount Fuji: The Great Wave Off the Coast of Kanagawa — Google Arts & Culture</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('media/karya.css') }}"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="icon" href="https://www.gstatic.com/culturalinstitute/stella/apple-touch-icon-180x180-v1.png" type="image/x-icon">
</head>
<body>
  <header class="topbar">
    <div class="left">
      <a href="{{ url('/isi_media') }}" class="menu-icon menu-back"><i class='bx bx-arrow-back'></i></a>
      <div class="logo">Google <span>Arts & Culture</span></div>
    </div>
    <nav class="nav-menu">
      <a href="#">Home</a>
      <a href="#">Explore</a>
      <a href="#">Play</a>
      <a href="#">Nearby</a>
      <a href="#" id="favoritesNavLink">Favorites</a>
    </nav>
    <div class="right">
      <div class="search-icon">
        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 24 24" fill="black">
          <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 5 1.49-1.49-5-5zM9.5 14C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
        </svg>
      </div>
      <button class="sign-in-button">Sign In</button>
    </div>
  </header>

  <div class="main-content-wrapper">
    <section class="art-content-section">
      <div class="art-image-container"> <img src="{{ asset('sbd.jpg') }}" alt="Thirty-Six Views of Mount Fuji: The Great Wave Off the Coast of Kanagawa" class="zoomable" />
      </div>

      <hr class="content-divider"/>

      <div class="art-info-block">
        <div class="art-left-column">
          <h1 class="art-title">Thirty-Six Views of Mount Fuji: The Great Wave Off the Coast of Kanagawa</h1>
          <p class="art-subtitle">Katsushika Hokusai · Periode Edo, abad ke-19</p>
          <div class="art-actions">
            <i class='bx bx-heart'></i> <i class='bx bx-share-alt'></i>
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
            Tiga Puluh Enam Pemandangan Gunung Fuji merupakan rangkaian 46 cetakan yang menggambarkan berbagai fitur <a href="#">Gunung Fuji</a>, gunung tertinggi di <a href="#">Jepang</a>. Dalam cetakan ini, biru nila, warna yang sangat populer saat itu, digunakan sebagai garis luar utama untuk menghasilkan efek yang tajam.
          </p>
          <p>
            Meskipun sering disalahpahami sebagai tsunami, gelombang tersebut sebenarnya adalah gelombang besar di laut lepas. Gelombang ini mengancam tiga perahu dengan gunung yang tertutup salju muncul di latar belakang. "The Great Wave" adalah cetakan pertama dan paling terkenal dari seri ini. Karya ini merupakan salah satu karya seni yang paling dikenal di dunia dan contoh yang paling terkenal dari cetakan balok kayu Jepang.
          </p>
        </div>
        <div class="desc-right">
          <p>
            Hokusai menggambar gelombang tersebut sebagai kerangka yang mengelilingi Gunung Fuji, memperlihatkan kekuatan alam dan kerapuhan manusia.
          </p>
          <p>
            Diyakini bahwa karya ini dibuat antara tahun 1829 dan 1833. Cetakan ini adalah bagian dari genre seni yang dikenal sebagai Ukiyo-e, yang merupakan gaya seni yang populer di Jepang dari abad ke-17 hingga ke-19. Cetakan Ukiyo-e biasanya menampilkan pemandangan dari "dunia mengambang", termasuk aktor kabuki, wanita cantik, dan pemandangan alam.
          </p>
        </div>
      </div>
    </section>
  </div>

  <a href="{{ url('/karya') }}"class="nav-arrow left-arrow"><i class='bx bx-left-arrow-alt'></i></a>
 <a href="{{ url('/karya') }}"class="nav-arrow right-arrow"><i class='bx bx-right-arrow-alt'></i></a>

  <div id="signInModalOverlay" class="modal-overlay">
    <div class="modal-content">
      <h2 class="modal-title">Sign in required</h2>
      <p class="modal-message">You need to sign in to add favorites and make collections to share</p>
      <div class="modal-actions">
        <a href="#" id="notNowButton" class="modal-button not-now">Not Now</a>
        <a href="#" id="signInButton" class="modal-button sign-in">Sign In</a>
      </div>
    </div>
  </div>

  <script>
    const heartIcon = document.querySelector('.art-actions .bx-heart'); // Memilih ikon hati
    const signInModalOverlay = document.getElementById('signInModalOverlay'); // Modal overlay
    const notNowButton = document.getElementById('notNowButton'); // Tombol 'Not Now' di modal
    const signInButton = document.getElementById('signInButton'); // Tombol 'Sign In' di modal

    // Simulasikan status login
    // Dalam aplikasi nyata, ini akan berasal dari backend atau penyimpanan lokal (localStorage)
    let isLoggedIn = false; // Atur ke 'true' untuk menguji status login

    // Fungsi untuk menampilkan modal
    function showModal() {
      signInModalOverlay.style.display = 'flex';
    }

    // Fungsi untuk menyembunyikan modal
    function hideModal() {
      signInModalOverlay.style.display = 'none';
    }

    // Fungsi untuk mengubah status ikon hati
    function toggleHeartIcon() {
      // Jika ikon saat ini adalah hati kosong (outline)
      if (heartIcon.classList.contains('bx-heart')) {
        heartIcon.classList.remove('bx-heart');
        heartIcon.classList.add('bxs-heart'); // Ubah ke hati terisi penuh (solid)
        heartIcon.style.color = 'black'; // Pastikan warna hitam
      } else {
        // Jika ikon saat ini adalah hati terisi penuh (solid)
        heartIcon.classList.remove('bxs-heart');
        heartIcon.classList.add('bx-heart'); // Ubah kembali ke hati kosong (outline)
        heartIcon.style.color = '#555'; // Warna asli ikon hati kosong
      }
    }

    // Event listener untuk klik ikon hati
    heartIcon.addEventListener('click', function(event) {
      event.preventDefault(); // Mencegah perilaku default jika ikon adalah tautan

      if (isLoggedIn) {
        // Jika sudah login, ubah status ikon hati
        toggleHeartIcon();
      } else {
        // Jika belum login, tampilkan modal sign-in
        showModal();
      }
    });

    // Event listener untuk tombol 'Not Now' di modal
    notNowButton.addEventListener('click', function(event) {
      event.preventDefault();
      hideModal();
    });

    // Event listener untuk tombol 'Sign In' di modal
    signInButton.addEventListener('click', function(event) {
      event.preventDefault();
      // Dalam aplikasi nyata, ini akan mengarahkan ke halaman login atau membuka form login
      console.log('Simulating sign-in action...');
      // Untuk demonstrasi, kita simulasikan login berhasil setelah mengklik 'Sign In'
      isLoggedIn = true; // Simulasikan login berhasil
      hideModal(); // Sembunyikan modal
      toggleHeartIcon(); // Ubah ikon hati menjadi terisi setelah "login"
      alert('Anda sekarang "masuk"! Klik hati lagi untuk mengalihkannya.');
    });

    // Opsional: Sembunyikan modal jika diklik di luar (pada overlay itu sendiri)
    signInModalOverlay.addEventListener('click', function(event) {
      if (event.target === signInModalOverlay) {
        hideModal();
      }
    });

    const favoritesNavLink = document.getElementById('favoritesNavLink');

  favoritesNavLink.addEventListener('click', function (event) {
    event.preventDefault();
    if (!isLoggedIn) {
      showModal();
    } else {
      window.location.href = 'profil.html'; // Atur redirect kalau sudah login
    }
  });

  </script>
</body>
</html>
