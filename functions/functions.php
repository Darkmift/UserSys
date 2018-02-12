<?php

/* * **************Helper function**************** */

//Convert all applicable characters to HTML entities
function clean($string) {
    return htmlentities($string);
}

//redirect helper function
function redirect($location) {
    return header("Location:{$location}");
}

//set a message into session
function set_message($message) {
    if (!empty($message)) {
        $_SESSION['message'] = $message;
    } else {
        $message = "";
    }
}

//display message if exists(by set_message).
function display_message() {
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

//make a token
function token_generator() {
    $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    return $token;
}

/* * **************Validation functions**************** */
//init error message array
$error_msg = array();

function validate_user_registration() {

    //check if form was submitted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //echo "posted!";
        //grab form input variables
        $first_name = clean($_POST['first_name']);
        $last_name = clean($_POST['last_name']);
        $username = clean($_POST['username']);
        $email = clean($_POST['email']);
        $password = clean($_POST['password']);
        $confirm_password = clean($_POST['confirm_password']);

        $inputs_array = array(
            'First Name' => $first_name,
            'Last Name' => $last_name,
            'User Name' => $username,
            'Email' => $email,
            'Password' => $password
        );

        function validate_length($param_key, $param_value) {
            global $error_msg;
            //set min max lenght
            $min = 3;
            $max = 20;
            //check length
            if (strlen($param_value) < $min || strlen($param_value) > $max) {
                $error_msg[] = "{$param_key} must be between {$min} and {$max} long";
            }
        }

        global $error_msg;
        foreach ($inputs_array as $key => $value) {
            validate_length($key, $value);
        }

        foreach ($error_msg as $error) {
            echo $error . '<br>';
        }
    }
}
