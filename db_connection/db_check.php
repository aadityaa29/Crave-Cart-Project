<?php

$servername = "localhost";
$username = "root"; 
$password = "";
$database = "zomato_db";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check Connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
?>