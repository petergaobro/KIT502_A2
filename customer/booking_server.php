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
    $b_reason = mysqli_real_escape_string($db, $_POST['b_reason']);
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array

    echo $con_checkin;
    if (empty($con_checkin)) {
        array_push($errors, "Check in date is required");
        // header("Location: ./confirm.php?&error=Check in date is required");
    }
    if (empty($con_checkout)) {
        array_push($errors, "Check out date is required");
        // header("Location: ./login_book.php?&error=Check out date is required");
    }
    if (empty($con_guest)) {
        array_push($errors, "Guest is required");
        // header("Location: ./login_book.php?&error=Guest is required");
    }
    if (empty($house_price)) {
        array_push($errors, "House Price is required");
        // header("Location: ./login_book.php?&error=Guest is required");
    }
    if (empty($b_first_name)) {
        array_push($errors, "First name is required");
        // header("Location: ./login_book.php?&error=First name is required");
    }
    if (empty($b_last_name)) {
        array_push($errors, "Last name in is required");
        // header("Location: ./login_book.php?&error=Last name is required");
    }
    if (empty($b_email)) {
        array_push($errors, "Email is required");
        // header("Location: ./login_book.php?&error=Email is required");
    }
    if (empty($b_mobile)) {
        array_push($errors, "mobile is required");
        // header("Location: ./login_book.php?&error=Mobile is required");
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        // $c_password = md5($password_c1); //encrypt the password before saving in the database

        $query = "INSERT INTO booking  (con_checkin,
                                        con_checkout,
                                        con_guest,
                                        con_price,
                                        b_first_name, 
                                        b_last_name, 
                                        b_email, 
                                        b_mobile,
                                        b_status,
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
                        '$b_reason')";

        echo $query;
        mysqli_query($db, $query);
        // $_SESSION['c_username'] = $c_username;
        $_SESSION['success'] = "You are now booked successfully";
        //header('location: review.php');
    }
}
