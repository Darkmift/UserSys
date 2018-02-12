<?php

//functions.php under VALIDATE_USER_REGISTRATION

function validate_length($param) {
    global $error_msg;
    //set min max lenght
    $min = 3;
    $max = 20;
    //check length
    if (!strlen($param) > $min || !strlen($param) < $max) {
        $error_msg[] = "{$param} must be between {$min} and {$max} long";
    }
}

global $error_msg;
$input_array = array();
foreach ($error_msg as $error) {
    echo $error . '<br>';
}