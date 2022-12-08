<?php

// Get the user id
$employee_no = $_REQUEST['employee_no'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "server_pms");

if ($employee_no !== "") {
	
	$query = mysqli_query($con, "SELECT * FROM users WHERE employee_no='$employee_no'");
	// $query1 = mysqli_query($con, "SELECT COUNT(datetime_log) FROM attendance WHERE users_id='$users_id'");
	
	

	$row = mysqli_fetch_array($query);
	
	$fullname = $row["fullname"];
	// $email = $row["email"];
	$department = $row["department"];
	// $type = $row["type"];
	$salary = $row["salary"];

	$days_present = $row["days_present"];

	// $row1 = mysqli_fetch_all($query1);
	// $datetime_log = $row1["datetime_log"];
	// $email = $row["email"];3

// 	SELECT COUNT(datetime_log)
// FROM attendance WHERE attendance_id = 1;



}


// Store it in a array
$result = array("$fullname", "$department", "$salary", "$days_present" );

$myJSON = json_encode($result);
echo $myJSON;
?>
