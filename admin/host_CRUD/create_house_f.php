<?php
session_start();
// connect to the database
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





// REGISTER USER
if (isset($_POST['create_house_host'])) {
    // receive all input values from the form
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
        array_push($errors, "House name is required");
    }
    if (empty($house_desc)) {
        array_push($errors, "House description is required");
    }
    if (empty($house_addr)) {
        array_push($errors, "House address is required");
    }
    if (empty($house_price)) {
        array_push($errors, "House price is required");
    }
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM house WHERE house_name='$house_name' OR house_addr='$house_addr' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['house_name'] === $house_name) {
            array_push($errors, "House name already exists");
        }

        if ($user['house_addr'] === $house_addr) {
            array_push($errors, "House address already exists");
        }
    }

    // Finally, create house
    if (count($errors) == 0) {
        $query = "INSERT INTO house (
                                    house_name, 
                                    house_desc, 
                                    house_addr, 
                                    house_city, 
                                    house_price, 
                                    house_guest, 
                                    house_num_room, 
                                    house_num_bathroom, 
                                    house_checkin, 
                                    house_checkout, 
                                    house_entire, 
                                    house_garage, 
                                    house_smoke, 
                                    house_internet, 
                                    house_pet, 
                                    house_image) 
                VALUES(
                        '$house_name',
                        '$house_desc',
                        '$house_addr', 
                        '$house_city', 
                        '$house_price', 
                        '$house_guest', 
                        '$house_num_room', 
                        '$house_num_bathroom', 
                        '$house_checkin', 
                        '$house_checkout', 
                        '$house_entire', 
                        '$house_garage', 
                        '$house_smoke', 
                        '$house_internet', 
                        '$house_pet', 
                        '$house_image')";
        mysqli_query($db, $query);
        // $_SESSION['c_username'] = $c_username;
        // $_SESSION['success'] = "You are now logged in";
        header('location: ../host_dashboard.php');
    }
}
