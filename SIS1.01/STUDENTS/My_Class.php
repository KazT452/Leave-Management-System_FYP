<?php 
include('class/User.php');
$user = new User();
$user->loginStatus();
include('include/header.php');
?>
<title>Student Information System</title>

<script src="admin/js/jquery.dataTables.min.js"></script>
<script src="admin/js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="css/style.css">
<?php include('include/container.php');?>


<div class="container-fluid contact">
	<h2>Student Information System</h2>	
	<?php include 'menu.php'; ?>
	
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12"> 
		<a href="#"><strong><span class="fa fa-dashboard"></span> My Class</strong></a>
		<hr>			
	<?php

 	$servername = "localhost"; 
	$username = "root";
	$password = "passwd";
	$database = "sms101";

	// Create connection to database 
	$conn = mysqli_connect($servername, $username, $password, $database);
 
    $sql="SELECT u.id,CONCAT(u.first_name,' ',u.last_name) as fullName,s.admission_no,s.email,s.mobile,s.father_name,s.father_mobile,s.mother_name,s.mother_mobile,s.id as student_id,s.name as studentName,clssub.class_id,cls.name as className,sec.section_id,sec.section as sectionName,clsses.session_id,ses.session as sessionName,clssub.subject_id,sub.subject as subjectName,prosub.program_id,pro.program as programName,cls.teacher_id,tea.teacher as teacherName,cls.start_date,cls.end_date,stucls.status
FROM sis_student_class as stucls
inner join sms_students as s
on stucls.student_id=s.id
inner join sis_user_student as usrstu
on usrstu.student_id=stucls.student_id
inner join user as u
on u.id=usrstu.user_id
inner join sms_classes as cls
on stucls.class_id=cls.id
inner join sms_section as sec
on sec.section_id=cls.section
inner join sis_teacher as tea
on tea.teacher_id=cls.teacher_id
inner join sis_class_session as clsses
on clsses.class_id=cls.id
inner join sis_session as ses
on ses.session_id=clsses.session_id
inner join sis_class_subject as clssub
on clssub.class_id=cls.id
inner join sms_subjects as sub
on sub.subject_id=clssub.subject_id
inner join sis_program_subject as prosub
on prosub.subject_id=sub.subject_id
inner join sis_programs as pro
on pro.program_id=prosub.program_id
WHERE usrstu.user_id='".$_SESSION["userid"]."'";

 
        
    $result = mysqli_query($conn, $sql);
    
    $count= mysqli_num_rows($result);

    echo "<table class='table table-bordered table-striped'>";

            echo "<tr>";
			echo "<th>Program</th>";
			echo "<th>Section</th>";
            echo "<th>Class</th>";
			echo "<th>Subject</th>";
			echo "<th>Session</th>";
			echo "<th>Teacher</th>";
			echo "<th>Start</th>";
			echo "<th>End</th>";
			echo "<th>Status</th>";
            echo "</tr>";

    $c=0; 
    $strAlert="";
    if($count > 0){
		while($row = mysqli_fetch_assoc($result)){
            $c=$c+1;
            echo "<tr>";
            echo "<td>".$row['programName']."</td>";
            echo "<td>".$row['sectionName']."</td>";
            echo "<td>".$row['className']."</td>";
            echo "<td>".$row['subjectName']."</td>";
            echo "<td>".$row['sessionName']."</td>";
            echo "<td>".$row['teacherName']."</td>";
            echo "<td>".$row['start_date']."</td>";
            echo "<td>".$row['end_date']."</td>";
            echo "<td>".$row['status']."</td>";
            echo "</tr>";
		}
    }
    
    echo "</table>";

    mysqli_close($conn);
    	
?>
