<?php
session_start();
include "../../db_conn.php";
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

// if (isset($_GET['id'])) {
//     // include "../../db_conn.php";

//     function validate($data)
//     {
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }

//     $id = validate($_GET['id']);

//     $sql = "SELECT * FROM users_customer WHERE id=$id";
//     $result = mysqli_query($db, $sql);
//     if (mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//         var_dump($row);
//         $c_username = $row['c_username'];
//     } else {
//         echo ("ok");
//         //header("Location: ../sys_dashboard.php");
//     }
// }

// var_dump($_POST);

if (isset($_POST['edit_admin'])) {
    // echo "OK";
    include "../../db_conn.php";
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $type_user = mysqli_real_escape_string($db, $_POST['type_user']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
    // $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    // $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $abn = mysqli_real_escape_string($db, $_POST['abn']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($type_user)) {
        // array_push($errors, "Username is required");
        header("Location: ./update_admin.php?id=$id&error=Type user is required");
    } else if (empty($username)) {
        // array_push($errors, "Username is required");
        header("Location: ./update_admin.php?id=$id&error=Username is required");
    } else if (empty($first_name)) {
        // array_push($errors, "First name is required");
        header("Location: ./update_admin.php?id=$id&error=First name is required");
    } else if (empty($last_name)) {
        // array_push($errors, "Last name is required");
        header("Location: ./update_admin.php?id=$id&error=Last name is required");
    } else if (empty($email)) {
        // array_push($errors, "Email is required");
        header("Location: ./update_admin.php?id=$id&error=Email is required");
    } else if (empty($mobile)) {
        // array_push($errors, "Mobile is required");
        header("Location: ./update_admin.php?id=$id&error=Mobile is required");
    }
    // if (empty($password_c1)) {
    //     array_push($errors, "Password is required");
    // }
    // if ($password_c1 != $password_c2) {
    //     array_push($errors, "The two passwords do not match");
    // }
    else if (empty($address)) {
        // array_push($errors, "Address is required");
        header("Location: ./update_admin.php?id=$id&error=Address is required");
    } else if (empty($country)) {
        // array_push($errors, "Country is required");
        header("Location: ./update_admin.php?id=$id&error=Country is required");
    } else if (empty($abn)) {
        // array_push($errors, "Country is required");
        header("Location: ./update_admin.php?id=$id&error=ABN is required");
    } else {
        $query = "UPDATE users_admin SET type_user = '$type_user', username = '$username', first_name = '$first_name',
        last_name = '$last_name', email = '$email', mobile = '$mobile',
        address = '$address', country = '$country', abn = '$abn' WHERE id = '$id'";
        $result = mysqli_query($db, $query);
        // var_dump($query);
        // var_dump($result);
        // mysqli_query($db, $query);
        // $_SESSION['c_username'] = $c_username;
        // $_SESSION['success'] = "You are now logged in";
        if ($result) {
            header("Location: ../sys_dashboard.php?success=successfully created");
        } else {
            header("Location: ../sys_dashboard.php?error=unknown error occurred&$user_data");
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
    header("Location: ../sys_dashboard.php");
    //var_dump($_POST);
    // echo "No";
}
