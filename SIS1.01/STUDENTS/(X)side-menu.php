<div class="wrapper">
	<!--
		<div class="sidebar" data-background-color="white" background-color="grey" data-active-color="danger"> <!-- data-background-color="white" background-color="purple"
	-->
	<!--
		<div class="sidebar-wrapper" id="sideLinks" style="background-color:white"> <!-- C0F2FF B0E2FF 
	-->
	<div class="sidebar" data-background-color="black" data-active-color="danger">
    <div class="sidebar-wrapper" id="sideLinks" style="background-color:#20124d"> <!-- dark purple 1:#674ea7, dark purple 2:#351c75, dark purple 3:#20124d, light blue:#c4e3f3, light cornflower blue 2:#a4c2f4, dark cornflower blue 3:#1c4587 -->
            <div class="logo">
                <a href="index.php" class="simple-text">
                    Welcome
                </a>
            </div>
            <ul class="nav">
                <li class="" id="dashboard">
                    <a href="index.php" class="menu-link">
                        <i class="ti-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li id="students">
                    <a href="students.php" class="menu-link">
                        <i class="ti-user"></i>
                        <p>Student</p>
                    </a>
                </li>
				<li id="teacher">
                    <a href="teacher.php" class="menu-link">
                        <i class="ti-id-badge"></i>
                        <p>Teacher</p>
                    </a>
                </li>
                <li id="programs">
                    <a href="programs.php" class="menu-link">
                        <i class="ti-harddrives"></i>
                        <p>Programs</p>
                    </a>
                </li>				
                <li id="subjects">
                    <a href="subjects.php" class="menu-link">
                        <i class="ti-harddrive"></i>
                        <p>Subjects</p>
                    </a>
                </li>
				<li id="sections">
                    <a href="sections.php" class="menu-link">
                        <i class="ti-map"></i>
                        <p>Sections</p>
                    </a>
                </li>				
				<li id="classes">
                    <a href="classes.php" class="menu-link">
                        <i class="ti-blackboard"></i>
                        <p>Classes</p>
                    </a>
                </li>
				<li id="attendance">
                    <a href="attendance.php" class="menu-link">
                        <i class="ti-check-box"></i>
                        <p>Attendance</p>
                    </a>
                </li>  
				<li id="attendance_report">
					<a href="attendance_report.php" class="menu-link">
					<i class="ti-bar-chart-alt"></i>
					<p>Attendance Report</p>
					</a>
				</li>
				<li id="sessions">
                    <a href="sessions.php" class="menu-link">
                        <i class="ti-timer"></i>
                        <p>Sessions</p>
                    </a>
                </li>   	
				<!--teacher info-->
                <li id="teacherinfo">
					<a href="teacherinfo.php" class="menu-link">
					<i class="ti-user"></i>
					<p>Teacher Info</p>
					</a>
				</li> 
                <li id="class_subject">
					<a href="class_subject.php" class="menu-link">
					<i class="ti-control-shuffle"></i>
					<p>Class &#8594; Subject</p>
					</a>
				</li>
				<li id="program_subject">
					<a href="program_subject.php" class="menu-link">
					<i class="ti-control-shuffle"></i>
					<p>Program &#8594; Subject</p>
					</a>
				</li> 
            </ul>
    	</div>
    </div>

<div class="main-panel">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar bar1"></span>
					<span class="icon-bar bar2"></span>
					<span class="icon-bar bar3"></span>
				</button>
				<a class="navbar-brand" href="#">School Management System</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="ti-user"></i>
						<p class="notification"></p>
						<p><strong><?php echo $_SESSION["admin"]; ?></strong></p>
						<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
						<li><a href="account.php"><i class="fa fa-user"></i> <strong>Profile</strong> </a></li>
						<li>               
						<a href="change_password.php"><i class="fa fa-cog"></i> <strong>Change&nbsp;Password</strong></a>
						</li>
						<li>
						<a href="logout.php"><i class="fa fa-power-off"></i> <strong>Logout</strong></a>
						</li>
						</ul>
					</li>
				</ul>
				</li>
				</ul>
			</div>
		</div>
	</nav>