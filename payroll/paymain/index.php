<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap1.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js">
    </script>

    <script src="bootstrap1.min.js"></script>

    <!-- <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    <!-- <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script> -->
    <script src="ajax-jquery.js">
    </script>
</head>

<body>

    <form method="POST" action="compute.php">
        <!-- <h1>PAYROLL</h1> -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="panel panel-default"> -->
                        <div class="panel-heading">

                                <div class="row">
                                    <label>Employee Number</label>
                                </div>
                                <div class="row">
                                    <input type='text' name="employee_no" id='employee_no' class='form-control'
                                        placeholder='Enter Employee Number' onkeyup="GetDetail(this.value)" value="">
                                </div>
                                <div class="row">
                                    <label>Full name:</label>
                                </div>
                                <div class="row">
                                    <input type="text" name="fullname" id="fullname" class="form-control"
                                        placeholder='Full name...' value="" disabled>
                                </div>

                                <div class="row">
                                    <label>Department:</label>
                                </div>
                                <div class="row">
                                    <input type="text" name="department" id="department" class="form-control"
                                        placeholder='Department...' value="" disabled>
                                </div>

                                <div class="row">
                                    <label>Salary Rate: </label>
                                </div>
                                <div class="row">
                                    <input type="text" name="salary" id="salary" class="form-control"
                                        placeholder='Daily Salary...' value="" disabled>
                                </div>

                                <div class="row">
                                    <label>Days Present: </label>
                                </div>
                                <div class="row">
                                    <input type="text" name="days_present" id="days_present" class="form-control"
                                        placeholder='Daily Present...' value="" disabled>
                                </div>

                                <div class="row-btn-container">
                                    <div class="row-btn">
                                        <a href="uploads/payroll.txt" class="btn" download> Download payslip</a>
                                    </div>
                                    <div class="row-btn">
                                        <input type="submit" class="btn" name="compute" value="Compute Salary" />
                                    </div>
                                </div>
                          
                        <!-- </div> -->
                    </div>
                </div>

            </div>
        </div>
    </form>

</body>


<script>
function GetDetail(str) {
    if (str.length == 0) {
        document.getElementById("fullname").value = "";
        // document.getElementById("email").value = "";
        document.getElementById("department").value = "";
        // document.getElementById("type").value = "";
        document.getElementById("salary").value = "";
        document.getElementById("days_present").value = "";

        // document.getElementById("datetime_log").value = "";
        return;
    } else {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 &&
                this.status == 200) {

                var myObj = JSON.parse(this.responseText);


                document.getElementById("fullname").value = myObj[0];
                // document.getElementById ("email").value = myObj[1];
                document.getElementById("department").value = myObj[1];
                // document.getElementById ("type").value = myObj[2];
                document.getElementById("salary").value = myObj[2];
                document.getElementById("days_present").value = myObj[3];
                // document.getElementById ("datetime_log").value = myObj[4];




            }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "auto_search.php?employee_no=" + str, true);

        // Sends the request to the server
        xmlhttp.send();
    }
}
</script>


</html>