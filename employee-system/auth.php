<?php
    session_start();
    require_once 'db_connect.php';
	$user_qry = $conn->query("SELECT * FROM users");
	// $user_qry = $conn->query("SELECT * FROM users WHERE `id` = '".$_SESSION['email']."' ") or die(mysqli_error());
	$user = $user_qry->fetch_array();
	$user_name = $user['fullname'];
?>