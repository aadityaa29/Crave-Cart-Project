 // Modal elements
 const openModalBtn = document.getElementById('openModalBtn');
 const closeModalBtn = document.getElementById('closeModalBtn');
 const modal = document.getElementById('modal');
 const modalOverlay = document.getElementById('modalOverlay');

 // Open modal
 openModalBtn.addEventListener('click', () => {
     modal.style.display = 'block';
     modalOverlay.style.display = 'block';
 });

 // Close modal
 closeModalBtn.addEventListener('click', () => {
     modal.style.display = 'none';
     modalOverlay.style.display = 'none';
 });

 // Close modal when clicking on the overlay
 modalOverlay.addEventListener('click', () => {
     modal.style.display = 'none';
     modalOverlay.style.display = 'none';
 });

