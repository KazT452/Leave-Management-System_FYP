<?php
	$virtualPath = 'SISC101';
	$site = '';
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

class dbConfig {
    /*
    protected $serverName;
    protected $userName;
    protected $password;
    protected $dbName;
    function dbConfig() {
        $this -> serverName = 'localhost';
        $this -> userName = 'root';
        $this -> password = '';
        $this -> dbName = '';
    }
    */
    protected $serverName = 'localhost';
    protected $userName = 'root';
    protected $password = 'passwd';
    protected $dbName = 'sms101';

	protected $hostName = 'localhost'; //hostName is local name, from config.php is serverName

		//protected $examTable = 'kai_exam';
		//protected $section1Table = 'kai_section1';
		//protected $teacherinfoTable = 'sam_teacherinfo';
		protected $attendanceTable = 'sis_attendance';
		protected $class_sessionTable = 'sis_class_session';
		protected $class_subjectTable = 'sis_class_subject';
		protected $designationTable = 'sis_designation';
		protected $program_subjectTable = 'sis_program_subject';
		protected $programsTable = 'sis_programs';
		protected $sessionsTable = 'sis_session';
		protected $teacherTable = 'sis_teacher';
		protected $timeTable = 'sis_time';
		protected $user_studentTable = 'sis_user_student';
	//protected $attendanceTable = 'sms_attendance';
	protected $classesTable = 'sms_classes';
	protected $sectionsTable = 'sms_section';
	protected $studentTable = 'sms_students';
	protected $subjectsTable = 'sms_subjects';
	//protected $teacherTable = 'sms_teacher';
	protected $userTable = 'user';
	//protected $staffreportTable ='staff';
	protected $staff_infoTable = 'staff_info';
	protected $staff_positionTable = 'staff_position';
	protected $staff_reportTable = 'staff_report';

	protected $routinesTable = 'sms_routines';
	protected $student_gradesTable = 'sis_student_grades';
	protected $student_classTable = 'sis_student_class';
	protected $leaveTable = 'leave_requests';

}

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
?>