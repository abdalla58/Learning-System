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
	<title>User List</title>
</head>
<body>
	<?php include('nav_bar.php') ?>
	
	<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary">user List</div>
		<!-- <button class="btn btn-primary bt-sm" id="new_faculty"><i class="fa fa-plus"></i>	Add New</button> -->
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
							<th>Rank </th>
							<th>Name</th>
							<th>score</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$qry = $conn->query("SELECT user.name ,grade.score from grade ,user WHERE grade.user_id =user.id ORDER BY `grade`.`score` DESC   ");
					$i = 1;
					if($qry->num_rows > 0){
						while($row= $qry->fetch_assoc()){
						?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['score'] ?></td>
						<?php $i++;?>
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
	
</html>