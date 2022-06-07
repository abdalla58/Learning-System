<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="st.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Document</title>
    <style>
     .input{
        background-color:white;
        color:black;
        border:0.1px solid grey;
        width:95%;
      }
      .btn{margin-top:30px}
    </style>
</head>
<body style="background-color:#ECEDEF">
<header >


<a href="../teacher/hometeache.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>	



</header>
<form style="color:black;text-align:center;width:350px;height:400px;background-color:white;border-radius:12px" method="POST" action="form.php">
      <div style="color:black;" class="title">NEW LESSON</div>
      <div style="color:black;" class="subtitle">Let's Add lesson!</div>
      <div class="input-container ic1">
        <input id="firstname" name="Name" class="input" type="text" placeholder=" " />
        <label for="firstname" class="placeholder">Name Of Lesson</label>
      </div>
      <div class="input-container ic2">
        <input id="lastname" name="Url" class="input" type="text" placeholder=" " />
        <label for="lastname" class="placeholder">Url Of Lesson</label>
      </div>
      <button type="text" name="submit" class="btn">submit</button>
</form>
</body>
</html>
<?php
if(isset($_POST["submit"])){
     session_start();
    $re=$_SESSION["recursion"];
    $_SESSION["recursion"]=$_SESSION["recursion"]+1;
    $connection = mysqli_connect("localhost","root","","lms");
    $n=$_POST["Name"];
    $u=$_POST["Url"];
    $number=  $_SESSION["course_id"];
    $sql="INSERT INTO `lessons`(`course_id`,`lesson_id`, `Name`, `lesson_url`) VALUES ($number,'$re','$n','$u')";
    mysqli_query($connection,$sql);
    header("LOCATION: Addlesson.php");
}
?>