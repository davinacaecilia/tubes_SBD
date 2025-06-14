 $(document).ready(function() {
            $('#museumSelect').select2({
                placeholder: "Search or select a museum", // Placeholder untuk Select2
                allowClear: true // Opsi untuk mengizinkan pengguna mengosongkan pilihan
            });

             // Inisialisasi Select2 untuk dropdown Medium
            $('#mediumSelect').select2({
                placeholder: "Search or select a medium",
                allowClear: true // Mengizinkan pengguna mengosongkan pilihan
            });

            // Jika Anda memiliki script universal di script.js yang perlu DOMContentLoaded
            // pastikan ini tidak mengganggu atau gabungkan jika perlu.
            // Contoh: Panggil fungsi setup universal jika ada
            // setupUniversalFeatures(); 
        
      
            const activeDropdowns = document.querySelectorAll('.side-menu .has-dropdown.active');
            activeDropdowns.forEach(dropdown => {
                dropdown.classList.add('open');
            });
});