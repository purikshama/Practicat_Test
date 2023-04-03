<?php

    @include 'config.php';

    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];


        $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

        $result = mysqli_query($conn,$select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'user already exists!';
        }
        else{
            if($pass != $cpass){
                $error[] = 'password not matched!';
            }
            else{
                $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
                mysqli_query($conn, $insert);
                header('location:login.php');
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical_Test-signup</title>

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
            <h3>register now</h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
            ?>
            <!-- NAME -->
            <input type="text" name="name" required placeholder="enter your name">
            <!-- EMAIL -->
            <input type="email" name="email" required placeholder="enter your email">
            <!-- PASSWORD -->
            <input type="password" name="password" required placeholder="enter your password">
            <!-- CONFIRM PASSWORD -->
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <!-- USER TYPE -->
            <select name="user_type" style="display:none;">
                <option value="user"></option>
            </select>
            <!-- SUBMIT BUTTON -->
            <input type="submit" name="submit" value="register now" class="form-btn">
        </form>
    </div>
</body>
</html>