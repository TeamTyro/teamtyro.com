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

    // Return false on failure (PHP 8.1+ throws by default) so errors are
    // handled below and never echoed back to the client
    mysqli_report(MYSQLI_REPORT_OFF);

    $conn = @mysqli_connect('localhost', $dbuser, $dbpass, 'c0smic_maze-game', 3036);
    if(! $conn )
    {
        error_log('Could not connect: ' . mysqli_connect_error());
        die('Could not connect');
    }
    unset($dbuser, $dbpass);

    function sendData() {
        global $sql;
        if(isset($_COOKIE['game_first-run'])){
            $sql = "INSERT INTO game_returning (client, plays, email, gender, age, ethnicity, ttime, moves)
            VALUES
            (?, ?, ?, ?, ?, ?, ?, ?)";
        } else {
            $sql = "INSERT INTO game_first_run (client, plays, email, gender, age, ethnicity, ttime, moves)
            VALUES
            (?, ?, ?, ?, ?, ?, ?, ?)";
        }
    }
    if($ttime != ""  && $moves != ""){
        sendData();
    } else {
        die('Could not enter data: Values missing from ttime & moves');
    }

    // Prepared statement: player-supplied values are bound, never spliced into SQL
    $stmt = mysqli_prepare($conn, $sql);
    if(! $stmt
        || ! mysqli_stmt_bind_param($stmt, 'ssssssss', $client, $plays, $email, $gender, $age, $ethnicity, $ttime, $moves)
        || ! mysqli_stmt_execute($stmt))
    {
        error_log('Could not enter data: ' . mysqli_error($conn));
        die('Could not enter data');
    }
    mysqli_stmt_close($stmt);

    mysqli_close($conn);
    echo $str;

?>
