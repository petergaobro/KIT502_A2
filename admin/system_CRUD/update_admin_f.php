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
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $abn = mysqli_real_escape_string($db, $_POST['abn']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($type_user)) {
        header("Location: ./update_admin.php?id=$id&error=Type user is required");
    } else if (empty($username)) {
        header("Location: ./update_admin.php?id=$id&error=Username is required");
    } else if (empty($first_name)) {
        header("Location: ./update_admin.php?id=$id&error=First name is required");
    } else if (empty($last_name)) {
        header("Location: ./update_admin.php?id=$id&error=Last name is required");
    } else if (empty($email)) {
        header("Location: ./update_admin.php?id=$id&error=Email is required");
    } else if (empty($mobile)) {
        header("Location: ./update_admin.php?id=$id&error=Mobile is required");
    } else if (empty($address)) {
        header("Location: ./update_admin.php?id=$id&error=Address is required");
    } else if (empty($country)) {
        header("Location: ./update_admin.php?id=$id&error=Country is required");
    } else if (empty($abn)) {
        header("Location: ./update_admin.php?id=$id&error=ABN is required");
    } else {
        $query = "UPDATE users_admin SET type_user = '$type_user', username = '$username', first_name = '$first_name',
        last_name = '$last_name', email = '$email', mobile = '$mobile',
        address = '$address', country = '$country', abn = '$abn' WHERE id = '$id'";
        $result = mysqli_query($db, $query);
        if ($result) {
            header("Location: ../sys_dashboard.php?success=successfully created");
        } else {
            header("Location: ../sys_dashboard.php?error=unknown error occurred&$user_data");
        }
    }
} else {
    header("Location: ../sys_dashboard.php");
}
