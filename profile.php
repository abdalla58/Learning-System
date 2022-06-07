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

    <!-- custom css file link  -->
    <link rel="stylesheet" href="prostyle.css">

</head>
<body>
  <header>

    

    <a href="home.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>

    <nav class="navbar">
       <ul>
            <li><a class="active" href="index.php">home</a></li>
            <li><a href="Addcourse.php">teach</a></li>
            <li><a href="about.php">about</a></li>
            <li><a href="contactUs.php">contact</a></li>
        </ul>
    </nav>

    <a href="profile.html">
      <div id="login" class="fas fa-user-circle" ></div>
  </a>

</header>
  <section class="contact" id="contact">

    <h1 class="heading">update profile</h1>
    
    <div class="row">
    <?php
            session_start();
            if(empty($_SESSION['user'])){
            header("LOCATION: index.php");
            }
            $cur=$_SESSION['user'];
            $connection = mysqli_connect("localhost","root","","lms");
            $sql="SELECT * FROM `user` WHERE `name` = '$cur'";
            if ($res = mysqli_query($connection,$sql))
            {
              $con=mysqli_num_rows($res);
              $row=mysqli_fetch_assoc($res);
            }
            $email1=$row['email'];
            $name1=$row['name'];
            $password1=$row['password'];
            $phone1=$row['phone'];
            $photo=$row['image'];
           // $_GET['user_email']=$row['email'];
        ?>
        <form action="profile.php" method="GET">
            <div class="form-group">
            <label>Course image</label>
            <input id="photo" type="file" name="image" placeholder="Photo" required capture>
             </div>
            <input type="text" name="user_name" value="<?php echo $name1;?>"  class="box">
            <input type="email" name="user_email" value="<?php echo $email1;?>"  class="box" disabled>
            <input type="password" name="user_password" value="<?php echo $password1;?>" class="box">
            <input type="number" name="user_number" value="<?php echo $phone1;?>"  class="box">
            <input type="submit" name="submit" class="btn" value="save">
        </form>
        <div class="image">
            <img src="images/contact-img.png" alt="">
        </div>
    
    </div>
    
    </section>
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
                <a href="hone.php">home</a>
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
</body>
</html>
<?php
if(isset($_GET['submit'])){
    $i=strpos($_FILES['image']['name'],'.');
    $str =substr($_FILES['image']['name'],$i);
    $path=$c1->name;
    $path .= $str;
    $cur="images/".$path;
    move_uploaded_file($_FILES['image']['tmp_name'],"images/".$path);
    $email1=$row['email'];
    $name1=$_GET['user_name'];
    $password1=$_GET['user_password'];
    $phone1=$_GET['user_number'];
    $_SESSION['user']=$name1;
    $sql="UPDATE `user` SET`name`='$name1',`image`='$cur',`password`='$password1',`phone`='$phone1' WHERE `email` = '$email1'";
    $res = mysqli_query($connection,$sql);
    header("LOCATION: profile.php");
}
?>