<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body id="content">
    <header>
        <a href="home.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>
        <div>
            <a class="x" type="button" href="lessonss.php?id=<?php echo $_GET['id'];?>">back</a>
        </div>

    </header>
    <div >
            <h2 >quizes</h2>
            <hr>

            <div >
            <?php
                 session_start();
                 if(empty($_SESSION['user'])){
                 header("LOCATION: index.php");
                 }
                 $o=$_GET['id'];
                 $connection=mysqli_connect("localhost","root","","lms");
                 $sq="SELECT * FROM `quiz` WHERE  course_id = '$o' ";
                 $qresult = mysqli_query($connection,$sq); 
                 $i1=1;
                 ?>
                <h2 style="text-align:center;font-size:40px;color:grey">Quizes</h2>
                <hr>
                 <?php while($res=mysqli_fetch_assoc($qresult)): ?>
                    <a  class="lessonBtn" href="oq/show_quiz.php?id=<?php echo $res['quiz_id']; ?>&course=<?php echo $o; ?>" class="title" style="  color:black;
                                                font-weight: bolder;
                                                font-size: 2.1rem;
                                                text-align:center;
                                                display: block;
                                                width:98%;
                                                overflow:hidden;
                                                white-space: nowrap; 
                                                border-radius:18px;
                                                 ">
                                               quiz <?php echo $i1 ;?> 
                                                </a>
                                        <?php $i1++; ?>
                    <?php endwhile;?>
                </div>

            
        </div>
    
</body>

</html>