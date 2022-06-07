<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <?php
                 $connection=mysqli_connect("localhost","root","","lms");
                 $sql="SELECT * FROM `lessons` WHERE  course_id  = '1' ";
                 $result = mysqli_query($connection,$sql); 
                 $i=0;
                while($res=mysqli_fetch_assoc($result)):?>
                <button id="video" class="lessonBtn" onclick="updateLink(<?php echo $res['lesson_url']; ?>)"> <input type="checkbox" class="checkBox"> Lesson <?php echo $i ; ?>  <i class="fas fa-play lessonTimer"> 9min</i></button>
                <?php $i++; ?>
                <?php endwhile;?>
        <script>
            var videoObj = document.getElementById("video");
            function updateLink(url) {
                console.log("Link " + url);
                videoObj.src =url;
            }
        </script>

</body>
</html>


<table>
        <?php
        $name="";
        $url=""; 
        if(isset($_POST["Add_Lesson"])){
            $name=$_POST["Name"];
            $url=$_POST["URL"]; 
        }
        for($i=0;$i<10;$i++):
        ?>
        <tr class="odd">
            <td><?php echo ($i+1) ;?></td>
            <td><?php echo $name ;?></td>
            <td><?php echo $url ;?></td>
        </tr>
        <?php
        endfor;
        ?>
    </table>