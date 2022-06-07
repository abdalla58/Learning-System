<?php
$conn = mysqli_connect("localhost", "root", "", "lms");

if(isset($_POST["action"])){
  if($_POST["action"] == "delete"){
    delete();
  }
}

function delete(){
  global $conn;

  $id = $_POST["id"];
  $course=$_POST["course"];
  mysqli_query($conn, "DELETE FROM `quiz` WHERE quiz_id = '$id' AND course_id ='$course'");
  echo 1;
  
}
