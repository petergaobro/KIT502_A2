<?php
session_start();
// connect to the database
include "../../db_conn.php";
// initializing variables
$type_user = "";
$username = "";
$first_name = "";
$last_name = "";
$email = "";
$mobile = "";
$address = "";
$country = "";
$abn = "";
$errors = array();





// REGISTER USER
if (isset($_POST['create_admin_ad'])) {
    // receive all input values from the form
    $type_user = mysqli_real_escape_string($db, $_POST['type_user']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $abn = mysqli_real_escape_string($db, $_POST['abn']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($type_user)) {
        array_push($errors, "Type of user is required");
    }
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($first_name)) {
        array_push($errors, "First name is required");
    }
    if (empty($last_name)) {
        array_push($errors, "Last name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($mobile)) {
        array_push($errors, "Mobile is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    if (empty($address)) {
        array_push($errors, "Address is required");
    }
    if (empty($country)) {
        array_push($errors, "Country is required");
    }
    if (empty($abn)) {
        array_push($errors, "ABN is required");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users_admin WHERE username='$username' OR email='$email' OR mobile='$mobile' OR abn='$abn' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
        if ($user['mobile'] === $mobile) {
            array_push($errors, "Mobile already exists");
        }
        if ($user['abn'] === $abn) {
            array_push($errors, "ABN already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO users_admin (type_user, username, first_name, last_name, email, mobile, address, password, country, abn) 
  			  VALUES('$type_user', '$username', '$first_name', '$last_name', '$email', '$mobile', '$address', '$password', '$country', '$abn')";
        mysqli_query($db, $query);
        header('location: ../sys_dashboard.php');
    }
}