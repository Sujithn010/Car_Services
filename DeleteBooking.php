<?php
session_start();
require 'dbconnect.php';
//echo "success";
$id = $_GET['id'];
//$q1 = "SELECT * FROM Feedback where bookingId = $id";
//$res = mysqli_query($conn,$q1);
//$num = mysqli_num_rows($res);
//if($num==1){}
$q = "DELETE FROM Bookings WHERE bookingId = $id";
mysqli_query($conn,$q);
//}
//else{
//    header('Location:AdminBookings.php?error=nofeedback');
//}
header('Location:AdminBookings.php');

?>
