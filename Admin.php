<?php

session_start();
if(!isset($_SESSION['name'])){
header('location:adminLogin.php');
session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
<body>
    <div>    
        <h2 class="text-center">Admin login</h2>
        <ul>
            <li><h3><a  href="AdminBookings.php">Bookings</a></li></h3>
            <li><h3><a  href="DealerListAdmin.php">Dealers</a></li></h3>
            <li><h3><a  href="home.php">Logout</a></li></h3>
        </ul>
    </div>
</body>
</html>