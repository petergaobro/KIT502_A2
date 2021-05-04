<?php
session_start();
include "db_conn.php";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
$type_user = test_input($_POST['type_user']);

if (empty($username)) {
    header("Location: login.php?error=User Name is Required");
} else if (empty($password)) {
    header("Location: login.php?error=Password is Required");
    // array_push($errors, "Wrong! Your entry should not be empty, please try again.");
} else {

    // Hashing the password
    $password = md5($password);

    $sql = "SELECT * FROM users_admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) === 1) {
        // the user name must be unique
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] === $password && $row['type_user'] == $type_user) {
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['type_user'] = $row['type_user'];
            $_SESSION['username'] = $row['username'];
            if ($_SESSION['type_user'] == 'System manager') {
                header('location: ./php/sys_dashboard.php');
            }
            else {
                header('location: ./php/host_dashboard.php');
            }
            // header("Location: ../system_man.php");
            // header('location: system_man.php');
        } else {
            header("location: login.php?error=Incorect User name or password");
        }
    } else {
        header("location: login.php?error=Incorect User name or password");
    }
}
