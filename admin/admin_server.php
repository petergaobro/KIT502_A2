<?php
session_start();
// connect to the database
include "../db_conn.php";
// initializing variables
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





// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $type_user = mysqli_real_escape_string($db, $_POST['type_user']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $abn = mysqli_real_escape_string($db, $_POST['abn']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($type_user)) {
    array_push($errors, "Type of user is required");
  }
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($first_name)) {
    array_push($errors, "First name is required");
  }
  if (empty($last_name)) {
    array_push($errors, "Last name is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($mobile)) {
    array_push($errors, "Mobile is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }
  if (empty($address)) {
    array_push($errors, "Address is required");
  }
  if (empty($country)) {
    array_push($errors, "Country is required");
  }
  if (empty($abn)) {
    array_push($errors, "ABN is required");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users_admin WHERE username='$username' OR email='$email' OR mobile='$mobile' OR abn='$abn' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
    if ($user['mobile'] === $mobile) {
      array_push($errors, "Mobile already exists");
    }
    if ($user['abn'] === $abn) {
      array_push($errors, "ABN already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1); //encrypt the password before saving in the database

    $query = "INSERT INTO users_admin (type_user, username, first_name, last_name, email, mobile, address, password, country, abn) 
  			  VALUES('$type_user', '$username', '$first_name', '$last_name', '$email', '$mobile', '$address', '$password', '$country', '$abn')";
    mysqli_query($db, $query);
    if ($type_user == "System manager") {
      $_SESSION['username'] = $username;
      // $_SESSION['success'] = "You are now logged in";
      header('location: sys_dashboard.php');
    } else {
      $_SESSION['username'] = $username;
      // $_SESSION['success'] = "You are now logged in";
      header('location: host_dashboard.php');
    }
  }
}






// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $type_user = mysqli_real_escape_string($db, $_POST['type_user']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (empty($type_user)) {
    array_push($errors, "Type of user is required");
  }
  // echo "asf";

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users_admin WHERE username='$username' AND type_user='$type_user' AND password='$password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_assoc($results);

      if ($row['type_user'] == 'System manager') {

        $_SESSION['username'] = $row['username'];
        $_SESSION['type_user'] = $row['type_user'];
        // $_SESSION['success']  = "You are now logged in";
        header('location: sys_dashboard.php');
      } else if ($row['type_user'] == 'Host') {
        $_SESSION['username'] = $row['username'];
        $_SESSION['type_user'] = $row['type_user'];
        // $_SESSION['success']  = "You are now logged in";
        header('location: host_dashboard.php');
      } else {
        array_push($errors, "Wrong! Your entry doesn't match, please try again.");
      }
    } else {
      array_push($errors, "Wrong! Your entry doesn't match, please try again.");
    }
  }
}


// if (count($errors) == 0) {
//   $password = md5($password);
//   $query = "SELECT * FROM users_admin WHERE username='$username' AND type_user='$type_user' AND password='$password'";
//   $results = mysqli_query($db, $query);
  
//   if (mysqli_num_rows($results) == 1) {
//     $_SESSION['username'] = $username;
//     $_SESSION['type_user'] = $type_user;
//     $_SESSION['success'] = "You are now logged in";
//     header('location: index.php');
//   } else {
//     array_push($errors, "Wrong! Your entry doesn't match, please try again.");
//   }
// }


// if (count($errors) == 0) {
//   $password = md5($password);
//   $query = "SELECT * FROM users_admin WHERE username='$username' AND type_user='$type_user' AND password='$password'";
//   $results = mysqli_query($db, $query);

//   if (mysqli_num_rows($results) === 1) {
//     $row = mysqli_fetch_assoc($result);
//     if ($row['password'] === $password && $type_user['type_user'] == $type_user) {
//       $_SESSION['username'] = $row['username'];
//       $_SESSION['type_user'] = $row['type_user'];
//       $_SESSION['first_name'] = $row['first_name'];
//       $_SESSION['last_name'] = $row['last_name'];
//       $_SESSION['email'] = $row['email'];
//       $_SESSION['mobile'] = $row['mobile'];
//       $_SESSION['address'] = $row['address'];
//       $_SESSION['country'] = $row['country'];
//       $_SESSION['abn'] = $row['abn'];
//       $_SESSION['success'] = "You are now logged in";
//       header('location: system_man.php');
//     }
//     else{
//       array_push($errors, "Wrong! Your entry doesn't match, please try again.");
//     }
//   } 
//   else {
//     array_push($errors, "Wrong! Your entry doesn't match, please try again.");
//   }
// }


      // if ($row['password'] === $password && $row['type_user'] == $type_user) {
      //   $_SESSION['id'] = $row['id'];
      //   $_SESSION['username'] = $row['username'];
      //   $_SESSION['type_user'] = $row['type_user'];

      //   $_SESSION['success'] = "You are now logged in";

      //   if ($_SESSION['type_user'] == 'system manager') {
      //     header('location: system_man.php');
      //   } else if($_SESSION['type_user'] == 'host') {
      //     header('location: host.php');
      //   } else{
      //     array_push($errors, "Wrong! Your entry doesn't match.");
      //   }


      