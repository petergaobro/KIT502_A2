<?php

include "../db_conn.php";

$sql_customer = "SELECT * FROM house ORDER BY id ASC";
$result = mysqli_query($db, $sql_customer);


