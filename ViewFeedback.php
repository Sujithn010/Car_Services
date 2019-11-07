<?php

session_start();

$con = mysqli_connect('localhost','root');
if(!$con){
    echo "Connection not possible";
}

mysqli_select_db($con,'MobileCarServices');
$bid = $_GET['bookingId'];
$q = "select * from feedback where bookingId = $bid ";
$result = mysqli_query($con,$q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <table align="center" border="1px;" style:" width:600px; line-height: 40px;">
        <tr>
            <th colspan="7"><h2>Customer Feedback</h2></th>
        </tr>
        <t>

            <th>Feedback </th>
            <th> Rating </th>
   
        </t>
    <?php
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>
        <tr>
            <td> <?php echo $rows['feedback']; ?></td>    
            <td> <?php echo $rows['rating']; ?></td>
        </tr>
    <?php
        }
    ?>
    <div class="fixed"><h2><a href="DealerList.php">Go Back</a></h2></div>     
    <div class="footer"><center><h2><a href="Logout.php" >Logout</a></h2></center></div> 
</body>
</html>