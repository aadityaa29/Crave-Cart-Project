<?php
include './db_connection/db_check.php';

$sql = "SELECT * FROM restaurants";
$result = mysqli_query($conn, $sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
echo json_encode($data);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <style>
    .restaurant-hero {
    padding: 20px;
    background-color: #f9f9f9;
}
.restaurant-contain {
    max-width: 1200px;
    margin: 0 auto;
}
#restaurant-table {
    width: 100%;
    border-collapse: collapse;
}
#restaurant-table td {
    padding: 15px;
    vertical-align: top;
}
.restaurant {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
}
.restaurant img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
}
.restaurant h2 {
    font-size: 18px;
    margin: 10px 0;
}
.restaurant-footer {
    margin-top: 10px;
    font-size: 14px;
    color: #555;
}
.btn-view-menu,
.btn-add-favorites {
    margin: 5px;
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.btn-view-menu:hover,
.btn-add-favorites:hover {
    background-color: #0056b3;
}

@media (max-width: 768px) {
    #restaurant-table td {
        display: block;
        width: 100%;
    }
    .restaurant {
        margin-bottom: 20px;
    }
}


  </style>
</head>
<body>

<button class='btn-view-menu'>View Menu</button>
<button class='btn-add-favorites'>Add to Favorites</button>

  

<script>
  document.querySelectorAll('.btn-view-menu').forEach(button => {
    button.addEventListener('click', function () {
        const restaurantName = this.closest('.restaurant').querySelector('h2').textContent;
        alert(`Fetching menu for ${restaurantName}`);
        // You can use fetch() or redirect the user here
    });
});

fetch('fetch_restaurants.php')
    .then(response => response.json())
    .then(data => {
        const tableBody = document.querySelector('#restaurant-table tbody');
        tableBody.innerHTML = ''; // Clear existing content
        data.forEach((restaurant, index) => {
            const rowOpen = index % 3 === 0 ? '<tr>' : '';
            const rowClose = index % 3 === 2 ? '</tr>' : '';
            tableBody.innerHTML += `
                ${rowOpen}
                <td>
                    <div class="restaurant">
                        <img src="${restaurant.image_url}" alt="${restaurant.restaurant_name}" class="restaurant-image">
                        <div class="restaurant-details">
                            <h2>${restaurant.restaurant_name}</h2>
                            <span class="rating"><i data-feather="star"></i> ${restaurant.rating}</span>
                        </div>
                        <p class="restaurant-description">${restaurant.description}</p>
                        <div class="restaurant-footer">
                            <p>${restaurant.price_per_person} per person</p>
                            <p>${restaurant.delivery_time}</p>
                        </div>
                        <button class="btn-view-menu">View Menu</button>
                    </div>
                </td>
                ${rowClose}
            `;
        });
    });


</script>
</body>
</html>