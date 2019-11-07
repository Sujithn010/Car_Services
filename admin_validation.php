<?php


$con = mysqli_connect('localhost','root');
if($con){
    echo "Connection successful";
}else{
    echo "Failed to connect";
}

mysqli_select_db($con,'MobileCarServices');

$Name = $_POST['name'];
$password = $_POST['password'];


$q = "select * from Admin where name= '$Name' && password = '$password' ";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);

if($num==1){
    session_start();
    $_SESSION['name'] = $Name;
    header('location:Admin.php');
}
else{
    header('location:adminLogin.php');
}
?>
