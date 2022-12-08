<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "server_pms";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
      
    // Check connection
    if(!$connection){
        die('Database connection error : ' .mysql_error());
    }
    
 
    $output = '';
    if(isset($_POST["query"]))
    {
     $search = mysqli_real_escape_string($connection, $_POST["query"]);
     $query = "SELECT * FROM users
    WHERE employee_no LIKE '%".$search."%' ";}
    else
    {
     $query = "SELECT * FROM users";
    }
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0)
    {
     $output .= '
      <div class="table-responsive">
       <table class="table table bordered">
       <tr>
         <th>employee_no</th>
         <th>Full Name</th>
         <th>Department</th>
         <th>Type</th>
         <th>Monthly Salary</th>
         <th>Action</th>
        </tr>';
     while($row1 = mysqli_fetch_array($result))
     {
      $output .= '
      <tr>
        <td>'.$row1["employee_no"].'</td>
        <td>'.$row1["fullname"].'</td>
        <td>'.$row1["department"].'</td>
        <td>'.$row1["type"].'</td>
        <td>'.$row1["salary"].'</td>
        <td>"<input  data-id = '.$row1["id"].'  type="button"  onClick= "selectUser()">
        </input>"</td>
       </tr>
      ';
     }
     echo $output;
    }
    else
    {
     echo 'Record Not Found';
    }
?>
<script>
    const selectUser = () =>{
        alert("Clicked")
        // document.getElementById("id").value = "1";
        let row = document.getElementById("query").value = "SELECT * FROM users WHERE id = 1";
        document.getElementById("query").value = "";
        
        // $row1
        console.log(row)
        // $query = "SELECT * FROM users where id =";


        
    }
</script>