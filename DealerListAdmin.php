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
            <th colspan="7"class = "text-center"><h2>Dealer Records</h2></th>
        </tr>
        <t>
            <th> ID: </th>
            <th> Name: </th>
            <th> Contact: </th>
            <th> Address: </th>
            <th> Email id: </th>
            <th> Update </th>
            <th>Remove dealer</th>
            
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
            <td> <button ><a href="UpdateDealer.php?id=<?php echo $rows['dealerId'];?>">Update dealer info</a></button></td> 
            <td> <button class="btn-danger btn"><a href="DeleteDealer.php?id=<?php echo $rows['dealerId'];?>">Delete dealer </a></button></td>   
        </tr>
    <?php
        }
    ?> 
    <div class="fixed"><h2><a href="addDealer.php">Add Dealer</a></h2></div>   
    <div class="footer"><center><h2><a href="Logout.php" >Logout</a></h2></center></div> 
</body>
</html>