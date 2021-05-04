<?php

include "../db_conn.php";

$sql_order = "SELECT * FROM booking ORDER BY id ASC";
$result_order = mysqli_query($db, $sql_order);
