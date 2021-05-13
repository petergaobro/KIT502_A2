<?php
session_start();
include "../db_conn.php";
$r_location = "";
$r_rating = "";
$r_comment = "";
$errors = array();


if (isset($_POST['edit_review'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $r_location = mysqli_real_escape_string($db, $_POST['r_location']);
    $r_rating = mysqli_real_escape_string($db, $_POST['r_rating']);
    $r_comment = mysqli_real_escape_string($db, $_POST['r_comment']);

    if (empty($r_location)) {
        header("Location: ./update_review.php?id=$id&error=Location is required");
    } else if (empty($r_rating)) {
        header("Location: ./update_review.php?id=$id&error=Rating  is required");
    } else if (empty($r_comment)) {
        header("Location: ./update_review.php?id=$id&error=Comment is required");
    } else {
        $query = "UPDATE users_review SET r_location = '$r_location', 
                                            r_rating = '$r_rating',
                                            r_comment = '$r_comment'
                                        WHERE id = '$id'";
        $result = mysqli_query($db, $query);
        if ($result) {
            header("Location: ./review.php?success=successfully created");
        } else {
            header("Location: review.php?error=unknown error occurred&$user_data");
        }
    }
} else {
    header("Location: ../view.php");
}
