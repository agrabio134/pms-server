<?php
	require_once 'auth.php';
?>
<html>
<html lang = "eng">
	<head>
		<title>Attendance List | Employee System</title>
		<meta charset = "utf-8" />
		<link rel = "stylesheet" type = "text/css" href = "assets/css/bootstrap.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "./assets/css/emp_style.css" />

	<script src = "assets/js/jquery-3.5.1.min.js"></script>
	<script src = "assets/js/bootstrap.min.js"></script>

	</head>
	<body>
			<div class = "alert alert-primary">Attendance Log</div>
			<!-- <div class = "modal fade" id = "delete" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel"> -->
				
			</div>
			<div class = "well col-lg-12">
				<table id="table" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Date</th>
							<th>Log Type</th>
							<th>Time</th>
							<!-- <th>Action</th> -->
						</tr>
					</thead>
					<tbody>
					<?php
						$attendance_qry = $conn->query("SELECT users.*,attendance.* FROM `users` INNER JOIN  `attendance` ON users.id =  attendance.users_id ");	
					
						while($row = $attendance_qry->fetch_array()){
							
					?>	
						<tr>
							<td><?php echo htmlentities($row['fullname'])?></td>
							<td><?php echo date("M. D, Y", strtotime($row['datetime_log']))?></td>
							<?php 
							if($row['log_type'] ==1){
								$log = "TIME IN ";
							}elseif($row['log_type'] ==2){
								$log = "TIME OUT ";
							}
							// elseif($row['log_type'] ==3){
							// 	$log = "TIME IN PM";
							// }elseif($row['log_type'] ==4){
							// 	$log = "TIME OUT PM";
							// }
							?>
							<td><?php echo $log ?></td>
							<td><?php echo date("h:i a", strtotime($row['datetime_log']))?></td>
					</button>
						</td>
						</tr>
						
					<?php
						}
					?>	
					</tbody>
				</table>
			<br />
			<br />	
			<br />	
			</div>
		</div>
		
	</body>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
	
		$(document).ready(function(){
			
			$('.remove_log').click(function(){
				var id=$(this).attr('data-id');
				var _conf = confirm("Are you sure to delete this data ?");
				if(_conf == true){
					
					$.ajax({
						url:'delete_log.php?id='+id,
						// error:err=>console.log(err),
						
						success:function(resp){
							location.reload()
						}
					})
				}
			});
		});
	</script>
</html>