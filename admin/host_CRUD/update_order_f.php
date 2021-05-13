<?php
session_start();
include "../../db_conn.php";
// initializing variables
$b_first_name = "";
$b_last_name = "";
$b_email = "";
$b_mobile = "";
$b_status = "";
$b_reason = "";
$errors = array();

if (isset($_POST['edit_order'])) {
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $b_first_name = mysqli_real_escape_string($db, $_POST['b_first_name']);
    $b_last_name = mysqli_real_escape_string($db, $_POST['b_last_name']);
    $b_email = mysqli_real_escape_string($db, $_POST['b_email']);
    $b_mobile = mysqli_real_escape_string($db, $_POST['b_mobile']);
    $b_status = mysqli_real_escape_string($db, $_POST['b_status']);
    $b_reason = mysqli_real_escape_string($db, $_POST['b_reason']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($b_first_name)) {
        // array_push($errors, "House name is required");
        header("Location: ./update_order.php?id=$id&error=Housename is required");
    } else if (empty($b_last_name)) {
        // array_push($errors, "House description is required");
        header("Location: ./update_order.php?id=$id&error=House description is required");
    } else if (empty($b_mobile)) {
        // array_push($errors, "House address is required");
        header("Location: ./update_order.php?id=$id&error=House address is required");
    } else if (empty($b_status)) {
        // array_push($errors, "House price is required");
        header("Location: ./update_order.php?id=$id&error=Status is required");
    } else if (empty($b_reason) AND $b_status=== "Reject") {
        // array_push($errors, "House price is required");
        header("Location: ./update_order.php?id=$id&error=Reject reason is required");
    }
    else {
        $query = "UPDATE booking  SET b_first_name = '$b_first_name', 
                                    b_last_name = '$b_last_name',
                                    b_email = '$b_email', 
                                    b_mobile = '$b_mobile', 
                                    b_status = '$b_status',
                                    b_reason = '$b_reason'
                                WHERE id = '$id'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header("Location: ../host_dashboard.php?success=successfully update");
        } else {
            header("Location: ../host_dashboard.php?error=unknown error occurred&$user_data");
        }
    }
} else {
    header("Location: ../host_dashboard.php");
}
