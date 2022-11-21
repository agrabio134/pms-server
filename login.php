<?php
require_once("pmsclass.php");
$payroll->login();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>login</title>
</head>

<body>
    <div class="login-container">
        <div class="logo">
            <img src="./assets/logo.png" alt="logo" style="height: 450px;">
        </div>


     <div class="logmain-container">
        <form action="" method="post">
        <div class="logform-container">
           
                <div class="logform-item">
                    <label>Username</label>
                    </div>
                <div class="logform-item">
                    <input type="text" name="email" id="email">
                </div>
                <div class="logform-item">
                    <label>Password</label>
                    </div>
                <div class="logform-item">
                    <input type="password" name="password" id="password">
                </div>
                <div class="logform-item">
                </div>
                    <div class="logform-item">
                    <button class="btn btn-primary" type="submit" name="submit">Login</button>
                </div>
            </form>
     </div>   

        </div>
    </div>
</body>

</html>