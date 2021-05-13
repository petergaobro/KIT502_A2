<?php
// session_start();
include "../db_conn.php";
// initializing variables

// $c_password = "";
// $c_password_c = "";


$errors = array();


if (isset($_POST['customer_change_pws'])) {
    // echo "OK";
    include "../db_conn.php";
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    // $c_password_c = mysqli_real_escape_string($db, $_POST['c_password_c']);
    $c_password_c1 = mysqli_real_escape_string($db, $_POST['c_password_c1']);
    $c_password_c2 = mysqli_real_escape_string($db, $_POST['c_password_c2']);
    //password format//
    $c_pattern_detail = '/^(?=.*[!@#$%])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,12}$/';
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($c_password_c1)) {
        array_push($errors, "Password is required");
    }
    if ($c_password_c1 != $c_password_c2) {
        array_push($errors, "The two passwords do not match");
    } else if (!preg_match($c_pattern_detail, $c_password_c1)) {
        array_push($errors, "Your Password  length Must be 6-12 and must contain 1 letter, 1 number, 1 capital letter and one of the following special character(!@#$%)");
    }

    // if (empty($c_password_c)) {
    //     header("Location: ./customer_update_detail.php?id=$id&error=Password is reuqired");
    // } //elseif ($c_password != $c_password_c) {
    //     array_push($errors, "The two passwords do not match");
    // } elseif (!preg_match($c_pattern_detail, $c_password)) {
    //     header("Location: ./customer_update_detail.php?id=$id&error=Your Password  length Must be 6-12 and must contain 1 letter, 1 number, 1 capital letter and one of the following special character(!@#$%)");
    // }
    // if (count($errors) == 0) {
    //     $c_password = md5($c_password_c);
    if (count($errors) == 0) {
        $c_password_c = md5($c_password_c1);
        $sql_customer_detail = "UPDATE users_customer SET c_password = '$c_password_c'
                                WHERE id = '$id'";

        $result_customer_detail = mysqli_query($db, $sql_customer_detail);

        if ($result_customer_detail) {
            header("Location: customer_profile.php?success=successfully created");
        } else {
            header("Location: customer_profile.php?error=unknown error occurred&$user_data");
        }
    }
}
