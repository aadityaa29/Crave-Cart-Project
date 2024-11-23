 // Modal elements
 const openModalBtn1= document.getElementById('openModalBtn1');
 const closeModalBtn1 = document.getElementById('closeModalBtn1');
 const modal1 = document.getElementById('modal1');
 const modalOverlay1 = document.getElementById('modalOverlay1');

 // Open modal
 openModalBtn1.addEventListener('click', () => {
     modal1.style.display = 'block';
     modalOverlay1.style.display = 'block';
 });

 // Close modal
 closeModalBtn1.addEventListener('click', () => {
     modal1.style.display = 'none';
     modalOverlay1.style.display = 'none';
 });

 // Close modal when clicking on the overlay
 modalOverlay.addEventListener('click', () => {
     modal1.style.display = 'none';
     modalOverlay1.style.display = 'none';
 });

