<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("localhost", "root", "", "zomato_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize a message variable
$message = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['itemsbtn'])) {
    $name = $_POST["food_name"];
    $description = $_POST["description"];
    $image = $_POST["food_url"];

    // Check for duplicate entries in the database
    $check_sql = "SELECT * FROM `menu` WHERE `name` = '$name'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $message = "Error: This food item already exists in the database.";
    } else {
        // Insert the new record
        $sql = "INSERT INTO `menu` (`name`, `description`, `image_url`) VALUES ('$name', '$description', '$image')";
        if (mysqli_query($conn, $sql)) {
            // Redirect to prevent duplicate submission
            header("Location: " . $_SERVER["PHP_SELF"] . "?success=true");
            exit;
        } else {
            $message = "Error adding food: " . mysqli_error($conn);
        }
    }
}

// Fetch data from the menu table
$sql = "SELECT * FROM `menu`";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Orders</title>
  <!-- icon -->
  <link rel="icon" href="../All Images/Landing Page Images/zpmato-icon.png">

  <link rel="stylesheet" href="../Landing Pages/zomato.css" />
  <link rel="stylesheet" href="./orderpage.css?v=1.2" />
  <link rel="stylesheet" href="./orderpages_card.css?v=1.1">
  <link rel="stylesheet" href="./orderpage_menu.css?v=1.1">
  <link rel="stylesheet" href="./orderpageslider.css?v=1.2">
  <link rel="stylesheet" href="./order_live-heading.css?v=1.1">
  <link rel="stylesheet" href="./restaurant.css">
  <link rel="stylesheet" href="./loading.css?v=1.1">
  <link rel="stylesheet" href="./add_food.css?v=1.1">
  <link rel="stylesheet" href="./reataurent_model.css">
  <link rel="stylesheet" href="../Landing Pages/footer.css">

  <!-- Outside -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>

