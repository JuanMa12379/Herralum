let currentIndex = 0;

function showSlide(index) {
  const carousel = document.querySelector('.carousel');
  const images = document.querySelectorAll('.carousel img');
  const totalImages = images.length;

  // Each slide contains 2 images, so we need to handle it accordingly
  if (index >= totalImages / 2) {
    currentIndex = 0;
  } else if (index < 0) {
    currentIndex = Math.floor(totalImages / 2) - 1;
  } else {
    currentIndex = index;
  }

  const offset = -currentIndex * 100;
  carousel.style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
  showSlide(currentIndex + 1);
}

function prevSlide() {
  showSlide(currentIndex - 1);
}

// Inicializar el carrusel
showSlide(currentIndex);