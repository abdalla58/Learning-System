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
        $query = "SELECT course_id, price  FROM course  order by course_id";
        $result = mysqli_query($connect, $query);
        ?>
        <html>
        <head>
            <title>TEST</title>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);


            function drawChart() {
            var data = google.visualization.arrayToDataTable([
                [' course_id ', ' price '],
               <?php
               while ($row = mysqli_fetch_array($result)) {
                  echo "['" . $row["course_id"] . "', " . $row["price"] . "],";
              }
              ?>
            ]);

            var options = {
            title: 'Price of courses',
            curveType: 'function',
            legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
            }
            </script>
            </head>
            <body>
            <div id="curve_chart" style="width: 900px; height: 500px"></div>
            </body>
 </html> 
			</div>
		</div>
	</div>
</body>
</html>