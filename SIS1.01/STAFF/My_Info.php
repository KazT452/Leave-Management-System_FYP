<?php 
include('class/User.php');
$user = new User();
$user->loginStatus();
$userDetail = $user->getUserDetails();	//formally userDetails
include('include/header.php');
?>
<title>Teacher Management System</title>
<?php include('include/container.php');?>
<div class="container contact">	
	<h2>Teacher Management System</h2>	
	<?php include('menu.php');?>
	<div class="table-responsive">		
		<a href="#"><strong><span class="fa fa-dashboard"></span> Teacher Info</strong></a>
		<hr>

		<table style="background-color:#222222;">
		<tr>
			<td valign="top" >
				<img width='100' height='100' style="border:3px outset lightgrey;  padding:0px; margin:10px;" src="upload/<?php echo $userDetail['image']; ?>">
			</td>
			<td>
				<table class="table" style="font-family:'arial black'; font-size:12px; color:#bbbbbb">		
					<tr>
						<th class="pull-right" style="color:#FF0000">Name</th>
						<td><?php echo $userDetail['first_name']." ".$userDetail['last_name']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#FF7F00">Email</th>
						<td><?php echo $userDetail['email']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#FFFF00">Gender</th>
						<td><?php echo $userDetail['gender']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#00FF00">Mobile</th>
						<td><?php echo $userDetail['mobile']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#00FFFF">Designation</th>
						<td><?php echo $userDetail['designation_name']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#0000FF">Status</th>
						<td><?php echo $userDetail['status']; ?></td>
					</tr>
				</table>
			</td>
		</tr>
		</table>
	</div>	
</div>	
<?php include('include/footer.php');?>