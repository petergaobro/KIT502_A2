<?php
session_start();
include "../db_conn.php";
// initializing variables
$c_username = "";
$c_first_name = "";
$c_last_name = "";
$c_email = "";
$c_mobile = "";
$c_address = "";
$c_country = "";

$errors = array();


if (isset($_POST['edit_customer_profile'])) {
    include "../db_conn.php";
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $c_username = mysqli_real_escape_string($db, $_POST['c_username']);
    $c_first_name = mysqli_real_escape_string($db, $_POST['c_first_name']);
    $c_last_name = mysqli_real_escape_string($db, $_POST['c_last_name']);
    $c_email = mysqli_real_escape_string($db, $_POST['c_email']);
    $c_mobile = mysqli_real_escape_string($db, $_POST['c_mobile']);
    $c_address = mysqli_real_escape_string($db, $_POST['c_address']);
    $c_country = mysqli_real_escape_string($db, $_POST['c_country']);
    $c_pattern_detail = '/^(?=.*[!@#$%])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,12}$/';
    if (empty($c_mobile)) {
        header("Location: ./customer_update_detail.php?id=$id&error=Moblie is reuqired");
    }
    else {
        $sql_customer_detail = "UPDATE users_customer  SET c_username = '$c_username', 
                                    c_first_name = '$c_first_name',
                                    c_last_name = '$c_last_name', 
                                    c_email = '$c_email', 
                                    c_mobile = '$c_mobile', 
                                    c_address = '$c_address', 
                                    c_country = '$c_country'
                                WHERE id = '$id'";
        $result_customer_detail = mysqli_query($db, $sql_customer_detail);
        if ($result_customer_detail) {
            header("Location: customer_profile.php?success=successfully created");
        } else {
            header("Location: customer_profile.php?error=unknown error occurred&$user_data");
        }
    }
} else {
    header("Location: .customer_profile.php");
}