<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Online Study Website Design Tutorial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">	
    <link rel="stylesheet" href="ss.css">
    <link rel="stylesheet" href="../style.css">
    <style>
        form{
            width:70%;
            margin:10% 15%
        }
        
    </style>
    
</head>
<body>
<header >


<a href="../teacher/hometeacher.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>

<nav class="navbar">
	<ul>
			<li><a class="active" href="../teacher/hometeacher.php">home</a></li>
			<li><a href="../Addcourse.php">teach</a></li>
			<li><a href="../teacher/about.php">about</a></li>
			<li><a href="../teacher/contactUs.php">contact</a></li>
	</ul>
</nav>
<div>
            <a class="x" type="button" href="Addlesson.php">back</a>
</div>
</header>
<form method="POST" action="addquestion.php">
        <div  style="color:black;font-size:16px" class ="modal-body">
            <div id="msg"></div>
            <div class="form-group">
                <label>Question</label>
                <textarea  name="question" required="required" class="form-control" ></textarea>
            </div>
                <label class="label">Options:</label>

            <div class="form-group">
                <span>
                <label><input type="radio" name="radio" class="is_right" value="1"> <small>option1</small></label>
                </span>
                <textarea name ="aswer1" required="" class="form-control" ></textarea>
                <br>
                <label><input type="radio" name="radio" class="is_right" value="2"> <small> option2</small></label>
                <textarea  name ="aswer2" required="" class="form-control" ></textarea>
                <br>
                <label><input type="radio" name="radio" class="is_right" value="3"> <small> option3</small></label>
                <textarea  name ="aswer3" required="" class="form-control" ></textarea>
                <br>
                <label><input type="radio" name="radio" class="is_right" value="4"> <small> option4</small></label>
                <textarea  name ="aswer4" required="" class="form-control" ></textarea>
            </div>
            
        </div>
        <div class="modal-footer">
            <button  class="btn btn-primary" name="submit"><span class="glyphicon glyphicon-save"></span> Save</button>
        </div>
</form>
</body>
</html>
<?php
session_start();
if(isset($_POST['submit'])){
    $ques=$_POST["question"];
    $answer="";
    $course_id=$_SESSION["course_id"];
    $answer1=$_POST["aswer1"];
    $answer2=$_POST["aswer2"];
    $answer3=$_POST["aswer3"];
    $answer4=$_POST["aswer4"];
    $quiz_id=$_SESSION["qrecursion"]-1;
    $ques_id=$_SESSION["ques_rec"];
    $_SESSION["ques_rec"]++;
    if($_POST['radio']=="1") {
        $answer=$_POST["aswer1"];
    }
    else if($_POST['radio']=="2") {
        $answer=$_POST["aswer2"];
    }
    else if($_POST['radio']=="3") {
        $answer=$_POST["aswer3"];
    }
    else if($_POST['radio']=="4") {
        $answer=$_POST["aswer4"];
    }
    $connection=mysqli_connect("localhost","root","","lms");
    $sq="INSERT INTO `quiz_qustion`(`course_id`,`quiz_id`, `question_id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `answer`) VALUES ('$course_id','$quiz_id','$ques_id','$ques','$answer1','$answer2','$answer3','$answer4','$answer')";
    mysqli_query($connection,$sq);
    header("LOCATION: questions.php");
    }
?>