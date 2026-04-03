<?php
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
    protected $dbName = 'sms';
	
	protected $hostName = 'localhost'; //hostName is local name, from config.php is serverName
	
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
}
?>