<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Online Study Website Design Tutorial</title>

    <!-- google fonts cdn link  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
  <header>

    

    <a href="home.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>

    <nav class="navbar">
    <ul>
            <li><a class="active" href="home.php">home</a></li>
            <li><a href="Addcourse.php">teach</a></li>
            <li><a href="about.php">about</a></li>
            <li><a href="contactUs.php">contact</a></li>
        </ul>
    </nav>

    <a href="newprofile.php">
        <div id="login" class="fas fa-user-circle" ></div>
    </a>

</header>
  <section class="course" id="course">

    <h1 class="heading">our popular courses</h1>    
    <div class="box-container">
    <?php
        session_start();
        if(empty($_SESSION['user'])){
           header("LOCATION: index.php");
        }
        echo "<script>Swal.fire(
            'You are logged in successfully',
            'you clicked the button!',
            'success')
            </script>";
    $connection=mysqli_connect("localhost","root","","lms");
    $sql="SELECT * FROM `course` ";
    $result = mysqli_query($connection,$sql);
    ?>
    <?php while($row = mysqli_fetch_assoc($result)):?>
    <div class="box" style="
                                height:550px;">
        <img src="<?php echo $row['image']; ?>" alt="">
        <h3 class="price"><?php if($row['price']==0) {echo "free";} else {echo $row['price'];} ?></h3>
        <div class="content">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half"></i>
            </div>
            <a href="lessonss.php?id=<?php echo $row['course_id']; ?>" class="title" style="  color:#444;
                                                font-weight: bolder;
                                                font-size: 2.1rem;
                                                display: block;
                                                overflow:hidden;
                                                white-space: nowrap; 
                                                 "><?php echo $row['course_name']; ?></a>
            <p style="padding:1rem 0;
                                color:#666;
                                font-size: 1.5rem;
                                overflow-y: auto;
                                height:170px;" ><?php echo $row['about']; ?></p>
            <div class="info">
                <h3> <i class="far fa-clock"></i><?php echo $row['duration']; ?></h3>
                <h3> <i class="far fa-calendar-alt"></i> 6 months </h3>
                <h3> <i class="fas fa-book"><?php echo " "; echo $row['num_lectures']; echo " lectures"; ?></i></h3>
            </div>
        </div>
    </div>
    <?php endwhile ?>

    

</div>

    </section>
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
             <a href="course.php">course</a>
             <a href="#">teachers</a>
             <a href="contactUs.php">contact</a>
          </div>
  
          <div class="box">
              <h3>contact info</h3>
              <p> <i class="fas fa-map-marker-alt"></i> cairo, Egypt 17546. </p>
              <p> <i class="fas fa-envelope"></i> example@gmail.com </p>
              <p> <i class="fas fa-phone"></i> +203-456-7890 </p>
          </div>
  
      </div>
  
      <h1 class="credit">created by <a href="#">mr. designer</a> all rights reserved. </h1>
  
  </div>
  <script type='text/javascript'>
  $(document).ready(function() {
    $('.myElement').click(function() {
      $.post(location.href, { id: $(this).attr('id') }, function(response) {
        // Inserts your chosen response into the page in 'response-content' DIV
        $('#response-content').html(response); // Can also use .text(), .append(), etc
      });
    });
  });
</script>
</body>
</html>
<?php
    if(isset($_GET['enroll'])&&isset($_POST['id'])){
        $course_id = $_POST['id']; 
        $user=$_SESSION['id'];
        $sql="INSERT INTO `enroll`(`user_id`, `course_id`) VALUES ('$user','$course_id')";
        $result = mysqli_query($connection,$sql);
    }

?>


