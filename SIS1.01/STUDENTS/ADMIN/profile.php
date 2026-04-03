<?php 
include('../class/User.php');
$user = new User();
$user->adminLoginStatus();
$message  = '';
$userDetail = $user->adminDetails();
include('include/header.php');
?>
<title>Admin Management System</title>
<link rel="stylesheet" href="css/style.css">
<?php include('include/container.php');?>
<div class="container contact">	
	<h2 style="color:white;">&nbsp;&nbsp;Admin Management System</h2>
	<?php include 'menus.php'; ?>
	<div class="table-responsive" style="background-color:grey; color:white;">		
		<div><span style="font-size:20px;">Admin Details:</span><div class="pull-right"></div>
		<hr><center>(*note: Administrators can change their details under School module)</center>
		<br>
		<table class="table table-boredered" cellpadding="5">		
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
			<tr>
				<th>User Type</th>
				<td><?php echo $userDetail['type']; ?></td>
			</tr>		
		</table>
	</div>
</div>	
<?php include('include/footer.php');?>