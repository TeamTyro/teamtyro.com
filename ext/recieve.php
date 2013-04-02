<?php

    include("/home/c0smic/secure/data_db_settings.php");

    $body = file_get_contents('php://input');

    setcookie('game_first-run', true, 5184000 + time(), '/');

    $stime = "";
    $etime = "";
    $moves = "";
    $name = "";
    $email = "";
    $gender = "";
    $age = "";
    $ethnicity = "";

    function parseData($body) {
        $splitter = substr($body, 0, 1);
        global $stime, $etime, $moves, $name, $email, $gender, $age, $ethnicity;

        $mark1  = strpos($body, $splitter, 1);
        $mark2  = strpos($body, $splitter, $mark1+1);
        $mark3  = strpos($body, $splitter, $mark2+1);
        $mark4  = strpos($body, $splitter, $mark3+1);
        $mark5  = strpos($body, $splitter, $mark4+1);
        $mark6  = strpos($body, $splitter, $mark5+1);
        $mark7  = strpos($body, $splitter, $mark6+1);
        $mark8  = strpos($body, $splitter, $mark7+1);

        $stime  = substr($body, 1, $mark1-1);
        $etime  = substr($body, $mark1+1, $mark2-$mark1-1);
        $moves  = substr($body, $mark2+1, $mark3-$mark2-1);
        $name   = substr($body, $mark3+1, $mark4-$mark3-1);
        $email  = substr($body, $mark4+1, $mark5-$mark4-1);
        $gender = substr($body, $mark5+1, $mark6-$mark5-1);
        $age    = substr($body, $mark6+1, $mark7-$mark6-1);
        $ethnicity = substr($body, $mark7+1, $mark8-$mark7-1);
    }
    parseData($body);

    $conn = mysql_connect('localhost:3036', $dbuser, $dbpass);
    if(! $conn )
    {
        die('Could not connect: ' . mysql_error());
    }
    unset($dbuser, $dbpass);

    mysql_select_db('c0smic_maze-game');

    $sql= "INSERT INTO data (name, email, gender, age, ethnicity, stime, etime, moves)
    VALUES
    ('$name', '$email', '$gender', '$age', '$ethnicity', '$stime','$etime','$moves')";

    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not enter data: ' . mysql_error());
    }

    mysql_close($conn);
    echo $str;

?>
