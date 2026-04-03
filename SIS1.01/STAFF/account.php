<?php 
include('class/User.php');
$user = new User();
$user->loginStatus();
$userDetail = $user->getUser();	//formally userDetails
include('include/header.php');
?>
<title>Teacher Management System</title>
<?php include('include/container.php');?>
<div class="container contact">	
	<h2>Teacher Management System</h2>	
	<?php include('menu.php');?>
	<div class="table-responsive">		
		<div><span style="font-size:20px;">User Account Details:</span><div class="pull-right"><a href="edit_account.php">Edit Account</a></div>
		<table>
		<tr>
			<td valign="top" >
				<img width='100' height='100' style="border:3px outset lightgrey;  padding:0px; margin:10px;" src="upload/<?php echo $userDetail['image']; ?>">
			</td>	
			<td>
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
			</td>
		</tr>
		</table>
	</div>	
</div>	
<?php include('include/footer.php');?>