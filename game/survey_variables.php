<?php

if(isset($_COOKIE['survey_gender'])){
    if(isset($_COOKIE['survey_email'])){
        $email = $_COOKIE['survey_email'];
    }
    $gender = $_COOKIE['survey_gender'];
    $age = $_COOKIE['survey_age'];
    $ethnicity = $_COOKIE['survey_ethnicity'];
}

?>