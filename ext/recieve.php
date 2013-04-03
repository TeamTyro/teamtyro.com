<?php

    include("/home/c0smic/secure/data_db_settings.php");
    include("$_SERVER['DOCUMENT_ROOT'] . /game/survey_variables.php");

    $body = file_get_contents('php://input');

    setcookie('game_first-run', true, 5184000 + time(), '/');

    $stime = "";
    $etime = "";
    $moves = "";

    function parseData($body) {
        $splitter = substr($body, 0, 1);
        global $stime, $etime, $moves;

        $mark1  = strpos($body, $splitter, 1);
        $mark2  = strpos($body, $splitter, $mark1+1);
        $mark3  = strpos($body, $splitter, $mark2+1);

        $stime  = substr($body, 1, $mark1-1);
        $etime  = substr($body, $mark1+1, $mark2-$mark1-1);
        $moves  = substr($body, $mark2+1, $mark3-$mark2-1);
    }
    parseData($body);

    $conn = mysql_connect('localhost:3036', $dbuser, $dbpass);
    if(! $conn )
    {
        die('Could not connect: ' . mysql_error());
    }
    unset($dbuser, $dbpass);

    mysql_select_db('c0smic_maze-game');

    if(isset($_COOKIE['game_first-run'])){
        $sql= "INSERT INTO game_returning (name, email, gender, age, ethnicity, stime, etime, moves)
        VALUES
        ('$name', '$email', '$gender', '$age', '$ethnicity', '$stime','$etime','$moves')";
    } else {
        $sql= "INSERT INTO game_first_run (name, email, gender, age, ethnicity, stime, etime, moves)
        VALUES
        ('$name', '$email', '$gender', '$age', '$ethnicity', '$stime','$etime','$moves')";
    }

    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not enter data: ' . mysql_error());
    }

    file_put_contents('test.txt', $ethnicity);

    mysql_close($conn);
    echo $str;

?>
