<?php
include('class/School.php');
$school = new School();
/********Student********/
if(!empty($_POST['action']) && $_POST['action'] == 'listStudents') {
	$school->listStudents();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addStudent') {
	$school->addStudent();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateStudent') {
	$school->updateStudent();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteStudent') {
	$school->deleteStudent();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getStudentDetails') {
	$school->getStudentDetails();
}
/********teachers********/
if(!empty($_POST['action']) && $_POST['action'] == 'listTeachers') {
	$school->listTeachers();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addTeacher') {
	$school->addTeacher();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateTeacher') {
	$school->updateTeacher();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteTeacher') {
	$school->deleteTeacher();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getTeacherDetails') {	//formerly getTeacher
	$school->getTeacherDetails();
}
/********Programs********/
if(!empty($_POST['action']) && $_POST['action'] == 'listPrograms') {
	$school->listPrograms();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addProgram') {
	$school->addProgram();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateProgram') {
	$school->updateProgram();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteProgram') {
	$school->deleteProgram();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getProgramDetails') {	//formerly getProgram
	$school->getProgramDetails();
}
/********Subject********/
if(!empty($_POST['action']) && $_POST['action'] == 'listSubject') {
	$school->listSubject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addSubject') {
	$school->addSubject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateSubject') {
	$school->updateSubject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteSubject') {
	$school->deleteSubject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getSubjectDetails') {	//formerly getSubject
	$school->getSubjectDetails();
}
/********sections********/
if(!empty($_POST['action']) && $_POST['action'] == 'listSections') {
	$school->listSections();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addSection') {
	$school->addSection();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateSection') {
	$school->updateSection();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteSection') {
	$school->deleteSection();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getSectionDetails') {	//fomerly getSection
	$school->getSectionDetails();
}
/********sessions********/
if(!empty($_POST['action']) && $_POST['action'] == 'listSessions') {
	$school->listSessions();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addSession') {
	$school->addSession();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateSession') {
	$school->updateSession();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteSession') {
	$school->deleteSession();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getSessionDetails') {	//fomerly getSession
	$school->getSessionDetails();
}
/********Classes********/
if(!empty($_POST['action']) && $_POST['action'] == 'listClasses') {
	$school->listClasses();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addClass') {
	$school->addClass();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getClass') {
	$school->getClassesDetails();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateClass') {
	$school->updateClass();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteClass') {
	$school->deleteClass();
}
/********attendance********/
if(!empty($_POST['action']) && $_POST['action'] == 'getClassAttendence') {
	$school->getClassAttendence();
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
/********class_subject********/
if(!empty($_POST['action']) && $_POST['action'] == 'listClass_Subject') {
	$school->listClass_Subject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addClass_Subject') {
	$school->addClass_Subject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateClass_Subject') {
	$school->updateClass_Subject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteClass_Subject') {
	$school->deleteClass_Subject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getClass_SubjectDetails') {	//formerly getClass_Subject
	$school->getClass_SubjectDetails();
}
/********program_subject********/
if(!empty($_POST['action']) && $_POST['action'] == 'listProgram_Subject') {
	$school->listProgram_Subject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addProgram_Subject') {
	$school->addProgram_Subject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateProgram_Subject') {
	$school->updateProgram_Subject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteProgram_Subject') {
	$school->deleteProgram_Subject();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getProgram_SubjectDetails') {	//formerly getProgram_Subject
	$school->getProgram_SubjectDetails();
}
?>