<body>

  <!-- Loading Screen -->
  <div id="loading-screen" class="loading-screen">
    <div class="spinner"></div>
    <h2>Loading...</h2>
  </div>

  <div class="nav-contain">
    <div class="nav-logo">
      <a href="../index.html"><img src="../All Images/Landing Page Images/crave-cart-logo (1).png"
          alt="zomato-logo" /></a>
    </div>
    <div class="search-container row">
      <div class="location">
        <i data-feather="map-pin"></i>
        <input placeholder="JIIT Gate 2 Sector 62, Noida" class="location-input" />
        <i data-feather="chevron-down"></i>
      </div>
      <div class="line"></div>
      <div class="search">
        <div class="search-icon">
          <i data-feather="search"></i>
        </div>
        <input placeholder="Search for a restaurent, cusine or a dish" class="search-box" />
      </div>
    </div>
    <div class="log-conatin">
      <div class="nav-element">
        <a href="../Login/login.html">Login</a>
      </div>
      <div class="nav-element">
        <a href="../Login/login.html">Sign Up</a>
      </div>
      <!-- start -->

      <!-- Add Restaurant Button -->
      <button class="open-modal-btn1" id="openModalBtn1">Add New Restaurant</button>
      <!-- Modal -->
      <div class="modal-overlay1" id="modalOverlay1"></div>
      <div class="modal1" id="modal1">
        <div class="modal-header1">
          <h2>Add New Item</h2>
          <button class="close-btn1" id="closeModalBtn1">&times;</button>
        </div>
        <div class="modal-body">

          <form action="orderPage.php" method="POST">
            <label for="name">name</label>
            <input type="text" name="name" placeholder="Restaurant Name" required>
            <label for="name">name</label>
            <textarea name="description" placeholder="Description" required></textarea>
            <label for="name">name</label>
            <input type="text" name="image_url" placeholder="Image URL" required>
            <label for="name">name</label>
            <input type="number" step="0.1" name="rating" placeholder="Rating" required>
            <label for="name">name</label>
            <input type="text" name="price_per_person" placeholder="Price per Person" required>
            <label for="name">name</label>
            <input type="text" name="delivery_time" placeholder="Delivery Time" required>
            <label for="name">name</label>
            <button type="submit" name="restaurantbtn">Add Restaurant</button>
          </form>
        </div>
      </div>

      <!-- end of updated php for btn -->

      <!-- Add Item Button -->
      <button class="open-modal-btn" id="openModalBtn">Add New Item</button>

      <!-- Display message -->
      <?php if (!empty($message)): ?>
      <div class="message <?php echo strpos($message, 'Error') !== false ? 'error' : ''; ?>">
        <?php echo $message; ?>
      </div>
      <?php endif; ?>

      <!-- Modal -->
      <div class="modal-overlay" id="modalOverlay"></div>
      <div class="modal" id="modal">
        <div class="modal-header">
          <h2>Add New Item</h2>
          <button class="close-btn" id="closeModalBtn">&times;</button>
        </div>
        <div class="modal-body">
          <form action="./orderPage.php" method="POST" id="addRestaurantForm">
            <label for="food_name">Food Name</label>
            <input type="text" id="food_name" name="food_name" placeholder="Enter Food name" required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" placeholder="Enter Food Description" required>

            <label for="food_url">Food Image URL</label>
            <input type="url" id="food_url" name="food_url" placeholder="Enter Food URL" required>

            <button type="submit" name="itemsbtn">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <main>
    <div class="top-line row">
      <a href="#">Home</a>
      <p>/</p>
      <a href="#">India</a>
      <p>/</p>
      <a href="#">Delhi</a>
      <p>/</p>
      <a class="last-a" href="#">JIIT, Sector 62, Noida</a>
    </div>
    </div>

    <div class="btn row">
      <button class="btn1 "> All</button>
      <button class="btn1"> Breakfast</button>
      <button class="btn1"> Lunch</button>
      <button class="btn1"> Snacks</button>
      <button class="btn1"> Dinner</button>
    </div>

    <section class="hero-banner">
      <div class="slider">
        <div class="slides">
          <div class="slide active">
            <img
              src="https://images.unsplash.com/photo-1464454709131-ffd692591ee5?q=80&w=1776&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
              alt="Image 1">
          </div>
          <div class="slide">
            <img
              src="https://images.unsplash.com/photo-1464306208223-e0b4495a5553?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
              alt="Image 2">
          </div>
          <div class="slide">
            <img
              src="https://images.unsplash.com/photo-1460306855393-0410f61241c7?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
          </div>
          <div class="slide">
            <img
              src="https://images.unsplash.com/photo-1463740839922-2d3b7e426a56?q=80&w=1900&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
          </div>
          <div class="slide">
            <img
              src="https://plus.unsplash.com/premium_photo-1674106347866-8282d8c19f84?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
          </div>
          <div class="slide">
            <img
              src="https://images.unsplash.com/photo-1496318447583-f524534e9ce1?q=80&w=1868&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
          </div>
          <div class="slide">
            <img
              src="https://images.unsplash.com/photo-1469957761306-556935073eba?q=80&w=2029&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
          </div>

        </div>
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
      </div>
    </section>

    <section class="menu-hero">
      <div class="items">
        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlMyzfmXp2bWMGCMLw2JC4uXpXR1qEGTCBvw&s"
            alt="">
          <div class="text">Burger</div>
        </a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQinmEv5XZiGP4mswRgnY3gWATSd09sYzdKMQ&s"
            alt="">
          <div class="text">Pav Bhaji</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img
            src="https://img.freepik.com/free-photo/fresh-pasta-with-hearty-bolognese-parmesan-cheese-generated-by-ai_188544-9469.jpg?semt=ais_hybrid"
            alt="">
          <div class="text">Noodles</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsGnAPWCpa7cRiRop_FCgv7_i0gu5z-MxtKQ&s"
            alt="">
          <div class="text">Fries</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img src="https://img.freepik.com/free-photo/pizza-pizza-filled-with-tomatoes-salami-olives_140725-1200.jpg"
            alt="">
          <div class="text">Pizza</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUvsKaj3T9QM2Vew6zplc6l6psaaS3v5trfg&s"
            alt="">
          <div class="text">Healthy Food</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img
            src="https://media.istockphoto.com/id/1158623408/photo/indian-hindu-veg-thali-food-platter-selective-focus.jpg?s=612x612&w=0&k=20&c=MOm3sfIfL22URV6juSCxpA3yfr4O63yJUV5vitufR7Y="
            alt="">
          <div class="text">Thali</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLCuJy69l2kA9d8pddtKObu3_h9JllCKIEvw&s"
            alt="">
          <div class="text">Pasta</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyrGRldd0n-Oup0HjIagz4Et46QVCbI1vxjA&s"
            alt="">
          <div class="text">Cookies</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img
            src="https://png.pngtree.com/png-vector/20240519/ourlarge/pngtree-two-delicious-spring-rolls-png-image_12495806.png"
            alt="">
          <div class="text">Rolls</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7DbKibZHxZmXQeNLc0iPe0V3UAFITibHGkflHEfcOjHWGm4tiBBkrJ2e9c6XlcWAquh0&usqp=CAU"
            alt="">
          <div class="text">Maccroni</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img src="https://static.toiimg.com/photo/98230357.cms" alt="">
          <div class="text">Chole Bhature</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQA9kwuKW7V7IwbPAjgD_x7hZo3B84wbVPQ1xZLUE9HrPUVcALXJnnu4aMLbBjXaUJ-mQ&usqp=CAU"
            alt="">
          <div class="text">South Indian</div></a>
        </div>

        <div class="item">
          <a href="../Partials/coming_soon.html">
          <img src="https://img-global.cpcdn.com/recipes/4e6759e54cbfedc2/1200x630cq70/photo.jpg" alt="">
          <div class="text">North Indian</div></a>
        </div>
      </div>

      <div class="button-container">
        <button class="button" onclick="slideLeft()">&#10094;</button>
        <button class="button" onclick="slideRight()">&#10095;</button>
      </div>

    </section>

    <section class="item-hero">
      <h1>Food Menu</h1>
      <!-- php card -->
      <div class="menu">
        <?php
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo '<div class="card">';
                  echo '<img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['name']) . '">';
                  echo '<div class="card-body">';
                  echo '<h3 class="card-title">' . htmlspecialchars($row['name']) . '</h3>';
                  echo '<p class="card-description">' . htmlspecialchars($row['description']) . '</p>';
                  echo '<button class="add-to-cart-btn" data-item="' . htmlspecialchars($row['name']) . '">Add to Cart</button>';
                  echo '</div></div>';
              }
          } else {
              echo "<p>No food items found.</p>";
          }
          ?>
      </div>
      </div>

      <!-- Cart Button -->
      <button id="cartButton" class="cart-button">0</button>

      <!-- Cart Modal -->
      <div id="cartModal" class="cart-modal">
        <h3>Your Cart</h3>
        <ul id="cartItems"></ul>
        <button id="checkoutButton">Checkout</button>
      </div>

      <!-- Overlay for modal -->
      <div id="cartOverlay" class="cart-overlay"></div>
    </section>

    <!-- optional just keep it for check -->
    <section class="slide-heading">
      <div class="slide-cont">
        <div class="slide-text">
          <p>Nachos are</p>
          <p class="slide-words">
            <span class="slide-word wisteria">tasty.</span>
            <span class="slide-word belize">wonderful.</span>
            <span class="slide-word pomegranate">fancy.</span>
            <span class="slide-word green">beautiful.</span>
          </p>
        </div>
      </div>
    </section>
    

    <!-- php of resturant -->

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['restaurantbtn'])) {
  // $message = "";

    $name = $_POST['name'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $rating = $_POST['rating'];
    $price_per_person = $_POST['price_per_person'];
    $delivery_time = $_POST['delivery_time'];

    $sql = "INSERT INTO `restaurants` (`restaurant_name`, `description`, `image_url`, `rating`, `price_per_person`, `delivery_time`) VALUES ('$name', '$description', '$image_url', '$rating', '$price_per_person', '$delivery_time')";

    if($conn->query($sql) == TRUE) {
        echo "New restaurant added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>
    <section class="restaurant-hero">
      <div class="restaurant-contain">
        <div class="heading">
          <h2>Popular Restaurants</h2>
        </div>
        <table id="restaurant-table">
          <tbody>
            <?php

                  // Fetch restaurant data
                  $sql = "SELECT * FROM restaurants";
                  $result = mysqli_query($conn,$sql);
  
                  if ($result->num_rows > 0) {
                      $count = 0;
                      while ($row = $result->fetch_assoc()) {
                          // Start a new row every 3 restaurants
                          if ($count % 3 == 0) {
                              echo "<tr>";
                          }
  
                          echo "
                              <td>
                                  <div class='restaurant'>
                                      <img src='" . $row['image_url'] . "' alt='" . $row['restaurant_name'] . "' class='restaurant-image'>
                                      <div class='restaurant-details'>
                                          <h2>" . $row['restaurant_name'] . "</h2>
                                          <span class='rating'>
                                              <i data-feather='star'></i> " . $row['rating'] . "
                                          </span>
                                      </div>
                                      <p class='restaurant-description'>" . $row['description'] . "</p>
                                      <div class='restaurant-footer'>
                                          <p>" . $row['price_per_person'] . " per person</p>
                                          <p>" . $row['delivery_time'] . "</p>
                                      </div>
                                  </div>
                              </td>
                          ";
  
                          // Close the row after 3 restaurants
                          if ($count % 3 == 2) {
                              echo "</tr>";
                          }
  
                          $count++;
                      }
  
                      // Close unclosed rows
                      if ($count % 3 != 0) {
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='3'>No restaurants available.</td></tr>";
                  }

                  ?>
          </tbody>
        </table>
    </section>


    <footer>
      <div class="footer-data">
        <div class="top-section row">
          <img src="../All Images/Landing Page Images/crave-cart-logo (1).png" alt="zomato-logo" />
          <div class="dropdowns row">
            <div class="dropdown row">
              <img src="../All Images/Landing Page Images/india-flag.png" alt="INDIA-img" />
              <div class="dropdown-text">India</div>
              <i data-feather="chevron-down"></i>
            </div>
            <div class="dropdown row">
              <i data-feather="globe"></i>
              <div class="dropdown-text">English</div>
              <i data-feather="chevron-down"></i>
            </div>
          </div>
        </div>

        <div class="middle-section row">
          <div class="footer-links">
            <h6 class="footer-title">About Crave Cart</h6>
            <ul>
              <li>Who we are</li>
              <li>Blog</li>
              <li>Work with us</li>
              <li>Investor Relations</li>
              <li>Report Fraud</li>
              <li>Contact us</li>
            </ul>
          </div>

          <div class="footer-links">
            <h6 class="footer-title">crave verse</h6>
            <ul>
              <li>Crave Cart</li>
              <li>Blinkit</li>
              <li>Feeding India</li>
              <li>Hyperpure</li>
              <li>Zomaland</li>
            </ul>
          </div>

          <div class="footer-links column">
            <div class="footer-links">
              <h6 class="footer-title">For Restaurants</h6>
              <ul>
                <li>Partner With Us</li>
                <li>Apps for you</li>
              </ul>
            </div>

            <div class="footer-links">
              <h6 class="footer-title">For Enterprises</h6>
              <ul>
                <li>Zomato For Enterprises</li>
              </ul>
            </div>
          </div>

          <div class="footer-links">
            <h6 class="footer-title">Learn more</h6>
            <ul>
              <li>Privacy</li>
              <li>Security</li>
              <li>Terms</li>
              <li>Sitemap</li>
            </ul>
          </div>

          <div class="footer-links">
            <h6 class="footer-title">Social Links</h6>
            <div class="socials">
              <ul class="row">
                <li><i class="fa fa-linkedin"></i></li>
                <li><i class="fa fa-instagram"></i></li>
                <li><i class="fa fa-twitter"></i></li>
                <li><i class="fa fa-youtube"></i></li>
                <li><i class="fa fa-facebook"></i></li>
              </ul>
            </div>
            <div class="buttons column">
              <img src="https://b.zmtcdn.com/data/webuikit/23e930757c3df49840c482a8638bf5c31556001144.png" />
              <img src="https://b.zmtcdn.com/data/webuikit/9f0c85a5e33adb783fa0aef667075f9e1556003622.png" />
            </div>
          </div>
        </div>

        <hr />

        <div class="end-section">
          By continuing past this page, you agree to our Terms of Service,
          Cookie Policy, Privacy Policy and Content Policies. All trademarks
          are properties of their respective owners. 2008-2024 © <strong>Crave Cart™ Ltd.</strong>
          All rights reserved.
        </div>

        <div class="end-section">
          <strong>Made By: ADITYA PACHOURI</strong>
        </div>
      </div>
    </footer>


  </main>

  <!-- choose one -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script> feather.replace(); </script>

  <!-- internal -->
  <script src="./orderpageslider.js"></script>
  <script src="./menu.js"></script>
  <!-- <script src="./order_live-heading.js"></script> -->
  <script src="./loading.js"></script>
  <script src="./cart.js"></script>
  <script src="./food_model.js"></script>
  <script src="./food_model2.js"></script>



</body>
</html>