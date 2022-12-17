<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *" );
header("Access-Control-Allow-Headers: *" );
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");



include 'DbConnect.php';
$objDb = new DbConnect;
$conn = $objDb->connect();



$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case "GET":
        break;
    case "POST":
        break;
  
    case "PUT":
        $user = json_decode( file_get_contents('php://input') );
        $sql = "UPDATE users SET fullname = :fullname, birthdate = :birthdate, birthplace = :birthplace	,
        address = :address, sex = :sex, citezenship = :citezenship, email =:email, password = :password, department = :department, 
        type =:type, salary = :salary , employee_no = :employee_no WHERE id = :id";
        
        
        $stmt = $conn->prepare($sql);
        $stmt -> bindParam(':id', $user->id);
        $stmt -> bindParam(':fullname',$user->fullname);
        $stmt -> bindParam(':birthdate',$user->birthdate);
        $stmt -> bindParam(':birthplace',$user->birthplace);
        $stmt -> bindParam(':address',$user->address);
        $stmt -> bindParam(':sex',$user->sex);
        $stmt -> bindParam(':citezenship',$user->citezenship);
        $stmt -> bindParam(':email',$user->email);
        $stmt -> bindParam(':password',$hashedPassword);
        $stmt -> bindParam(':department',$user->department);
        $stmt -> bindParam(':type',$user->type);
        $stmt -> bindParam(':salary',$user->salary);
        $stmt -> bindParam(':employee_no',$user->employee_no);

        if($stmt->execute()) {
            $response = ['status' => 1, 'message' => 'Record updated successfully.'];
        } else {
            $response = ['status' => 0, 'message' => 'Failed to update record.'];
        }
        echo json_encode($response);
        break;
    case "DELETE":
        break;
}