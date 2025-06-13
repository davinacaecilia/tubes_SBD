// Sidebar menu active class toggle
const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
    const li = item.parentElement;

    item.addEventListener('click', function () {
        // Hapus class 'active' dari semua item menu utama
        allSideMenu.forEach(i => {
            i.parentElement.classList.remove('active');
        });
        // Tambahkan class 'active' ke item yang diklik
        li.classList.add('active');
    });
});

// TOGGLE SIDEBAR (untuk menyembunyikan/menampilkan sidebar utama)
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

if (menuBar && sidebar) {
    menuBar.addEventListener('click', function () {
        sidebar.classList.toggle('hide');
    });
}

// SEARCH BUTTON TOGGLE (responsive navbar)
const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

if (searchButton && searchButtonIcon && searchForm) {
    searchButton.addEventListener('click', function (e) {
        if (window.innerWidth < 576) {
            e.preventDefault();
            searchForm.classList.toggle('show');
            if (searchForm.classList.contains('show')) {
                searchButtonIcon.classList.replace('bx-search', 'bx-x');
            } else {
                searchButtonIcon.classList.replace('bx-x', 'bx-search');
            }
        }
    });
}

// Responsive sidebar & search form pada saat load/resize
if (window.innerWidth < 768) {
    if (sidebar) {
        sidebar.classList.add('hide');
    }
} else if (window.innerWidth > 576) {
    if (searchButtonIcon && searchForm) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
}

window.addEventListener('resize', function () {
    if (window.innerWidth > 576) {
        if (searchButtonIcon && searchForm) {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
            searchForm.classList.remove('show');
        }
    }
});

// DARK MODE TOGGLE
const switchMode = document.getElementById('switch-mode');

if (switchMode) {
    // Load state from localStorage
    if (localStorage.getItem('dark-mode') === 'enabled') {
        document.body.classList.add('dark');
        switchMode.checked = true;
    }

    switchMode.addEventListener('change', function () {
        if (this.checked) {
            document.body.classList.add('dark');
            localStorage.setItem('dark-mode', 'enabled');
        } else {
            document.body.classList.remove('dark');
            localStorage.setItem('dark-mode', 'disabled');
        }
    });
}

// --- Semua Fungsionalitas yang Membutuhkan DOMContentLoaded ---
document.addEventListener('DOMContentLoaded', function() {
    

    // --- Fungsionalitas Universal untuk Table Search Icon ---
    // Dipanggil di setiap halaman yang punya input/icon search
    const tableSearchIcon = document.getElementById('tableSearchIcon');
    const tableSearchInput = document.getElementById('tableSearchInput');

    if (tableSearchIcon && tableSearchInput) {
        tableSearchIcon.addEventListener('click', function() {
            tableSearchInput.classList.toggle('show');
            if (tableSearchInput.classList.contains('show')) {
                tableSearchInput.focus();
            } else {
                tableSearchInput.value = ''; // Kosongkan input saat disembunyikan
            }
        });
    }

    // --- Fungsionalitas Universal untuk Table Filter (Sort/Status) Icon ---
    // Dipanggil di setiap halaman yang punya select/icon filter
    const tableFilterIcon = document.getElementById('tableFilterIcon');
    const tableFilterSelect = document.getElementById('tableFilterSelect');

    // Fungsi untuk mengurutkan tabel (digunakan untuk Artwork List, Museum List, Media List)
    function sortTable(tableId, sortOrder) {
        const table = document.getElementById(tableId);
        if (!table) return;

        const tableBody = table.querySelector('tbody');
        if (!tableBody) return;

        let rows = Array.from(tableBody.querySelectorAll('tr'));

        // Asumsi kolom sorting adalah yang memiliki class 'sort-target'
        // Atau, jika tidak ada, kolom kedua (indeks 1)
        const columnIndex = 1; // Default: kolom kedua (index 1) untuk 'Title' atau 'Name'

        if (sortOrder === 'az') {
            rows.sort((a, b) => {
                const textA = (a.querySelector('.sort-target') || a.children[columnIndex]).textContent.trim();
                const textB = (b.querySelector('.sort-target') || b.children[columnIndex]).textContent.trim();
                return textA.localeCompare(textB);
            });
        } else if (sortOrder === 'za') {
            rows.sort((a, b) => {
                const textA = (a.querySelector('.sort-target') || a.children[columnIndex]).textContent.trim();
                const textB = (b.querySelector('.sort-target') || b.children[columnIndex]).textContent.trim();
                return textB.localeCompare(textA);
            });
        }
        // Jika sortOrder adalah '', atau tidak dikenali, biarkan urutan apa adanya
        // Untuk reset ke original, masing-masing halaman Blade harus menyimpan data originalRows
        // dan mengembalikan ke sana. Universal JS ini hanya menangani sort.

        // Hapus semua baris yang ada dan tambahkan kembali yang sudah diurutkan
        tableBody.innerHTML = '';
        rows.forEach(row => tableBody.appendChild(row));
    }

    // Fungsi untuk memfilter tabel berdasarkan status (digunakan untuk Artwork Status List)
    function filterTableByStatus(tableId, filterStatus) {
        const table = document.getElementById(tableId);
        if (!table) return;

        const tableBody = table.querySelector('tbody');
        if (!tableBody) return;

        // Kita perlu menyimpan referensi originalRows di halaman ini
        // Asumsi originalRows sudah diinisialisasi di setiap halaman Blade (untuk dummy data)
        // Jika Anda menggunakan data dari backend, Anda akan selalu mendapatkan data default/terfilter dari backend.
        const currentTableDataKey = tableId + '_original_rows';
        let currentOriginalRows = window[currentTableDataKey];

        if (!currentOriginalRows || currentOriginalRows.length === 0) {
            currentOriginalRows = Array.from(tableBody.querySelectorAll('tr'));
            window[currentTableDataKey] = currentOriginalRows; // Simpan di global scope untuk halaman ini
        }
        
        let rowsToFilter = Array.from(window[currentTableDataKey]); // Selalu mulai dari data asli untuk filtering

        tableBody.innerHTML = ''; // Kosongkan tabel

        if (filterStatus === '') { // Jika "Filter by Status" dipilih (tampilkan semua)
            rowsToFilter.forEach(row => tableBody.appendChild(row));
        } else {
            const filteredRows = rowsToFilter.filter(row => {
                return row.dataset.status === filterStatus;
            });
            filteredRows.forEach(row => tableBody.appendChild(row));
        }
    }


    if (tableFilterIcon && tableFilterSelect) {
        tableFilterIcon.addEventListener('click', function() {
            tableFilterSelect.classList.toggle('show');
            if (!tableFilterSelect.classList.contains('show')) {
                tableFilterSelect.value = ''; // Reset pilihan saat disembunyikan
                // Jika disembunyikan, panggil fungsi filter/sort untuk mereset tampilan
                const currentTableId = this.closest('.table-data').querySelector('table').id;
                if (currentTableId === 'artworkStatusTable') {
                    filterTableByStatus(currentTableId, ''); // Reset filter status
                } else {
                    sortTable(currentTableId, ''); // Reset sort
                }
            }
        });

        tableFilterSelect.addEventListener('change', function() {
            const selectedValue = this.value;
            const currentTableId = this.closest('.table-data').querySelector('table').id;

            if (currentTableId === 'artworkStatusTable') {
                filterTableByStatus(currentTableId, selectedValue);
            } else {
                sortTable(currentTableId, selectedValue);
            }
        });
    }
});
