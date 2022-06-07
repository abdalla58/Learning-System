<!DOCTYPE html>
<html lang="en">
<head>
	</head>
	<?php 
	session_start();
	if(empty($_SESSION['user'])){
	   header("LOCATION: ../index.php");
	}
	include('header.php') ?>
	<title>lessons List</title>
	<link rel="stylesheet" href="../style.css">
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

</header>
	
	<div style="margin-top:200px;text-align:center;margin-left:10%;background-color:white" class="container-fluid admin">
		
      <a href="form.php"  ><input type="submit" value="Add NEW LESSON" class="btn btn-primary bt-sm"style="color:aliceblue" id="new_quiz"></a>
	  	<a href="Addquiz.php"  ><input type="submit" value="Add Quiz" class="btn btn-primary bt-sm"style="color:aliceblue" id="new_quiz"></a>	
	  
		<div style="font-size:30px;margin-top:50px;color:grey" class="col-md-12 alert alert-primary">lessons List</div>
		<div class="card">
			<div class="card-body">
				<table style="color:black;text-align:left" class="table table-bordered" id='table'>
					
					<thead >
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>URL</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					session_start();
					$i=0; 
					$connection = mysqli_connect("localhost","root","","lms");
					$number=$_SESSION["course_id"];
					$sql="SELECT `course_id`,`lesson_id`,`Name`, `lesson_url` FROM `lessons` WHERE course_id=$number";
					if($res=mysqli_query($connection,$sql)){
						$cont=mysqli_num_rows($res);
						while($row = mysqli_fetch_assoc($res)){
							$i++;

						?>
					<tr  id= "<?php echo $row["lesson_id"]; ?>">
						<td><?php echo $i ?></td>
						<td><?php echo $row['Name']?></td>
						<td><?php echo $row['lesson_url'] ?></td>
						<td> <button type="button" name="button" id="button1" onclick = deletedata(<?php echo $row['lesson_id'] ;?>)>Delete</button></td>
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
      function deletedata(id){
        $(document).ready(function(){
          $.ajax({
            // Action
            url: 'function.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id:id,
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