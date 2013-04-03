<?php

if(isset($_COOKIE['survey_name'])){
    $name = $_COOKIE['survey_name'];
    if(isset($_COOKIE['survey_email'])){
        $email = $_COOKIE['survey_email'];
    } else {
        $email = 0;
    }
    $gender = $_COOKIE['survey_gender'];
    $age = $_COOKIE['survey_age'];
    $ethnicity = $_COOKIE['survey_ethnicity'];
}

?>