<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Koleksi</title>
  <link rel="stylesheet" href="style.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
 <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
  </head>
<body>
<header class="topbar">
    <div class="left">
      <div class="menu-icon">&#9776;</div>
      <div class="logo">Google <span>Arts & Culture</span></div>
    </div>
    <nav class="nav-menu">
      <a href="#">Home</a>
      <a href="#">Explore</a>
      <a href="#">Play</a>
      <a href="#">Nearby</a>
      <a href="#">Favorites</a>
    </nav>
    <div class="search-icon">
      <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 24 24" fill="black">
        <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 
                 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 
                 4.23-1.57l.27.28v.79l5 5 
                 1.49-1.49-5-5zM9.5 14C7.01 
                 14 5 11.99 5 9.5S7.01 5 
                 9.5 5 14 7.01 14 9.5 
                 11.99 14 9.5 14z"/>
      </svg>
    </div>
  </header>

  <!-- SIDEBAR DITAMBAHKAN DI SINI -->
  <div id="sidebar" class="sidebar">
    <div class="menu-icon menu-close">☰</div>

    <div class="sidebar-scrollable">
      <hr class="full-divider"/>
      <ul>
        <li><i class='bx bx-home-alt sidebar-icon'></i> Home</li>
        <li><i class='bx bx-compass sidebar-icon'></i> Explore</li>
        <li><i class='bx bx-map sidebar-icon'></i> Nearby</li>
        <li>
          <a href="{{ route('login') }}" style="text-decoration: none; color: inherit;">
            <i class='bx bx-user sidebar-icon'></i> Profile
          </a>
        </li>
        <li><i class='bx bx-trophy sidebar-icon'></i> Achievements</li>
       <li class="collection-link active"> 
          <a href="{{ url('/az') }}" style="text-decoration: none; color: inherit;">
            <i class='bx bx-collection sidebar-icon'></i> Collections
          </a>
        </li>
        <li><i class='bx bx-collection sidebar-icon'></i> Themes</li>
        <li><i class='bx bx-test-tube sidebar-icon'></i> Experiments</li>
        <hr class="short-divider"/>
        <li><i class='bx bx-user sidebar-icon'></i> Artists</li>
        <li class="media-link">
          <a href="{{ url('/media_home') }}" style="text-decoration: none; color: inherit;">
            <i class='bx bx-image sidebar-icon'></i> Mediums
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

  <!-- SECTION GALLERY -->
  <section class="headline">
    <h1>Colletion</h1>
    <div class="tabs">
      <a class="active" href="#">All</a>
      <a href="#">A–Z</a>
      <a href="#">Map</a>
    </div>
  </section>


  <div class="gallery-container" id="mainContent">
    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="https://lh3.googleusercontent.com/ci/AL18g_S0DxG1MrIie55gKa4UatRWv9XdsPM47mrrY5Kbd_tAwQDKYlRRYpEkO6Q3ZHtsfSkW-AhMUQ=w190-c-h256-fcrop64=1" alt="MoMA" />
      </div>
      <h2>MoMA</h2>
      <p class="subtitle">MoMA The Museum of Modern Art</p>
      <p class="location">Kota New York, Amerika Serikat</p>
    </div>

    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="{{asset('/sbd.jpg')}}" alt="Orsay" />
      </div>
      <h2>Musée d'Orsay, Paris</h2>
      <p class="subtitle">Paris, Prancis</p>
    </div>

    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="https://lh3.googleusercontent.com/ci/AL18g_SbSDWiDDUnj_B5_rHUNQfO9H0nfcu5E6MtzYpk_LqFIq9D7K54ctJrWL1T2I_IVXz3oeP4=w373-c-h300-rw-v1" alt="Van Gogh" />
      </div>
      <h2>Van Gogh Museum</h2>
      <p class="subtitle">Kota Amsterdam, Belanda</p>
    </div>

    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="{{asset('/sbd.jpg')}}" alt="Uffizi" />
      </div>
      <h2>Uffizi Gallery</h2>
      <p class="subtitle">Kota Firenze, Italia</p>
    </div>

    <div class="gallery-card">
      <div class="img-wrapper">
        <img src="{{asset('/sbd.jpg')}}" alt="Chicago" />
      </div>
      <h2>The Art Institute of Chicago</h2>
      <p class="subtitle">Chicago, Amerika Serikat</p>
    </div>
  </div>
</body>
<script>

  const sidebar = document.getElementById('sidebar');
  const openMenu = document.querySelector('.menu-icon'); 
  const closeMenu = sidebar.querySelector('.menu-close'); 

  openMenu.addEventListener('click', () => {
    sidebar.classList.add('active');
  });

  closeMenu.addEventListener('click', () => {
    sidebar.classList.remove('active');
  });

</script>
</html>
