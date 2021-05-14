<?php

if (isset($_GET['id'])) {
    include "../../db_conn.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "DELETE FROM users_customer
	        WHERE id=$id";
    $result = mysqli_query($db, $sql);
    if ($result) {
        echo "<script type='text/javascript'>alert('Delete Successfully');window.location.href='../sys_dashboard.php';</script>";
    } else {
        header("Location: ../sys_dashboard.php?error=unknown error occurred&$user_data");
    }
} else {
    header("Location: ../sys_dashboard.php");
}
