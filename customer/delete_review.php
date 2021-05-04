<?php

if (isset($_GET['id'])) {
    include "../db_conn.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "DELETE FROM users_review
         WHERE id=$id";
    $result = mysqli_query($db, $sql);
    if ($result) {
        header("Location: ./review.php?success=successfully deleted");
    } else {
        header("Location: ./review.php?error=unknown error occurred&$user_data");
    }
} else {
    header("Location: ./review.php");
}
