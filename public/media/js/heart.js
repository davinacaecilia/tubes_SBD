document.addEventListener('DOMContentLoaded', () => {
  const favoriteIcon = document.getElementById('favoriteIcon');
  const loginPopup = document.getElementById('loginPopup');
  const notNowBtn = document.getElementById('notNowBtn');
  const signInBtn = document.getElementById('signInBtn');
  const profileLink = document.getElementById('profileLink');
  const favoritesNavLink = document.getElementById('favoritesNavLink');

  // SIMULASI STATUS LOGIN (ini bisa Anda ganti dengan logika login yang sebenarnya)
  let isLoggedIn = false;

  // Fungsi untuk memperbarui tampilan ikon hati
  function updateFavoriteIcon() {
    if (isLoggedIn) {
      favoriteIcon.classList.remove('bx-heart');
      favoriteIcon.classList.add('bxs-heart'); // bx-solid-heart
    } else {
      favoriteIcon.classList.remove('bxs-heart');
      favoriteIcon.classList.add('bx-heart'); // bx-regular-heart
    }
  }

  // Panggil saat DOMContentLoaded untuk mengatur status awal
  updateFavoriteIcon();

  favoriteIcon.addEventListener('click', () => {
    if (!isLoggedIn) {
      loginPopup.style.display = 'flex'; // Tampilkan pop-up jika belum login
    } else {
      if (favoriteIcon.classList.contains('bxs-heart')) {
        favoriteIcon.classList.remove('bxs-heart');
        favoriteIcon.classList.add('bx-heart');
        console.log('Item dihapus dari favorit');
      } else {
        favoriteIcon.classList.remove('bx-heart');
        favoriteIcon.classList.add('bxs-heart');
        console.log('Item ditambahkan ke favorit');
      }
    }
  });

  // Event listener untuk tombol "Not now" di pop-up
  notNowBtn.addEventListener('click', () => {
    loginPopup.style.display = 'none'; // Sembunyikan pop-up
  });

  // Event listener untuk tombol "Sign in" di pop-up
  signInBtn.addEventListener('click', () => {
    window.location.href = 'halaman_login.html'; // Arahkan ke halaman login
    loginPopup.style.display = 'none'; // Sembunyikan pop-up setelah klik
  });

  // Tutup pop-up jika klik di luar area konten pop-up
  loginPopup.addEventListener('click', (event) => {
    if (event.target === loginPopup) {
      loginPopup.style.display = 'none';
    }
  });

  // Logic for profile and favorites navigation links
  if (favoritesNavLink) {
    favoritesNavLink.addEventListener('click', function (e) {
      e.preventDefault();
      if (!isLoggedIn) {
        loginPopup.style.display = 'flex';
      } else {
        window.location.href = 'profil.html';
      }
    });
  }

  profileLink.addEventListener('click', (e) => {
    e.preventDefault();
    if (!isLoggedIn) {
      loginPopup.style.display = 'flex';
    } else {
      window.location.href = 'profil.html';
    }
  });
});
