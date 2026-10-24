<?php

// Default to empty strings (as the old string-built query stored) so bound
// parameters never become NULL when the survey cookies are missing
$email = $gender = $age = $ethnicity = '';

if(isset($_COOKIE['survey_gender'])){
    if(isset($_COOKIE['survey_email'])){
        $email = $_COOKIE['survey_email'];
    }
    $gender = $_COOKIE['survey_gender'];
    $age = isset($_COOKIE['survey_age']) ? $_COOKIE['survey_age'] : '';
    $ethnicity = isset($_COOKIE['survey_ethnicity']) ? $_COOKIE['survey_ethnicity'] : '';
}

?>