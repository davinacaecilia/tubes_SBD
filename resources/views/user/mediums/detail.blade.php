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
  data-profile-url="{{ route('profile.custom') }}" data-is-favorited="{{ $isFavorited ? 'true' : 'false' }}" data-medium-id="{{ $medium->id }}">
  @include('user.partials.navbar')
  @include('user.partials.sidebar')

  <div class="hero-image">
    <img src="{{ $medium->img_url }}" alt="{{ $medium->name }}">
  </div>

  <div class="judul-kertas">
    <h1>{{ $medium->name }}</h1>
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

  {{-- Debug info --}}
<p>Total gambar diambil: {{ count($arts) }}</p>

<div class="scroll-wrapper">
  <button class="scroll-arrow left" onclick="scrollLeft()">
    <i class='bx bx-left-arrow-alt'></i>
  </button>

  <div class="scroll-container" id="scroll-container">
    <div class="cards-wrapper">

      {{-- Loop melalui seni yang di-chunk per 5 --}}
      @foreach ($arts->chunk(5) as $chunk)
        <div class="card card-2"> {{-- Ini adalah satu "card" yang berisi hingga 5 gambar --}}
          <div class="img-row">
            {{-- Slot untuk gambar pertama (vertikal) --}}
            @if (isset($chunk[0]))
              <img src="{{ $chunk[0]->img_url }}" class="img-vertical" alt="{{ $chunk[0]->name ?? 'Art Image' }}">
            @else
              {{-- Placeholder jika tidak ada gambar --}}
              <div class="img-vertical placeholder"></div>
            @endif

            <div class="img-stack">
              {{-- Slot untuk gambar kedua (horizontal-half) --}}
              @if (isset($chunk[1]))
                <img src="{{ $chunk[1]->img_url }}" class="img-horizontal-half" alt="{{ $chunk[1]->name ?? 'Art Image' }}">
              @else
                <div class="img-horizontal-half placeholder"></div>
              @endif

              {{-- Slot untuk gambar ketiga (square-half) --}}
              @if (isset($chunk[2]))
                <img src="{{ $chunk[2]->img_url }}" class="img-square-half" alt="{{ $chunk[2]->name ?? 'Art Image' }}">
              @else
                <div class="img-square-half placeholder"></div>
              @endif
            </div>
          </div>

          <div class="img-row">
            {{-- Slot untuk gambar keempat (horizontal-half) --}}
            @if (isset($chunk[3]))
              <img src="{{ $chunk[3]->img_url }}" class="img-horizontal-half" alt="{{ $chunk[3]->name ?? 'Art Image' }}">
            @else
              <div class="img-horizontal-half placeholder"></div>
            @endif

            {{-- Slot untuk gambar kelima (square-half) --}}
            @if (isset($chunk[4]))
              <img src="{{ $chunk[4]->img_url }}" class="img-square-half" alt="{{ $chunk[4]->name ?? 'Art Image' }}">
            @else
              <div class="img-square-half placeholder"></div>
            @endif
          </div>
        </div>
      @endforeach

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
          @foreach ($listMediums as $listMedium)
          <div class="card-grid-item">
            <div class="img-wrapper">
              <a href="{{ route('user.mediums.detail', $listMedium->id) }}">
                <img src="{{ $listMedium->img_url }}" alt="{{ $listMedium->name }}">
              </a>
            </div>
            <div class="info">
              <h4>{{ $listMedium->name }}</h4>
              <p>{{ $listMedium->art_count ?? 'N/A' }} items</p>
            </div>
          </div>
          @endforeach
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
    const fullText = @json($medium->desc);
    const truncatedText = fullText.length > 300 ? fullText.slice(0, 300) + '...' : fullText;
    let isFullTextDisplayed = false;
  </script>

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
      const mediumId = bodyElement.dataset.mediumId;
      let isFavorited = bodyElement.dataset.isFavorited === 'true';

      // Fungsi untuk update tampilan ikon (ini sudah Anda miliki, tapi kita pastikan lengkap)
      const updateFavoriteIcon = () => {
        if (!favoriteIcon) return; // Pengaman jika ikon tidak ditemukan
        if (isFavorited) {
          favoriteIcon.classList.add('bxs-heart');
          favoriteIcon.classList.remove('bx-heart');
        } else {
          favoriteIcon.classList.add('bx-heart');
          favoriteIcon.classList.remove('bxs-heart');
        }
      };

      // 1. PENTING: Panggil fungsi ini untuk set status ikon saat halaman baru dimuat.
      updateFavoriteIcon();

      // 2. PENTING: Tambahkan event listener dengan logika FETCH yang sebelumnya hilang.
      if (favoriteIcon) {
        favoriteIcon.addEventListener('click', () => {
          if (!isLoggedIn) {
            loginPopup.style.display = 'flex';
            return;
          }

          fetch('{{ route("favorites.toggle") }}', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
              favorable_id: mediumId,
              favorable_type: 'Medium'
            })
          })
            .then(response => {
              if (!response.ok) { throw new Error('Server responded with an error'); }
              return response.json();
            })
            .then(data => {
              // Update status berdasarkan balasan server
              isFavorited = (data.status === 'added');
              // Panggil lagi fungsi update ikon untuk mengubah tampilannya
              updateFavoriteIcon();
            })
            .catch(error => {
              console.error('Error toggling favorite:', error);
              alert('Gagal mengubah status favorit. Silakan coba lagi.');
            });
        });
      }
      
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