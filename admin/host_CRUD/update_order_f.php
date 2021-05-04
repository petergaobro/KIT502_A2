<?php
session_start();
include "../../db_conn.php";
// initializing variables
$b_first_name = "";
$b_last_name = "";
$b_email = "";
$b_mobile = "";
$b_status = "";
$errors = array();

if (isset($_POST['edit_order'])) {
    // echo "OK";
    // include "../../db_conn.php";
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $b_first_name = mysqli_real_escape_string($db, $_POST['b_first_name']);
    $b_last_name = mysqli_real_escape_string($db, $_POST['b_last_name']);
    $b_email = mysqli_real_escape_string($db, $_POST['b_email']);
    $b_mobile = mysqli_real_escape_string($db, $_POST['b_mobile']);
    $b_status = mysqli_real_escape_string($db, $_POST['b_status']);


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
        header("Location: ./update_order.php?id=$id&error=House price is required");
    } else {
        $query = "UPDATE booking  SET b_first_name = '$b_first_name', 
                                    b_last_name = '$b_last_name',
                                    b_email = '$b_email', 
                                    b_mobile = '$b_mobile', 
                                    b_status = '$b_status'
                                WHERE id = '$id'";
        $result = mysqli_query($db, $query);
        // var_dump($query);
        // var_dump($result);
        // mysqli_query($db, $query);
        // $_SESSION['c_username'] = $c_username;
        // $_SESSION['success'] = "You are now logged in";
        if ($result) {
            header("Location: ../host_dashboard.php?success=successfully update");
        } else {
            header("Location: ../host_dashboard.php?error=unknown error occurred&$user_data");
        }
        // header('location: ../sys_dashboard.php');
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    // $user_check_query = "SELECT * FROM users_customer WHERE c_username='$c_username' OR c_email='$c_email' OR c_mobile='$c_mobile' LIMIT 1";
    // $result = mysqli_query($db, $user_check_query);
    // $user = mysqli_fetch_assoc($result);

    // if ($user) { // if user exists
    //     if ($user['c_username'] === $c_username) {
    //         array_push($errors, "Username already exists");
    //     }

    //     if ($user['c_email'] === $c_email) {
    //         array_push($errors, "Email already exists");
    //     }
    //     if ($user['c_mobile'] === $c_mobile) {
    //         array_push($errors, "Mobile already exists");
    //     }
    // }

    // Finally, register user if there are no errors in the form


    // if (count($errors) == 0) {
    //     // print "hi peter";
    //     $query = "UPDATE users_customer SET c_username = '$c_username', c_first_name = '$c_first_name',
    //         c_last_name = '$c_last_name', c_email = '$c_email', c_mobile = '$c_mobile',
    //         c_address = '$c_address', c_country = '$c_country' WHERE id = '$id'";
    //     $result = mysqli_query($db, $query);
    //     // var_dump($query);
    //     // var_dump($result);
    //     // mysqli_query($db, $query);
    //     $_SESSION['c_username'] = $c_username;
    //     // $_SESSION['success'] = "You are now logged in";
    //     if ($result) {
    //         header("Location: ../sys_dashboard.php?success=successfully created");
    //     } 
    //     // else {
    //     //     header("Location: ../sys_dashboard.php?error=unknown error occurred&$user_data");
    //     // }
    //     // header('location: ../sys_dashboard.php');
    // }


    // else{
    //     // header('location: ../sys_dashboard.php');
    //     header("Location: update_cust.php?error=unknown error occurred&$user_data");
    //     array_push($errors);
    // }
} else {
    header("Location: ../host_dashboard.php");
    //var_dump($_POST);
    // echo "No";
}
