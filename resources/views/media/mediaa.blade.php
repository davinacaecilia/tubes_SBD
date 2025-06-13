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
  <header class="topbar">
    <div class="left">
      <a href="{{ url('/az') }}" class="menu-icon menu-back"><i class='bx bx-arrow-back'></i></a>
      <div class="logo">Google <span>Arts & Culture</span></div>
    </div>
    <nav class="nav-menu">
     <a href="#">Home</a>
      <a href="#">Explore</a>
      <a href="#">Play</a>
      <a href="#">Nearby</a>
     <a href="#" id="favoritesLink">Favorites</a>
    </nav>
    <div class="right">
      <div class="search-icon">
        <img src="{{ asset('img/icon.svg') }}" alt="search-icon">
      </div>
      <button class="sign-in-button">Sign In</button>
    </div>
  </header>

  <section class="headline">
    <h1>Mediums</h1>
    <div class="tabs">
      <a href="{{ url('/media_home') }}">All</a>
      <a id="az-tab" class="active" href="#">A–Z</a>
    </div>
     <div class="alphabet-filter-wrapper">
      <div class="active-marker"></div> <div class="alphabet-filter">
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
      <img src="{{ asset('sbd.jpg') }}" alt="Tinta">
      <div class="info">
        <h4>Tinta</h4>
        <p>99.300 item</p>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('sbd.jpg') }}" alt="Tinta">
      <div class="info">
        <h4>Tinta</h4>
        <p>99.300 item</p>
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
  const sliderWrapper = document.querySelector('.alphabet-filter-wrapper');
  const alphabetFilter = document.querySelector('.alphabet-filter');
  const letters = document.querySelectorAll('.alphabet-filter a');
  const activeMarker = document.querySelector('.active-marker'); // Dapatkan marker
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


  let isDown = false;
  let startX;
  let currentTransformX; // Menyimpan nilai translateX saat ini
  let animationFrameId; // Untuk requestAnimationFrame
  let velocity = 0; // Kecepatan geser
  let lastX = 0; // Posisi X terakhir saat mouse bergerak
  let lastTime = 0; // Waktu terakhir saat mouse bergerak

  // Fungsi untuk mendapatkan huruf yang paling dekat dengan tengah wrapper
  function getClosestLetterToCenter() {
      let closestLetter = null;
      let minDistance = Infinity;
      const wrapperMidpointX = sliderWrapper.offsetWidth / 2;

      letters.forEach(letter => {
          const letterRect = letter.getBoundingClientRect();
          // Posisi tengah huruf relatif terhadap *viewport*
          const letterCenterRelativeToViewport = letterRect.left + (letterRect.width / 2);
          // Jarak tengah huruf dari tengah wrapper (relative ke viewport)
          const distance = Math.abs(letterCenterRelativeToViewport - (sliderWrapper.getBoundingClientRect().left + wrapperMidpointX));

          if (distance < minDistance) {
              minDistance = distance;
              closestLetter = letter;
          }
      });
      return closestLetter;
  }

  // Fungsi untuk mengupdate huruf aktif
  function updateActiveLetter() {
      const closestLetter = getClosestLetterToCenter();

      letters.forEach(l => l.classList.remove('active'));
      if (closestLetter) {
          closestLetter.classList.add('active');
      }
  }

  // Fungsi untuk mendapatkan nilai translateX saat ini dari alphabetFilter
  function getTranslateX(element) {
      const transformStyle = window.getComputedStyle(element).getPropertyValue('transform');
      const matrix = new DOMMatrixReadOnly(transformStyle);
      return matrix.m41; // m41 adalah nilai translateX
  }

  // Fungsi untuk melakukan "snap" ke huruf terdekat
  function snapToNearestLetter() {
      const closestLetter = getClosestLetterToCenter();
      if (closestLetter) {
          const wrapperWidth = sliderWrapper.offsetWidth;
          const letterWidth = closestLetter.offsetWidth;
          const letterOffset = closestLetter.offsetLeft; // Offset dari parent alphabetFilter

          // Hitung target translateX agar huruf yang paling dekat berada di tengah
          const targetTransformX = - (letterOffset + (letterWidth / 2) - (wrapperWidth / 2));

          // Hentikan animasi momentum yang sedang berjalan
          if (animationFrameId) {
              cancelAnimationFrame(animationFrameId);
          }

          // Atur transisi untuk smooth snap
          alphabetFilter.style.transition = 'transform 0.3s ease-out'; // Menggunakan ease-out untuk efek snapping
          alphabetFilter.style.transform = `translateX(${targetTransformX}px)`;

          // Pastikan update active letter setelah transisi selesai
          alphabetFilter.addEventListener('transitionend', () => {
              alphabetFilter.style.transition = 'none'; // Hapus transisi setelah selesai
              updateActiveLetter();
          }, { once: true }); // Hanya jalankan sekali
      }
  }

  // Inisialisasi posisi scroll agar 'A' di tengah
  function initializeScrollAndActiveLetter() {
    const letterA = document.querySelector('.alphabet-filter a[data-letter="A"]');
    if (letterA) {
      const wrapperWidth = sliderWrapper.offsetWidth;
      const letterWidth = letterA.offsetWidth;
      const letterOffset = letterA.offsetLeft; // Offset dari parent alphabetFilter

      // Hitung posisi transformX agar 'A' berada di tengah wrapper
      const initialTransformX = - (letterOffset + (letterWidth / 2) - (wrapperWidth / 2));

      alphabetFilter.style.transition = 'none'; // Nonaktifkan transisi untuk inisialisasi
      alphabetFilter.style.transform = `translateX(${initialTransformX}px)`;
    }
    updateActiveLetter();
  }

  // Handle mousedown event on the wrapper
  sliderWrapper.addEventListener('mousedown', (e) => {
    isDown = true;
    startX = e.pageX;
    currentTransformX = getTranslateX(alphabetFilter); // Ambil translateX saat ini

    // Hentikan momentum jika ada
    if (animationFrameId) {
        cancelAnimationFrame(animationFrameId);
    }
    alphabetFilter.style.transition = 'none'; // Hapus transisi saat mulai drag

    sliderWrapper.style.cursor = 'grabbing';
    lastX = e.pageX;
    lastTime = performance.now();
  });

  // Handle mouseleave event (when mouse leaves the wrapper while dragging)
  sliderWrapper.addEventListener('mouseleave', () => {
    if (isDown) {
        isDown = false;
        sliderWrapper.style.cursor = 'grab';
        // Aktifkan momentum jika ada kecepatan
        if (Math.abs(velocity) > 0.5) { // Batasi kecepatan agar tidak terlalu lambat
            applyMomentum();
        } else {
            snapToNearestLetter(); // Langsung snap jika tidak ada momentum
        }
    }
  });

  // Handle mouseup event (when mouse button is released)
  sliderWrapper.addEventListener('mouseup', () => {
    isDown = false;
    sliderWrapper.style.cursor = 'grab';
    // Aktifkan momentum jika ada kecepatan
    if (Math.abs(velocity) > 0.5) { // Batasi kecepatan agar tidak terlalu lambat
        applyMomentum();
    } else {
        snapToNearestLetter(); // Langsung snap jika tidak ada momentum
    }
  });

  // Handle mousemove event for dragging
  sliderWrapper.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX;
    const walk = (x - startX); // Jarak geser mouse

    const now = performance.now();
    const deltaTime = now - lastTime;

    // Hitung kecepatan geser (px/ms)
    velocity = (x - lastX) / deltaTime;

    lastX = x;
    lastTime = now;

    let newTransformX = currentTransformX + walk;

    // Batasi geseran agar tidak terlalu jauh ke kiri atau kanan
    const firstLetter = document.querySelector('.alphabet-filter a[data-letter="A"]');
    const lastLetter = document.querySelector('.alphabet-filter a[data-letter="Z"]');

    if (!firstLetter || !lastLetter) return;

    const wrapperWidth = sliderWrapper.offsetWidth;
    const firstLetterCenter = firstLetter.offsetLeft + firstLetter.offsetWidth / 2;
    const lastLetterCenter = lastLetter.offsetLeft + lastLetter.offsetWidth / 2;

    const maxTranslateX = (wrapperWidth / 2) - firstLetterCenter;
    const minTranslateX = (wrapperWidth / 2) - lastLetterCenter;

    // Terapkan batas (dengan sedikit "over-drag" efek elastis)
    if (newTransformX > maxTranslateX) {
        newTransformX = maxTranslateX + (newTransformX - maxTranslateX) * 0.3; // Kurangi sensitivitas
    } else if (newTransformX < minTranslateX) {
        newTransformX = minTranslateX + (newTransformX - minTranslateX) * 0.3; // Kurangi sensitivitas
    }

    alphabetFilter.style.transform = `translateX(${newTransformX}px)`;
    updateActiveLetter(); // Update aktif secara real-time
  });

  // Fungsi untuk menerapkan momentum setelah drag dilepas
  function applyMomentum() {
      const friction = 0.95; // Koefisien gesekan (semakin tinggi, semakin lambat berhenti)
      const minVelocity = 0.1; // Kecepatan minimum untuk berhenti

      function animate() {
          velocity *= friction;
          let newTransformX = getTranslateX(alphabetFilter) + velocity * 16; // 16ms per frame (approx. 60fps)

          // Batasi geseran saat momentum
          const firstLetter = document.querySelector('.alphabet-filter a[data-letter="A"]');
          const lastLetter = document.querySelector('.alphabet-filter a[data-letter="Z"]');

          if (!firstLetter || !lastLetter) {
            cancelAnimationFrame(animationFrameId);
            return;
          }

          const wrapperWidth = sliderWrapper.offsetWidth;
          const firstLetterCenter = firstLetter.offsetLeft + firstLetter.offsetWidth / 2;
          const lastLetterCenter = lastLetter.offsetLeft + lastLetter.offsetWidth / 2;

          const maxTranslateX = (wrapperWidth / 2) - firstLetterCenter;
          const minTranslateX = (wrapperWidth / 2) - lastLetterCenter;

          if (newTransformX > maxTranslateX) {
              newTransformX = maxTranslateX;
              velocity = 0; // Hentikan momentum jika mentok
          } else if (newTransformX < minTranslateX) {
              newTransformX = minTranslateX;
              velocity = 0; // Hentikan momentum jika mentok
          }

          alphabetFilter.style.transform = `translateX(${newTransformX}px)`;
          updateActiveLetter();

          if (Math.abs(velocity) > minVelocity) {
              animationFrameId = requestAnimationFrame(animate);
          } else {
              cancelAnimationFrame(animationFrameId);
              snapToNearestLetter(); // Snap ke huruf terdekat setelah momentum berhenti
          }
      }
      animationFrameId = requestAnimationFrame(animate);
  }

  // Event listener untuk klik pada huruf (tetap menempatkan huruf di tengah)
  letters.forEach(letterLink => {
      letterLink.addEventListener('click', function(e) {
          e.preventDefault();
          // Hanya proses klik jika tidak sedang dalam proses drag
          if (isDown) return;

          const targetElement = this;
          const wrapperWidth = sliderWrapper.offsetWidth;
          const letterWidth = targetElement.offsetWidth;
          const letterOffset = targetElement.offsetLeft;

          // Hitung target transformX agar huruf yang diklik berada di tengah wrapper
          const targetTransformX = - (letterOffset + (letterWidth / 2) - (wrapperWidth / 2));

          // Hentikan animasi momentum jika ada
          if (animationFrameId) {
              cancelAnimationFrame(animationFrameId);
          }

          alphabetFilter.style.transition = 'transform 0.3s ease-out'; // Aktifkan transisi untuk smooth scroll
          alphabetFilter.style.transform = `translateX(${targetTransformX}px)`;

          alphabetFilter.addEventListener('transitionend', () => {
              alphabetFilter.style.transition = 'none'; // Nonaktifkan transisi setelah selesai
              updateActiveLetter();
          }, { once: true });
      });
  });

  // Panggil fungsi inisialisasi saat halaman dimuat
  window.addEventListener('load', initializeScrollAndActiveLetter);

  // Panggil updateActiveLetter saat ukuran window berubah (untuk penyesuaian di tengah)
  window.addEventListener('resize', initializeScrollAndActiveLetter);
</script>

</body>
</html>
