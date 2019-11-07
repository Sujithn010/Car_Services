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
                <p>New User? <a href="SignUp.php">Sign up here</a></p>
                <h2>Login Form </h2>
                <form action="validation.php" method="POST">
                    <div class="form-group">
                        <label> username </label>
                        <input type="text" name="user" class="form-control">
                    </div>

                    <div class="form-group">
                        <label> Password </label>
                        <input type="Password" name="password" class="form-control">
                    </div>

                    <button class="btn btn-primary" name="login-submit"> Login </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>