<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="st.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <style>
      body {background-color:#ECEDEF;}
      
    </style>
</head>
<body>
<header >


<a href="home.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>

<nav class="navbar">
	<ul>
			<li><a class="active" href="../home.php">home</a></li>
			<li><a href="../Addcourse.php">teach</a></li>
			<li><a href="../about.php">about</a></li>
			<li><a href="../contactUs.php">contact</a></li>
	</ul>
</nav>
<div>
            <a class="x" type="button" href="Addlesson.php">back</a>
</div>
</header>
	
<form method="POST" action="qform.php">
      <div class="title">NEW QUIZ</div>
      <div class="subtitle">Let's Add Quiz!</div>
      <div class="input-container ic1">
        <input id="firstname" name="Name" class="input" type="text" placeholder=" " />
        <label for="firstname" class="placeholder">Name Of Quiz</label>
      </div>
      <button type="text" name="submit" class="btn" style="margin:50px;margin-left:38%">submit</button>
</form>
</body>
</html>
<?php
if(isset($_POST["submit"])){
     session_start();
     $re=$_SESSION["qrecursion"];
     $_SESSION["qrecursion"]=$_SESSION["qrecursion"]+1;
    $connection = mysqli_connect("localhost","root","","lms");
    $n=$_POST["Name"];
    $number=  $_SESSION["course_id"];
    $sql="INSERT INTO `quiz`(`course_id`,`quiz_id`, `Name`) VALUES ($number,'$re','$n')";
    mysqli_query($connection,$sql);
    header("LOCATION: questions.php");
}
?>