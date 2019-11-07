<?php
/*
session_start();
if(isset($_POST['dealer-update'])){

require 'dbconnect.php';
echo "success";

$id = $_GET['id'];
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

    $success_query = "update Dealer set name='$name',contact=$contact,address='$address',email='$email' where dealerId=$id";
    $query = mysqli_query($conn,$success_query);
    header("Location:DealerListAdmin.php");
}
}
else{
    header("Location:DealerListAdmin.php");
   exit();
}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Dealer Info</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
<body>
    <div class="container" >
        <div class="row">
            <div class="col-lg-6">
            <h2>Update Dealer Information</h2>
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error']=="emptyfields"){
                        echo '<p style="color:red;">Fill in all fields!</p>';
                    }
                    else if($_GET['error']=="invalidemail"){
                        echo '<p style="color:red;">Invalid Email</p>';    
                    }
                
                    else if($_GET['dealerInfoUpdate']=="success"){
                        //echo '<p style="color:red;">Updated successfull</p>';
                        header('Location:DealerListAdmin.php');
                    }
                }
                //$GLOBALS['id']=$_GET['id'];
                //echo $GLOBALS['id'];
            ?>
                <form method="POST" action="UpdateDealerValidation.php">
                    <div class="form-group">
                        <label> Name </label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label> Contact-Info </label>
                        <input type="text" name="contact" class="form-control">
                    </div>

                    <div class="form-group">
                        <label> Address </label>
                        <input type="text" name="address" class="form-control">
                    </div>

                    <div class="form-group">
                        <label> Email </label>
                        <input type="text" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label> Confirm Dealer ID </label>
                        <input type="text" name="id" class="form-control">
                    </div>

                    <button name="dealer-update" class="btn btn-primary"> Update </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>