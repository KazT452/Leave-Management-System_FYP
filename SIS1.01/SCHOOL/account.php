<?php 
include('class/User.php');
$user = new User();
$user->adminLoginStatus();
$message  = '';
$userDetail = $user->adminDetails();
include('inc/header.php');
?>
<title>School Management System</title>
<?php include('include_files.php');?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/classes.js"></script>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div class="content">
		<div class="container-fluid">
			<!-- customization begin -->
			<div class="table-responsive">		
				<div><span style="font-size:20px;">User Account Details:</span><div class="pull-right"><a href="edit_account.php">Edit Account</a></div>
				<table class="table table-boredered">		
					<tr>
						<th>Name</th>
						<td><?php echo $userDetail['first_name']." ".$userDetail['last_name']; ?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><?php echo $userDetail['email']; ?></td>
					</tr>
					<tr>
						<th>Password</th>
						<td>**********</td>
					</tr>
					<tr>
						<th>Gender</th>
						<td><?php echo $userDetail['gender']; ?></td>
					</tr>
					<tr>
						<th>Mobile</th>
						<td><?php echo $userDetail['mobile']; ?></td>
					</tr>
					<tr>
						<th>Designation</th>
						<td><?php echo $userDetail['designation_name']; ?></td>
					</tr>		
				</table>
			</div>	
			<!-- customization end -->			
		</div>		
	</div>	
</div>	
<?php include('inc/footer.php');?>