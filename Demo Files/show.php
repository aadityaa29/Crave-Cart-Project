Bootstrap Modal
<div class="modal fade" id="addFoodModal" tabindex="-1" aria-labelledby="addFoodModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addFoodModalLabel">Add Food Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="food-form">
        <div class="modal-body">
          <div class="mb-3">
            <label for="food-name" class="form-label">Food Name</label>
            <input type="text" class="form-control" id="food-name" name="food_name" required>
          </div>
          <div class="mb-3">
            <label for="food-price" class="form-label">Price</label>
            <input type="number" class="form-control" id="food-price" name="food_price" required>
          </div>
          <div class="mb-3">
            <label for="food-image" class="form-label">Image URL</label>
            <input type="url" class="form-control" id="food-image" name="food_image" required>
          </div>
          <div class="mb-3">
            <label for="food-description" class="form-label">Description</label>
            <textarea class="form-control" id="food-description" name="food_description" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Food</button>
        </div>
      </form>
    </div>
  </div>
</div>
    
<script>
        document.getElementById('food-form').addEventListener('submit', function (event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch('add_food.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Dynamically update the table with the new food item
            const foodItems = document.getElementById('food-items');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <div class="card">
                        <img src="${data.food.image}" alt="${data.food.name}" class="card-image">
                        <div class="card-details">
                            <h2>${data.food.name}</h2>
                            <span class="price">₹${data.food.price}</span>
                        </div>
                        <p class="description">${data.food.description}</p>
                        <div class="card-footer">
                            <span class="rating">
                                <i data-feather="star"></i> 4.5
                            </span>
                            <button class="add-to-cart">Add to cart</button>
                        </div>
                    </div>
                </td>`;
            foodItems.appendChild(row);

            // Close the modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('addFoodModal'));
            modal.hide();
        } else {
            alert('Failed to add food. Try again!');
        }
    });
});

    </script>
    