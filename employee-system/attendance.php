<?php
	require_once 'auth.php';
?>
<html>
<html lang="eng">

<head>
    <title>Attendance List | Employee Attendance Record System</title>
    <?php include('header.php') ?>
</head>

<body>
    <style>
    .btn-up {
        display: inline-block;
        margin-left: 10px;
        width: 200px;
        text-align: center;
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
    }

    .item-label {
        background-color: rgb(107, 124, 150);
        color: white;
        width: 150px;
        padding: 5px;
        /* border-radius: 5px; */
    }
	.label {
        background-color: rgb(107, 124, 150);
        color: white;
        /* border-radius: 5px; */
    }
    </style>
    <div class="label alert-primary alert">Attendance List</div>

    <form method="POST" action="../payroll/paymain/update.php">
        <div class="form-group">
            <!-- <label>Employee Number</label> -->
            <input type='text' name="employee_no" id='employee_no' class='form-control'
                placeholder='Enter Employee Number' onkeyup="GetDetail(this.value)" value="">
        </div>

        <input type="submit" class="btn-up" name="compute" value="Update Attendance" />

    </form>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModallabel">

    </div>
    <div class="well col-lg-12">
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="item-label">Employee Number</th>
                    <th class="item-label">Name</th>
                    <th class="item-label">Date</th>
                    <th class="item-label">Log Type</th>
                    <th class="item-label">Time</th>
                    <th class="item-label">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
						$attendance_qry = $conn->query("SELECT users.*,attendance.* FROM `users` INNER JOIN  `attendance` ON users.id =  attendance.users_id ");	
					
						while($row = $attendance_qry->fetch_array()){
							
					?>
                <tr>
                    <td><?php echo $row['employee_no']?></td>
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
                    <td><button data-id="<?php echo $row['id']?>" class="btn btn-sm btn-outline-danger remove_log"
                            type="button"><i class="fa fa-trash"></i>
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
<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable();
});
</script>
<script type="text/javascript">
$(document).ready(function() {

    $('.remove_log').click(function() {
        var id = $(this).attr('data-id');
        var _conf = confirm("Are you sure to delete this data ?");
        if (_conf == true) {

            $.ajax({
                url: 'delete_log.php?id=' + id,
                // error:err=>console.log(err),

                success: function(resp) {
                    location.reload()
                }
            })
        }
    });
});
</script>

</html>