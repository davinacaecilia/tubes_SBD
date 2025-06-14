// Alphabet filter scroll logic
const sliderWrapper = document.querySelector('.alphabet-filter-wrapper');
const alphabetFilter = document.querySelector('.alphabet-filter');
const letters = document.querySelectorAll('.alphabet-filter a');
const activeMarker = document.querySelector('.active-marker'); // This variable isn't used in the provided JS, consider removing it if it's not needed for future functionality.

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

    letters.forEach(l => l.classList.remove('active'));
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
        alphabetFilter.style.transition = 'transform 0.3s ease-out'; // Menggunakan ease-out untuk efek snapping
        alphabetFilter.style.transform = `translateX(${targetTransformX}px)`;
        // Pastikan update active letter setelah transisi selesai
        alphabetFilter.addEventListener('transitionend', () => {
            alphabetFilter.style.transition = 'none'; // Hapus transisi setelah selesai
            updateActiveLetter();
        }, { once: true }); // Hanya jalankan sekali
    }
}

// Inisialisasi posisi scroll agar 'A' di tengah
function initializeScrollAndActiveLetter() {
  const letterA = document.querySelector('.alphabet-filter a[data-letter="A"]');
  if (letterA) {
    const wrapperWidth = sliderWrapper.offsetWidth;
    const letterWidth = letterA.offsetWidth;
    const letterOffset = letterA.offsetLeft;
    // Hitung posisi transformX agar 'A' berada di tengah wrapper
    const initialTransformX = - (letterOffset + (letterWidth / 2) - (wrapperWidth / 2));
    alphabetFilter.style.transition = 'none';
    alphabetFilter.style.transform = `translateX(${initialTransformX}px)`;
  }
  updateActiveLetter();
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
  alphabetFilter.style.transition = 'none';

  sliderWrapper.style.cursor = 'grabbing';
  lastX = e.pageX;
  lastTime = performance.now();
});

// Handle mouseleave event (when mouse leaves the wrapper while dragging)
sliderWrapper.addEventListener('mouseleave', () => {
  if (isDown) {
      isDown = false;
      sliderWrapper.style.cursor = 'grab';
      // Aktifkan momentum jika ada kecepatan
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
  // Aktifkan momentum jika ada kecepatan
  if (Math.abs(velocity) > 0.5) { // Batasi kecepatan agar tidak terlalu lambat
      applyMomentum();
  } else {
      snapToNearestLetter(); // Langsung snap jika tidak ada momentum
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

  // Batasi geseran agar tidak terlalu jauh ke kiri atau kanan
  const firstLetter = document.querySelector('.alphabet-filter a[data-letter="A"]');
  const lastLetter = document.querySelector('.alphabet-filter a[data-letter="Z"]');

  if (!firstLetter || !lastLetter) return;

  const wrapperWidth = sliderWrapper.offsetWidth;
  const firstLetterCenter = firstLetter.offsetLeft + firstLetter.offsetWidth / 2;
  const lastLetterCenter = lastLetter.offsetLeft + lastLetter.offsetWidth / 2;

  const maxTranslateX = (wrapperWidth / 2) - firstLetterCenter;
  const minTranslateX = (wrapperWidth / 2) - lastLetterCenter;

  // Terapkan batas (dengan sedikit "over-drag" efek elastis)
  if (newTransformX > maxTranslateX) {
      newTransformX = maxTranslateX + (newTransformX - maxTranslateX) * 0.3; // Kurangi sensitivitas
  } else if (newTransformX < minTranslateX) {
      newTransformX = minTranslateX + (newTransformX - minTranslateX) * 0.3; // Kurangi sensitivitas
  }

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

// Event listener untuk klik pada huruf (tetap menempatkan huruf di tengah)
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

        alphabetFilter.style.transition = 'transform 0.3s ease-out'; // Aktifkan transisi untuk smooth scroll
        alphabetFilter.style.transform = `translateX(${targetTransformX}px)`;

        alphabetFilter.addEventListener('transitionend', () => {
            alphabetFilter.style.transition = 'none'; // Nonaktifkan transisi setelah selesai
            updateActiveLetter();
        }, { once: true });
    });
});

window.addEventListener('load', initializeScrollAndActiveLetter);
window.addEventListener('resize', initializeScrollAndActiveLetter);