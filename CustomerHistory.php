<?php

session_start();
require 'dbconnect.php';
    $custId = $_SESSION['customerid'];
    //$password = $_POST['password'];
    $q = "select * from Bookings where customerId = '$custId' ";
    //$q1 = "SELECT * from Customer where userName = '$userName' ";
    $result = mysqli_query($conn,$q);
    //$result1 = mysqli_query($conn,$q1);
    $num = mysqli_num_rows($result);
    //$num1 = mysqli_num_rows($result1);
    
    
 ?>       
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="bootstrap.min.js"></script>
    <title>History</title>
</head>
<body>

    <table class="table-striped" align="center" border="1px;" style:" width:600px; line-height: 40px;">
        <tr>
            <th colspan="7" class="text-center"><h2>Bookings</h2></th>
        </tr>
        <tr>    
            <th class="text-center"> Booking Number </th>
            <th class="text-center"> Booking ID</th>
            <th class="text-center"> Dealer ID </th>
            <th class="text-center"> Date Of Service </th>
            <th class="text-center"> Requested Type of Service </th>
            <th class="text-center"> Additional Instructions given: </th>
            <th class="text-center"> Dealer history </th>
        </tr>    
    
     <?php
        $data = array();
        $i = 1;
        if($num!=0){
            while($row=mysqli_fetch_assoc($result)){
                $data = $row;
     ?>
     <tr>  
        <td class="text-center"><?php echo $i;?></td>
        <td class="text-center"><?php echo $data['bookingId'];?></td>
        <td class="text-center"><?php echo $data['dealerId'];?></td>
        <td class="text-center"><?php echo $data['dateOfService'];?></td>
        <td class="text-center"><?php echo $data['typeOfService'];?></td>
        <td class="text-center"><?php echo $data['additionalInfo'];?></td>
        <?php
            $bookingid = $data['bookingId'];
            $q1 = "select * from feedback where bookingId = '$bookingid' ";
            $result1 = mysqli_query($conn,$q1);
            $num1 = mysqli_num_rows($result1);
            if($num1==0){
        ?>
        <td class="text-center">Click <a href="feedback.php">here</a> to give Feedback</td> 
    <?php
            }
            else{
    ?>
        <td class="text-center"> Feedback given!</td>
    </tr> 
    <?php
            }
                $i++;
            }
        }
    ?>
    <!--
    <center><h3><a href="Customer.php">Go Back</a></h3></center>
    <center><h3><a href="Logout.php">Logout</a></h3></center>
   -->

    <!-- vsd -->
    <div class="container">
        <div class="row">
        <div class="col-md-6">
        <h3 class="text-center"><a href="Customer.php">Go Back</a></h3>
        </div>
        <div class="col-md-6">
        <h3 class="text-center"><a href="Logout.php">Log Out</a></h3>
        </div>
        </div>
    </div>

</body>
</html>        
