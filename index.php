<?php
header('refresh:5');
$servername="localhost";
$username="root";
$dbpassword="";
$dbname="pie-chart";
$conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
//if(!$conn){
//    echo "Connection failure";
//}
//echo "Connection established";
$sql = "SELECT excellent FROM data";
$result =mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//echo $row['Excellent'];
$a = $row['excellent'];
$sql = "SELECT good FROM data";
$result =mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//echo $row['Good'];
$b = $row['good'];
$sql = "SELECT poor FROM data"; 
$result =mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//echo $row['Poor'];
$c= $row['poor'];
mysqli_close($conn);


?>
<!DOCTYPE html>
<html lang="en">

<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Feedback_Form</title>
          <link rel="stylesheet" href="style.css">
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
          google.charts.load("current", {
                    packages: ["corechart"]
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                              ['data', 'votes'],
                              ['excellent', <?php echo $a ?>],
                              ['good', <?php echo $b ?>],
                              ['poor', <?php echo $c ?>]
                    ]);

                    var options = {
                              title: 'FeedBack Form',
                              is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
          }
          </script>
</head>

<body>
          <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
</body>

</html>