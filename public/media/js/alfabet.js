// Alphabet filter scroll logic
const sliderWrapper = document.querySelector('.alphabet-filter-wrapper');
const alphabetFilter = document.querySelector('.alphabet-filter');
const letters = document.querySelectorAll('.alphabet-filter a');
// const activeMarker = document.querySelector('.active-marker'); // Variabel ini tidak digunakan di sini, bisa dihapus jika tidak diperlukan.

let isDown = false;
let startX;
let currentTransformX;
let animationFrameId;
let velocity = 0;
let lastX = 0;
let lastTime = 0;

// Fungsi untuk mendapatkan huruf yang paling dekat dengan tengah wrapper
function getClosestLetterToCenter() {
    let closestLetter = null;
    let minDistance = Infinity;
    const wrapperMidpointX = sliderWrapper.offsetWidth / 2;

    letters.forEach(letter => {
        const letterRect = letter.getBoundingClientRect();
        const letterCenterRelativeToViewport = letterRect.left + (letterRect.width / 2);
        const distance = Math.abs(letterCenterRelativeToViewport - (sliderWrapper.getBoundingClientRect().left + wrapperMidpointX));

        if (distance < minDistance) {
            minDistance = distance;
            closestLetter = letter;
        }
    });
    return closestLetter;
}

// Fungsi untuk mengupdate huruf aktif
function updateActiveLetter() {
    const closestLetter = getClosestLetterToCenter();

    // Hapus kelas 'active' dari semua huruf
    letters.forEach(l => l.classList.remove('active'));
    // Tambahkan kelas 'active' ke huruf yang paling dekat
    if (closestLetter) {
        closestLetter.classList.add('active');
    }
}

// Fungsi untuk mendapatkan nilai translateX saat ini dari alphabetFilter
function getTranslateX(element) {
    const transformStyle = window.getComputedStyle(element).getPropertyValue('transform');
    const matrix = new DOMMatrixReadOnly(transformStyle);
    return matrix.m41;
}

// Fungsi untuk melakukan "snap" ke huruf terdekat
function snapToNearestLetter() {
    const closestLetter = getClosestLetterToCenter();
    if (closestLetter) {
        const wrapperWidth = sliderWrapper.offsetWidth;
        const letterWidth = closestLetter.offsetWidth;
        const letterOffset = closestLetter.offsetLeft;

        // Hitung target translateX agar huruf yang paling dekat berada di tengah
        const targetTransformX = - (letterOffset + (letterWidth / 2) - (wrapperWidth / 2));

        // Hentikan animasi momentum yang sedang berjalan
        if (animationFrameId) {
            cancelAnimationFrame(animationFrameId);
        }

        // Atur transisi untuk smooth snap
        alphabetFilter.style.transition = 'transform 0.3s ease-out';
        // PASTIKAN INI PAKAI BACKTICKS (di keyboard: di bawah tombol Esc, samping angka 1)
        alphabetFilter.style.transform = `translateX(${targetTransformX}px)`; 

        // Pastikan update active letter setelah transisi selesai
        alphabetFilter.addEventListener('transitionend', () => {
            alphabetFilter.style.transition = 'none'; // Hapus transisi setelah selesai
            updateActiveLetter();
        }, { once: true }); // Hanya jalankan sekali
    }
}

