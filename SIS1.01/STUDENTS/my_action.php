<?php
include('class/My_Student.php');
$kelas = new Kelas();
if(!empty($_POST['action']) && $_POST['action'] == 'listKelas') {
	$kelas->getKelasList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addKelas') {
	$kelas->addKelas($_POST['checkedInOut']);
}	
	
	
	
	

/*
if(!empty($_POST['action']) && $_POST['action'] == 'kelasDelete') {
	$kelas->deleteKelas();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getKelas') {
	$kelas->getKelas();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateKelas') {
	$kelas->updateKelas();
}
*/

//include('../SMS/class/School.php');
//$school = new School();



/********attendance********/
/*
if(!empty($_POST['action']) && $_POST['action'] == 'getStudents') {
	$school->getStudents();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateAttendance') {
	$school->updateAttendance();
}
if(!empty($_POST['action']) && $_POST['action'] == 'attendanceStatus') {
	$school->attendanceStatus();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getStudentsAttendance') {
	$school->getStudentsAttendance();
}
*/
?>