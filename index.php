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
        $sql = "SELECT * FROM users WHERE is_archive = 0";
        $stmt = $conn -> prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
        break;

    case "PUT":
        $sql = "UPDATE users SET is_archive = CASE
        WHEN is_archive = 0 THEN 1 ELSE 0 END  WHERE id = :id";
        $path = explode('/', $_SERVER['REQUEST_URI']);
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $path[3]);
    
        if($stmt->execute()) {
                $response = ['status' => 1, 'message' => 'Record archived successfully.'];
            } else {
                $response = ['status' => 0, 'message' => 'Failed to archived record.'];
            }
            echo json_encode($response);
            break;
        // case "PUT":
        //         $sql = "UPDATE users SET is_archive = 1 WHERE id = :id";
        //         $path = explode('/', $_SERVER['REQUEST_URI']);
            
        //         $stmt = $conn->prepare($sql);
        //         $stmt->bindParam(':id', $path[3]);
            
        //         if($stmt->execute()) {
        //                 $response = ['status' => 1, 'message' => 'Record archived successfully.'];
        //             } else {
        //                 $response = ['status' => 0, 'message' => 'Failed to archived record.'];
        //             }
        //             echo json_encode($response);
        //             break;
        
    case "POST":
        $user = json_decode( file_get_contents('php://input') );
        $password = $user->password;
        $hashedPassword = md5($password);
        $sql = "INSERT INTO users(id, fullname, birthdate, birthplace, address, 
        sex, citezenship, email, password, department, type, salary, employee_no) VALUES (null, :fullname,:birthdate,
        :birthplace,:address,  :sex, :citezenship, :email, :password, :department, :type, :salary, :employee_no)";
        $stmt = $conn->prepare($sql);
        $stmt -> bindParam(':fullname',$user->name);
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