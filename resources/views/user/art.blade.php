<!DOCTYPE html>

<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $art->title }} — Google Arts & Culture</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('media/karya.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="icon" href="https://www.gstatic.com/culturalinstitute/stella/apple-touch-icon-180x180-v1.png"
    type="image/x-icon">
</head>

<body data-is-logged-in="{{ auth()->check() ? 'true' : 'false' }}" data-login-url="{{ route('login') }}"
  data-profile-url="{{ route('profile.custom') }}" data-art-id="{{ $art->id }}" data-is-favorited="{{ $isFavorited ? 'true' : 'false' }}">

  @include('user.partials.navbar2')

  <div class="main-content-wrapper">
    <section class="art-content-section">
      <div class="art-image-container"> <img src="{{ $art->img_url }}"
          alt="{{ $art->title }}" class="zoomable" />
      </div>

      <hr class="content-divider" />

      <div class="art-info-block">
        <div class="art-left-column">
          <h1 class="art-title">{{ $art->title }}</h1>
          <p class="art-subtitle">{{ $art->creator }}  {{ $art->created }}</p>
          <div class="art-actions">
            <i class='bx bx-heart' id="favoriteIcon"></i>
            <i class='bx bx-dots-horizontal-rounded'></i>
          </div>
        </div>
        <div class="museum-info">
          <img src="{{ $art->museum->logo_url }}" alt="{{ $art->museum->name }}" />
          <p><strong>{{ $art->museum->name }}</strong><br>{{ $art->museum->location }}</p>
        </div>
      </div>

      <div class="main-content-wrapper">
        <section class="art-content-section">
          <div class="art-description-block"> {{-- Gunakan kelas asli ini --}}
            <div class="desc-left"> {{-- Gunakan kelas asli ini --}}
              <p>
                {!! nl2br(e($descLeft)) !!} {{-- Tampilkan bagian kiri deskripsi, gunakan nl2br untuk baris baru --}}
              </p>
            </div>
            <div class="desc-right"> {{-- Gunakan kelas asli ini --}}
              <p>
                {!! nl2br(e($descRight)) !!} {{-- Tampilkan bagian kanan deskripsi --}}
              </p>
            </div>
          </div>
          </section>
      </div>
    </section>
  </div>

  @if ($previousArt)
    <a href="{{ route('user.art.detail', $previousArt->id) }}" class="nav-arrow left-arrow">
      <i class='bx bx-left-arrow-alt'></i>
    </a>
  @endif

  @if ($nextArt)
    <a href="{{ route('user.art.detail', $nextArt->id) }}" class="nav-arrow right-arrow">
      <i class='bx bx-right-arrow-alt'></i>
    </a>
  @endif

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

      const artId = bodyElement.dataset.artId;
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
              favorable_id: artId,
              favorable_type: 'Art'
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