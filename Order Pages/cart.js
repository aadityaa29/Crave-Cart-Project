const cartButton = document.getElementById('cartButton');
       cartModal = document.getElementById('cartModal');
       cartOverlay = document.getElementById('cartOverlay');
       cartItemsList = document.getElementById('cartItems');
       addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

        let cartItems = [];

        function updateCartButton() {
            cartButton.textContent = cartItems.length;
            cartButton.style.display = cartItems.length > 0 ? 'flex' : 'none';
        }

        addToCartButtons.forEach(button => {
            button.addEventListener('click', () => {
                const item = button.getAttribute('data-item');
                cartItems.push(item);
                updateCartButton();
                alert(`${item} has been added to your cart!`);
            });
        });

        cartButton.addEventListener('click', () => {
            cartModal.style.display = 'block';
            cartOverlay.style.display = 'block';
            renderCartItems();
        });

        cartOverlay.addEventListener('click', () => {
            cartModal.style.display = 'none';
            cartOverlay.style.display = 'none';
        });

        function renderCartItems() {
            cartItemsList.innerHTML = '';
            cartItems.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item;
                cartItemsList.appendChild(li);
            });
        }

         checkoutButton = document.getElementById('checkoutButton');
        checkoutButton.addEventListener('click', () => {
            alert('Checkout complete! Thank you for your order.');
            cartItems = [];
            updateCartButton();
            cartModal.style.display = 'none';
            cartOverlay.style.display = 'none';
        });

        updateCartButton();
