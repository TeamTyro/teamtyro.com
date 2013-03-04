<?php

    include("/home/c0smic/secure/data_db_settings.php");

    $body = file_get_contents('php://input');

    $stime = "";
    $etime = "";
    $moves = "";

    $splitter = '|';

    function parseData($body) {
        global $stime, $etime, $moves;
        $inc = 1;
        while(substr($body, $inc, 1) != $splitter) {
            $stime = $stime . substr($body, $inc, 1);
            $inc++;
        }

        $inc++;
        while(substr($body, $inc, 1) != $splitter) {
            $etime = $etime . substr($body, $inc, 1);
            $inc++;
        }

        $inc++;
        while(substr($body, $inc, 1) != $splitter) {
            $moves = $moves . substr($body, $inc, 1);
        }
    }
    parseData($body);

    $vars = $stime . " " . $etime .  " " . $moves;
    file_put_contents('output.txt', $splitter);

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