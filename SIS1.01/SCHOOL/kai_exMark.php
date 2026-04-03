<?php 
include('class/School.php');
$school = new School();
$school->adminLoginStatus();
include('inc/header.php');
?>

<?php if(isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
	<?php
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	?>
</div>
<?php endif ?>

<title>School Management System</title>
<?php include('include_files.php');?>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>		
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
	<script src="js/kai_exam.js"></script>
<?php include('inc/container.php');?>
<?php include('Exam.php');?>


<div class="container">	
	<?php include('side-menu.php');	?>

	<div class="content">
		<div class="container-fluid">
			<div>   
				<a href="#"><strong><span class="ti-write"></span> Exam&nbsp;Mark</strong></a>
				<hr>		
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title"></h3>
							<div class="form-group">
							<form action="Exam.php" method="post">
								<div class="col-md-5">
									<input type="text" value="<?php echo $name; ?>" placeholder="Section" class="form-control" id="sec" name="sec">
								</div>
								<div class="col-md-5">
									<input type="date" class="form-control" id="secdate" name="secdate">
								</div>
								<button class="btn btn-primary btn-xs" type="submit" name="insert" id='btnsec'>Add Section</button>
							</form>
							</div>
						</div>
						<div class="col-md-2" align="right">
							<button type="button" name="add" id="addMark" class="btn btn-success btn-xs">Add Exam Mark</button>
						</div>
						<br>
					</div>
				</div>
<hr>
				<?php
					$mysqli = new mysqli('localhost', 'root', 'passwd', 'sms') or die(mysqli_error($mysqli));
					$result = $mysqli -> query("SELECT * FROM sms.kai_exam") or die($mysqli->error);
				?>

				<div>
				<table id="examList" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>	
							<th>Req</th>
							<th>Subjects</th>	
							<th>Section</th>	
							<th>Grade</th>								
							<th></th>
							<th></th>						
						</tr>
					</thead>

					<?php
						while($row = $result->fetch_assoc()): 
					?>
						<tr id="<?php echo $row['ExID'];?>">
						<td><?php echo $row['ExSection'];?></td>
						<td data-target="NAME"><?php echo $row['Exname'];?></td>
						<td data-target="req"><?php echo $row['Validation'];?></td>
						<td data-target="COURSE"><?php echo $row['ExCourse'];?></td>
						<td><?php echo $row['ExSection'];?></td>
						<td><?php echo $row['ExTotal'];?></td>
						<td>
							<button type="button" name="viewM" class="btn btn-warning btn-xs view_mark" id="<?php echo $row['ExID'];?>">Update</button>
						</td>
						<td>
							<a href="Exam.php?delete=<?php echo $row['ExID'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
						</td>
						</tr>
					<?php endwhile; ?>
				</table>
				</div>
			</div>			
		</div>		
	</div>	
</div>	

<div id="examModal" class="modal fade" title="add data">
	<div class="modal-dialog">
		<form method="post" action="Exam.php">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Student Exam Marks</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name" class="control-label">Student Name*</label>
						<input type="hidden" class="form-control" name="exformID" id="exformID">
						<input type="text" class="form-control" id="exStudent_fname" name="exStudent_fname" placeholder="Student's Name" required>
					</div>
					<div class="form-group">
						<label for="subject" class="control-label">Section*</label>	
						<select name="section_id" id="section_id" class="form-control" required>
						<option value="">Select a Section*</option>
							<?php 
								$result = $mysqli -> query("SELECT * FROM sms.kai_section") or die($mysqli->error);
								while($crow = $result->fetch_assoc()): 
							?>
							
							<option id= "exSection" value="<?php echo $crow['ExSection'];?>"><?php echo $crow['ExSection'];?></option>

							<?php endwhile; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="subject" class="control-label">Subject*</label>	
						<select name="subject_id" id="subject_id" class="form-control" required>
						<option value="">Select a Subject*</option>
							<?php 
								$result = $mysqli -> query("SELECT * FROM sms.sms_subjects") or die($mysqli->error);
								while($srow = $result->fetch_assoc()): 
							?>
							
							<option value="<?php echo $srow['subject'];?>"><?php echo $srow['subject'];?></option>

							<?php endwhile; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="written" class="control-label">Written Test</label>	
						<input type="number" class="form-control" id="written_test" value="" name="written_test" placeholder="20%" max-lenght="20">
					</div>
					<div class="form-group">
						<label for="oral" class="control-label">Oral Test</label>
						<input type="number" class="form-control" id="oral_test" value="" name="oral_test" placeholder="20%" max-lenght="20">
					</div>
					<div class="form-group">
						<label for="project" class="control-label">Project</label>
						<input type="number" class="form-control" id="project_mark" value="" name="project_mark" placeholder="60%" max-lenght="60">
					</div>
					<div class="form-group">
						<label for="req" class="control-label">Valid</label>
						<input type="radio" name="valid" id="valid">
						<label for="req" class="control-label">Not Valid</label>
						<input type="radio" name="nvalid" id="nvalid">
					</div>							
				</div>
				<div class="modal-footer">
					<button class="btn btn-warning" type="submit" name="update" id="update">Update</button>
					<button class="btn btn-info" type="submit" name="save" id="save">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>