document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('tableSearchInput');
    const form = document.getElementById('searchForm');

    let timeout = null;

    input.addEventListener('input', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            // --- Logika Penambahan: Simpan status toggle sebelum submit ---
            if (input.classList.contains('show')) {
                sessionStorage.setItem('tableSearchInputShown', 'true');
            } else {
                // Jika input tidak punya kelas 'show', pastikan status di sessionStorage juga dihapus
                sessionStorage.removeItem('tableSearchInputShown');
            }
            // -----------------------------------------------------------
            form.submit();
        }, 500);
    });

    // --- Logika Penambahan: Periksa status toggle saat halaman dimuat ---
    if (sessionStorage.getItem('tableSearchInputShown') === 'true') {
        input.classList.add('show');
        // Opsional: Fokuskan kembali input jika sebelumnya terbuka
        // input.focus();
    }
    // -------------------------------------------------------------------
});