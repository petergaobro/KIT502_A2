<?php

include "../db_conn.php";

$sql_q_a = "SELECT * FROM Q_A ORDER BY id ASC";
$result_q_a = mysqli_query($db, $sql_q_a);