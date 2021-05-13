<?php
// session_start();
// connect to the database
include "../db_conn.php";
// initializing variables
$c_q_a = "";
$errors = array();

// REGISTER USER
if (isset($_POST['edit_q_a'])) {
    // receive all input values from the form
    $c_q_a = mysqli_real_escape_string($db, $_POST['c_q_a']);
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($c_q_a)) {
        array_push($errors, "The Q&A is required");
    }
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO Q_A (QA) 
  			  VALUES('$c_q_a')";
        mysqli_query($db, $query);
        header('location: ./customer_profile.php');
    }
}


