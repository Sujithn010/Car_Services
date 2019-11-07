<?php

session_start();

$con = mysqli_connect('localhost','root');
if(!$con){
    echo "Connection not possible";
}

mysqli_select_db($con,'MobileCarServices');
$q = "select * from Dealer ";
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
    <title>Dealer List</title>
    <style>
        .footer{
            position: fixed;
            text-align: center;
            bottom: 50px;
            width: 100%;    
        }
        .footer1{
            position: fixed;
            text-align: center;
            bottom: 90px;
            width: 100%;    
        }
    </style>    
</head>
<body>
    <table class="table-striped" align="center" border="1px;" style:" width:600px; line-height: 40px;">
        <tr>
            <th colspan="7" class="text-center"><h2>Dealer Records</h2></th>
        </tr>
        <t>
            <th class="text-center"> ID: </th>
            <th class="text-center"> Name: </th>
            <th class="text-center"> Contact: </th>
            <th class="text-center"> Address: </th>
            <th class="text-center"> Email id: </th>
            <th class="text-center"> Dealer history </th>
            <th class="text-center"> Book a Service</th>
            
        </t>
    <?php
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>
        <tr>
            <td class="text-center"> <?php echo $rows['dealerId']; ?></td>
            <td class="text-center"> <?php echo $rows['name']; ?></td>    
            <td class="text-center"> <?php echo $rows['contact']; ?></td>
            <td class="text-center"> <?php echo $rows['address']; ?></td>
            <td class="text-center"> <?php echo $rows['email']; ?></td>
            <td class="text-center"> <button><a href="ViewDealerHistory.php?dealerId=<?php echo$rows['dealerId']; ?>">View Dealer History </a></button></td>
            <td class="text-center"> <button><a href="BookDealer.php">Book dealer</a></button> </td>
        </tr>
    <?php
        }
    ?>    
    <div class="footer1"><h2><a href="Customer.php" >Go Back</a></h2></div> 
    <div class="footer"><h2><a href="home.php" >Logout</a></h2></div>   
</body>
</html>
