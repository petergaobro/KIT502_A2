<?php
session_start();
// connect to the database
include "../db_conn.php";
// initializing variables
$r_location = "";
$r_rating = "";
$r_comment = "";
$errors = array();

// REGISTER USER
if (isset($_POST['create_view'])) {
    // receive all input values from the form
    $r_location = mysqli_real_escape_string($db, $_POST['r_location']);
    $r_rating = mysqli_real_escape_string($db, $_POST['r_rating']);
    $r_comment = mysqli_real_escape_string($db, $_POST['r_comment']);
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($r_location)) {
        array_push($errors, "location is required");
    }
    if (empty($r_rating)) {
        array_push($errors, "Rating is required");
    }
    if (empty($r_comment)) {
        array_push($errors, "Comment is required");
    }
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO users_review (r_location, r_rating, r_comment) 
       VALUES('$r_location', '$r_rating', '$r_comment')";
        mysqli_query($db, $query);
        header('location: review.php');
    }
}
