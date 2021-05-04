<?php  

include "../db_conn.php";

$sql_customer = "SELECT * FROM users_customer ORDER BY id ASC";
$result = mysqli_query($db, $sql_customer);

$sql_admin = "SELECT * FROM users_admin ORDER BY id ASC";
$result_admin = mysqli_query($db, $sql_admin);