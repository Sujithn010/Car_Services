<?php
session_start();
require 'dbconnect.php';
//echo "success";
$id = $_GET['id'];
$q = "DELETE FROM Dealer WHERE dealerId = $id";
 mysqli_query($conn,$q);
{
    header('Location:DealerListAdmin.php');

}
?>


