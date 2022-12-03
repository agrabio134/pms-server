<?php

try{
    $pdo = new PDO("mysql:host=localhost;dbname=server_pms", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

try{
    if(isset($_REQUEST["term"])){
        $sql = "SELECT * FROM users WHERE email LIKE :term";
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST["term"] . '%';
        $stmt->bindParam(":term", $term);

        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                // echo "<p>" . $row["fullname"] . "</p>";
                echo "<p>" . $row["email"] . "</p>";
            }
        } else{
            echo "<p>No matches found</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    if(isset($_REQUEST["num_term"])){
        $sql = "SELECT * FROM users WHERE email LIKE :num_term";
        $stmt = $pdo->prepare($sql);
        $num_term = $_REQUEST["num_term"] . '%';
        $stmt->bindParam(":num_term", $num_term);

        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                // echo "<p>" . $row["fullname"] . "</p>";
                echo "<p>" . $row["employee_no"] . "</p>";
            }
        } else{
            echo "<p>No matches found</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($stmt);

unset($pdo);
?>