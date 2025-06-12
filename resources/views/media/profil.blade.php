<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Your Profile — Google Arts & Culture</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('media/profil.css') }}"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="icon" href="https://www.gstatic.com/culturalinstitute/stella/apple-touch-icon-180x180-v1.png" type="image/x-icon">
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
      <a class="active" href="{{ url('/profil') }}">Favorites</a>
    </nav>
      <div class="right">
        <div class="search-icon">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 24 24" fill="black">
            <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 5 1.49-1.49-5-5zM9.5 14C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
          </svg>
        </div>
        <div class="user-profile-nav">
          <img src="{{ asset('sbd.jpg') }}" alt="Foto Profil" class="nav-profile-img">
        </div>
      </div>
  </header>

<div id="sidebar" class="sidebar">
  <div class="menu-icon menu-close">☰</div>

  <div class="sidebar-scrollable">
    <hr class="full-divider"/>
    <ul>
      <li><i class='bx bx-home-alt sidebar-icon'></i> Home</li>
      <li><i class='bx bx-compass sidebar-icon'></i> Explore</li>
      <li><i class='bx bx-map sidebar-icon'></i> Nearby</li>
      <li class="active"> <a href="{{ url('/profil') }}" style="text-decoration: none; color: inherit;"> <i class='bx bx-user sidebar-icon'></i> Profile
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


  <section class="headline">
  <div class="profile-header">
    <img src="{{ asset('sbd.jpg') }}" alt="Foto Profil" class="profile-img" />
    <div class="tabs">
      <a class="active" href="#">Favorites</a>
      <a href="#">Gallery</a>
    </div>
  </div>
</section>

<h2 class="section-title">Culture Weekly</h2>

<div class="gallery-container">
  <div class="gallery-card culture-style">
    <div class="img-wrapper">
      <img src="{{ asset('sbd.jpg') }}" alt="Culture Weekly" />
      <div class="badge-top">NEW</div>
      <div class="card-text">
        <img src="{{ asset('img/logo.svg') }}" alt="Logo" style="width: 150px; height: 100px; object-fit: contain; vertical-align: middle; margin-right: 1px;" />
        <p><b>Pekan tanggal 2 Jun</b></p>
      </div>
    </div>
  </div>
</div>
</div>

<h2 class="section-title">Topic <span class="section-count">2</span></h2>
<div class="container">
  <div class="grid">
    <div class="card">
      <img src="{{ asset('sbd.jpg') }}" alt="Kertas">
      <div class="badge-top badge-blue">
  <svg xmlns="http://www.w3.org/2000/svg" class="clock-icon" viewBox="0 0 24 24" width="14" height="14" fill="white">
    <path d="M12 1a11 11 0 1 0 11 11A11.012 11.012 0 0 0 12 1Zm0 20a9 9 0 1 1 9-9 9.01 9.01 0 0 1-9 9Zm.5-14h-1v6l5.25 3.15.5-.86-4.75-2.79Z"/>
  </svg>
  638 new
</div>
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
  </div>
</div>
</body>
<script>
  const sidebar = document.getElementById('sidebar');
  const openIcon = document.querySelector('.menu-open');
  const closeIcon = document.querySelector('.menu-close');

  openIcon.addEventListener('click', () => {
    sidebar.classList.add('active');
  });

  closeIcon.addEventListener('click', () => {
    sidebar.classList.remove('active');
  });

</script>

</html>
