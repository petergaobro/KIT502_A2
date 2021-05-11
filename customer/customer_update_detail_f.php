<?php
session_start();
include "../db_conn.php";
// initializing variables
$c_username = "";
$c_first_name = "";
$c_last_name = "";
$c_email = "";
$c_mobile = "";
$c_password = "";
$c_password_c = "";
$c_address = "";
$c_country = "";

$errors = array();


if (isset($_POST['edit_customer_profile'])) {
    // echo "OK";
    include "../db_conn.php";
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $c_username = mysqli_real_escape_string($db, $_POST['c_username']);
    $c_first_name = mysqli_real_escape_string($db, $_POST['c_first_name']);
    $c_last_name = mysqli_real_escape_string($db, $_POST['c_last_name']);
    $c_email = mysqli_real_escape_string($db, $_POST['c_email']);
    $c_mobile = mysqli_real_escape_string($db, $_POST['c_mobile']);
    $c_password = mysqli_real_escape_string($db, $_POST['c_password']);
    $c_password_c = mysqli_real_escape_string($db, $_POST['c_password_c']);
    $c_address = mysqli_real_escape_string($db, $_POST['c_address']);
    $c_country = mysqli_real_escape_string($db, $_POST['c_country']);
    $c_pattern_detail = '/^(?=.*[!@#$%])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,12}$/';
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    
    if ($c_password != $c_password_c) {
        header("Location: ./customer_update_detail.php?id=$id&error=Passwords do not match");
    }
    // } else if (!preg_match($c_pattern_detail, $c_password)) {
    //     header("Location: ./customer_update_detail.php?id=$id&error=Your Password  length Must be 6-12 and must contain 1 letter, 1 number, 1 capital letter and one of the following special character(!@#$%)");
    // }else if(count($errors) == 0) {
    //     $c_password = md5($c_password_c);
    // }

    else {
        $sql_customer_detail = "UPDATE users_customer  SET c_username = '$c_username', 
                                    c_first_name = '$c_first_name',
                                    c_last_name = '$c_last_name', 
                                    c_email = '$c_email', 
                                    c_mobile = '$c_mobile',
                                    c_password = '$c_password', 
                                    c_address = '$c_address', 
                                    c_country = '$c_country'

                                WHERE id = '$id'";
        $result_customer_detail = mysqli_query($db, $sql_customer_detail);

        if ($result_customer_detail) {
            header("Location: .customer_profile.php?success=successfully created");
        } else {
            header("Location: .customer_profile.php?error=unknown error occurred&$user_data");
        }
    }

    // }
} else {
    header("Location: .customer_profile.php");
    //var_dump($_POST);
    // echo "No";
}