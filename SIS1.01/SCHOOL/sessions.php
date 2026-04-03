<?php 
include('class/School.php');
$school = new School();
$school->adminLoginStatus();
include('inc/header.php');
?>
<title>School Management System</title>
<?php include('include_files.php');?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/sessions.js"></script>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div class="content">
		<div class="container-fluid">
			<div>   
				<a href="#"><strong><span class="ti-timer"></span> Sessions Section</strong></a>
				<hr>		
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title"></h3>
						</div>
						<div class="col-md-2" align="right">
							<button type="button" name="add" id="addSession" class="btn btn-success btn-xs">Add New Session</button>
						</div>
					</div>
				</div>
				<table id="sessionList" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>ID</th>
							<th>Sessions</th>											
							<th>Start</th>
							<th>End</th>		
							<th></th>
							<th></th>							
						</tr>
					</thead>
				</table>
				
			</div>			
		</div>		
	</div>	
</div>	
<div id="sessionModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="sessionForm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Session</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="session_name" class="control-label">Session Name*</label>
						<input type="text" class="form-control" id="session_name" name="session_name" placeholder="Session Name" required>							
					</div>									
					<div class="form-group">
						<label for="session_start" class="control-label">Start*</label>	
						<select name="session_start" id="session_start" class="form-control" onFocus="document.getElementById('sessionstart').value=this.value;" required>
							<option value="">Select</option>
							<?php echo $school->getStartOptions(); ?>	
						</select>
					</div>	
					<div class="form-group">
						<label for="session_end" class="control-label">End*</label>	
						<select name="session_end" id="session_end" class="form-control "onFocus="document.getElementById('sessionend').value=this.value;" required>
							<option value="">Select</option>
							<?php echo $school->getEndOptions(); ?>	
						</select>
					</div>
				</div>				
				<div class="modal-footer">
					<input type="hidden" name="sessionid" id="sessionid" />
					<!--
					<input type="text" name="sessionstart" id="sessionstart" />
					<input type="text" name="sessionend" id="sessionend" />
					-->
					<input type="hidden" name="action" id="action" value="updateSession" />
					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include('inc/footer.php');?>