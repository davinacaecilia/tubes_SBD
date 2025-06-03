<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Koleksi</title>
  <link rel="stylesheet" href="style.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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
    <!-- Ikon Search (SVG) -->
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
  <section class="headline">
    <h1>Collections</h1>
    <div class="tabs">
      <a class="active" href="#">All</a>
      <a href="#">A–Z</a>
      <a href="#">Map</a>
    </div>
  </section>

 <div class="gallery-container">
  <div class="gallery-card">
    <div class="img-wrapper">
      <img src="{{asset('/sbd.jpg')}}" alt="MoMA" />
    </div>
    <h2>MoMA</h2>
    <p class="subtitle">MoMA The Museum of Modern Art</p>
    <p class="location">Kota New York, Amerika Serikat</p>
  </div>

  <div class="gallery-card">
    <div class="img-wrapper">
      <img src="{{asset('/sbd.jpg')}}" alt="Orsay" />
    </div>
    <h2>Musée d’Orsay, Paris</h2>
    <p class="subtitle">Paris, Prancis</p>
  </div>

  <div class="gallery-card">
    <div class="img-wrapper">
      <img src="{{asset('/sbd.jpg')}}" alt="Van Gogh" />
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
</html>
