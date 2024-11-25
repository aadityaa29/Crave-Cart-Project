 // Modal elements
 const openModalBtn2 = document.getElementById('openModalBtn2');
 const closeModalBtn2 = document.getElementById('closeModalBtn2');
 const modal2 = document.getElementById('modal2');
 const modalOverlay2 = document.getElementById('modalOverlay2');

 // Open modal
 openModalBtn2.addEventListener('click', () => {
     modal2.style.display = 'block';
     modalOverlay2.style.display = 'block';
 });

 // Close modal
 closeModalBtn2.addEventListener('click', () => {
     modal2.style.display = 'none';
     modalOverlay2.style.display = 'none';
 });

 // Close modal when clicking on the overlay
 modalOverlay2.addEventListener('click', () => {
     modal2.style.display = 'none';
     modalOverlay2.style.display = 'none';
 });

