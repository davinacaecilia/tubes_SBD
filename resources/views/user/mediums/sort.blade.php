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
      <div class="active-marker"></div> 
      @php
        $active = request()->query('starts_with', 'A');
      @endphp

      <div class="alphabet-filter">
        @foreach (range('A', 'Z') as $letter)
          <a data-letter="{{ $letter }}" href="#" class="{{ $active === $letter ? 'active' : '' }}">
            {{ $letter }}
          </a>
        @endforeach
      </div>
    </div>
  </section>

  <div class="container">
    <div class="grid">
      @foreach ($mediums as $medium)
      <div class="card">
        <a href="{{ route('user.mediums.detail', $medium->id) }}">
          <img src="{{ $medium->img_url }}" alt="{{ $medium->name }}">
        </a>
        <div class="info">
          <h4>{{ $medium->name }}</h4>
          <p>{{ $medium->art_count ?? 'N/A' }} items</p>
        </div>
      </div>
      @endforeach
    </div>
</div>

<script src="{{ asset('media/js/alfabet.js') }}"></script>

</body>
</html>
