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
        $sql = "SELECT * FROM users WHERE is_archive = 1";
        $stmt = $conn -> prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
        break;

    case "PUT":
        $sql = "UPDATE users SET is_archive = 0 WHERE id = :id";
        $path = explode('/', $_SERVER['REQUEST_URI']);
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $path[3]);
    
        if($stmt->execute()) {
                $response = ['status' => 1, 'message' => 'Record unarchived successfully.'];
            } else {
                $response = ['status' => 0, 'message' => 'Failed to unarchived record.'];
            }
            echo json_encode($response);
            break;
        
    case "POST":
        break;

    case "DELETE":
        break;

    
}