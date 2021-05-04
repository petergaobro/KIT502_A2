<?php
session_start();
include "../../db_conn.php";
// initializing variables
$house_name = "";
$house_desc = "";
$house_addr = "";
$house_city = "";
$house_price = "";
$house_guest = "";
$house_num_room = "";
$house_num_bathroom = "";

$house_checkin = "";
$house_checkout = "";
$house_entire = "";
$house_garage = "";
$house_smoke = "";
$house_internet = "";
$house_pet = "";
$house_image = "";
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

if (isset($_POST['edit_house'])) {
    // echo "OK";
    include "../../db_conn.php";
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $house_name = mysqli_real_escape_string($db, $_POST['house_name']);
    $house_desc = mysqli_real_escape_string($db, $_POST['house_desc']);
    $house_addr = mysqli_real_escape_string($db, $_POST['house_addr']);
    $house_city = mysqli_real_escape_string($db, $_POST['house_city']);
    $house_price = mysqli_real_escape_string($db, $_POST['house_price']);
    $house_guest = mysqli_real_escape_string($db, $_POST['house_guest']);
    $house_num_room = mysqli_real_escape_string($db, $_POST['house_num_room']);
    $house_num_bathroom = mysqli_real_escape_string($db, $_POST['house_num_bathroom']);

    $house_checkin = mysqli_real_escape_string($db, $_POST['house_checkin']);
    $house_checkout = mysqli_real_escape_string($db, $_POST['house_checkout']);
    $house_entire = mysqli_real_escape_string($db, $_POST['house_entire']);
    $house_garage = mysqli_real_escape_string($db, $_POST['house_garage']);
    $house_smoke = mysqli_real_escape_string($db, $_POST['house_smoke']);
    $house_internet = mysqli_real_escape_string($db, $_POST['house_internet']);
    $house_pet = mysqli_real_escape_string($db, $_POST['house_pet']);
    $house_image = mysqli_real_escape_string($db, $_POST['house_image']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($house_name)) {
        // array_push($errors, "House name is required");
        header("Location: ./update_house.php?id=$id&error=Housename is required");
    } else if (empty($house_desc)) {
        // array_push($errors, "House description is required");
        header("Location: ./update_house.php?id=$id&error=House description is required");
    } else if (empty($house_addr)) {
        // array_push($errors, "House address is required");
        header("Location: ./update_house.php?id=$id&error=House address is required");
    } else if (empty($house_price)) {
        // array_push($errors, "House price is required");
        header("Location: ./update_house.php?id=$id&error=House price is required");
    } else {
        $query = "UPDATE house  SET house_name = '$house_name', 
                                    house_desc = '$house_desc',
                                    house_addr = '$house_addr', 
                                    house_city = '$house_city', 
                                    house_price = '$house_price',
                                    house_guest = '$house_guest', 
                                    house_num_room = '$house_num_room', 
                                    house_num_bathroom = '$house_num_bathroom', 
                                    
                                    house_checkin = '$house_checkin', 
                                    house_checkout = '$house_checkout', 
                                    house_entire = '$house_entire', 
                                    house_garage = '$house_garage', 
                                    house_smoke = '$house_smoke', 
                                    house_internet = '$house_internet', 
                                    house_pet = '$house_pet', 
                                    house_image = '$house_image'
                                WHERE id = '$id'";
        $result = mysqli_query($db, $query);
        // var_dump($query);
        // var_dump($result);
        // mysqli_query($db, $query);
        // $_SESSION['c_username'] = $c_username;
        // $_SESSION['success'] = "You are now logged in";
        if ($result) {
            header("Location: ../host_dashboard.php?success=successfully created");
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
