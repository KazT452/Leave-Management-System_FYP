<link href="../SMS/assets/css/themify-icons.css" rel="stylesheet">
<div id="top-nav" class="navbar navbar-inverse navbar-static-top" style="background:#FFA454;color:white;border-color:white;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"style="color:white;">Welcome</a><?php //echo $_SESSION['name']; ?>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"style="color:white;"><i class="fa fa-user-circle"></i> <?php echo $_SESSION["name"]; //$_COOKIE["loginId"]; //echo strtoupper($_SESSION['name']); ?> <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="staffaccount.php"><i class="fa fa-user-secret"></i><span class="ti-user"></span>&nbsp;&nbsp;My&nbsp;Profile</a></li>
                    </ul>
                </li>
                <a href="logout.php"><i class="btn btn-default fa fa-sign-out" style="font-size:11px; margin-top:10px"><b><span class="ti-power-off"></span>&nbsp;&nbsp;Log&nbsp;Out</b></i>&nbsp;&nbsp;&nbsp;</a>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
    <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="staffreport.php"><i class="fa fa-dashboard"></i> Staff Report</a></li>
        <li><a href="staff_directory.php"><i class="fa fa-dashboard"></i> Staff Directory</a></li>
        <li><a href="Tan/staffdashboard.php"><i class="fa fa-dashboard"></i> Leave Management</a></li>
        <li><a href="Tan/staffCalendar.php"><i class="fa fa-calendar"></i> Leave Calendar</a></li>
	</ul>
</div>
