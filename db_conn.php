<?php  
$db = mysqli_connect('localhost', 'root', '', 'test_db');


if (!$db) {
	echo "Connection Failed!";
	exit();
}