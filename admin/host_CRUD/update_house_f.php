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

if (isset($_POST['edit_house'])) {
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
    } else  {
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
        if ($result) {
            echo "<script type='text/javascript'>alert('Update Successfully');window.location.href='../host_dashboard.php';</script>";
        } else {
            header("Location: ../host_dashboard.php?error=unknown error occurred&$user_data");
        }
    }
} else {
    header("Location: ../host_dashboard.php");
}
