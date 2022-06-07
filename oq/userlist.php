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
		<a href="adminAuser_form.php"><button  class="btn btn-primary bt-sm" id="new_faculty"><i class="fa fa-plus"></i>Add New User</button></a>
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
							<th>id</th>
							<th>Name</th>
							<th>email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$qry = $conn->query("SELECT `id`,`name`,`email`,`user_status` FROM `user` ");
					$i = 1;
					if($qry->num_rows > 0){
						while($row= $qry->fetch_assoc()){
						?>
					<tr>
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td>
							<center>
							<button class="btn btn-sm btn-outline-danger " type="button" name="button1" id="<?php  echo $row['id'];?>" onclick = suspend(<?php echo $row['id'];?>)>susbended</button>
							<button class="btn btn-sm btn-outline-danger"style="color:green;border-color:green;" type="button" name="button1" id="<?php echo $row['name'];?>" onclick = enable(<?php echo $row['id'];?>)>enable</button>
							<button class="btn btn-sm btn-outline-danger remove_user" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-trash"></i> Delete</button>
							</center>
						</td>
					</tr><?php
						if($row['user_status']==1){
						    ?>
                            <script>
							      var butt=document.getElementById("<?php echo $row['name'];?>");
								  butt.style.display = "none";
							</script> 
							<?php  
							}
							else if($row['user_status']==0){
					 ?>
					 <script>
							      var butt=document.getElementById("<?php  echo $row['id'];?>");
								  butt.style.display = "none";
							</script> 
						<?php  
						}
						?>
					<?php
					}
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- <div class="modal fade" id="manage_faculty" tabindex="-1" role="dialog" >
				<div class="modal-dialog modal-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" id="myModallabel">Add New User</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<form id='faculty-frm'>
							<div class ="modal-body">
								<div id="msg"></div>
								<div class="form-group">
									<label>Name</label>
									<input type="hidden" name="id" />
									<input type="hidden" name="uid" />
									<input type="hidden" name="user_type" value = '2' />
									<input type="text" name="name" required="required" class="form-control" />
								</div>
								<div class="form-group">
									<label>Subject</label>
									<input type="text" name ="subject" required="" class="form-control" />
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" name ="username" required="" class="form-control" />
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" required="required" class="form-control" />
								</div>
							</div>
							<div class="modal-footer">
								<button  class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div> -->
</body>
	<script type="text/javascript">
      // Function
      function suspend(id){
        $(document).ready(function(){
          $.ajax({
            // Action
            url: 'suspened.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id:id,
			  action:"susbend",
              //action: "delete"
            },
            success:function(response){
              // Response is the output of action file
              if(response == 1){
                alert("user susbend Successfully");
				document.location.reload(true);
              }
              else if(response == 0){
                alert("Data Cannot Be Deleted");
              }
            }
          });
        });
      }
	  function enable(id){
        $(document).ready(function(){
          $.ajax({
            url: 'enable.php',
            type: 'POST',
            data: {
              id:id,
			  action:"enable",
            },
            success:function(response){
              // Response is the output of action file
              if(response == 1){
                alert("user enable Successfully");
				document.location.reload(true);
              }
              else if(response == 0){
                alert("Data Cannot Be Deleted");
              }
            }
          });
        });
      }
	$(document).ready(function(){
		$('#table').DataTable();
		$('#new_faculty').click(function(){
			$('#msg').html('')
			$('#manage_faculty .modal-title').html('Add New Faculty')
			$('#manage_faculty #faculty-frm').get(0).reset()
			$('#manage_faculty').modal('show')
		})
		$('.remove_user').click(function(){
			var id = $(this).attr('data-id')
			var conf = confirm('Are you sure to delete this data.');
			if(conf == true){
				$.ajax({
				url:'./delete_user.php?id='+id,
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