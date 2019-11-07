<?php

//session_start();
if(isset($_POST['login-submit'])){
    require 'dbconnect.php';
    $userName = $_POST['user'];
    $password = $_POST['password'];
    
    if(empty($userName)||empty($password)){
        header("Location:customerLogin.php?error=emptyfields");
        exit();        
    }
    else{
        $q = "select * from Customer where userName= '$userName' && password = '$password' ";
        $q1 = "SELECT * from Customer where userName = '$userName' ";
        $result = mysqli_query($conn,$q);
        $result1 = mysqli_query($conn,$q1);
        $num = mysqli_num_rows($result);
        $num1 = mysqli_num_rows($result1);
        $data = array();
        if($num==1){
            session_start();
            $_SESSION['username'] = $userName;
            if($num1!=0){
                while($row=mysqli_fetch_assoc($result1)){
                   $data = $row;
                }
                //$_SESSION['customerid'] = $q1;
            }
            $_SESSION['customerid'] = $data['customerId'] ;
            header('location:Customer.php');
        }
        else{
            header('location:customerLogin.php?failedtologin');
            exit();
        }    
    }


}
else{
    header("Location:customerLogin.php");
    exit();
}







































?>