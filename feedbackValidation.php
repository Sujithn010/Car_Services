<?php

session_start();
require 'dbconnect.php';
$bookingId = $_POST['bookingId'];
$feedback = $_POST['feedback'];
$rating = $_POST['rating'];
if(isset($_POST['feedback-submit'])){
    if(empty($bookingId)||empty($feedback)||empty($rating)){
        header("Location:feedback.php?error=emptyfields");
        exit();        
    }
    else{
        $sql = "SELECT * FROM Bookings WHERE bookingId=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location:feedback.php?error=sqlerror");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"i",$bookingId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck!=1){
            header("Location:feedback.php?error=invalidBookingId");
            exit();
        }
        else{
            $success_query = "insert into Feedback(bookingId,feedback,rating) values(?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$success_query)) {
                header("Location:feedback.php?error=sqlerror");
            exit();
            }
            else{
              //$hashedPwd = password_hash($password,PASSWORD_DEFAULT);    
              mysqli_stmt_bind_param($stmt,"isi",$bookingId,$feedback,$rating);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_store_result($stmt);
              header("Location:CustomerHistory.php?feedbackrecorded");
              exit();
            
            }
        }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }
}
}
else{
    header("Location:Customer.php");
    exit();
}    

?>