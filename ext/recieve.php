<?php
    # Database variables
    $dbhost = 'localhost:3036';
    $dbuser = 'c0smic_tyro';
    $dbpass = '2$M*k^4!?oDm';

    # Read GET variables
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $moves = $_POST['moves'];

    # Create output string
    $str = "$stime, $etime, \"$moves\"";

    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    if(! $conn )
    {
        die('Could not connect: ' . mysql_error());
    }

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