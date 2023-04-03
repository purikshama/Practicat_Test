<?php

    @include 'config.php';

    session_start();

    if(!isset($_SESSION['user_name'])){
        header('location:login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical_Test-Dashboard</title>
    <link rel="stylesheet" href="datas.css">
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="org">
                <span>P</span>ractical test...
            </div>
            <div class="nav">
                <div class="logo">
                <?php
                    $a = $_SESSION['user_name'];
                    $b = str_split($a);
                    echo $b[0];
                ?>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="section">
                Welcome <span><?php echo $_SESSION['user_name']; ?></span> this is the dashboard of this whole website. if you want to go back to the home press <a href="logout.php">logout</a>.
            </div>
        </div>
    </div>
</body>
</html>