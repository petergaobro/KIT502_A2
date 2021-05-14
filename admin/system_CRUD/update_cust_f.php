<?php
session_start();
include "../../db_conn.php";
$c_username = "";
$c_first_name = "";
$c_last_name = "";
$c_email = "";
$c_mobile = "";
$c_address = "";
$c_country = "";
$errors = array();

if (isset($_POST['edit_cust'])) {
    // echo "OK";
    include "../../db_conn.php";
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $c_username = mysqli_real_escape_string($db, $_POST['c_username']);
    $c_first_name = mysqli_real_escape_string($db, $_POST['c_first_name']);
    $c_last_name = mysqli_real_escape_string($db, $_POST['c_last_name']);
    $c_email = mysqli_real_escape_string($db, $_POST['c_email']);
    $c_mobile = mysqli_real_escape_string($db, $_POST['c_mobile']);
    $c_address = mysqli_real_escape_string($db, $_POST['c_address']);
    $c_country = mysqli_real_escape_string($db, $_POST['c_country']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($c_username)) {
        header("Location: ./update_cust.php?id=$id&error=Username is required");
    } else if (empty($c_first_name)) {
        header("Location: ./update_cust.php?id=$id&error=First name is required");
    } else if (empty($c_last_name)) {
        header("Location: ./update_cust.php?id=$id&error=Last name is required");
    } else if (empty($c_email)) {
        header("Location: ./update_cust.php?id=$id&error=Email is required");
    } else if (empty($c_mobile)) {
        header("Location: ./update_cust.php?id=$id&error=Mobile is required");
    } else if (empty($c_address)) {
        header("Location: ./update_cust.php?id=$id&error=Address is required");
    } else if (empty($c_country)) {
        header("Location: ./update_cust.php?id=$id&error=Country is required");
    } else {
        $query = "UPDATE users_customer SET c_username = '$c_username', 
                                            c_first_name = '$c_first_name',
                                            c_last_name = '$c_last_name', 
                                            c_email = '$c_email', 
                                            c_mobile = '$c_mobile',
                                            c_address = '$c_address', 
                                            c_country = '$c_country' 
                                        WHERE id = '$id'";
        $result = mysqli_query($db, $query);
        if ($result) {
            echo "<script type='text/javascript'>alert('Update Successfully');window.location.href='../sys_dashboard.php';</script>";
            
        } else {
            header("Location: ../sys_dashboard.php?error=unknown error occurred&$user_data");
        }
    }
} else {
    header("Location: ../sys_dashboard.php");
}
