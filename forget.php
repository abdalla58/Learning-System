<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
<header>


    <a href="index.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>


    <a class="xyz" type="button" href="index.php">Home</a>

</header>
<form class="form-forget" method="POST" action="forget.php">
        <h3 >Forget Password</h3>
        <input required type="email" name='user_email' placeholder="Please Enter Your Username">
        <button class="btn" type="submit" >Forget Password</button>
    </form>
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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
if(isset($_POST['user_email'])){
    $user_email=$_POST['user_email'];
    $connection = mysqli_connect("localhost","root","","lms");
    $sql="SELECT * FROM `user` WHERE `email` = '$user_email'";
    if ($res = mysqli_query($connection,$sql))
    {
    $con=mysqli_num_rows($res);
    $row=mysqli_fetch_assoc($res);
    if($con==1){
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
            $mail->addAddress($user_email);
 
            //Set email format to HTML
            $mail->isHTML(true);

 
            $mail->Subject = 'Forget Password';
            $mail->Body    = '<p>Your password is: <b style="font-size: 30px;">' . $row['password'].'<p>Your Name is: <b style="font-size: 30px;">'. $row['name']. '</b></p>'.'We wish you a happy experience';
 
            $mail->send();
            // echo 'Message has been sent';
 
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

            header("Location: index.php");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
     }
    }
?>