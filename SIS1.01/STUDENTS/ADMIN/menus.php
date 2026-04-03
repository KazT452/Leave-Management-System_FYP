<div id="top-nav" class="navbar navbar-inverse navbar-static-top" style="background:#663399;">  <!--  dark green 1:#6aa84f, dark green 2:#38761d, dark green 3:#274e13, dark green:#00796B, white:#00796B, light blue:#c4e3f3, light cornflower blue 2:#a4c2f4, dark cornflower blue 3:#1c4587 -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Welcome</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#" style="background:#663399;"><i class="fa fa-user-circle"></i> <?php echo $_SESSION["admin"]; ?> <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu" style="background:#ffffff; color:#000000;">
                        <li><a href="profile.php"><i class="fa fa-user-secret"></i> My Profile</a></li>
						<li><a href="change_password.php"><i class="fa fa-lock"></i> Change Password</a></li>
                    </ul>
                </li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
    <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">
        <li><a href="dashboard.php" style="color:white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="user_list.php" style="color:white;"><i class="fa fa-tags"></i> User List</a></li>
        <li><a href="Tan/admindashboard.php" style="color:white;"><i class="fa fa-tags"></i> Leave Management</a></li>
	</ul>
</div>
