<?php

include "../db_conn.php";

$sql_order = "SELECT * FROM users_review ORDER BY id ASC";
$result_review = mysqli_query($db, $sql_order);