// Inisialisasi posisi scroll agar 'A' di tengah atau sesuai parameter URL
function initializeScrollAndActiveLetter() {
    // Ambil huruf aktif dari parameter URL
    const urlParams = new URLSearchParams(window.location.search);
    const activeLetterFromUrl = urlParams.get('starts_with') || 'A'; // Default ke 'A'

    // PASTIKAN INI PAKAI BACKTICKS
    const initialLetter = document.querySelector(`.alphabet-filter a[data-letter="${activeLetterFromUrl}"]`);

    if (initialLetter) {
        const wrapperWidth = sliderWrapper.offsetWidth;
        const letterWidth = initialLetter.offsetWidth;
        const letterOffset = initialLetter.offsetLeft;

        // Hitung posisi transformX agar huruf inisial berada di tengah wrapper
        const initialTransformX = - (letterOffset + (letterWidth / 2) - (wrapperWidth / 2));
        alphabetFilter.style.transition = 'none'; // Pastikan tidak ada transisi saat inisialisasi
        // PASTIKAN INI PAKAI BACKTICKS
        alphabetFilter.style.transform = `translateX(${initialTransformX}px)`;
    }
    updateActiveLetter(); // Pastikan huruf aktif diperbarui setelah inisialisasi posisi
}

// Handle mousedown event on the wrapper
sliderWrapper.addEventListener('mousedown', (e) => {
    isDown = true;
    startX = e.pageX;
    currentTransformX = getTranslateX(alphabetFilter);
    // Hentikan momentum jika ada
    if (animationFrameId) {
        cancelAnimationFrame(animationFrameId);
    }
    alphabetFilter.style.transition = 'none'; // Hapus transisi saat memulai drag

    sliderWrapper.style.cursor = 'grabbing';
    lastX = e.pageX;
    lastTime = performance.now();
});

// Handle mouseleave event (when mouse leaves the wrapper while dragging)
sliderWrapper.addEventListener('mouseleave', () => {
    if (isDown) {
        isDown = false;
        sliderWrapper.style.cursor = 'grab';
        // Aktifkan momentum jika ada kecepatan atau langsung snap
        if (Math.abs(velocity) > 0.5) {
            applyMomentum();
        } else {
            snapToNearestLetter();
        }
    }
});

// Handle mouseup event (when mouse button is released)
sliderWrapper.addEventListener('mouseup', () => {
    isDown = false;
    sliderWrapper.style.cursor = 'grab';
    // Aktifkan momentum jika ada kecepatan atau langsung snap
    if (Math.abs(velocity) > 0.5) {
        applyMomentum();
    } else {
        snapToNearestLetter();
    }
});

// Handle mousemove event for dragging
sliderWrapper.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX;
    const walk = (x - startX); // Jarak geser mouse

    const now = performance.now();
    const deltaTime = now - lastTime;

    // Hitung kecepatan geser (px/ms)
    velocity = (x - lastX) / deltaTime;

    lastX = x;
    lastTime = now;

    let newTransformX = currentTransformX + walk;

    // Batasi geseran agar tidak terlalu jauh ke kiri atau kanan (dengan efek elastis)
    const firstLetter = document.querySelector('.alphabet-filter a[data-letter="A"]');
    const lastLetter = document.querySelector('.alphabet-filter a[data-letter="Z"]');

    if (!firstLetter || !lastLetter) return;

    const wrapperWidth = sliderWrapper.offsetWidth;
    const firstLetterCenter = firstLetter.offsetLeft + firstLetter.offsetWidth / 2;
    const lastLetterCenter = lastLetter.offsetLeft + lastLetter.offsetWidth / 2;

    const maxTranslateX = (wrapperWidth / 2) - firstLetterCenter;
    const minTranslateX = (wrapperWidth / 2) - lastLetterCenter;

    if (newTransformX > maxTranslateX) {
        newTransformX = maxTranslateX + (newTransformX - maxTranslateX) * 0.3; // Efek elastis
    } else if (newTransformX < minTranslateX) {
        newTransformX = minTranslateX + (newTransformX - minTranslateX) * 0.3; // Efek elastis
    }

    // PASTIKAN INI PAKAI BACKTICKS
    alphabetFilter.style.transform = `translateX(${newTransformX}px)`;
    updateActiveLetter(); // Update aktif secara real-time
});

