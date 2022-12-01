<?php

include 'db_connect.php';
$statusMsg = '';

$targetDir = "uploads/";
$to = $_POST["email"];
$subject = "Payslip";

// $headers = "From: webmaster@example.com" . "\r\n" .
// "CC: somebodyelse@example.com";
$fileName = basename($_FILES["file"]["name"]);
$emp_num = $_POST["emp_number"];
$body = "Dear ".$emp_num."
%2C%0D%0A Here in attached your Payslip for this month";
$targetFilePath = $targetDir . $fileName;
// echo  "<a href = ../".$targetFilePath." >download</a>";
// $file = "test";
// echo $emp_num;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
// $path = "C:\xampp\htdocs\api\payroll\uploads".$fileName."";

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $allowTypes = array('txt','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert FILES file name into database
            $insert = $conn->query("INSERT into payslip (file_name, emp_num, uploaded_on ) VALUES ('".$fileName."','".$emp_num."', NOW()) ");
            // echo ".$fileName.",".$emp_num.";
            // echo phpinfo();
            // die();.
           
        
            // if(mail($to,$subject,$message,$headers)){
            //     echo "Email sent successfully to $to";
            // }else{
            //     echo "Sorry, failed while sending mail!";
            // }
            // mail($to,$subject,$fileName);
            // echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
            
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.<br><br><a href='mailto:".$to." 
                ?subject=".$subject."&body=".$body ."' 
                style='color:white;background-color:gray;
                text-decoration:none;padding: 15px;
                '>Send email</a>";    
                // $email = $_POST["email"];
                
             
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, file is not allowed';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

echo $statusMsg;
?>