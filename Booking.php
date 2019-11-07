<?php

session_start();
if(isset($_POST['booking-submit'])){

require 'dbconnect.php';



$typeOfService = $_POST['typeOfService'];
$dateOfService = $_POST['dateOfService'];
$additionalInfo = $_POST['additionalInfo'];
$dealerId = $_POST['dealerId'];
$customerId = $_SESSION['customerid'];

    if(empty($typeOfService) || empty($dateOfService) || empty($additionalInfo) || empty($dealerId)){
        header("Location:BookDealer.php?error=emptyfields");
        exit();
    }

    else{
        $sql = "SELECT * FROM Dealer WHERE dealerId=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location:BookDealer.php?error=sqlerror");
            exit();
        }    
        else{
            mysqli_stmt_bind_param($stmt,"i",$dealerId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck!=1){
                 header("Location:BookDealer.php?error=invalidDealerId");
                 exit();
            }
            else{
                $success_query = "insert into Bookings(customerId,dealerid,dateOfService,typeOfService,additionalInfo) values(?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$success_query)) {
                    header("Location:BookDealer.php?error=sqlerror");
                    exit();
                }
                else{
                 
                    mysqli_stmt_bind_param($stmt,"iisss",$customerId,$dealerId,$dateOfService,$typeOfService,$additionalInfo);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
              
                    //header("Location:BookingSuccess.php");
                    //exit();
            
                }
            }
            //mysqli_stmt_close($stmt);
            //mysqli_close($conn);

        }      
    }
}
else{
    header("Location:Customer.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="bootstrap.min.js"></script>s
    <title>Booking</title>
</head>
<body>
    <div class="container">
        <h1 class="text-success text-center"><?php echo "Your Booking is successfull";  ?></h1>
        <h1 class="text-success text-center"><?php echo "Your can contact your dealer for any additional Information";  ?></h1>
        <h1>Your dealer details</h1>
        <?php 
            $q = "SELECT * FROM Dealer WHERE dealerId = '$dealerId'";
            $q1 = "SELECT * FROM Bookings WHERE customerId = '$customerId' AND dealerId = '$dealerId'";
            $res = mysqli_query($conn,$q);
            $res1 = mysqli_query($conn,$q1);
            while($row=mysqli_fetch_assoc($res))
            {
        ?>
                <li>Dealer ID: <?php echo $row['dealerId']; ?></li>
                <li>Dealer Name <?php echo $row['name']; ?></li>
                <li>Dealer Contact: <?php echo $row['contact']; ?></li>
                <li>Dealer emailId: <?php echo $row['email']; ?></li>
                
        <?php
            }
        ?>
        <?php
            while($row=mysqli_fetch_assoc($res1))
            {
        ?>
        <h1>your Booking ID is <?php echo $row['bookingId'];?></h1>
        <?php
            }
        ?>
    </div>
    <h3 class = 'text-center'><a href="Customer.php">Go Back</a></h3>
    <h3 class = 'text-center'><a href="Logout.php">Logout</a></h3>
</body>
</html>
