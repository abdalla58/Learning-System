<!DOCTYPE html>
<html>
   <head>
      <title>C Programming Language Output this code Quizzes 1</title>s
                <link rel="stylesheet" href="../stylee.css">
                <link rel="stylesheet" href="answerstylee.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
                <style>
                     .scp-quizzes-main
                     {
                        border:1px solid grey;
                        background-color:white; 
                        padding:50px;
                        margin:0 5px;
                        
                        
                     }
                     body{background-color:#ECEDEF}


                </style>           
   </head>

   <body >
   <header>
        <a href="index.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>
        <div>
            <a class="x" type="button" href="../home.php">Courses</a>
            
        </div>
    </header>
    <h1 style="color:grey;font-size:75px;margin-top:75px;text-align:center;">New Quiz</h1>
<div class="scp-quizzes-main">
  <?php
   // Choose a function depends on value of $_POST["action"]
      $courss=$_GET["course"];
      $quizz=$_GET["id"];
      $connection = mysqli_connect("localhost","root","","lms");
      $res=mysqli_query($connection,"SELECT * FROM `quiz_qustion` WHERE `course_id`='$courss'AND`quiz_id`='$quizz'");
      $answers=[];
      $question_ids=[];
  ?>
  <form method="POST" action="show_answer.php">
  <?php   
  while($row=mysqli_fetch_assoc($res)):
   array_push($question_ids,$row["question_id"]);
   array_push($answers,$row["answer"]);
  ?> 
<div class="scp-quizzes-data">
  <h3><?php echo $row["question"]; ?></h3>
<br/>
    <input type="radio" id="Fastlearning" disabled name="<?php echo $row["question_id"];?>" value="<?php echo $row["answer1"]; ?> " >
       <label for="Fastlearning">1. <?php echo $row["answer1"]; ?></label><br/>
    <input type="radio" disabled  name="<?php echo $row["question_id"];?> "value="<?php echo $row["answer2"]; ?>">
       <label>2. <?php echo $row["answer2"]; ?></label><br/>
    <input type="radio" disabled name="<?php echo $row["question_id"];?>"value="<?php echo $row["answer3"]; ?>">
       <label>3. <?php echo $row["answer3"]; ?></label> <br/>
    <input type="radio" disabled name="<?php echo $row["question_id"];?>"value="<?php echo $row["answer4"]; ?>">
     <label>4. <?php echo $row["answer4"]; ?></label> 
    <p style="font-weight:bolder;color: red;"> the answer of this question is ( <?php echo $row["answer"];?> )</p> 
 </div>
 <?php endwhile;
  $score=0;
  if(isset($_POST["submit"])){
    for($i=0;$i<sizeof($question_ids);$i++){
      $cur=$question_ids[$i];
      if(isset($_POST["$cur"])){
           if($_POST["$cur"]==$answers[$i]){
           $score+=1;
           }  
     }
   }
   session_start();
   $connection = mysqli_connect("localhost","root","","lms");
   $use_id=$_SESSION['id'];
	$quiz_id=$_GET['id'];
	$course_id=$_GET['course'];
	mysqli_query($connection,"INSERT INTO `grade`(`user_id`, `course_id`, `quiz_id`, `score`) VALUES ('$use_id','$course_id','$quiz_id','$score')");
  }
 ?>
 
 <p style="font-weight:bolder; text-align:center; border:3px solid black;">your score = <?php echo $score?></p>
 <br>
 <a style="margin-left: 97.2%;" href="../takequiz.php?id=<?php echo $courss;?>"><i class="arrow left"><i>OK</i></i></a>
  </form>
      

</div>


</body></html>