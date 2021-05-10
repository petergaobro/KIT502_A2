<?php

include "../db_conn.php";

$sql_customer_detail = "SELECT * FROM users_customer ORDER BY id ASC";
$result_customer_detail = mysqli_query($db, $sql_customer_detail);


