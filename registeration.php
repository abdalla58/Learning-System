<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <script src="java.js"></script>
</head>
<body>
  <header>
    <a href="index.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>
    <a class="xyz" type="button" href="index.php">Home</a>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</header>
  <!-- Container Start -->
  <div id="container">
    <!-- Form Wrap Start -->
    <div class="form-wrap">
      <h1>Sign Up</h1>
      <p>It's Free and Only takes a minute</p>
      <!-- Form Start -->
      <form name="insert" action="registeration.php" method="POST">
        <div class="form-group">
          <label for="first-name">Full Name</label>
          <input type="text" name="name" id="username" style="text-transform:lowercase;" onBlur="checkusernameAvailability()"  required />
        </div>
        <div>
        <span id="username-availability-status">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" style="text-transform:lowercase;" id="emailid" placeholder="Enter email" onBlur="checkemailAvailability()"  required />
          <!--<input type="email"  name="email" placeholder="Enter email" required />-->
        </div>
        <div>
        <span id="email-availability-status">
        </div>
        <div class="form-group">
          <label for="last-name">Phone</label>
          <input required type="text" name="phone" id="last-name">
        </div>
        <div style="margin-left :10px;">
        <input type="radio" name="radio" value="s">
        <label style="font-weight:bolder; font-size: 20px;">Student</label> 
        <br>
        <input type="radio" name="radio" value="t">
        <label style="font-weight:bolder; font-size: 20px;">Teacher</label> 
        </div>
        <br>
        <div class="g-recaptcha" data-sitekey="6Lcm-pgfAAAAAIlxu6zVcKhtpTjhb9y68-8SbXXO"></div>
        <br>
       <button class="btn" type="submit" >Sign Up</button>
      </form>
      <!-- Form Close -->
    </div>
    <!-- Form Wrap Close -->
  </div>
  <!-- Container Close -->
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
            <a href="index.php">home</a>
            <a href="about.php">about</a>
            <a href="contactUs.php">contact</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <p> <i class="fas fa-map-marker-alt"></i> cairo, Egypt 17546. </p>
            <p> <i class="fas fa-envelope"></i> FCAI@gmail.com </p>
            <p> <i class="fas fa-phone"></i> +203-456-7890 </p>
        </div>

    </div>
</div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>




<?php
   session_start();
   if($_SESSION['repeted']){
    echo '<script>alert("this email is already exist")</script>';
    }
   include_once("config.php");
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   //Load Composer's autoloader
require 'vendor/autoload.php';
class student{
  public $name;
  public $email;
  public $password;
  public $phone;
  public function __construct()
  {
    $this->name=$_POST['name'];
    $this->email=$_POST['email'];
    $this->phone=$_POST['phone'];
  }
}
if (isset($_POST['name'])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $res=mysqli_query($con,"SELECT `email` FROM `user` WHERE `email`='$email'");
        //session_start();
        if(mysqli_num_rows($res)==1){
          $_SESSION["repeted"]=true;
          header("Location: registeration.php");
        }
        else{
        $_SESSION["email"]=$_POST["email"];
        $_SESSION['user']=$name;
        $_SESSION["phone"]=$_POST["phone"];
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'fcaiLMS123@gmail.com';
 
            //SMTP password
            $mail->Password = 'fcailms123';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;
 
            //Recipients
            $mail->setFrom('fcaiLMS123@gmail.com', 'E_Learning');
 
            //Add a recipient
            $mail->addAddress($email, $name);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $password=$verification_code;
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>'.'please use this link to set your password'.'<br>'.' localhost\LMS\updatePass.php';

            $mail->send();
            // echo 'Message has been sent';

 
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
 
            // connect with database
            $connection = mysqli_connect("localhost", "root", "", "lms");
 
            // insert in users table
            $s1=new student();
            $type="";
            $sql="";
            if($_POST["radio"]=="s"){
            $type="s";  
            $sql="INSERT INTO `user` (`name`, `email`, `phone`,`verification_code`,`user_status`,`user_type`) VALUES ('$s1->name','$s1->email','$s1->phone','$verification_code','0','$type')";
            }
            else if($_POST["radio"]=="t"){
              $type="t";  
              $sql="INSERT INTO `user` (`name`, `email`, `phone`,`verification_code`,`user_status`,`user_type`) VALUES ('$s1->name','$s1->email','$s1->phone','$verification_code','0','$type')";
            }
            mysqli_query($connection,$sql);
            $_SESSION['user']=$s1->name;
            $_SESSION["repeted"]=false;
            header("Location: index.php");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
       }
      }
?>