// Fungsi untuk menerapkan momentum setelah drag dilepas
function applyMomentum() {
    const friction = 0.95; // Koefisien gesekan (semakin tinggi, semakin lambat berhenti)
    const minVelocity = 0.1; // Kecepatan minimum untuk berhenti

    function animate() {
        velocity *= friction;
        let newTransformX = getTranslateX(alphabetFilter) + velocity * 16; // 16ms per frame (approx. 60fps)

        // Batasi geseran saat momentum
        const firstLetter = document.querySelector('.alphabet-filter a[data-letter="A"]');
        const lastLetter = document.querySelector('.alphabet-filter a[data-letter="Z"]');

        if (!firstLetter || !lastLetter) {
            cancelAnimationFrame(animationFrameId);
            return;
        }

        const wrapperWidth = sliderWrapper.offsetWidth;
        const firstLetterCenter = firstLetter.offsetLeft + firstLetter.offsetWidth / 2;
        const lastLetterCenter = lastLetter.offsetLeft + lastLetter.offsetWidth / 2;

        const maxTranslateX = (wrapperWidth / 2) - firstLetterCenter;
        const minTranslateX = (wrapperWidth / 2) - lastLetterCenter;

        if (newTransformX > maxTranslateX) {
            newTransformX = maxTranslateX;
            velocity = 0; // Hentikan momentum jika mentok
        } else if (newTransformX < minTranslateX) {
            newTransformX = minTranslateX;
            velocity = 0; // Hentikan momentum jika mentok
        }

        // PASTIKAN INI PAKAI BACKTICKS
        alphabetFilter.style.transform = `translateX(${newTransformX}px)`;
        updateActiveLetter();

        if (Math.abs(velocity) > minVelocity) {
            animationFrameId = requestAnimationFrame(animate);
        } else {
            cancelAnimationFrame(animationFrameId);
            snapToNearestLetter(); // Snap ke huruf terdekat setelah momentum berhenti
        }
    }
    animationFrameId = requestAnimationFrame(animate);
}

// Event listener untuk klik pada huruf (menempatkan huruf di tengah dan memfilter)
letters.forEach(letterLink => {
    letterLink.addEventListener('click', function(e) {
        e.preventDefault();
        // Hanya proses klik jika tidak sedang dalam proses drag
        if (isDown) return;

        const targetElement = this;
        const wrapperWidth = sliderWrapper.offsetWidth;
        const letterWidth = targetElement.offsetWidth;
        const letterOffset = targetElement.offsetLeft;

        // Hitung target transformX agar huruf yang diklik berada di tengah wrapper
        const targetTransformX = - (letterOffset + (letterWidth / 2) - (wrapperWidth / 2));

        // Hentikan animasi momentum jika ada
        if (animationFrameId) {
            cancelAnimationFrame(animationFrameId);
        }

        // Aktifkan transisi untuk smooth scroll ke huruf yang diklik
        alphabetFilter.style.transition = 'transform 0.3s ease-out';
        // PASTIKAN INI PAKAI BACKTICKS
        alphabetFilter.style.transform = `translateX(${targetTransformX}px)`;

        // Setelah transisi scroll selesai, update URL untuk memfilter data
        alphabetFilter.addEventListener('transitionend', () => {
            alphabetFilter.style.transition = 'none'; // Nonaktifkan transisi setelah selesai
            updateActiveLetter(); // Pastikan huruf aktif terupdate setelah animasi

            // --- Bagian PENTING untuk Filtering ---
            const params = new URLSearchParams(window.location.search);
            params.set('starts_with', this.dataset.letter); // Set parameter starts_with
            params.set('page', 1); // Reset pagination ke halaman 1
            window.location.search = params.toString(); // Redirect ke URL baru dengan parameter filter
            // --- Akhir Bagian Filtering ---

        }, { once: true }); // Hanya jalankan sekali setelah transisi berakhir
    });
});

// Panggil fungsi inisialisasi saat halaman dimuat dan ketika ukuran jendela berubah
window.addEventListener('load', initializeScrollAndActiveLetter);
window.addEventListener('resize', initializeScrollAndActiveLetter);