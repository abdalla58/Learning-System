<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Online Study Website Design Tutorial</title>

    <!-- google fonts cdn link  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
     <script src="hide.js"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5yWQfKtSj8PComN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script> 
</head>
<body>
   
<!-- header section starts  -->

<header>
    <a href="index.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>
    <div>
        <a class="xyz" type="button" onclick="openForm()">Login</a>
        <a class="xyz" type="button" href="registeration.php">Register</a>
    </div>
</header>

<!-- header section ends -->


<!--loin form-starts-->
<div class="login-form" id="myForm">

    <form method="POST" action="index.php">
        <h3>login</h3>
        <input required type="text" name='user_name' placeholder="username" class="box">
        <input required type="password" name="user_password" placeholder="password" class="box">
        <p>forget password? <a href="forget.php">click here</a></p>
        <p>don't have an account? <a href="registeration.php">register now</a></p>
        <button class="btn" type="submit" >Login</button>
        <i class="fas fa-times" onclick="closeForm()"></i>
    </form>

</div>
<!-- home -->
<section class="home" id="home">

  <h1>education from home</h1>
  <p>It's Pain, It's Enhanced, Adipiscing Competition. Is It For Great?</p>
  

  <div class="shape"></div>

</section>


<!-- footer section starts  -->

<div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>branch locations</h3>
            <a href="#">India</a>
            <a href="#">USA</a>
            <a href="#">france</a>
            <a href="#">russia</a>
        </div>

        <div class="box">
          <h3>quick links</h3>
          <a href="home.php">home</a>
          <a href="about.php">about</a>
          <a href="course.php">course</a>
          <a href="#">teachers</a>
          <a href="contactUs.php">contact</a>
      </div>
        <div class="box">
            <h3>contact info</h3>
            <p> <i class="fas fa-map-marker-alt"></i> cairo, Egypt 17546. </p>
            <p> <i class="fas fa-envelope"></i> example@gmail.com </p>
            <p> <i class="fas fa-phone"></i> +203-456-7890 </p>
        </div>

    </div>

    

</div>

<!-- footer section ends -->
<script src="js/script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

<?php

use function PHPSTORM_META\type;

session_start();
if(isset($_POST['user_name'])){
    $us=$_POST['user_name'];
    $n=$_POST['user_name'];
    $p=$_POST['user_password'];
    $connection = mysqli_connect("localhost","root","","lms");
    $sql="SELECT * FROM `user` WHERE name = '$n' AND password = '$p'";
    if($res=mysqli_query($connection,$sql)){
        $row=mysqli_fetch_assoc($res);
        $cont=mysqli_num_rows($res);
        if($cont==1){
            //echo '<script>alert("You are logged in successfully")</script>';
            if($row['user_status']==0){
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'This account suspended!',})
                    </script>";
            }
            else if($row['user_type']=="admin"){
                $_SESSION['id']=$row['id'];
                $_SESSION['user']=$us;
                header("Location: oq/home.php");
              }
              else if($row['user_type']=="t"){
                $_SESSION['id']=$row['id'];
                $_SESSION['user']=$us;
                header("Location: teacher/hometeacher.php");
              }
              else if(empty($_SESSION['user'])){
                $_SESSION['id']=$row['id'];
                $_SESSION['user']=$us;
                header("LOCATION: home.php");
            }
            }
        }
        else{
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'The name or password is incorrect!',})
                </script>";
        }
    }
?>