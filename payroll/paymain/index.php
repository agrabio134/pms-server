<html>

<head>
	<script src=
		"https://code.jquery.com/jquery-3.2.1.min.js">
	</script>

	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
		type="text/javascript">
	</script>
	
	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
</head>

<body>
	<div class="container">
		<form method="POST" action="compute.php">
		<h1>PAYROLL</h1>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Employee Number</label>
					<input type='text' name="employee_no"
						id='employee_no' class='form-control'
						placeholder='Enter Employee Number'
						onkeyup="GetDetail(this.value)" value="">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Fullname:</label>
					<input type="text" name="fullname"
						id="fullname" class="form-control"
						placeholder='Fullname...'
						value="">
				</div>
			</div>
		</div>

        <div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Department:</label>
					<input type="text" name="department"
						id="department" class="form-control"
						placeholder='Department...'
						value="">
				</div>
			</div>
		</div>
   
        <div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Salary Rate: </label>
					<input type="text" name="salary"
						id="salary" class="form-control"
						placeholder='Daily Salary...'
						value="">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Days Present: </label>
					<input type="text" name="days_present"
						id="days_present" class="form-control"
						placeholder='Daily Present...'
						value="">
				</div>
			</div>
		</div>
		<a href="uploads/payroll.txt" class="btn" download> Download payslip</a>

		<input type="submit" class="btn"  name="compute" value="Compute Salary" />
	</form>
	

	</div>
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
			}
			else {

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					if (this.readyState == 4 &&
							this.status == 200) {
				
						var myObj = JSON.parse(this.responseText);

		
						document.getElementById ("fullname").value = myObj[0];
                        // document.getElementById ("email").value = myObj[1];
                        document.getElementById ("department").value = myObj[1];
                        // document.getElementById ("type").value = myObj[2];
                        document.getElementById ("salary").value = myObj[2];
						document.getElementById ("days_present").value = myObj[3];
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
</body>

</html>
