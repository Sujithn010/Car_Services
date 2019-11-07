<?php

session_start();

$con = mysqli_connect('localhost','root');
if(!$con){
    echo "Connection not possible";
}

mysqli_select_db($con,'CarServices');
$q = "select * from Dealer ";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
$query="SELECT dealerId FROM dealer";
$res=mysqli_query($con,$query);
$id=mysqli_fetch_assoc($res)['dealerId'];
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
    </style>    
</head>
<body>
    <table align="center" border="1px;" style:" width:600px; line-height: 40px;">
        <tr>
            <th colspan="7"><h2>Dealer Records</h2></th>
        </tr>
        <t>
            <th> ID: </th>
            <th> Name: </th>
            <th> Contact: </th>
            <th> Address: </th>
            <th> Email id: </th>
            <th> Dealer history </th>
            <th> Book a Service</th>
            
        </t>
    <?php
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>
        <tr>
            <td> <?php echo $rows['dealerId']; ?></td>
            <td> <?php echo $rows['name']; ?></td>    
            <td> <?php echo $rows['contact']; ?></td>
            <td> <?php echo $rows['address']; ?></td>
            <td> <?php echo $rows['email']; ?></td>
            <td> <a href="">View Dealer History </a> 
            <td> <form method="POST" action="BookDealer.php"><input type="submit" name='dealer' value='Book Dealer'></form></td>  
        </tr>
    <?php
        }
    ?>    
    <div class="footer"><h2><a href="home.php" >Logout</a></h2></div>   
</body>
</html>
