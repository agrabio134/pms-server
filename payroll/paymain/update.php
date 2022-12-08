<?php
include '../db_connect.php';
$employee_no = $_POST['employee_no'];
// $id = 31;


foreach($conn->query('SELECT COUNT(datetime_log) FROM attendance') as $row) {
echo "<tr>";
echo "<td>" . $num = $row['COUNT(datetime_log)'] . "</td>";
echo "</tr>";
}

$conn->query("UPDATE users SET days_present = '$num' where employee_no = $employee_no");

        
    


?>
