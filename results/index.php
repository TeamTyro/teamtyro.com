<?php

  /* include("/home/c0smic/secure/data_db_settings.php"); */
    $dbname = '_maze-game';
    $username = 'root';
    $password = '';

    try {
      $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query[1] = "SELECT ttime, plays FROM game_returning ORDER BY plays";
      $query[2] = "SELECT ethnicity, COUNT(*) AS count FROM game_returning GROUP BY ethnicity";
      
      $result = $conn->query($query[1]);

      $rows = array();
      $table = array();
      $table['cols'] = array(

        array('label' => 'Plays', 'type' => 'number'),
        array('label' => 'Total Time', 'type' => 'number')

      );
      foreach($result[0] as $r) {
        $temp = array();
        $temp[] = array('v' => (string) $r['ethnicity']);
        $temp[] = array('v' => (int) $r['count']);
        $rows[] = array('c' => $temp);
      }
      foreach($result as $r) {
        $temp = array();
        $temp[] = array('v' => (int) $r['plays']);
        $temp[] = array('v' => (int) $r['ttime']);
        $rows[] = array('c' => $temp);
      }

      $table['rows'] = $rows;

      // convert data into JSON format
      $jsonTable = json_encode($table);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

?>
<!DOCTYPE HTML>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

  <!--
   ______                            ______
  /\__  _\                          /\__  _\
  \/_/\ \/    __     __      ___ ___\/_/\ \/ __  __  _ __   ___
     \ \ \  /'__`\ /'__`\  /' __` __`\ \ \ \/\ \/\ \/\`'__\/ __`\
      \ \ \/\  __//\ \L\.\_/\ \/\ \/\ \ \ \ \ \ \_\ \ \ \//\ \L\ \
       \ \_\ \____\ \__/.\_\ \_\ \_\ \_\ \ \_\/`____ \ \_\\ \____/
        \/_/\/____/\/__/\/_/\/_/\/_/\/_/  \/_/`/___/> \/_/ \/___/
                                                 /\___/
                                                 \/__/
  Web Developer: Jack Ketcham
  -->

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <link rel="shortcut icon" href="http://teamtyro.com/favicon.ico" />

  <meta name="description" content="We're a group of high school students that are studying the way different types of artificial intelligence (AI) algorithms learn, when compared to humans.">
  <meta name="keywords" content="Project, AI, High School, Project Lead the Way, Java">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="Team Tyro, studying AI and humans with a game">
  <meta name="twitter:url" content="http://teamtyro.com/">
  <meta name="twitter:description" content="We're a group of high school students that are studying the way different types of artificial intelligence (AI) algorithms learn, when compared to humans.">
  <meta name="twitter:image" content="http://teamtyro.com/ext/img/website-capture.png">
  <meta property="og:locale" content="en_US" />
  <meta property="og:title" content="Team Tyro, studying AI and humans with a game"/>
  <meta property="og:description" content="We're a group of high school students that are studying the way different types of artificial intelligence (AI) algorithms learn, when compared to humans."/>
  <meta property="og:url" content="http://teamtyro.com/"/>
  <meta property="og:image" content="http://teamtyro.com/ext/img/website-capture.png" />
  <meta property="og:site_name" content="Team Tyro"/>

  <title>Results- Team Tyro</title>

  <link rel="stylesheet" href="/ext/css/foundation.v1.min.css" />
  <link rel="stylesheet" href="/ext/css/normalize.css" />
  <link rel="stylesheet" href="/ext/css/app_v1.01.css" />

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/ext/js/jquery-1.9.1.min.js"><\/script>')</script>
  <script src="/ext/js/custom.modernizr.js"></script>

  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
          title: 'Ethnicity',
          is3D: 'true'
        };
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      var plays_chart = new google.visualization.LineChart(document.getElementById('chart_div_2'));
      var ex2_chart = new google.visualization.ScatterChart(document.getElementById('chart_div_4'));
      chart.draw(data, options);
      plays_chart.draw(data);
      ex2_chart.draw(data);
    }
    </script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <style>
    .chart {
      width: 640px;
      height: 480px;
    }
  </style>

</head>
<body>
<div class="wrapper sticky">
    <div class="large-12 columns contain-to-grid sticky">
        <nav class="top-bar">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="/">Team Tyro</a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>
            <section class="top-bar-section">
                <ul class="left">
                    <li>
                        <a href="/game">The Game</a>
                    </li>
                    <li>
                        <span data-tooltip class="has-tip tip-top" title="Coming soon, watch the AI play the game!"><a href="#">Neural Network</a></span>
                    </li>
                    <li>
                        <span data-tooltip class="has-tip tip-top" title="Coming soon, watch the AI play the game!"><a href="#">Genetic Algorithm</a></span>
                    </li>
                </ul>
                <ul class="right">
                    <li><a href="/team">The Team</a></li>
                    <li><a href="mailto:contact@teamtyro.com">Contact</a></li>
                    <li><a href="mailto:feedback@teamtyro.com?subject=Team Tyro Feedback - ">Feedback</a></li>
                </ul>
            </section>
        </nav>
    </div>
</div>
<div class="row content_load">
    <div class="large-6 columns">
        <div id="chart_div" class="chart"></div>
    </div>
    <div class="large-6 columns">
        <div id="chart_div_2" class="chart"></div>
    </div>
    <div class="large-6 columns">
        <div id="chart_div_3" class="chart"></div>
    </div>
    <div class="large-6 columns">
        <div id="chart_div_4" class="chart"></div>
    </div>
</div>
<footer class="sticky-bottom">
    <div class="row">
        <div class="large-10 columns">
            <p>Built by <a href="http://jackketcham.com">Jack Ketcham</a></p>
            <p>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>. Documentation licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
            <ul class="inline-list">
                <li><a href="http://github.com/teamtyro/teamtyro.com/issues?state=open">Submit issues</a></li>
                <li><a href="http://github.com/teamtyro/teamtyro.com">Code</a></li>
            </ul>
        </div>
        <div class="large-2 columns">
            <a href="" class="scrollup">Back to top</a>
        </div>
    </div>
</footer>

    <script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
    </script>
    </script>

    <script src="/ext/js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>

</body>
</html>