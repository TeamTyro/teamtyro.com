<?php

    include("/home/c0smic/secure/data_db_settings.php");
    include("survey_variables.php");

    $body = file_get_contents('php://input');

    setcookie('game_first-run', true, 5184000 + time(), '/');

    $ttime = "";
    $moves = "";

    function parseData($body) {
        $splitter = substr($body, 0, 1);
        global $ttime, $moves;

        $mark1  = strpos($body, $splitter, 1);
        $mark2  = strpos($body, $splitter, $mark1+1);

        $ttime  = substr($body, 1, $mark1-1);
        $moves  = substr($body, $mark1+1, $mark2-$mark1-1);
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
        $sql= "INSERT INTO game_returning (email, gender, age, ethnicity, ttime, moves)
        VALUES
        ('$email', '$gender', '$age', '$ethnicity', '$ttime', '$moves')";
    } else {
        $sql= "INSERT INTO game_first_run (email, gender, age, ethnicity, ttime, moves)
        VALUES
        ('$email', '$gender', '$age', '$ethnicity', '$ttime', '$moves')";
    }

    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not enter data: ' . mysql_error());
    }

    mysql_close($conn);
    echo $str;

?>
