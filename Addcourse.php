<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

</head>

<body>
  <header>


  <a href="home.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>

<nav class="navbar">
    <ul>
        <li><a class="active" href="teacher/hometeacher.php">home</a></li>
        <li><a href="Addcourse.php">teach</a></li>
        <li><a href="teacher/about.php">about</a></li>
        <li><a href="teacher/contactUs.php">contact</a></li>
    </ul>
</nav>

  </header>


  <!-- Container Start -->
  <div id="form">
    <!-- Form Wrap Start -->
    <div class="form-wrap">
      <!-- Form Start -->
      <form action="Addcourse.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>Add your Course</legend>
          <div class="form-group">
            <label>Course image</label>
            <input id="photo" type="file" name="image" placeholder="Photo" required capture>
          </div>
          <div class="form-group">
            <label>Course Name</label>
            <input required type="text" maxlength="150" name="name" id="first-name">
          </div>
          <div class="form-group">
            <label>total hours</label>
            <input required type="number" min="1" max="250" name="hours" id="last-name">
          </div>

          <div class="form-group">
            <label>total lectures</label>
            <input required type="number" min="1" max="250" name="lectures" id="first-name">
          </div>
          <div class="form-group">
            <label>Price</label>
            <input required type="number" min="1" name="price" id="first-name">
          </div>
          <div class="form-group">
            <label>Add the playlist link</label>
            <input required type="text" name="url" id="first-name">
          </div>
          <div class="form-group">
            <label>About Course</label>
            <textarea name="about" id="text-area" cols="100%" rows="10"></textarea>
          </div>
         <!-- <input type="submit" value="Upload Image" name="submit" class="btn" id="addcourse" >-->
          <a href="courselessons.php"><button class="btn" id="addcourse" type="submit">Add to my courses</button></a>
         <!-- <button class="btn" id="addcourse" type="submit"><a href="courselessons.php">Add to my courses</a></button>-->

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
          <a href="teacher/hometeacher.php">home</a>
          <a href="teacher/about.php">about</a>
          <a href="teacher/contactUs.php">contact</a>
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
session_start();
$_SESSION["recursion"] = 1;
$_SESSION["qrecursion"] = 1;
if(empty($_SESSION['user'])){
   header("LOCATION: index.php");
}
else{
class course{
  public $image;
  public $name;
  public $hours;
  public $lectures;
  public $price;
  public $url;
  public $about;
  public function __construct()
  {
    $this->name=$_POST['name'];
    $this->hours=$_POST['hours'];
    $this->lectures=$_POST['lectures'];
    $this->price=$_POST['price'];
    $this->about=$_POST['about'];
  }
}
$connection=mysqli_connect("localhost","root","","lms");
if (isset($_POST['name'])&&isset($_FILES['image']['name'])) {
    $c1=new course();
    $i=strpos($_FILES['image']['name'],'.');
    $str =substr($_FILES['image']['name'],$i);
    $path=$c1->name;
    $path .= $str;
    $cur="images/".$path;
    move_uploaded_file($_FILES['image']['tmp_name'],"images/".$path);
    $paid=true;
    if($c1->price==0){
      $paid=false;
    }
    $sql="INSERT INTO `course`(`course_name`, `price`, `is_paid`, `num_lectures`, `duration`,`about`,`image`) VALUES ('$c1->name','$c1->price','$paid','$c1->lectures','$c1->hours','$c1->about','$cur')";
    if (mysqli_query($connection, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    $sq="SELECT * FROM `course` ORDER BY `course_id` DESC LIMIT 1";
    $res=mysqli_query($connection,$sq);
    $result=mysqli_fetch_assoc($res);
    $_SESSION["course_id"]=$result["course_id"];
    $cu1=$_SESSION["course_id"];
    $cu2=$_SESSION["id"];
    mysqli_query($connection,"INSERT INTO `teach`(`course_id`, `user_id`) VALUES ('$cu1','$cu2')");
    mysqli_close($connection);
    header("LOCATION: oq\Addlesson.php");
}
}

?>
