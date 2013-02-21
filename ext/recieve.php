<?php
    # Read GET variables
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $moves = $_POST['moves'];
 
    # Create output string
    $str = "\"$stime\", \"$etime\", \"$moves\"\n";

    $fh = fopen("postData.txt", "a+");
    fwrite($fh, $str);
    fclose($fh);
 
    echo $str;
    echo "done";
?>