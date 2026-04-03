<?php 
include('class/User.php');
$user = new User();
$user->loginStatus();
include('include/header.php');
?>
<title>Student Management System</title>
<link rel="stylesheet" href="css/style.css">
<?php include('include/container.php');?>
<div class="container contact">	
	<h2>Student Management System</h2>	
	<?php include 'menu.php'; ?>
<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   
		<a href="#"><strong><span class="fa fa-dashboard"></span> Home</strong></a>
		<hr>		
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-primary text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $user->totalUsers(""); ?></div>
									<div class="stat-panel-title text-uppercase">Exercises</div>
								</div>
							</div>											
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-success text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $user->totalUsers('active'); ?></div>
									<div class="stat-panel-title text-uppercase">Homework</div>
								</div>
							</div>											
						</div>
					</div>		
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-success text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $user->totalUsers('pending'); ?></div>
									<div class="stat-panel-title text-uppercase">Projects</div>
								</div>
							</div>											
						</div>
					</div>													
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-danger text-light">
								<div class="stat-panel text-center">												
									<div class="stat-panel-number h1 "><?php echo $user->totalUsers('deleted'); ?></div>
									<div class="stat-panel-title text-uppercase">Modules</div>
								</div>
							</div>											
						</div>
					</div>							
				</div>
			</div>
		</div>		
	</div>
</div>	
<?php include('include/footer.php');?>