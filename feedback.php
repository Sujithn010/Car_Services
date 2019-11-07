
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feedback</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
<body>
    <div class="container" >
        <div class="row">
            <div class="col-lg-6">
            <h2 class="text-primary">Enter Booking Details</h2>
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error']=="emptyfields"){
                        echo '<p style="color:red;">Fill in all fields!</p>';
                    }
                    else if($_GET['error']=="invalidBookingId"){
                        echo '<p style="color:red;">Invalid Booking ID</p>';    
                    }
                    else if($_GET['error']=="sqlerror"){
                        echo '<p style="color:red;">Database Error</p>';    
                    }
                }
                    //else if($_GET["signup"]=="success"){
                        //echo '<p class="signupsuccess">Sign up successfull</p>';
                    //    header('Location:customerLogin.php');
                    ///}
            ?>
                <form action="feedbackValidation.php" method="POST" >
                    <div class="form-group">
                        <label> Enter booking ID </label>
                        <input type="text" name="bookingId" class="form-control" size="30000">
                    </div>

                    <div class="form-group">
                        <label> Enter Feedback </label>
                        <input type="text" name="feedback" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label> Enter your rating out of 10</label>
                        <input type="text" name="rating" class="form-control" size="30000">
                    </div>

                    <button type = "submit" name="feedback-submit" class="btn btn-primary"> Give Feedback </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>