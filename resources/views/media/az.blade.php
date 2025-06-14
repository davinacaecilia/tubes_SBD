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
</head>

<body>
  <header class="topbar">
    <div class="left">
      <div class="menu-icon menu-open">☰</div>
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
          <path
            d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 5 1.49-1.49-5-5zM9.5 14C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
        </svg>
      </div>
      <button class="sign-in-button">Sign In</button>
    </div>
  </header>

  <div id="sidebar" class="sidebar">
    <div class="menu-icon menu-close">☰</div>
    <div class="sidebar-scrollable">
      <hr class="full-divider" />
      <ul>
        <li><i class='bx bx-home-alt sidebar-icon'></i> Home</li>
        <li><i class='bx bx-compass sidebar-icon'></i> Explore</li>
        <li><i class='bx bx-map sidebar-icon'></i> Nearby</li>
        <!-- <li>
    @auth
        {{-- JIKA PENGGUNA SUDAH LOGIN: Arahkan ke profil kustom --}}
        <a href="{{ route('profile.custom') }}" style="text-decoration: none; color: inherit;">
            <i class='bx bx-user sidebar-icon'></i> Profile
        </a>
    @else
        {{-- JIKA PENGGUNA BELUM LOGIN (TAMU): Arahkan ke halaman login --}}
        <a href="{{ route('login') }}" style="text-decoration: none; color: inherit;">
            <i class='bx bx-user sidebar-icon'></i> Profile
        </a>
    @endauth
</li> -->
        <li class="profil-link">
          @auth
        <a href="{{ route('profile.custom') }}" id="profileLink" style="text-decoration: none; color: inherit;">
        <i class='bx bx-user sidebar-icon'></i> Profile
        </a>
          @else
        <a href="{{ route('login') }}" id="profileLink" style="text-decoration: none; color: inherit;">
        <i class='bx bx-user sidebar-icon'></i> Profile
        </a>
          @endauth
        </li>
        <li><i class='bx bx-trophy sidebar-icon'></i> Achievements</li>
        <li class="active"> <a href="{{ url('/az') }}" style="text-decoration: none; color: inherit;"> <i
              class='bx bx-collection sidebar-icon'></i> Collections
          </a>
        </li>
        <li><i class='bx bx-collection sidebar-icon'></i> Themes</li>
        <li><i class='bx bx-test-tube sidebar-icon'></i> Experiments</li>
        <hr class="short-divider" />
        <li><i class='bx bx-user sidebar-icon'></i> Artists</li>
        <li class="media-link"> <a href="{{ url('/media_home') }}" style="text-decoration: none; color: inherit;"> <i
              class='bx bx-image sidebar-icon'></i> Mediums
          </a>
        </li>
        <li><i class='bx bx-palette sidebar-icon'></i> Art movements</li>
        <li><i class='bx bx-time sidebar-icon'></i> Historical events</li>
        <li><i class='bx bx-user sidebar-icon'></i> Historical figures</li>
        <li><i class='bx bx-map sidebar-icon'></i> Places</li>
        <hr class="short-divider" />
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
  <section class="headline">
    <h1>Collections</h1>
    <div class="tabs">
      <a href="#">All</a>
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

  <!-- Modal Sign In Required -->
  <div id="signInModal" style="display:none;" class="modal-overlay">
    <div class="modal-content">
      <h2>Sign in required</h2>
      <p>You need to sign in to add favorites and make collections to share</p>
      <div class="modal-buttons">
        <button onclick="closeModal()" class="not-now">Not Now</button>
        <button onclick="window.location.href='#'" class="sign-in">Sign In</button>
      </div>
    </div>
  </div>

  <script>
    // Sidebar logic
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

    // Alphabet filter scroll logic (no changes here)
    const sliderWrapper = document.querySelector('.alphabet-filter-wrapper');
    const alphabetFilter = document.querySelector('.alphabet-filter');
    const letters = document.querySelectorAll('.alphabet-filter a');
    const activeMarker = document.querySelector('.active-marker');

    let isDown = false;
    let startX;
    let currentTransformX;
    let animationFrameId;
    let velocity = 0;
    let lastX = 0;
    let lastTime = 0;

    // Fungsi untuk mendapatkan huruf yang paling dekat dengan tengah wrapper
    function getClosestLetterToCenter() {
      let closestLetter = null;
      let minDistance = Infinity;
      const wrapperMidpointX = sliderWrapper.offsetWidth / 2;

      letters.forEach(letter => {
        const letterRect = letter.getBoundingClientRect();
        const letterCenterRelativeToViewport = letterRect.left + (letterRect.width / 2);
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
      return matrix.m41;
    }

    // Fungsi untuk melakukan "snap" ke huruf terdekat
    function snapToNearestLetter() {
      const closestLetter = getClosestLetterToCenter();
      if (closestLetter) {
        const wrapperWidth = sliderWrapper.offsetWidth;
        const letterWidth = closestLetter.offsetWidth;
        const letterOffset = closestLetter.offsetLeft;
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
        const letterOffset = letterA.offsetLeft;
        // Hitung posisi transformX agar 'A' berada di tengah wrapper
        const initialTransformX = - (letterOffset + (letterWidth / 2) - (wrapperWidth / 2));
        alphabetFilter.style.transition = 'none';
        alphabetFilter.style.transform = `translateX(${initialTransformX}px)`;
      }
      updateActiveLetter();
    }

    // Handle mousedown event on the wrapper
    sliderWrapper.addEventListener('mousedown', (e) => {
      isDown = true;
      startX = e.pageX;
      currentTransformX = getTranslateX(alphabetFilter);
      // Hentikan momentum jika ada
      if (animationFrameId) {
        cancelAnimationFrame(animationFrameId);
      }
      alphabetFilter.style.transition = 'none';

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
        if (Math.abs(velocity) > 0.5) {
          applyMomentum();
        } else {
          snapToNearestLetter();
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
      letterLink.addEventListener('click', function (e) {
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

    // Modal logic
    const profileLink = document.getElementById('profileLink');
    const modal = document.getElementById('signInModal');

    profileLink.addEventListener('click', function (e) {
      e.preventDefault();
      modal.style.display = 'flex';
    });

    function closeModal() {
      modal.style.display = 'none';
    }
    window.addEventListener('load', initializeScrollAndActiveLetter);
    window.addEventListener('resize', initializeScrollAndActiveLetter);

    //warning favorites
    const favoritesNavLink = document.getElementById('favoritesNavLink');

    favoritesNavLink.addEventListener('click', function (e) {
      e.preventDefault();
      modal.style.display = 'flex';
    });

  </script>
</body>

</html>