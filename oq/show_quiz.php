<!DOCTYPE html>
<html>
   <head>
      <title>C Programming Language Output this code Quizzes 1</title>
    
                
                <link rel="stylesheet" href="../stylee.css">
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
  <form method="POst" action="show_answer.php?id=<?php echo  $quizz;?>&course=<?php echo $courss;?>">
  <?php   
  while($row=mysqli_fetch_assoc($res)):
   array_push($question_ids,$row["question_id"]);
   array_push($answers,$row["answer"]);
  ?> 
<div class="scp-quizzes-data">
  <h3><?php echo $row["question"]; ?></h3>
<br/>
    <input type="radio" id="Fastlearning" name="<?php echo $row["question_id"];?>" value="<?php echo $row["answer1"]; ?>" >
       <label for="Fastlearning">1. <?php echo $row["answer1"]; ?></label><br/>
       <input type="radio" name="<?php echo $row["question_id"];?>"value="<?php echo $row["answer2"]; ?>">
       <label>2. <?php echo $row["answer2"]; ?></label> <br/>
    <input type="radio" name="<?php echo $row["question_id"];?>"value="<?php echo $row["answer3"]; ?>">
       <label>3. <?php echo $row["answer3"]; ?></label> <br/>
    <input type="radio" name="<?php echo $row["question_id"];?>"value="<?php echo $row["answer4"]; ?>">
     <label>4. <?php echo $row["answer4"]; ?></label> 
 </div>
 <?php endwhile;?>
      <input class="btn"style="margin:50px 5px" type="submit" name="submit">
  </form>
      

</div>


</body></html>
<?php
/*if(isset($_POST["submit"])){
   $score=0;
  for($i=0;$i<sizeof($question_ids);$i++){
    $cur=$question_ids[$i];
    if(isset($_POST["$cur"])){
         if($_POST["$cur"]==$answers[$i]){
         $score+=1;
         }  
   }
 }
 if($score>(sizeof($answers)/2)){
  echo '<script type="text/javascript">
         alert("gongratuilations"); 
      </script>'; 
 }
 echo $score;

}*/

?>