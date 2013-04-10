<?php

    include("/home/c0smic/secure/data_db_settings.php");
    include("survey_variables.php");

    session_start();
    if (!isset($_SESSION['plays'])) { 
        $_SESSION['plays'] = 1;
    } else {
        $_SESSION['plays']++;
    }

    $body = file_get_contents('php://input');

    setcookie('game_first-run', true, 5184000 + time(), '/');

    $ttime = "";
    $moves = "";
    $client = session_id();
    $plays = (string)$_SESSION['plays'];

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

    function sendData() {
        global $client, $plays, $email, $gender, $age, $ethnicity, $ttime, $moves, $sql;
        if(isset($_COOKIE['game_first-run'])){
            $sql = "INSERT INTO game_returning (client, plays, email, gender, age, ethnicity, ttime, moves)
            VALUES
            ('$client', '$plays', '$email', '$gender', '$age', '$ethnicity', '$ttime', '$moves')";
        } else {
            $sql = "INSERT INTO game_first_run (client, plays, email, gender, age, ethnicity, ttime, moves)
            VALUES
            ('$client', '$plays', '$email', '$gender', '$age', '$ethnicity', '$ttime', '$moves')";
        }
    }
    if($ttime != ""  && $moves != ""){
        sendData();
    } else {
        die('Could not enter data: Values missing from ttime & moves');
    }

    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not enter data: ' . mysql_error());
    }

    mysql_close($conn);
    echo $str;

?>
