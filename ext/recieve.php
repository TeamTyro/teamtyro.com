<?php

    include("/home/c0smic/secure/data_db_settings.php");

    $body = file_get_contents('php://input');
    $xml = simplexml_load_file($body);

    # Read GET variables
    $stime = $xml->data->stime;
    $etime = $xml->data->etime;
    $moves = $xml->data->moves;

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