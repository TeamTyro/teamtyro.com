<?php

    include("/home/c0smic/secure/data_db_settings.php");

    $body = file_get_contents('php://input');

    $stime;
    $etime;
    $moves;

    function parseData($body) {
        $inc = 0;
        while(substr($body, $inc) != '|') {
            $stime = $stime . substr($body, $inc);
            inc++;
        }

        inc++;
        while(substr($body, $inc) != '|') {
            $etime = $etime . substr($body, $inc);
            inc++;
        }

        inc++;
        while(substr($body, $inc) != '|') {
            $moves = $moves . substr($body, $inc);
        }
    }
    parseData($body);

    $conn = mysql_connect('localhost:3036', $dbuser, $dbpass);
    if(! $conn )
    {
        die('Could not connect: ' . mysql_error());
    }
    unset($dbuser, $dbpass);

    mysql_select_db('c0smic_maze-game');

    $sql= "INSERT INTO data (stime, etime, moves)
    VALUES
    ('$stime','$etime','$moves')";

    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not enter data: ' . mysql_error());
    }

    mysql_close($conn);
    echo $str;

?>