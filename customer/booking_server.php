<?php
session_start();
// connect to the database
include "../db_conn.php";

$con_checkin= "";
$con_checkout = "";
$con_guest = "";
$b_first_name = "";
$b_last_name = "";
$b_email = "";
$b_mobile = "";
$b_status = "";
$errors = array();

// confirm booking
if (isset($_POST['confirm_book'])) {
    // $house_city = mysqli_real_escape_string($db, $_POST['house_city']);
    // $house_checkin = mysqli_real_escape_string($db, $_POST['house_checkin']);
    // $house_checkout = mysqli_real_escape_string($db, $_POST['house_checkout']);
    // $house_guest = mysqli_real_escape_string($db, $_POST['house_guest']);
    // receive all input values from the form
    $con_checkin = mysqli_real_escape_string($db, $_POST['con_checkin']);
    $con_checkout = mysqli_real_escape_string($db, $_POST['con_checkout']);
    $con_guest = mysqli_real_escape_string($db, $_POST['con_guest']);
    $b_first_name = mysqli_real_escape_string($db, $_POST['b_first_name']);
    $b_last_name = mysqli_real_escape_string($db, $_POST['b_last_name']);
    $b_email = mysqli_real_escape_string($db, $_POST['b_email']);
    $b_mobile = mysqli_real_escape_string($db, $_POST['b_mobile']);
    $b_status = mysqli_real_escape_string($db, $_POST['b_status']);
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array

    echo $con_checkin;
    if (empty($b_first_name)) {
        array_push($errors, "First name is required");
    }
    if (empty($b_last_name)) {
        array_push($errors, "Last name in is required");
    }
    if (empty($b_email)) {
        array_push($errors, "Email is required");
    }
    if (empty($b_mobile)) {
        array_push($errors, "mobile is required");
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        // $c_password = md5($password_c1); //encrypt the password before saving in the database

        $query = "INSERT INTO booking  (con_checkin,
                                        con_checkout,
                                        con_guest,
                                        b_first_name, 
                                        b_last_name, 
                                        b_email, 
                                        b_mobile,
                                        b_status) 
  			    VALUES ('$con_checkin',
                        '$con_checkout',
                        '$con_guest',
                        '$b_first_name', 
                        '$b_last_name', 
                        '$b_email', 
                        '$b_mobile',
                        '$b_status')";

        echo $query;
        mysqli_query($db, $query);
        // $_SESSION['c_username'] = $c_username;
        $_SESSION['success'] = "You are now booked successfully";
        //header('location: review.php');
    }
}
