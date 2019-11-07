<?php

//session_start();
if(isset($_POST['signup-submit'])){

require 'dbconnect.php';



$name = $_POST['name'];
$userName = $_POST['user'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$password = $_POST['password'];
$email = $_POST['email'];

if(empty($userName) || empty($name) || empty($contact) || empty($address) || empty($password) || empty($email)){
    header("Location:SignUp.php?error=emptyfields");
    exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$userName)){
    header("Location:SignUp.php?error=invalidemailandname");
    exit();
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    header("Location:SignUp.php?error=invalidemail");
    exit();
}
else if(!preg_match("/^[a-zA-Z0-9]*$/",$userName)){
    header("Location:SignUp.php?error=invalidusername");
    exit();
}
else{

    $sql = "SELECT * FROM Customer WHERE userName=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location:SignUp.php?error=sqlerror");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck>0){
            header("Location:SignUp.php?error=usernametaken");
            exit();
        }
        else{
            $success_query = "insert into Customer(cust_name,userName,contactInfo,address,password,email) values(?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$success_query)) {
            header("Location:SignUp.php?error=sqlerror");
            exit();
            }
            else{
              //$hashedPwd = password_hash($password,PASSWORD_DEFAULT);    
              mysqli_stmt_bind_param($stmt,"ssisss",$name,$userName,$contact,$address,$password,$email);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_store_result($stmt);
              header("Location:customerLogin.php?signup=success");
              exit();
            
            }
        }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }
}
}
else{
    header("Location:SignUp.php");
    exit();
}














//    $q = "select * from Customer where userName= '$userName' ";
//$result = mysqli_query($con,$q);
//$num = mysqli_num_rows($result);

//if($num==1){
//    echo "Duplicate data";
//    //echo "<script> alert('Duplicate data');</script>;
//}
//else{
//    $success_query = "insert into Customer(cust_name,userName,contactInfo,address,password,email) values('$name','$userName','$contact','$address','$password','$email')";
//    mysqli_query($con,$success_query);
//   header('location:customerLogin.php');
//}

?>