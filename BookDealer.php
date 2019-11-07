<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                    else if($_GET['error']=="invalidDealerId"){
                        echo '<p style="color:red;">Invalid Dealer</p>';    
                    }
                }
                    //else if($_GET["signup"]=="success"){
                        //echo '<p class="signupsuccess">Sign up successfull</p>';
                    //    header('Location:customerLogin.php');
                    ///}
            ?>
                <form action="Booking.php" method="POST">
                    <div class="form-group">
                        <label> Enter type of service u need </label>
                        <input type="text" name="typeOfService" class="form-control" size="30000">
                    </div>

                    <div class="form-group">
                        <label> Enter Date u prefer </label>
                        <input type="text" name="dateOfService" class="form-control" placeholder="yyyy/mm/dd">
                    </div>

                    <div class="form-group">
                        <label> Enter any additional information or instructions u wish to give to the dealer</label>
                        <input type="text" name="additionalInfo" class="form-control" size="30000">
                    </div>

                    <div class="form-group">
                        <label> Confirm dealer ID </label>
                        <input type="text" name="dealerId" class="form-control">
                    </div>

                    <button type = "submit" name="booking-submit" class="btn btn-primary"> confirm Booking </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>