<?php
session_start();
include '../db_connection/db_check.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE `username` = '$username' OR `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 1)
    {
        echo "<script>alert('Username Already in the database, Try to Singup with differnt username!');</script>";
    
    }
    else{
        $sql = "INSERT INTO `user` (`username`, `email`, `password`, `date`) VALUES ('$username', '$email', '$pass', current_timestamp())";
    $result = mysqli_query($conn,$sql);
        
    }

}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $login = true;
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        if (strtolower($username) == 'admin') {
            $_SESSION['admin'] = true;
            $_SESSION['username'] = 'Team Crave Cart!';
        }
        

        header("location: ../Order Pages/orderPage.php");
        exit();
    }
    else{
        echo "<script>alert('Invalid Password');</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- icon -->
    <link rel="icon" href="../All Images/Landing Page Images/zpmato-icon.png">

    <link rel="stylesheet" href="./login.css">

    <!-- external -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="register()">Sign Up</button>
            </div>
            <div class="social-icon">
                
<ul>
    <li>
      <a href="#">
        <i class="fab fa-facebook-f icon"></i>    </a>
    </li>
    <li>
      <a href="#"><i class="fab fa-twitter icon"></i></a>
    </li>
    <li>
      <a href="#"><i class="fab fa-linkedin-in icon"></i></a></li>
    <li>
      <a href="#"><i class="fab fa-google icon"></i></a></li>
  </ul>
  
            </div>

            <form class="input-group" id="login" method="POST">
                <input type="text" class="input-field" placeholder="Enter Your Username" name="username" required>
                <input type="password" class="input-field" placeholder="Enter Your Password" name="password" required>
                <input type="checkbox" class="checkbox"><span>Remember Me</span>
                <a href="./forgot.html" class="forgot-pass">forgot Password?</a>
                <button type="submit" class="submit-btn" name="login">Login</button>
            </form>


            <form class="input-group" id="register" method="POST">
                <input type="text" class="input-field" placeholder="Choose Your Username" name="username" required>
                <input type="email" class="input-field" placeholder="Enter your email" name="email" required>
                <input type="password" class="input-field" placeholder="Create Your Password" name="password" required>
                <input type="checkbox" class="checkbox" required><span>I Agree to the Terms and Conditions</span>

                <button type="submit" class="submit-btn" name="register">Register</button>
            </form>
        </div>
    </div>

    <script>

        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }


        
    </script>
</body>
</html>