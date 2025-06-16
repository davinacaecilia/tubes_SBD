<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Profile — Google Arts & Culture</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('media/profil.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="icon" href="https://www.gstatic.com/culturalinstitute/stella/apple-touch-icon-180x180-v1.png"
    type="image/x-icon">
  <style>
    /* General Body & Headline Styles */
    body {
      margin: 0;
      font-family: 'Roboto', sans-serif;
      color: #333;
      background-color: #fff;
    }

    .headline {
      text-align: center;
      margin-top: 40px;
    }

    .profile-header {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
    }

    .profile-img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 16px;
    }

    .tabs {
      display: flex;
      justify-content: center;
      gap: 30px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 5px;
      margin-bottom: 20px;
      width: 100%;
    }

    .tabs a {
      text-decoration: none;
      color: gray;
      font-size: 15px;
      position: relative;
      padding-bottom: 5px;
    }

    .tabs a.active {
      color: black;
      font-weight: 500;
    }

    .tabs a.active::after {
      content: '';
      position: absolute;
      bottom: -1px;
      /* Letakkan persis di atas border-bottom */
      left: 0;
      width: 100%;
      height: 2px;
      background-color: #1a73e8;
    }

    .section-title {
      font-family: 'Roboto', sans-serif;
      font-size: 24px;
      font-weight: 500;
      text-align: left;
      max-width: 1100px;
      margin: 40px auto 20px auto;
      padding: 0 20px;
    }

    .section-count {
      color: #888;
      font-size: 14px;
      font-weight: normal;
      margin-left: 6px;
    }

    /* --- STYLING UNTUK SCROLLER (UMUM) --- */
    .scroll-wrapper {
      position: relative;
      padding: 0 40px;
      max-width: 1120px;
      margin: 20px auto;
    }

    .scroll-container {
      overflow-x: auto;
      scroll-behavior: smooth;
      scrollbar-width: none;
      -ms-overflow-style: none;
    }

    .scroll-container::-webkit-scrollbar {
      display: none;
    }

    .scroll-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 50%;
      width: 44px;
      height: 44px;
      cursor: pointer;
      z-index: 5;
      display: none;
      /* JS yang akan menampilkan */
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    .scroll-arrow.left {
      left: 0;
    }

    .scroll-arrow.right {
      right: 0;
    }

    .scroll-arrow:hover {
      background-color: #f5f5f5;
    }

    .scroll-arrow i {
      font-size: 28px;
    }

    /* --- Styling untuk Galeri Item (4x2) --- */
    #itemGalleryWrapper .cards-wrapper {
      display: grid;
      grid-auto-flow: column;
      /* <-- Kunci utama: Mengalirkan item secara horizontal */
      grid-template-rows: repeat(2, auto);
      /* <-- Kunci utama: Memaksa grid menjadi 2 baris */
      gap: 15px;
      /* Jarak antar kartu */
      padding-bottom: 10px;
      /* Memberi sedikit ruang jika scrollbar muncul */
    }

    /* Ini untuk styling setiap kartu item */
    .item-card {
      width: 250px;
      /* Anda bisa sesuaikan lebarnya */
      aspect-ratio: 4 / 3;
      /* Menjaga rasio gambar agar tidak peyang */
      border-radius: 8px;
      overflow: hidden;
      background-color: #f0f0f0;
      /* Warna placeholder jika gambar belum termuat */
    }

    .item-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      /* Membuat gambar mengisi kartu tanpa merusak rasio */
    }

    /* --- Styling untuk Galeri Topic (1 Baris) --- */
    #topicScrollWrapper .cards-wrapper {
      display: flex;
      /* 1 baris */
      gap: 15px;
    }

    .topic-card {
      flex-shrink: 0;
      width: 220px;
      aspect-ratio: 1 / 1;
      position: relative;
      border-radius: 10px;
      overflow: hidden;
      background-color: #f0f0f0;
    }

    .topic-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .topic-card .info {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 10px;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
      color: white;
    }

    .topic-card .info h4,
    .topic-card .info p {
      margin: 0;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    }

    .topic-card .badge-top {
      position: absolute;
      top: 10px;
      left: 10px;
    }
  </style>

</head>

