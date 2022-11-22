<?php
include 'db_connect.php';


$days_work = $absent = $overtime = $deduction = $bonus = $rate = $g_sal = $tax = $sss = $n_sal = 0;

if (isset($_POST['compute'])) {


    $emp_num = $_POST['emp_num'];
    $days_work = $_POST['days_work'];
    $days_absent = $_POST['days_absent'];
    $overtime = $_POST['overtime'];
    $rate = $_POST['interest_rate'];

    $g_sal = $days_work * $rate;
    $deduction = ($rate * $days_absent);
    $r_overtime = 1.25;
    $bonus = ($rate * 0.170) * $overtime;
    $tax = $g_sal * .12;
    $sss = $g_sal * .13;

    $n_sal = $g_sal - $tax - $sss - $deduction + $bonus;




    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

    $txt = "\t\tSalary Slip\n";
    fwrite($myfile, $txt);

    $outp = $emp_num;
    $txt = "Employee Number: \t". $outp ."\n";
    fwrite($myfile, $txt);

    $qry = $conn->query("SELECT * from users where employee_no ='$emp_num' ");

    if($qry->num_rows > 0){
		$emp = $qry->fetch_array();

    $outp = ucwords($emp['fullname']);
    $txt = "name: \t\t\t". $outp ."\n";
    fwrite($myfile, $txt);

    $outp = ucwords($emp['email']);
    $txt = "Email: \t\t\t". $outp ."\n";
    fwrite($myfile, $txt);

    $outp = ucwords($emp['department']);
    $txt = "Department: \t\t". $outp ."\n\n";
    fwrite($myfile, $txt);


    }

    // $txt = "Department: \n";
    // fwrite($myfile, $txt);


    $outp = number_format($g_sal, 2);
    $txt = "Gross Salary:\t\t ₱" . $outp . "\n";
    fwrite($myfile, $txt);
    $outp = number_format($deduction, 2);
    $txt = "Deduction:\t\t ₱" . $outp . "\n";
    fwrite($myfile, $txt);
    $outp = number_format($bonus, 2);
    $txt = "Bonus Overtime:\t\t ₱" . $outp . "\n";
    fwrite($myfile, $txt);
    $outp = number_format($tax, 2);
    $txt = "Tax:\t\t\t ₱" . $outp . "\n";
    fwrite($myfile, $txt);
    $outp = number_format($sss, 2);
    $txt = "SSS:\t\t\t ₱" . $outp . "\n\n";
    fwrite($myfile, $txt);
    $outp = number_format($n_sal, 2);
    $txt = "Net Salary:\t\t ₱" . $outp . "\n";
    fwrite($myfile, $txt);

    fclose($myfile);


}

extract($_POST);
	$data= array();
	$qry = $conn->query("SELECT * from users where employee_no ='$emp_num' ");

    if($qry->num_rows > 0){
		$emp = $qry->fetch_array();
		$save_log= $conn->query("INSERT INTO salary (gross_salary,deduction,tax,sss,net_salary,users_id) 
        values('$g_sal','$deduction','$tax','$sss','$n_sal','".$emp['id']."')");

        $employee = ucwords($emp['fullname'].' '.$emp['email']);
        
		if($save_log){
				$data['status'] = 1;
				$data['msg'] = $employee .', your data has been recorded. <br/>' ;
                header("location: ./index.php");
			}
	}else{
		$data['status'] = 2;
		$data['msg'] = 'Unknown Employee Number';
	}
	echo json_encode($data);
	$conn->close();
