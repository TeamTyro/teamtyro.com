<?php

    include("/home/c0smic/secure/data_db_settings.php");

    # Read GET variables
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $moves = $_POST['moves'];

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