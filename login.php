<?php

    @include 'config.php';

    session_start();

    if(isset($_POST['submit'])){

        // $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pass = md5($_POST['password']);
        // $cpass = md5($_POST['cpassword']);
        // $user_type = $_POST['user_type'];


        $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            
            $row = mysqli_fetch_array($result);

            if($row['user_type'] == 'user'){
                $_SESSION['user_name'] = $row['name'];
                header('location:dashboard.php');
            }
        }
        else{
            $error[] = 'incorrect email or password!';
        }
    }

?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title of the page -->
    <title>Practical_Test-login</title>

    <!-- Custom css file link  -->
    <link rel="stylesheet" href="form.css">

    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>login now</h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
            ?>
            <!-- EMAIL -->
            <input type="email" name="email" required placeholder="enter your email">
            <!-- PASSWORD -->
            <input type="password" name="password" required placeholder="enter your password">
            <!-- SUBMIT BUTTON -->
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p style="display:none;">don't have an account? <a href="register_form.php">register now</a></p>
            New to the site? <a href="register.php" style="color:#000;">Register now</a><br>
            <a href="index.html" style="color:#000;">Go back home</a>
        </form>
    </div>
</body>
</html>