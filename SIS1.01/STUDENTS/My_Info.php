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
		<table style="background-color:#efefef;">
		<tr>
			<td valign="top" >
				<img width='150' height='150' style="border:3px outset lightgrey;  padding:0px; margin:10px;" src="../SCHOOL/upload/<?php echo $userDetail['photo']; ?>">
			</td>
			<td>
				<table class="table" style="font-family:'arial black'; font-size:12px; color:#000000">		
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
					<tr>
						<th class="pull-right" style="color:#999999">Current&nbsp;Address</th><!--- 8B00FF -->
						<td><?php echo $userDetail['current_address']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Permanent&nbsp;Address</th><!--- FF0000 -->
						<td><?php echo $userDetail['permanent_address']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Father's&nbsp;Name</th><!--- FF7F00 -->
						<td><?php echo $userDetail['father_name']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Father's&nbsp;Mobile</th><!--- FFFF00 -->
						<td><?php echo $userDetail['father_mobile']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Father's&nbsp;Occupation</th><!--- 00FF00 -->
						<td><?php echo $userDetail['father_occupation']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Mother's&nbsp;Name</th><!--- 00FFFF -->
						<td><?php echo $userDetail['mother_name']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Mother's&nbsp;Mobile</th><!--- 0000FF -->
						<td><?php echo $userDetail['mother_mobile']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Stream</th><!--- 8B00FF -->
						<td><?php echo $userDetail['stream']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Hostel</th><!--- FF0000 -->
						<td><?php echo $userDetail['hostel']; ?></td>
					</tr>
					<tr>
						<th class="pull-right" style="color:#999999">Category</th><!--- FF7F00 -->
						<td><?php echo $userDetail['category']; ?></td>
					</tr>					
				</table>
			</td>
		</tr>
		</table>
	</div>	
</div>	
<?php include('include/footer.php');?>