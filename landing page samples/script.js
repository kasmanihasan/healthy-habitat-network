// Handle booking and cart buttons
const bookButtons = document.querySelectorAll('.book-btn');
const cartButtons = document.querySelectorAll('.cart-btn');
const modal = document.getElementById('modal');
const modalTitle = document.getElementById('modal-title');
const modalDescription = document.getElementById('modal-description');
const closeModalBtn = document.getElementById('close-modal');
const confirmBtn = document.getElementById('confirm-btn');

bookButtons.forEach(button => {
  button.addEventListener('click', () => {
    modalTitle.textContent = "Book Appointment";
    modalDescription.textContent = `You are booking: ${button.getAttribute('data-service')}`;
    modal.style.display = 'flex';
  });
});

cartButtons.forEach(button => {
  button.addEventListener('click', () => {
    modalTitle.textContent = "Add to Cart";
    modalDescription.textContent = `You added: ${button.getAttribute('data-product')}`;
    modal.style.display = 'flex';
  });
});

closeModalBtn.addEventListener('click', () => {
  modal.style.display = 'none';
});

confirmBtn.addEventListener('click', () => {
  alert('Action confirmed!');
  modal.style.display = 'none';
});

// Simple voting logic
function vote(option) {
  alert(`Thanks for voting on ${option}!`);
}

// Contact form handling
document.getElementById('contact-form').addEventListener('submit', function(e) {
  e.preventDefault();
  document.getElementById('contact-form').style.display = 'none';
  document.getElementById('thank-you-message').style.display = 'block';
});

// Gallery auto-slide
const gallerySlider = document.querySelector('.gallery-slider');

setInterval(() => {
  if (gallerySlider) {
    gallerySlider.scrollBy({
      left: 310, // Image width + margin
      behavior: 'smooth'
    });
    
    // Reset scroll if near the end
    if (gallerySlider.scrollLeft + gallerySlider.clientWidth >= gallerySlider.scrollWidth) {
      gallerySlider.scrollTo({ left: 0, behavior: 'smooth' });
    }
  }
}, 3000); // Slide every 3 seconds

