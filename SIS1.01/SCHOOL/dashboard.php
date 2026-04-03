<?php 
include('class/School.php');
$school = new School();
$school->adminLoginStatus();
include('inc/header.php');
?>
<title>School Information System</title>
<?php include('include_files.php');?>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div class="content">
		<div class="container-fluid">    			
			<div class="alert alert-success fade in" style="background:#666666;opacity:0.7">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong><span class="ti ti-announcement fa-2x" style="color:white;opacity:0.7"></span> </strong> <strong style="background:#666666; color:white;">&nbsp;&nbsp;Welcome to your Admin Dashboard!!</strong>.
			</div>						
			<div class="row"><!--row begins-->
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-warning text-center">
										<i class="ti-user"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Students</strong></p>										
									</div>
								</div>
							</div>
							<a href="students.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>View
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>				
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-info text-center">
										<i class="ti-id-badge"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Teacher</strong></p>									   
									</div>
								</div>
							</div>
							<a href="teacher.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>View
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-warning text-center">
										<i class="ti-harddrives"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Programs</strong></p>
									</div>
								</div>
							</div>
							<a href="programs.php">
								<div class="footer">
									<hr />
									<div class="stats">
										<i class="ti-arrow-right"></i>View
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>				
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-warning text-center">
										<i class="ti-harddrive"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Subjects</strong></p>									   
									</div>
								</div>
							</div>
							<a href="subjects.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>View
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>	
			</div><!--row ends-->
			<!--row begins-->
				<div class="row">	
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-success text-center">
										<i class="ti-map"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Sections</strong></p>										
									</div>
								</div>
							</div>
							<a href="sections.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>View
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>				
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-success text-center">
										<i class="ti-blackboard"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Classes</strong></p>										
									</div>
								</div>
							</div>
							<a href="classes.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>View
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>				
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-danger text-center">
										<i class="ti-check-box"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Attendance</strong></p>										
									</div>
								</div>
							</div>
							<a href="attendance.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>View
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>	
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-danger text-center">
										<i class="ti-bar-chart-alt"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Attendance Report</strong></p>										
									</div>
								</div>
							</div>
							<a href="attendance_report.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>View
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>							
			</div><!--row ends-->	
			<div class="row"><!--row begins-->
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-warning text-center">
										<i class="ti-timer"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Sessions</strong></p>										
									</div>
								</div>
							</div>
							<a href="sessions.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>View
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>				
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-info text-center">
										<i class="ti-id-badge"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Teacher Info</strong></p>									   
									</div>
								</div>
							</div>
							<a href="teacherinfo.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>View
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-warning text-center">
										<i class="ti-control-shuffle"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Class&#8594; Subject</strong></p>
									</div>
								</div>
							</div>
							<a href="class_subject.php">
								<div class="footer">
									<hr />
									<div class="stats">
										<i class="ti-arrow-right"></i>View
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>			
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-warning text-center">
										<i class="ti-control-shuffle"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Program &#8594;Subject</strong></p>		   
									</div>
								</div>
							</div>
							<a href="program_subject.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>View
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>	
			</div><!--row ends-->	
			<div class="row"><!--row begins-->							
				<hr>
			</div><!--row ends-->			
		</div>	
	</div>
</div>	
<?php include('inc/footer.php');?>
