<?php
    include 'db_connect.php';
   //include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        if(empty($_SESSION['user'])){
           header("LOCATION: ../index.php");
        }
    include('header.php') ?>
    <title>Home </title>
</head>
<body>
    <?php 
    include 'nav_bar.php';
    ?>
    <div class="container-fluid admin">
        <div class="card col-md-5 offset-2">
            <div class="card-body">
                <p>Welcome to the Admin pannel dashboard</p>
            </div>
        </div>
       </div>
</body>
</html>