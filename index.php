<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *" );
header("Access-Control-Allow-Headers: *" );




include 'DbConnect.php';
$objDb = new DbConnect;
$conn = $objDb->connect();



$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case "GET":
        $sql = "SELECT * FROM users";
        $stmt = $conn -> prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
        break;

    case "PUT":
        $user = json_decode( file_get_contents('php://input') );
        $sql = "UPDATE users SET fullname= :fullname, email =:email, department =:department, type =:type , employee_no, :employee_no WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $user->id);
        $stmt->bindParam(':fullname', $user->fullname);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':department', $user->department);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':employee_no', $user->employee_no);

        if($stmt->execute()) {
            $response = ['status' => 1, 'message' => 'Record updated successfully.'];
        } else {
            $response = ['status' => 0, 'message' => 'Failed to update record.'];
        }
        echo json_encode($response);
        break;
        
    case "POST":
        $user = json_decode( file_get_contents('php://input') );
        $password = $user->password;
        $hashedPassword = md5($password);
        $sql = "INSERT INTO users(id, fullname, email, password, department, type, employee_no) VALUES (null, :fullname, :email, :password, :department, :type, :employee_no)";
        $stmt = $conn->prepare($sql);
        $stmt -> bindParam(':fullname',$user->name);
        $stmt -> bindParam(':email',$user->email);
        $stmt -> bindParam(':password',$hashedPassword);
        $stmt -> bindParam(':department',$user->department);
        $stmt -> bindParam(':type',$user->type);
        $stmt -> bindParam(':employee_no',$user->employee_no);

        if ($stmt->execute()) {
            $response = ['status' => 1, 'message' => 'Reacord Added Successfully.'];     
        }else{
            $response = ['status' => 0, 'message' => 'Failed to Add Record.'];
        }
        echo json_encode($response);
        break;

    case "DELETE":
        $sql = "DELETE FROM users WHERE id = :id";
        $path = explode('/', $_SERVER['REQUEST_URI']);

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $path[3]);

        if($stmt->execute()) {
            $response = ['status' => 1, 'message' => 'Record deleted successfully.'];
        } else {
            $response = ['status' => 0, 'message' => 'Failed to delete record.'];
        }
        echo json_encode($response);
        break;
}



