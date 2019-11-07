<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Dealer</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
<body>
    <div class="container" >
        <div class="row">
            <div class="col-lg-6">
            <h2>Add Dealer Information</h2>
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error']=="emptyfields"){
                        echo '<p style="color:red;">Fill in all fields!</p>';
                    }
                    else if($_GET['error']=="invalidemail"){
                        echo '<p style="color:red;">Invalid Email</p>';    
                    }
                
                    else if($_GET['dealerAddition']=="success"){
                        echo '<p style="color:red;">Sign up successfull</p>';
                        header('Location:DealerListAdmin.php');
                    }
                }
            ?>
                <form action="DealerValidation.php" method="POST">
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

                    <button type = "submit" name="dealer-submit" class="btn btn-primary"> Add Dealer </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>