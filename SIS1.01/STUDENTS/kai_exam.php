<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		#editMark{
			border: 3px solid #5cb85c;
			background: transparent;
			border-radius: 24px;
			color: #5cb85c;
			margin:1px;
		}
		#editMark:hover{
			background: #5cb85c;
			color: white;
		}
		#editMark2{
			border: 3px solid grey;
			background: transparent;
			border-radius: 24px;
			color: grey;
			margin:1px;
		}
		#editMark2:hover{
			background: grey;
			color: white;
		}
		#editMark3{
			border: 3px solid skyblue;
			background: transparent;
			border-radius: 24px;
			color: skyblue;
			margin:1px;
		}
		#editMark3:hover{
			background: skyblue;
			color: white;
		}
		#examform{
			border-radius: 24px;
			background: rgb(255, 255, 255);
			box-shadow: 2px 2px;
		}
		.popform{
			display:none;
			position:fixed;
			top:50px;
			right:500px;
			z-index: 10000;
		}
		.form-container{
			width:500px;
			padding:20px;
		}
		.form-control{
			width: 200px;
			margin-bottom:10px;
		}
		input[type]{
			background-color: rgb(255, 255, 230);
		}
	</style>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
	
</body>
</html>

<script>
	function openForm() {
		document.getElementById("examForm").style.display = "block";
	}
	
	function closeForm() {
		document.getElementById("examForm").style.display = "none";
	}

</script>

<?php
include('class/User.php');
$user = new User();
$user->loginStatus();
$message = '';
if(!empty($_POST["update"]) && $_POST["update"]) {
	$message = $user->insertMark();
}
$userDetail = $user->userDetails();
$examDetail = $user->examDetails();
include('include/header.php');
?>

<title>Student Management System</title>
<?php include('include/container.php');?>
<div class="container contact">
	<h2>Student Management System</h2>
	<?php include('menu.php');?>
	<div class="table-responsive">
		<div>
				<a href="#"><strong><span class="fa fa-dashboard"></span> My Exam</strong></a>
				<br><br>
				<table class="table table-boredered">
					<tr>
						<th>Name</th>
						<td><?php echo $_SESSION['name'];?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><?php echo $userDetail['email']; ?></td>
					</tr>
					<tr>
						<th>Gender</th>
						<td><?php echo $userDetail['gender']; ?></td>
					</tr>
				</table>

				<b>Exam Mark :</b>
				<div>
					<table class="table table-boredered" style="background-color: aliceblue;">
					<?php
						$mysqli = new mysqli('localhost', 'root', 'passwd', 'sms') or die(mysqli_error($mysqli));
						$result = $mysqli -> query("SELECT * FROM ".$this->examTable." WHERE Exname = '" . $_SESSION['name'] . "' AND Validation = 'valid'") or die($mysqli->error);
						while($row = $result->fetch_assoc()): 
					?>
						<tr>
						<td><?php echo $row['ExSection'];?></td>
						<td><?php echo $row['ExCourse'];?></td>
						<td>
						<?php
						if($row['ExTotal'] < "100" && $row['ExTotal'] > "90"):
							echo 'A+';
						elseif ($row['ExTotal'] < "89" && $row['ExTotal'] > "80"):
							echo 'A';
						elseif ($row['ExTotal'] < "79" && $row['ExTotal'] > "70"):
							echo 'A-';
						elseif ($row['ExTotal'] < "69" && $row['ExTotal'] > "60"):
							echo 'B+';
						elseif ($row['ExTotal'] < "59" && $row['ExTotal'] > "50"):
							echo 'B';
						elseif ($row['ExTotal'] < "49" && $row['ExTotal'] > "40"):
							echo 'C';
						elseif ($row['ExTotal'] < "40" && $row['ExTotal'] > "0"):
							echo 'Fail';
						else: 
							echo 'Not Marked';
						endif;
						?>
						</td>
						</tr>
					<?php endwhile; ?>
					</table>
		</div>
	</div>
</div>
<?php include('include/footer.php');?>