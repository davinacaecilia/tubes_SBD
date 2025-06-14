<!-- NAVBAR -->
<nav>
    <i class='bx bx-menu'></i>
    <!-- Link kategori dan form pencarian -->
    
    <input type="checkbox" id="switch-mode" hidden>
    <label for="switch-mode" class="switch-mode"></label>
    
    {{-- Bagian Profil Pengguna (Front-End Design Only) --}}
    <div class="profile-info">
        <span class="user-name">{{ $user->name }}</span> {{-- Nama pengguna statis --}}
        <span class="user-role">({{ $user->role }})</span> {{-- Level pengguna statis (contoh) --}}
        <a href="#" class="profile-image">
            <img src="https://placehold.co/32x32/cccccc/333333?text=PJ" alt="User Profile"> {{-- Gambar profil statis --}}
        </a>
    </div>
    
</nav>
<!-- NAVBAR -->

<style>
    /* Styling untuk profile-info di navbar */
    .profile-info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: 20px; /* Jarak dari notifikasi */
        font-family: var(--roboto);
        color: var(--text-secondary);
        font-size: 14px;
        white-space: nowrap; /* Mencegah teks wrap */
        overflow: hidden; /* Sembunyikan jika terlalu panjang */
        text-overflow: ellipsis; /* Tambahkan elipsis jika terpotong */
    }

    .profile-info .user-name {
        font-weight: 500;
        color: var(--text-primary);
    }

    .profile-info .user-role {
        font-size: 12px;
        color: var(--text-tertiary);
    }

    .profile-info .profile-image img {
        width: 32px;
        height: 32px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid var(--accent-blue); /* Contoh border */
        transition: all 0.2s ease;
    }

    .profile-info .profile-image img:hover {
        box-shadow: var(--shadow-medium);
        transform: scale(1.05);
    }

    /* Adjust navbar spacing if needed */
    #content nav {
        justify-content: flex-end; /* Dorong elemen ke kanan */
        /* Anda mungkin perlu menyesuaikan ini tergantung layout navbar Anda */
    }
    #content nav .bx.bx-menu {
        margin-right: auto; /* Dorong menu toggle ke kiri */
    }
</style>