<body>
  @include('user.partials.navbar')

  @include('user.partials.sidebar')

  <section class="headline">
    <div class="profile-header">
      <div class="initial">
        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
      </div>
      <div class="tabs">
        <a class="active" href="{{ route('profile.custom') }}">Favorites</a>
        <a href="#">Gallery</a>
      </div>
    </div>
  </section>

  <h2 class="section-title">Item <span class="section-count">{{ $favoritedItems->count() }}</span></h2>
  <div class="scroll-wrapper" id="itemGalleryWrapper">
    <button class="scroll-arrow left">
      <i class='bx bx-left-arrow-alt'></i>
    </button>
    <div class="scroll-container">
      <div class="cards-wrapper">
        @forelse ($favoritedItems as $item)
      <div class="card item-card">
        <a href="{{ route('user.art.detail', ['id' => $item->id]) }}">
        <img src="{{ asset($item->img_url ?? 'media/default-image.jpg') }}"
          alt="{{ $item->title ?? 'Gallery Item' }}">
        </a>
      </div>
    @empty
      <div class="empty-favorites-message" style="grid-column: 1 / -1;">
        Tidak ada karya seni favorit. Klik ikon hati pada halaman detail karya seni untuk menambahkannya di sini.
      </div>
    @endforelse
      </div>
    </div>
    <button class="scroll-arrow right">
      <i class='bx bx-right-arrow-alt'></i>
    </button>
  </div>

  <h2 class="section-title">Topic <span class="section-count">{{ $favoritedTopics->count() }}</span></h2>
  <div class="scroll-wrapper" id="topicScrollWrapper">
    <button class="scroll-arrow left">
      <i class='bx bx-left-arrow-alt'></i>
    </button>
    <div class="scroll-container">
      <div class="cards-wrapper">
        @forelse ($favoritedTopics as $topic)
      <div class="card topic-card">
        <a href="{{ route('user.mediums.detail', ['id' => $topic->id]) }}">
        <img src="{{ asset($topic->img_url ?? 'media/default-image.jpg') }}" alt="{{ $topic->name ?? 'Topic' }}">
        <div class="info">
          <h4>{{ $topic->name ?? 'Unnamed Topic' }}</h4>
          <p>{{ $topic->arts_count ?? 0 }} item</p>
        </div>
        </a>
      </div>
    @empty
      <div class="empty-favorites-message" style="grid-column: 1 / -1;">
        Tidak ada topik favorit. Klik ikon hati pada halaman detail medium untuk menambahkannya di sini.
      </div>
    @endforelse
      </div>
    </div>
    <button class="scroll-arrow right">
      <i class='bx bx-right-arrow-alt'></i>
    </button>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Fungsi umum untuk mengatur scroller dengan panah otomatis
      const setupScroller = (wrapperId) => {
        const wrapper = document.getElementById(wrapperId);
        if (!wrapper) return;

        const scrollContainer = wrapper.querySelector('.scroll-container');
        const leftArrow = wrapper.querySelector('.scroll-arrow.left');
        const rightArrow = wrapper.querySelector('.scroll-arrow.right');

        if (!scrollContainer || !leftArrow || !rightArrow) return;

        const updateArrows = () => {
          const tolerance = 5;
          const maxScrollLeft = scrollContainer.scrollWidth - scrollContainer.clientWidth;

          leftArrow.style.display = scrollContainer.scrollLeft > tolerance ? 'flex' : 'none';
          rightArrow.style.display = scrollContainer.scrollLeft < maxScrollLeft - tolerance ? 'flex' : 'none';
        };

        leftArrow.addEventListener('click', () => {
          const scrollAmount = scrollContainer.clientWidth;
          scrollContainer.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
          });
        });

        rightArrow.addEventListener('click', () => {
          const scrollAmount = scrollContainer.clientWidth;
          scrollContainer.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
          });
        });

        scrollContainer.addEventListener('scroll', updateArrows);
        window.addEventListener('resize', updateArrows);
        updateArrows(); // Panggil saat inisialisasi
      };

      // Panggil fungsi untuk galeri item kita
      setupScroller('itemGalleryWrapper');
      setupScroller('topicScrollWrapper');
    });
  </script>
</body>
<script src="{{ asset('media/js/sidebar.js') }}"></script>

</html>