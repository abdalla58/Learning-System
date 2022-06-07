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
	<?php include('db_connect.php') ?>
	<title>Student List</title>
</head>
<body>
	<?php include('nav_bar.php') ?>
	
	<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary">Course List</div>
		<br>
		<br>
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered" id='table'>
					<colgroup>
						<col width="10%">
						<col width="40%">
						<col width="30%">
						<col width="20%">
					</colgroup>
					<thead>
						<tr>
							<th>Course id</th>
							<th>Course Name</th>
							<th>Num of lectures</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$qry = $conn->query("SELECT `course_id`,`course_name`,`num_lectures` FROM `course` ");
					$i = 1;
					if($qry->num_rows > 0){
						while($row= $qry->fetch_assoc()){
						?>
					<tr>
						<td><?php echo $row['course_id'] ?></td>
						<td><?php echo $row['course_name'] ?></td>
						<td><?php echo $row['num_lectures'] ?></td>
						<td>
							<center>
							<button class="btn btn-sm btn-outline-danger remove_student" data-id="<?php echo $row['course_id']?>" type="button"><i class="fa fa-trash"></i> Delete</button>
							</center>
						</td>
					</tr>
					<?php
					}
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function(){
		$('#table').DataTable();
		$('#new_student').click(function(){
			$('#msg').html('')
			$('#manage_student .modal-title').html('Add New student')
			$('#manage_student #student-frm').get(0).reset()
			$('#manage_student').modal('show')
		})
		$('.remove_student').click(function(){
			var id = $(this).attr('data-id')
			var conf = confirm('Are you sure to delete this data.');
			if(conf == true){
				$.ajax({
				url:'./delete_student.php?id='+id,
				error:err=>console.log(err),
				success:function(resp){
					if(resp == true)
						location.reload()
				}
			})
			}
		})
	})
</script>
</html>