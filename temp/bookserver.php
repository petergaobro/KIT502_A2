<?php
session_start();
// connect to the database
include "../db_conn.php";
// initializing variables
// $Location = "";
// $checkin = "";
// $checkout = "";
// $guest = "";
// $price = "";


// $house_city = "";
// $house_checkin = "";
// $house_checkout = "";
// $house_guest = "";

$b_first_name = "";
$b_last_name = "";
$b_email = "";
$b_mobile = "";
$errors = array();



// // search function
// if (isset($_POST['search_client'])) {
//     // receive all input values from the form
//     $Location = mysqli_real_escape_string($db, $_POST['Location']);
//     $checkin = mysqli_real_escape_string($db, $_POST['checkin']);
//     $checkout = mysqli_real_escape_string($db, $_POST['checkout']);
//     $guest = mysqli_real_escape_string($db, $_POST['guest']);
//     // $price = mysqli_real_escape_string($db, $_POST['price']);

//     // form validation: ensure that the form is correctly filled ...
//     // by adding (array_push()) corresponding error unto $errors array
//     if (empty($Location)) {
//         array_push($errors, "Location is required");
//     }
//     if (empty($checkin)) {
//         array_push($errors, "Check in is required");
//     }
//     if (empty($checkout)) {
//         array_push($errors, "Check out is required");
//     }
//     if (empty($guest)) {
//         array_push($errors, "Guest is required");
//     }
//     if (empty($price)) {
//         array_push($errors, "Price is required");
//     }
//     // Finally, register user if there are no errors in the form
//     if (count($errors) == 0) {
//         $c_password = md5($password_c1); //encrypt the password before saving in the database

//         $query = "INSERT INTO booking (Location, checkin, checkout, guest, price) 
//   			  VALUES('$Location', '$checkin', '$checkout', '$guest', '$price')";
//         mysqli_query($db, $query);
//         // $_SESSION['c_username'] = $c_username;
//         $_SESSION['success'] = "Here is your search";
//         header('location: login_book.php');
//     }
// }

// confirm booking
if (isset($_POST['confirm_book'])) {
    // $house_city = mysqli_real_escape_string($db, $_POST['house_city']);
    // $house_checkin = mysqli_real_escape_string($db, $_POST['house_checkin']);
    // $house_checkout = mysqli_real_escape_string($db, $_POST['house_checkout']);
    // $house_guest = mysqli_real_escape_string($db, $_POST['house_guest']);
    // receive all input values from the form
    $b_first_name = mysqli_real_escape_string($db, $_POST['b_first_name']);
    $b_last_name = mysqli_real_escape_string($db, $_POST['b_last_name']);
    $b_email = mysqli_real_escape_string($db, $_POST['b_email']);
    $b_mobile = mysqli_real_escape_string($db, $_POST['b_mobile']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($b_first_name)) {
        array_push($errors, "First name is required");
    }
    if (empty($b_last_name)) {
        array_push($errors, "Last name in is required");
    }
    if (empty($b_email)) {
        array_push($errors, "Email is required");
    }
    if (empty($b_mobile)) {
        array_push($errors, "mobile is required");
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        // $c_password = md5($password_c1); //encrypt the password before saving in the database

        $query = "INSERT INTO booking  (house_city,
                                        house_checkin,
                                        house_checkout,
                                        house_guest,
                                        b_first_name, 
                                        b_last_name, 
                                        b_email, 
                                        b_mobile) 
  			    VALUES ('$house_city', 
                        '$house_checkin', 
                        '$house_checkout', 
                        '$house_guest', 
                        '$b_first_name', 
                        '$b_last_name', 
                        '$b_email', 
                        '$b_mobile')";
        mysqli_query($db, $query);
        // $_SESSION['c_username'] = $c_username;
        $_SESSION['success'] = "You are now booked successfully";
        header('location: review.php');
    }
}
