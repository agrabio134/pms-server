<?php
include 'db_connect.php';
	extract($_POST);
	$data= array();
	$qry = $conn->query("SELECT * from users where employee_no ='$eno' ");
	if($qry->num_rows > 0){
		$emp = $qry->fetch_array();
		$save_log= $conn->query("INSERT INTO attendance (log_type,users_id) values('$type','".$emp['id']."')");
		$employee = ucwords($emp['fullname'].' '.$emp['email']);
		if($type == 1){
			$log = ' tIme IN Today ';
		}elseif($type == 2){
			$log = ' tIme OUT Today  ';
		// }elseif($type == 3){
		// 	$log = ' time in this afternoon';
		// }elseif($type == 4){
		// 	$log = ' time out this afternoon';
		}
		if($save_log){
				$data['status'] = 1;
				$data['msg'] = $employee .', your '.$log.' has been recorded. <br/>' ;
			}
	}else{
		$data['status'] = 2;
		$data['msg'] = 'Unknown Employee Number';
	}
	echo json_encode($data);
	$conn->close();
