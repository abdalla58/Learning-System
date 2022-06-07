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
            <li><a href="about.php">about</a></li>
            <li><a href="contactUs.php">contact</a></li>
        </ul>
    </nav>
    <a href="newprofile.php">
        <div id="login" class="fas fa-user-circle" ></div>
    </a>
</header>
  <section class="about" id="about">

    

    <div class="content" id="thediv">
        <h3>why choose us?</h3>
        <p class="content">We envision a world where anyone, anywhere has the power to transform their life through learning.</p>
        
    </div>
    <div class="secondcontent">
        We believe
        Learning is the source of human progress.

        It has the power to transform our world
        from illness to health,
        from poverty to prosperity,
        from conflict to peace.

        It has the power to transform our lives
        for ourselves,
        for our families,
        for our communities.

        No matter who we are or where we are,
        learning empowers us to change and grow
        and redefine what’s possible.
        That’s why access to the best learning is a right, not a privilege.

        And that’s why Coursera is here.
        We partner with the best institutions
        to bring the best learning
        to every corner of the world.

        So that anyone, anywhere has the power to
        transform their life through learning.
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
          <a href="home.php">home</a>
          <a href="about.php">about</a>
          <a href="contactUs.php">contact</a>
      </div>

      <div class="box">
          <h3>contact info</h3>
          <p> <i class="fas fa-map-marker-alt"></i> cairo, Egypt 17546. </p>
          <p> <i class="fas fa-envelope"></i> fcaiLMS123@gmail.com</p>
          <p> <i class="fas fa-phone"></i> +203-456-7890 </p>
      </div>

  </div>

</div>
</body>
</html>
<?php
    session_start();
    if(empty($_SESSION['user'])){
       header("LOCATION: home.php");
    }
?>