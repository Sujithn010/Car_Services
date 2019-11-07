<?php

//session_start();
if(isset($_POST['dealer-submit'])){

require 'dbconnect.php';



$name = $_POST['name'];
//$userName = $_POST['user'];
$contact = $_POST['contact'];
$address = $_POST['address'];
//$password = $_POST['password'];
$email = $_POST['email'];

if(empty($name) || empty($contact) || empty($address) || empty($email)){
    header("Location:addDealer.php?error=emptyfields");
    exit();
}

else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    header("Location:SignUp.php?error=invalidemail");
    exit();
}

else{

        $success_query = "insert into Dealer(name,contact,address,email) values(?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$success_query)) {
            header("Location:addDealer.php?error=sqlerror");
            exit();
        }
        else{
            //$hashedPwd = password_hash($password,PASSWORD_DEFAULT);    
            mysqli_stmt_bind_param($stmt,"siss",$name,$contact,$address,$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location:DealerListAdmin.php?dealerAddition=success");
            exit();
            
        }
}
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else{
    header("Location:DealerListAdmin.php");
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