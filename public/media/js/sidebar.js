// Sidebar logic (buka/tutup)
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

// --- JavaScript untuk mengelola kelas 'active' di sidebar ---
document.addEventListener('DOMContentLoaded', () => {
  const currentPage = window.location.pathname; // Dapatkan URL path saat ini (misal: '/az', '/profile', '/media_home')

  // 1. Hapus kelas 'active' dari semua item sidebar terlebih dahulu
  const sidebarItems = document.querySelectorAll('.sidebar ul li');
  sidebarItems.forEach(item => {
      item.classList.remove('active');
  });

  // 2. Tambahkan kelas 'active' ke item sidebar yang sesuai berdasarkan URL
  if (currentPage.includes('/az')) { // Jika URL adalah /az (untuk Collections)
      const collectionsSidebarLink = document.getElementById('collectionsSidebarLink');
      if (collectionsSidebarLink) {
          collectionsSidebarLink.classList.add('active');
      }
  } else if (currentPage.includes('/profil')) { // Jika URL adalah /profile (untuk Profil)
        const profileSidebarLink = document.getElementById('profileSidebarLink'); // ID pada elemen <li> di sidebar.blade.php
        if (profileSidebarLink) {
            profileSidebarLink.classList.add('active');
        }
    }
    // Tidak ada kondisi 'else if' untuk '/media_home' di sini,
    // karena Anda tidak ingin "Mediums" aktif saat di halaman itu.
});
