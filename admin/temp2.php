<?php

if (isset($_GET['id'])) {
        include "db_conn.php";

        function validate($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }

        $id = validate($_GET['id']);

        $sql = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        } else {
                header("Location: read.php");
        }
} else if (isset($_POST['update'])) {
        include "../db_conn.php";
        function validate($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }

        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $id = validate($_POST['id']);

        if (empty($name)) {
                header("Location: ../update.php?id=$id&error=Name is required");
        } else if (empty($email)) {
                header("Location: ../update.php?id=$id&error=Email is required");
        } else {

                $sql = "UPDATE users
               SET name='$name', email='$email'
               WHERE id=$id ";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                        header("Location: ../read.php?success=successfully updated");
                } else {
                        header("Location: ../update.php?id=$id&error=unknown error occurred&$user_data");
                }
        }
} else {
        header("Location: read.php");
}









// -------------
else if (isset($_POST['update_cust_ad'])) {
    include "../../db_conn.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_POST['id']);
    $c_username = validate($_POST['c_username']);
    $c_first_name = validate($_POST['c_first_name']);
    $c_last_name = validate($_POST['c_last_name']);
    $c_email = validate($_POST['c_email']);
    $c_mobile = validate($_POST['c_mobile']);
    $c_address = validate($_POST['c_address']);
    $c_country = validate($_POST['c_country']);

    if (empty($c_username)) {
        header("Location: ./update_cust.php?id=$id&error=Username is required");
    } else if (empty($c_first_name)) {
        header("Location: ./update_cust.php?id=$id&error=First name is required");
    } else if (empty($c_last_name)) {
        header("Location: ./update_cust.php?id=$id&error=Last name is required");
    } else if (empty($c_email)) {
        header("Location: ./update_cust.php?id=$id&error=Email is required");
    } else if (empty($c_mobile)) {
        header("Location: ./update_cust.php?id=$id&error=Mobile is required");
    } else if (empty($c_address)) {
        header("Location: ./update_cust.php?id=$id&error=Address is required");
    } else if (empty($c_country)) {
        header("Location: ./update_cust.php?id=$id&error=Country is required");
    } else {
        $query = "UPDATE users_customer 
        SET c_username = '$c_username', 
            c_first_name = '$c_first_name',
            c_last_name = '$c_last_name',
            c_email = '$c_email',
            c_mobile = '$c_mobile',
            c_address = '$c_address',
            c_country = '$c_country'
        WHERE id = $id";
        $result = mysqli_query($db, $query);
        if ($result) {
            header("Location: ./update_cust.php?success=successfully updated");
        } else {
            header("Location: ./update_cust.php?id=$id&error=unknown error occurred&$user_data");
        }
    }
} else {
    header("Location: ../sys_dashboard.php");
}