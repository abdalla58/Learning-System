<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body id="content">
    <header>
        <a href="hometeacher.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>
        <div>
            <a class="x" type="button" href="hometeacher.php">Courses</a>
            <!-- <a class="x" type="button" href="takequiz.php?id=<?php echo $_GET['id'];?>">Take Quiz</a> -->
        </div>
    </header>
    <footer name="footer">


        <iframe width="900" height="480" id="video" src="https://www.youtube.com/embed/gXRWiQanMRI"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        <div class="lessons">
            <h2>Lessons</h2>
            <hr>

            <div class="lessonContainer">
            <?php
                 session_start();
                 if(empty($_SESSION['user'])){
                 header("LOCATION: index.php");
                 }
                 $o=$_GET['id'];
                 $connection=mysqli_connect("localhost","root","","lms");
                 $sql="SELECT * FROM `lessons` WHERE  course_id = '$o' ";
                 $sq="SELECT * FROM `quiz` WHERE  course_id = '$o' ";
                 $qresult = mysqli_query($connection,$sq); 
                 $result = mysqli_query($connection,$sql); 
                 $links=[];
                 $i=1;
                 $i1=1;
                while($res=mysqli_fetch_assoc($result)):
                $cu="www.youtube.com/embed";   
                $url=$res['lesson_url']; 
                $new_url=str_replace("youtu.be",$cu,$url);
                array_push($links,$new_url);
                /*"https://www.youtube.com/embed/z1FdInL8sjg"
                 "https://youtu.be/z1FdInL8sjg"*/
                ?>
                <button class="lessonBtn" id="<?php echo $i ;?>" onclick="updateLink(this.id)">  Lesson <?php echo $i ;?></button>
                <?php $i++; ?>
                <?php endwhile;?>
                </div>

            
        </div>
        <script>
            var videoObj = document.getElementById("video");
            function updateLink(index) {
                var links=<?php echo json_encode($links); ?>;
                videoObj.src = links[index-1];

            }
        </script>
    </footer>
</body>

</html>