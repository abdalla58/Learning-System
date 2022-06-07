<!DOCTYPE html>
<html lang="en">
<head>
	</head>
	<?php include('header.php') ?>
	<title>Quiz List</title>
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="st.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
</head>
<body>
<header >


<a href="../teacher/hometeacher.php" class="logo"><i class="fas fa-user-graduate"></i>E-learning</a>

<nav class="navbar">
	<ul>
			<li><a class="active" href="../teacher/hometeacher.php">home</a></li>
			<li><a href="../Addcourse.php">teach</a></li>
			<li><a href="../teacher/about.php">about</a></li>
			<li><a href="../teacher/contactUs.php">contact</a></li>
	</ul>
</nav>
<div>
            <a class="x" type="button" href="Addlesson.php">back</a>
</div>
</header>
	
	<div style="color:black;font-size:15px;margin-right:13%" class="container-fluid admin">
		<div style="font-size:30px;" class="col-md-12 alert alert-primary">QUESTIONS List</div>
      <a href="addquestion.php"  ><input type="submit" value="Add NEW QUESTION" class="btn btn-primary bt-sm"style="color:aliceblue" id="new_quiz"></a>
		<br>
		<br>
		<div  class="card">
			<div class="card-body">
				<table class="table table-bordered" id='table'>
					
					<thead>
						<tr>
							<th>#</th>
							<th>question</th>
              <th>Answer</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$i=0; 
					session_start();
					$connection = mysqli_connect("localhost","root","","lms");
					$number=$_SESSION["qrecursion"]-1;
					$number_course=$_SESSION["course_id"];
					$sql="SELECT `course_id`,`quiz_id`,`question_id`,`question`,`answer` FROM `quiz_qustion` WHERE `course_id`  ='$number_course' AND `quiz_id`='$number'";
					if($res=mysqli_query($connection,$sql)){
						$cont=mysqli_num_rows($res);
						while($row = mysqli_fetch_assoc($res)){
							$i++;
						?>
					<tr  id= "<?php echo $row["question_id"]; ?>">
						<td><?php echo $i ?></td>
						<td><?php echo $row['question']?></td>
                        <td><?php echo $row['answer']?></td>
						<td> <button type="button" name="button" id="button1" onclick ="deletedata(<?php echo $row['question_id'] ;?>,<?php echo $row['quiz_id'] ;?>,<?php echo $row['course_id'] ;?> )">Delete</button></td>
					</tr>
					<?php
					}
					}  
					/*if($x!=0){
						$connection = mysqli_connect("localhost","root","","lms");
					   $sql="SELECT `course_id`, `lesson_id`, `Name`, `lesson_url` FROM `lessons` WHERE 1";
					   $res=mysqli_query($connection,$sql);
					   $cur;
					   $cur= mysqli_fetch_all($res);
						$connection = mysqli_connect("localhost","root","","lms");
						$ind=$cur[$x-1][3];
                        $sql="DELETE FROM `lessons` WHERE `lesson_url`='$ind'";
                        mysqli_query($connection,$sql);
					}*/
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
    <script type="text/javascript">
      // Function
      function deletedata(id,quiz,course){
        $(document).ready(function(){
          $.ajax({
            // Action
            url: 'ques_function.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id:id,
              quiz:quiz,
              course:course,
			  action:"delete",
              //action: "delete"
            },
            success:function(response){
              // Response is the output of action file
              if(response == 1){
                alert("Data Deleted Successfully");
                document.getElementById(id).style.display = "none";
              }
              else if(response == 0){
                alert("Data Cannot Be Deleted");
              }
            }
          });
        });
      }
    </script>
</body>

</html>