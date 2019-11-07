<?php

session_start();

$con = mysqli_connect('localhost','root');
if(!$con){
    echo "Connection not possible";
}

mysqli_select_db($con,'MobileCarServices');
$q = "select * from Bookings ";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
//$query="SELECT dealerId FROM dealer";
//$res=mysqli_query($con,$query);
//$id=mysqli_fetch_assoc($res);
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
    <title>Bookings</title>
    <style>
        .footer{
            position: fixed;
            text-align: center;
            bottom: 10px;
            width: 100%;    
        }
    </style>    
</head>
<body>
    <table class="table-striped" align="center" border="1px;" style:" width:600px; line-height: 40px;">
        <tr>
            <th colspan="7" class="text-center"><h2>Bookings</h2></th>
        </tr>
        <t>
            <th> Booking ID: </th>
            <th> Customer ID </th>
            <th> Dealer ID </th>
            <th> Date Of Service </th>
            <th> Type Of Service </th>
            <th> additional Information </th>
        <?php //if($_GET['error']=="nofeedback"){?>    
            <th> Finish Service <!--<br>--> <?php //echo "Feedback not given yet"; ?>  </th>
            <!--<th> Book a Service</th>-->
        <?php 
        //}
        ?>    
        </t>
    <?php
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>
        <tr>
            <td> <?php echo $rows['bookingId']; ?></td>
            <td> <?php echo $rows['customerId']; ?></td>    
            <td> <?php echo $rows['dealerId']; ?></td>
            <td> <?php echo $rows['dateOfService']; ?></td>
            <td> <?php echo $rows['typeOfService']; ?></td>
            <td> <?php echo $rows['additionalInfo']; ?></td>
            <td> <button ><a href="DeleteBooking.php?id=<?php echo $rows['bookingId'];?>">Service Done</a></button></td> 
        </tr>
    <?php
        }
    ?>    
    <div class="footer"><h2><a href="Logout.php" >Logout</a></h2></div>   
</body>
</html>
