<?php

//SQL related code
$con = mysqli_connect('localhost', 'root', '', 'users');

//query the db function--parameter to pass:query of db
function query($query) {
    //get $con from global scope of db.php
    global $con;
    return mysqli_query($con, $query);
}

//escape strings to sanitize prior to inserting into SQL db
function escape($string) {
//diaz's way
//    global $con;
//    return mysqli_real_escape_string($con, $string);
    return mysqli_real_escape_string($string);
}

//fetch result array
function fetch_array($result) {
//  global $con;
    return mysqli_fetch_array($result);
}

//get confirmation of result.
function confirm($result) {
    global $con;
    if (!$result) {
        die('Query Failed' . mysqli_error($con));
    }
}

//row count
function row_count($result) {
    return mysqli_num_rows($result);
}
