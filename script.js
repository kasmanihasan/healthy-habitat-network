// Modal for Booking and Cart
const modal = document.getElementById('modal');
const closeModalBtn = document.getElementById('close-modal') || document.querySelector('.close-btn');
const modalTitle = document.getElementById('modal-title');
const modalDescription = document.getElementById('modal-description');

document.addEventListener('click', function(e) {
  if (e.target.classList.contains('book-btn')) {
    const service = e.target.getAttribute('data-service');
    openModal('Book Appointment', `You have selected the ${service} service.`);
  } else if (e.target.classList.contains('cart-btn')) {
    const product = e.target.getAttribute('data-product');
    openModal('Add to Cart', `${product} has been added to your cart.`);
  }
});

if (closeModalBtn) {
  closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });
}

function openModal(title, description) {
  modal.style.display = 'flex';
  if (modalTitle) modalTitle.innerText = title;
  if (modalDescription) modalDescription.innerText = description;
}

// Voting functionality
let votes = {
  ecoYoga: 0,
  healthyMeal: 0
};

function vote(item) {
  if (votes[item] !== undefined) {
    votes[item]++;
    alert(`Thank you for voting! Current votes for ${item}: ${votes[item]}`);
  }
}

// Smooth Scroll for nav links
document.querySelectorAll('.nav-links a').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const section = document.querySelector(this.getAttribute('href'));
    section.scrollIntoView({ behavior: 'smooth' });
  });
});

// Contact Form Submission Handling
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('contact-form');
  const thankYouMessage = document.getElementById('thank-you-message');

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // prevent page reload
    form.style.display = 'none'; // hide the form
    thankYouMessage.style.display = 'block'; // show thank you
  });
});
