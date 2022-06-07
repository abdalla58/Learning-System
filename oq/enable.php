<?php
$conn = mysqli_connect("localhost", "root", "", "lms");

if(isset($_POST["action"])){
  if($_POST["action"] == "enable"){
    delete();
  }
}

function delete(){
  global $conn;

  $id = $_POST["id"];
  mysqli_query($conn, "UPDATE `user` SET `user_status`='1' WHERE id = '$id'");
  echo 1;
  
}
