<?php
include "../db_conn.php";
$b_checkin = "";
$b_checkout = "";
$b_guest = "";
echo "hi";
if (isset($_POST['book_now'])) {
    $b_checkin = mysqli_real_escape_string($db, $_POST['b_checkin']);
    $b_checkout = mysqli_real_escape_string($db, $_POST['b_checkout']);
    $b_guest = mysqli_real_escape_string($db, $_POST['b_guest']);
    if (empty($b_checkin)) {
        header("Location: ./login_book.php?id=$id&error=Check in date is required");
    }
    if (empty($b_checkout)) {
        header("Location: ./login_book.php?id=$id&error=Check out date is required");
    }
    if (empty($b_guest)) {
    }
}
?>