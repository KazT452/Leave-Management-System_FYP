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
<script src="js/class_subject.js"></script>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div class="content">
		<div class="container-fluid">
			<div>   
				<a href="#"><strong><span class="ti-control-shuffle"></span> Class&#8594;Subject&nbsp;Section</strong></a>
				<hr>		
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title"></h3>
						</div>
						<div class="col-md-2" align="right">
							<button type="button" name="add" id="addClass_Subject" class="btn btn-success btn-xs">Add</button>
						</div>
					</div>
				</div>
				<table id="class_subjectList" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Class</th>	
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
<div id="class_subjectModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="class_subjectForm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Add and assign Subject to Class</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="class_id" class="control-label">Class*</label>
						<!--<input type="text" class="form-control" id="class_name" name="class_name" placeholder="Class Name" required>-->					
						<select name="class_id" id="class_id" class="form-control" required>
							<option value="">Select Class</option>
							<?php echo $school->getClassOptions(); //formerly getClasstList ?>	
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
					<!-- <input type="hidden" name="class_subjectid" id="class_subjectid" /> -->
					<input type="hidden" name="cid" id="cid" />
					<input type="hidden" name="sid" id="sid" />
					<input type="hidden" name="action" id="action" value="updateClass_Subject" />
					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>