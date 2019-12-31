<?php

$connection = mysqli_connect('localhost', 'rashid', 'rashid@123', 'poll_opinion');
$query = 'SELECT author,sum(vote) FROM poll GROUP BY author';
$runquery = mysqli_query($connection, $query);
?>
<html>

<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Author', 'Votes'],

        <?php
        while ($row = $runquery->fetch_assoc()) {

          echo "['" . $row['author'] . "'," . $row['sum(vote)'] . "],";
        }

        ?>

      ]);

      var options = {
        title: 'Sample Poll'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
</head>

<body>
  <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>

</html>