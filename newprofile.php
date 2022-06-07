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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>
      function reload_page() {
        document.location.reload(true);
      }
    </script>
    

</head>
<body>
  <header>

    

    <a href="home.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="home.php">home</a></li>
            <li><a href="about.php">about</a></li>
            <li><a href="contactUs.php">contact</a></li>
        </ul>
    </nav>

    <div>
        <a href="newprofile.php">
            <div id="login" class="fas fa-user-circle" style="display:block" ></div>
        </a>
        <a href="logout.php" type="" class="f90-logout-button"><button class="xyz" style="margin-left: 150px;">Logout</button></a>
        </div>  

</header>
  <section class="profile" id="profile">
  <?php
  
            $updated=0;
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
            $photo_URL=$row["image"];
           // $_GET['user_email']=$row['email'];
        ?>  
    <div class="profilef">
    <form class="forma" method="POST" action="newprofile.php" enctype="multipart/form-data">
            <p style="color:grey;margin-top:20px;font-weight:bolder;font-size: 30px;">Basic Information</p> 
            <div class="center">
              <div class="form-input">
                <div class="preview">
                  <img id="file-ip-1-preview" style="display:block" src="<?php echo $photo_URL;?>">
                </div>
                <label for="file-ip-1">Update Image</label>
                <input type="file" name="image" id="file-ip-1"  accept="image/*"  onchange="showPreview(event);">
              </div>
            </div> 
            <!--<input id="photo" type="file" name="image" placeholder="Photo">-->
            <input type="text" name="name" value="<?php echo $name1;?>" placeholder="full name" class="box">
            <input type="email" name="email" value="<?php echo $email1;?>" disabled placeholder="your email" class="box">
            <input type="number" name="phone" value="<?php echo $phone1;?>" placeholder="your number" class="box">
            <input type="password" name="password" value="<?php echo $password1;?>" placeholder="your number" class="box">  
            <input type="submit" name="submit" class="btn" value="Update">
            </form>
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
  <script type="text/javascript">
    function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-ip-1-preview");
      preview.src = src;
      preview.style.display = "block";
    }
   }
  </script>    
</body>
</html>
<?php
if(isset($_POST["submit"])){
  $email=$email1; 
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $pass=$_POST['password'];
    $cur="";

    if(isset($_FILES['image']['name'])){
      $i=strpos($_FILES['image']['name'],'.');
      $str =substr($_FILES['image']['name'],$i);
      $path=$email;
      $path.= $str;
      $cur1="userimages/".$path;
      /*unlink("userimages/".$email.".jpg");
      unlink("userimages/".$email.".png");
      unlink("userimages/".$email.".jpeg");*/
      move_uploaded_file($_FILES['image']['tmp_name'],$cur1);
    }
    //sleep(1);
    //$conn = mysqli_connect("localhost", "root", "", "lms");
    if(!str_contains($cur1,"png")&&!str_contains($cur1,"jpg")&&!str_contains($cur1,"jpeg")){
      $cur1.=".png";
    }
    $sql ="UPDATE  `user` SET `name`='$name',`password`='$pass',`phone`='$phone',`image`='$cur1' WHERE `email` = '$email' ";
    $result  = mysqli_query($connection, $sql);
    $_SESSION['user']=$name;
    echo '<script type="text/javascript">',
    "window.onload = function() {
      if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
      }
    }",
     '</script>'
     ;
    }
?>