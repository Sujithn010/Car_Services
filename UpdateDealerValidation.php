<?php

session_start();
if(isset($_POST['dealer-update'])){

require 'dbconnect.php';
//echo "success";

$id1 = $_POST['id'];
$name = $_POST['name'];
//$userName = $_POST['user'];
$contact = $_POST['contact'];
$address = $_POST['address'];
//$password = $_POST['password'];
$email = $_POST['email'];

if(empty($name) || empty($contact) || empty($address) || empty($email)){
    header("Location:UpdateDealer.php?error=emptyfields");
    exit();
}

else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    header("Location:UpdateDealer.php?error=invalidemail");
    exit();
}

else{

    $success_query = "update Dealer set name='$name',contact=$contact,address='$address',email='$email' where dealerId=$id1";
    $query = mysqli_query($conn,$success_query);
    header("Location:DealerListAdmin.php");
    //echo"Success";
}
}
else{
    header("Location:DealerListAdmin.php");
    exit();
}

?>