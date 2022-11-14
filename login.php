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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>login</title>
</head>

<body>
    <div class="login-container">
        <div class="logform-container">
            <form action="" method="post">
                <div class="logform-item">
                    <label>Username</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="logform-item">
                    <label>Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="logform-item">
                    <div class="logform-item">
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Login</button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>