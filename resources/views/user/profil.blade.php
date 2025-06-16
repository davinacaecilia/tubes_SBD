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
  @include('media.navbar')

  @include('media.sidebar')

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
<script src="{{ asset('media/js/sidebar.js') }}"></script>

</html>
