<?php 
include('class/User.php');
$user = new User();
$user->loginStatus();
$userDetail = $user->getUser_Student();	//formally userDetails
include('include/header.php');
?>
<title>Student Management System</title>
<?php include('include/container.php');?>
<div class="container contact">	
	<h2>Student Management System</h2>	
	<?php include('menu.php');?>
	<div class="table-responsive">		
		<a href="#"><strong><span class="fa fa-dashboard"></span> My Info</strong></a>
		<hr>
		<table style="background-color:#222222;">
		<tr>
			<td valign="top" >
				<img width='200' height='200' style="border:3px outset lightgrey;  padding:0px; margin:10px;" src="../SMS/upload/<?php echo $userDetail['photo']; ?>">
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
					<tr>
						<th class="pull-right" style="color:#8B00FF">Current&nbsp;Address</th>
						<td><?php echo $userDetail['current_address']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#FF0000">Permanent&nbsp;Address</th>
						<td><?php echo $userDetail['permanent_address']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#FF7F00">Father's&nbsp;Name</th>
						<td><?php echo $userDetail['father_name']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#FFFF00">Father's&nbsp;Mobile</th>
						<td><?php echo $userDetail['father_mobile']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#00FF00">Father's&nbsp;Occupation</th>
						<td><?php echo $userDetail['father_occupation']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#00FFFF">Mother's&nbsp;Name</th>
						<td><?php echo $userDetail['mother_name']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#0000FF">Mother's&nbsp;Mobile</th>
						<td><?php echo $userDetail['mother_mobile']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#8B00FF">Stream</th>
						<td><?php echo $userDetail['stream']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#FF0000">Hostel</th>
						<td><?php echo $userDetail['hostel']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#FF7F00">Category</th>
						<td><?php echo $userDetail['category']; ?></td>
					</tr>					
				</table>
			</td>
		</tr>
		</table>
	</div>	
</div>	
<?php include('include/footer.php');?>