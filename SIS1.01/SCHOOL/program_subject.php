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
<script src="js/program_subject.js"></script>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div class="content">
		<div class="container-fluid">
			<div>   
				<a href="#"><strong><span class="ti-control-shuffle"></span> Program&#8594;Subject&nbsp;Section</strong></a>
				<hr>		
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title"></h3>
						</div>
						<div class="col-md-2" align="right">
							<button type="button" name="add" id="addProgram_Subject" class="btn btn-success btn-xs">Add</button>
						</div>
					</div>
				</div>
				<table id="program_subjectList" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Program</th>	
							<th>Subject</th>									
							<th></th>
							<th></th>							
						</tr>
					</thead>
				</table>
				
			</div>			
		</div>		
	</div>	
</div>	
<div id="program_subjectModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="program_subjectForm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Add and assign Subject to Program</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="program_id" class="control-label">Program*</label>
						<!--<input type="text" class="form-control" id="program_name" name="program_name" placeholder="Program Name" required>-->					
						<select name="program_id" id="program_id" class="form-control" required>
							<option value="">Select Program</option>
							<?php echo $school->getProgramOptions(); //formerly getProgramtList ?>	
						</select>
					</div>	
					<div class="form-group">
						<label for="subject_id" class="control-label">Subject*</label>	
						<select name="subject_id" id="subject_id" class="form-control" required>
							<option value="">Select Subject</option>
							<?php echo $school->getSubjectOptions(); //formerly getSubjectList ?>	
						</select>
					</div>										
				</div>
				<div class="modal-footer">
					<!-- <input type="hidden" name="program_subjectid" id="program_subjectid" /> -->
					<input type="hidden" name="pid" id="pid" />
					<input type="hidden" name="sid" id="sid" />
					<input type="hidden" name="action" id="action" value="updateProgram_Subject" />
					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>