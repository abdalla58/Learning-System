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
	<?php// include('auth.php') ?>
	<?php include('db_connect.php') ?>
	<title>Bar chart</title>
</head>
<body>
	<?php include('nav_bar.php') ?>
	
	<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary"></div>
		<br>
		<div class="col-md-4 offset-md-4 mb-4">
		</div>
		<div class="card">
		<div class="card-body">
        <?php
        $connect = mysqli_connect("localhost", "root", "", "lms");
        $query = "SELECT id, grade.score  FROM user,grade WHERE user.id=grade.user_id order by score";
        $result = mysqli_query($connect, $query);
        ?>
        <html>
        <head>
            <title>TEST</title>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
               <script type="text/javascript">
               google.charts.load('current', {'packages':['bar']});
               google.charts.setOnLoadCallback(drawChart);

               function drawChart() {
        var data = google.visualization.arrayToDataTable([
          [' id ', ' score '],
               <?php
               while ($row = mysqli_fetch_array($result)) {
                  echo "['" . $row["id"] . "', " . $row["score"] . "],";
              }
              ?>
        ]);

        var options = {
          chart: {
            title: 'Score of users',
            subtitle: 'id and grade',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
       </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body> 
 </html> 
			</div>
		</div>
	</div>
</body>
</html>