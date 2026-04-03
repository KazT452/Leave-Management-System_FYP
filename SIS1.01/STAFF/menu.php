<link href="../SMS/assets/css/themify-icons.css" rel="stylesheet">
<div id="top-nav" class="navbar navbar-inverse navbar-static-top" style="background:#cc0000;color:white;border-color:white;"> <!-- light blue:#c4e3f3, light cornflower blue 2:#a4c2f4, dark cornflower blue 3:#1c4587 -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color:white">Welcome</a><?php //echo $_SESSION['name']; ?>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#" style="background:#cc0000;color:white"><i class="fa fa-user-circle"></i> <?php echo $_SESSION["name"]; //$_COOKIE["loginId"]; //echo strtoupper($_SESSION['name']); ?> <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu" style="background:#ffffff; color:#000000;">
                        <li><a href="account.php"><i class="fa fa-user-secret"></i><span class="ti-user"></span>&nbsp;&nbsp;My&nbsp;Profile</a></li>				
                    </ul>
                </li>
                <li><a href="logout.php"><i class="btn btn-primary fa fa-sign-out" style="font-size:10px"><b><span class="ti-power-off"></span>&nbsp;&nbsp;Log&nbsp;Out</b></i> </a></li>
            </ul>
        </div>
    </div>    
</div>
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
    <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">       
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="My_Info.php"><i class="fa fa-dashboard"></i> Teacher Info</a></li>
	</ul>
</div>
