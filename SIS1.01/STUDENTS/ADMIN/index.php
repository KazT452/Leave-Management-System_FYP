<?php 
include('../class/User.php');
$user = new User();
$errorMessage =  $user->adminLogin();
include('include/header.php');
?>
<title>Admin Management System</title>
<?php include('include/container.php');?>
<div class="container contact">	
	<h2 style="color:white;">&nbsp;&nbsp;Admin Management System</h2>	
	<div class="col-md-6">                    
		<div class="panel panel-info">
			<div class="panel-heading" style="background:#663399;color:white;"> <!-- dark green 1:#6aa84f, dark green 2:#38761d, dark green 3:#274e13, dark green:#00796B, white:#00796B, light blue:#c4e3f3, light cornflower blue 2:#a4c2f4, dark cornflower blue 3:#1c4587 -->
				<div class="panel-title">Login</div>                        
			</div> 
			<div style="padding-top:30px" class="panel-body" >
				<?php if ($errorMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>                            
				<?php } ?>
				<form id="loginform" class="form-horizontal" role="form" method="POST" action="">                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="email" name="email" placeholder="email" style="background:white;" required>                                        
					</div>                                
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" id="password" name="password" placeholder="password" required>
					</div>
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						  <input type="submit" name="login" value="Login" class="btn btn-primary" style="color:white">						  
						</div>						
					</div>	
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						<!--User: <br>
						password:-->				  
						</div>						
					</div>	
				</form>   
			</div>                     
		</div>  
	</div>
</div>	
<?php include('include/footer.php');?>