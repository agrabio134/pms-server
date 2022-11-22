<?php
require_once("../DbConnect.php");

?>
<html>


<head>
    <link rel="stylesheet" href="./pay-style.css">
</head>


<body>
<div class="main-container">
    <form method="POST" action="sub_data.php">

            <div class="payroll-container">

                    <div class="payroll-item">
                        <label>Employee number: <label>
                    </div>
                    <div class="payroll-item">
                         <input type="number" required name="emp_num" size="8" value="<?= $emp_num; ?>" />
                    </div>
                    
                    <div class="payroll-item">
                        <label>Number of Days Work: <label>
                    </div>

                    <div class="payroll-item">
                         <input type="number" required name="days_work" size="8" value="<?= $days_work; ?>" />
                    </div>

                    <div class="payroll-item">
                        <label>Number of Absent: <label>
                    </div>

                    <div class="payroll-item">
                        <input type="number" required name="days_absent" size="8" value="<?= $days_absent; ?>" />
                    </div>

                    <div class="payroll-item">
                        <label>Total hours of Overtime:<label>
                    </div>

                    <div class="payroll-item">
                        <input type="number" required name="overtime" size="8" value="<?= $overtime; ?>" />
                    </div>

                    <div class="payroll-item">
                        <label>Rate Per Day: <label>
                    </div>

                    <div class="payroll-item">
                        <input type="number" required name="interest_rate" size="8" value="<?= $rate; ?>" />
                    </div>

                    <div class="payroll-item"> 
                    <a href="newfile.txt" class="btn" download> Download payslip</a>
                    </div>

                    <div class="payroll-item"> 
                        <input type="submit" class="btn"  name="compute" value="Compute Salary" />
                    </div>
                    

                </form>

                
              
        
            </div>
             
    
            <div class="payroll-container">

                
            </div>
            

               

            
</body>
</html>