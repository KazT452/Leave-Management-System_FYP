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

		<table style="background-color:#efefef;"><!--- 222222 -->
		<tr>
			<td valign="top" >
				<img width='100' height='100' style="border:3px outset lightgrey;  padding:0px; margin:10px;" src="upload/<?php echo $userDetail['image']; ?>">
			</td>
			<td>
				<table class="table" style="font-family:'arial black'; font-size:12px; color:#000000"><!--- ffffff -->		
					<tr>
						<th class="pull-right" style="color:#999999">Name</th><!--- FF0000 -->
						<td><?php echo $userDetail['first_name']." ".$userDetail['last_name']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Email</th><!--- FF7F00 -->
						<td><?php echo $userDetail['email']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Gender</th><!--- FFFF00 -->
						<td><?php echo $userDetail['gender']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Mobile</th><!--- 00FF00 -->
						<td><?php echo $userDetail['mobile']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Designation</th><!--- 00FFFF -->
						<td><?php echo $userDetail['designation_name']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Status</th><!--- 0000FF -->
						<td><?php echo $userDetail['status']; ?></td>
					</tr>
				</table>
			</td>
		</tr>
		</table>
	</div>	
</div>	
<?php include('include/footer.php');?>