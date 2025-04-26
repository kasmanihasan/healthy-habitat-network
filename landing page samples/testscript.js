// Form submission with thank you message
document.getElementById('contact-form').addEventListener('submit', function (e) {
  e.preventDefault();
  
  // Hide the form and show thank you message
  document.getElementById('contact-form').style.display = 'none';
  document.getElementById('thank-you-message').style.display = 'block';
});

// Modal Handling
const modal = document.getElementById('modal');
const closeModalBtn = document.getElementById('close-modal');
const bookButtons = document.querySelectorAll('.book-now');

// Open Modal
bookButtons.forEach(button => {
  button.addEventListener('click', () => {
    modal.style.display = 'flex';
  });
});

// Close Modal
closeModalBtn.addEventListener('click', () => {
  modal.style.display = 'none';
});

// Close modal when clicking outside
window.addEventListener('click', (e) => {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
});

// Gallery Infinite Slider (Simple Loop)
const gallerySlider = document.querySelector('.gallery-slider');

let isDown = false;
let startX;
let scrollLeft;

gallerySlider.addEventListener('mousedown', (e) => {
  isDown = true;
  gallerySlider.classList.add('active');
  startX = e.pageX - gallerySlider.offsetLeft;
  scrollLeft = gallerySlider.scrollLeft;
});

gallerySlider.addEventListener('mouseleave', () => {
  isDown = false;
  gallerySlider.classList.remove('active');
});

gallerySlider.addEventListener('mouseup', () => {
  isDown = false;
  gallerySlider.classList.remove('active');
});

gallerySlider.addEventListener('mousemove', (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - gallerySlider.offsetLeft;
  const walk = (x - startX) * 3; //scroll-fast
  gallerySlider.scrollLeft = scrollLeft - walk;
});
