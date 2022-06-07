<?php
$conn = mysqli_connect("localhost", "root", "", "lms");

if(isset($_POST["action"])){
  // Choose a function depends on value of $_POST["action"]
  if($_POST["action"] == "delete"){
    delete();
  }
}

function delete(){
  global $conn;

  $id = $_POST["id"];
  $quiz = $_POST["quiz"];
  $course=$_POST["course"];
  /*echo $id;
  echo"<br>";
  echo $quiz;
  echo"<br>";
  echo $quiz;
  echo"<br>";*/
  mysqli_query($conn, "DELETE FROM `quiz_qustion` WHERE quiz_id = '$quiz' AND question_id = '$id' AND course_id ='$course'");
  echo 1;
}
