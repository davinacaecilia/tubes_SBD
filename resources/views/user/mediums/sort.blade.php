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
  @include('user.partials.navbar2')

  <section class="headline">
    <h1>Mediums</h1>
    <div class="tabs">
      <a href="{{ route('user.mediums.all') }}">All</a>
      <a id="az-tab" class="active" href="{{ route('user.mediums.AZ') }}">A–Z</a>
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
      <a href="#">
        <img src="{{ asset('sbd.jpg') }}" alt="Item 1">
      </a>
      <div class="info">
        <h4>Paper</h4>
        <p>3600 Items</p>
      </div>
    </div>
    <div class="card">
      <a href="#">
        <img src="{{ asset('sbd.jpg') }}" alt="Item 2">
      </a>
      <div class="info">
        <h4>Tinta</h4>
        <p>3700 Items</p>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('media/js/alfabet.js') }}"></script>
</body>
</html>
