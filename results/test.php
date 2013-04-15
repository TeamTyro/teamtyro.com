<?php

  $dbname = '_maze-game';
  $username = 'root';
  $password = '';

  try {
    $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $conn->query('SELECT ethnicity, COUNT(*) AS count FROM game_returning GROUP BY ethnicity');

    $rows = array();
    $table = array();
    $table['cols'] = array(
      array('label' => 'Ethnicity', 'type' => 'string'),
      array('label' => 'Count', 'type' => 'number')
    );
    foreach($result as $r) {
      $temp = array();
      $temp[] = array('v' => (string) $r['ethnicity']); 
      $temp[] = array('v' => (int) $r['count']); 
      $rows[] = array('c' => $temp);
    }

    $table['rows'] = $rows;

    $jsonTable = json_encode($table);
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'Ethnicity',
          is3D: 'true',
          width: 800,
          height: 600
        };
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
  </head>

  <body>
    <div id="chart_div"></div>
  </body>
</html>