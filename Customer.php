<?php

session_start();
if(!isset($_SESSION['username'])){
header('location:customerLogin.php');
session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="bootstrap.min.js"></script>
<body>
    <div>    
        <h2 class="text-center">Welcome <?php echo $_SESSION['username'];?></h2>
        <ul>
            <h3><li><a class = "text-center" href="dealerList.php">Dealer List</a></li></h3>
            <h3><li><a class = "text-center" href="CustomerHistory.php">History</a></li></h3>
            <h3><li><a class = "text-center" href="Logout.php">Logout</a></li></h3>
        </ul>    
    </div>
</body>
</html>