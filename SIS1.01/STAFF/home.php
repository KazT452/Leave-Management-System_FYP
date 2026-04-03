<?php 
include('class/User.php');
$user = new User();
$user->loginStatus();
include('include/header.php');
?>
<title>Staff Management System</title>
<link rel="stylesheet" href="css/style.css">
<?php include('include/container.php');?>
<div class="container contact">	
	<h2>Staff Management System</h2>	

	<?php include 'staffmenu.php'; ?>
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   
		<a href="#"><strong><span class="fa fa-dashboard"></span> Dashboard</strong></a>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-primary text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $user->totalStaff('active'); ?></div>
									<div class="stat-panel-title text-uppercase">Total Staff</div>
								</div>
							</div>											
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-success text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $user->totalAdmin("active"); ?></div>
									<div class="stat-panel-title text-uppercase">Admin</div>
								</div>
							</div>											
						</div>
					</div>		
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-success text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $user->totalTeachers('active'); ?></div>
									<div class="stat-panel-title text-uppercase">Teacher(s)</div>
								</div>
							</div>											
						</div>
					</div>													
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-danger text-light">
								<div class="stat-panel text-center">												
									<div class="stat-panel-number h1 "><?php echo $user->totalStudents('active'); ?></div>
									<div class="stat-panel-title text-uppercase">Student(s)</div>
								</div>
							</div>											
						</div>
					</div>							
				</div>
			</div>
	</div>
</div>	
<?php include('include/footer.php');?>