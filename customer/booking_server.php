<?php
session_start();
// connect to the database
include "../db_conn.php";

$con_checkin = "";
$con_checkout = "";
$con_guest = "";
$house_price = "";
$b_first_name = "";
$b_last_name = "";
$b_email = "";
$b_mobile = "";
$b_status = "";
$b_payment = "";
$b_reason = "";
$errors = array();

// confirm booking
if (isset($_POST['confirm_book'])) {

    $con_checkin = mysqli_real_escape_string($db, $_POST['con_checkin']);
    $con_checkout = mysqli_real_escape_string($db, $_POST['con_checkout']);
    $con_guest = mysqli_real_escape_string($db, $_POST['con_guest']);
    $house_price = mysqli_real_escape_string($db, $_POST['house_price']);
    $b_first_name = mysqli_real_escape_string($db, $_POST['b_first_name']);
    $b_last_name = mysqli_real_escape_string($db, $_POST['b_last_name']);
    $b_email = mysqli_real_escape_string($db, $_POST['b_email']);
    $b_mobile = mysqli_real_escape_string($db, $_POST['b_mobile']);
    $b_status = mysqli_real_escape_string($db, $_POST['b_status']);
    $b_payment = mysqli_real_escape_string($db, $_POST['b_payment']);
    $b_reason = mysqli_real_escape_string($db, $_POST['b_reason']);
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array

    echo $con_checkin;
    if (empty($con_checkin)) {
        array_push($errors, "Check in date is required");
    }
    if (empty($con_checkout)) {
        array_push($errors, "Check out date is required");
    }
    if (empty($con_guest)) {
        array_push($errors, "Guest is required");
    }
    if (empty($house_price)) {
        array_push($errors, "House Price is required");
    }
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
        $query = "INSERT INTO booking  (con_checkin,
                                        con_checkout,
                                        con_guest,
                                        con_price,
                                        b_first_name, 
                                        b_last_name, 
                                        b_email, 
                                        b_mobile,
                                        b_status,
                                        b_payment,
                                        b_reason) 
  			    VALUES ('$con_checkin',
                        '$con_checkout',
                        '$con_guest',
                        '$house_price',
                        '$b_first_name', 
                        '$b_last_name', 
                        '$b_email', 
                        '$b_mobile',
                        '$b_status',
                        '$b_payment',
                        '$b_reason')";

        echo $query;
        mysqli_query($db, $query);
        $_SESSION['success'] = "You are now booked successfully";
    }
}
