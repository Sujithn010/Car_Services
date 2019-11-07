<?php

session_start();

$con = mysqli_connect('localhost','root');
if(!$con){
    echo "Connection not possible";
}

mysqli_select_db($con,'MobileCarServices');
$did = $_GET['dealerId'];
$q = "select * from Bookings where dealerId = $did ";
$result = mysqli_query($con,$q);
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
    <title>Dealer List</title>
    <style>
        .footer{
            position: fixed;
            text-align: center;
            bottom: 50px;
            width: 100%;    
        }
        .fixed{
            position: fixed;
            padding: 30px;
            bottom:80px;
            left: 600px;
        }
    </style>    
</head>
<body>
    <table class="table-striped" align="center" border="1px;" style:" width:600px; line-height: 40px;">
        <tr>
            <th colspan="5" class="text-center"><h2>Dealer History</h2></th>
        </tr>
        <t>
            <th class="text-center"> Booking ID </th>
            <th class="text-center"> Dealer ID </th>
            <th class="text-center"> Date Of Service </th>
            <th class="text-center"> Type Of Service </th> 
            <th class="text-center"> View Feedback </th>   
        </t>
    <?php
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>
        <tr>
            <td class="text-center"> <?php echo $rows['bookingId']; ?></td>    
            <td class="text-center"> <?php echo $rows['dealerId']; ?></td>
            <td class="text-center"> <?php echo $rows['dateOfService']; ?></td>
            <td class="text-center"> <?php echo $rows['typeOfService']; ?></td>
            <td class="text-center"> <a href="ViewFeedback.php?bookingId=<?php echo $rows['bookingId']; ?>" >View Customer Feedback</a></td>
        </tr>
    <?php
        }
    ?> 
    <div class="fixed"><h2><a href="DealerList.php">Go Back</a></h2></div>   
    <div class="footer"><center><h2><a href="Logout.php" >Logout</a></h2></center></div> 
</body>
</html>