<?php
// backend.php

header('Content-Type: application/json');

// Simulating backend processing
$response = [
    "status" => "success",
    "message" => "Coming Soon! We are working on it."
];

// Log the request (optional)
file_put_contents('logs.txt', json_encode($response) . PHP_EOL, FILE_APPEND);

echo json_encode($response);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coming Soon</title>
  <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to right, #2980b9, #6dd5fa, #ffffff);
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    color: #2c3e50;
  }
  
  .coming-soon-container {
    text-align: center;
    padding: 20px;
    border: 2px solid #fff;
    border-radius: 10px;
    background-color: #ffffff;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  }
  
  button {
    background-color: #2980b9;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  button:hover {
    background-color: #1f5c7a;
  }
  
  .popup {
    margin-top: 20px;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    color: #333;
    display: none;
  }
  
  .popup.hidden {
    display: none;
  }
  
  .popup.visible {
    display: block;
  }
  
  </style>
</head>
<body>
  <div class="coming-soon-container">
    <h1>Our Amazing Feature</h1>
    <p>Click the button below to learn more!</p>
    <button id="comingSoonButton">Learn More</button>
    <div id="comingSoonPopup" class="popup hidden">
      <p>🚧 Coming Soon! We are working hard to bring this feature to you. Stay tuned! 🚧</p>
    </div>
  </div>

  <script>
    document.getElementById('comingSoonButton').addEventListener('click', function () {
  const popup = document.getElementById('comingSoonPopup');
  popup.classList.toggle('hidden');
  popup.classList.toggle('visible');
});

document.getElementById('comingSoonButton').addEventListener('click', function () {
  fetch('backend.php')
    .then(response => response.json())
    .then(data => {
      const popup = document.getElementById('comingSoonPopup');
      popup.textContent = data.message;
      popup.classList.toggle('hidden');
      popup.classList.toggle('visible');
    })
    .catch(error => {
      console.error('Error fetching from the backend:', error);
    });
});


  </script>
</body>
</html>
