<?php
session_start();
//set_include_path( get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] );
//require('config.php');
	//echo $_SERVER['DOCUMENT_ROOT'];
	$docroot="C:\shared\SIS1.01";	//$path = $_SERVER['DOCUMENT_ROOT'];
	$path= "\config.php";
	include_once($docroot.$path);
	
	//echo get_include_path();
	//$J=strripos($_SERVER['HTTP_REFERER'],"/");
	//$K=substr($_SERVER['HTTP_REFERER'],0,$J);
	//$L=strripos($K,"/");
	//$serverroot=substr($_SERVER['HTTP_REFERER'],0,$L);
	//echo $docroot.$path;
	//$serverroot="http://localhost/SISC/";
	//echo $serverroot.$path;
	//echo $virtualPath;
	//include_once($serveroot.$path);
	
class School extends Dbconfig {	
/*
    protected $hostName;	//hostName is local name, from config.php is serverName
    protected $userName;
    protected $password;
	protected $dbName;
*/
		private $queryA;
		private $queryB;

		private $no;
		
		//date_default_timezone_set('UTC');
		//$dateTime = new DateTime();
		//$dateTime->setTimeZone(new DateTimeZone('Asia/Kuala_Lumpur')); //+8 hours
		//setTimeZone(new DateTimeZone('Asia/Kuala_Lumpur')); //+8 hours
	
		//protected $timeZone = 'Asia/Kuala_Lumpur'; //+8 hours
		//date_default_timezone_set($timeZone);
		
		//private $defaultTimeZone='UTC';
		//if(date_default_timezone_get()!=$defaultTimeZone)) date_default_timezone_set($defaultTimeZone);

/*		
	// somewhere in the code
	private function _date($format="r", $timestamp=false, $timezone=false)
	{
    $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime(($timestamp!=false?date("r",(int)$timestamp):date("r")), $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    return date($format, ($timestamp!=false?(int)$timestamp:$myDateTime->format('U')) + $offset);	
	}
*/	
	/* Example */
	/*
	echo 'System Date/Time: '.date("Y-m-d | h:i:sa").'<br>';
	echo 'New York Date/Time: '._date("Y-m-d | h:i:sa", false, 'America/New_York').'<br>';
	echo 'Kuala Lumpur Date/Time: '._date("Y-m-d | h:i:sa", false, 'Asia/Kuala_Lumpur').'<br>';
	echo 'Belgrade Date/Time: '._date("Y-m-d | h:i:sa", false, 'Europe/Belgrade').'<br>';
	echo 'Belgrade Date/Time: '._date("Y-m-d | h:i:sa", 514640700, 'Europe/Belgrade').'<br>';
	*/


	/*	
		//private $attendanceTable = 'sis_attendance';
		private $class_sessionTable = 'sis_class_session';
		private $program_subjectTable = 'sis_program_subject';
		private $programsTable = 'sis_programs';
		private $sessionsTable = 'sis_session';
		private $teacherTable = 'sis_teacher';
	private $attendanceTable = 'sms_attendance';
	private $classesTable = 'sms_classes';
	private $sectionsTable = 'sms_section';
	private $studentTable = 'sms_students';
	private $subjectsTable = 'sms_subjects';
	//private $teacherTable = 'sms_teacher';	
	
	private $userTable = 'user';
	
*/		
		
	
	
	/*
	private $studentTable = 'sms_students';
	private $classesTable = 'sms_classes';
	private $sectionsTable = 'sms_section';
	//private $teacherTable = 'sms_teacher';
		private $teacherTable = 'sis_teacher';
		private $programsTable = 'sis_programs';
	//private $programsTable = 'sms_subjects';
	private $attendanceTable = 'sms_attendance';
	*/
	
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 		
			$database = new dbConfig();            
            $this -> serverName = $database -> serverName;
            $this -> userName = $database -> userName;
            $this -> password = $database ->password;
			$this -> dbName = $database -> dbName;			
            $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}	
	public function adminLoginStatus (){
		if(empty($_SESSION["adminUserid"])) {
			header("Location: index.php");
		}
	}
	public function isLoggedin (){
		if(!empty($_SESSION["adminUserid"])) {	
			return true;
		} else {
			return false;
		}
	}
	public function adminLogin(){		
		$errorMessage = '';
		if(!empty($_POST["login"]) && $_POST["email"]!=''&& $_POST["password"]!='') {	
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sqlQuery = "SELECT * FROM ".$this->userTable." 
				WHERE email='".$email."' AND password='".md5($password)."' AND status = 'active' AND type = 'administrator'";
			$resultSet = mysqli_query($this->dbConnect, $sqlQuery) or die("error".mysql_error());
			$isValidLogin = mysqli_num_rows($resultSet);	
			if($isValidLogin){
				$userDetails = mysqli_fetch_assoc($resultSet);
				$_SESSION["adminUserid"] = $userDetails['id'];
				$_SESSION["admin"] = $userDetails['first_name']." ".$userDetails['last_name'];
				header("location: dashboard.php"); 		
			} else {		
				$errorMessage = "Invalid login!";		 
			}
		} else if(!empty($_POST["login"])){
			$errorMessage = "Enter Both username and password!";	
		}
		return $errorMessage; 		
	}	
	
	public function getAuthtoken($email) {
		$code = md5(889966);
		$authtoken = $code."".md5($email);
		return $authtoken;
	}
	/*****************Student methods****************/
	public function _____STUDENTS____(){}
	
	public function listStudents(){		
		$sqlQuery = "SELECT s.id, s.name, s.photo, s.gender, s.dob, s.mobile, s.email, s.current_address, s.father_name, s.mother_name,s.admission_no, s.roll_no, s.admission_date, s.academic_year, c.name as class, se.section 
			FROM ".$this->studentTable." as s ";//
			$sqlQuery .= " LEFT JOIN ".$this->classesTable." as c ON s.class = c.id
			LEFT JOIN ".$this->sectionsTable." as se ON s.section = se.section_id ";
		$sqlQuery .= ' WHERE 1=1 ';
		$sqlQuery .= ' AND s.roll_no>0 ';	
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= ' AND (s.id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR s.name LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR s.gender LIKE "%'.$_POST["search"]["value"].'%" ';		
			$sqlQuery .= ' OR s.mobile LIKE "%'.$_POST["search"]["value"].'%" ';		
			$sqlQuery .= ' OR s.admission_no LIKE "%'.$_POST["search"]["value"].'%" ';	
			$sqlQuery .= ' OR s.roll_no LIKE "%'.$_POST["search"]["value"].'%" ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY s.name ASC ';//$sqlQuery .= 'ORDER BY s.id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$studentData = array();	
		$no=1;
		while( $student = mysqli_fetch_assoc($result) ) {		
			$studentRows = array();		
			$studentRows[] = $no; $no++;			
			$studentRows[] = $student['id'];
			$studentRows[] = $student['admission_no'];
			$studentRows[] = $student['roll_no'];
			$studentRows[] = $student['name'];	
			$studentRows[] = "<img width='40' height='40' src='upload/".$student['photo']."'>";
			$studentRows[] = $student['class'];
			$studentRows[] = $student['section'];		
			$studentRows[] = '<button type="button" name="update" id="'.$student["id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$studentRows[] = '<button type="button" name="delete" id="'.$student["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$studentData[] = $studentRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$studentData
		);
		echo json_encode($output);
	}
	public function addStudent () {
		if($_POST["sname"]) {			
			$target_dir = "upload/";
			$fileName = time().$_FILES["photo"]["name"];
			$targetFile = $target_dir . basename($fileName);
			if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
				echo "The file $fileName has been uploaded.";					
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
			/*
			$insertQuery = "INSERT INTO ".$this->studentTable."(name, email, mobile, gender, current_address, father_name, mother_name, class, section, admission_no, roll_no, academic_year, admission_date, dob, photo) 
				VALUES ('".$_POST["sname"]."', '".$_POST["email"]."', '".$_POST["mobile"]."', '".$_POST["gender"]."', '".$_POST["address"]."', '".$_POST["fname"]."', '".$_POST["mname"]."', '".$_POST["classid"]."', '".$_POST["sectionid"]."', '".$_POST["registerNo"]."', '".$_POST["rollNo"]."', '".$_POST["year"]."', '".$_POST["admission_date"]."', '".$_POST["dob"]."', '".$fileName."')";
			$userSaved = mysqli_query($this->dbConnect, $insertQuery);
			*/
			$insertQuery = "INSERT INTO ".$this->studentTable."(name, email, mobile, gender, current_address, father_name, mother_name, class, section, admission_no, roll_no, academic_year, admission_date, dob, photo) 
				VALUES ('".$_POST["sname"]."', '".$_POST["email"]."', '".$_POST["mobile"]."', '".$_POST["gender"]."', '".$_POST["address"]."', '".$_POST["fname"]."', '".$_POST["mname"]."', '".$_POST["classid"]."', '".$_POST["sectionid"]."', '".$_POST["registerNo"]."', '".$_POST["rollNo"]."', '".$_POST["year"]."', '".$_POST["admission_date"]."', '".$_POST["dob"]."', '".$fileName."')";
			$queryA = mysqli_query($this->dbConnect, $insertQuery);
			
			$sqlQuery = "SELECT id FROM ".$this->studentTable." where name = '".$_POST["sname"]."' ORDER BY id DESC";
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			$numRows = mysqli_num_rows($result);
			if ( $students = mysqli_fetch_assoc($result) ) {	
				//$uid=$students['id'];
				if($_POST["email"]) {
					$authtoken = $this->getAuthtoken($_POST['email']);
					//$nameParts = explode(" ", $_POST["sname"]);
					$insertQuery = "INSERT INTO ".$this->userTable."(first_name, last_name, email, gender, password, mobile, designation, type, status, authtoken, image) 
						VALUES ('".$_POST["sname"]."', '', '".$_POST["email"]."', '".$_POST["gender"]."', '".md5("123")."', '".$_POST["mobile"]."', '4', 'general', 'active', '".$authtoken."', '".$fileName."')";
					$queryB=mysqli_query($this->dbConnect, $insertQuery);
					
					$sqlQuery = "SELECT id FROM ".$this->userTable." where first_name = '".$_POST["sname"]."' ORDER BY id DESC";
					$result = mysqli_query($this->dbConnect, $sqlQuery);
					if ( $users = mysqli_fetch_assoc($result) ) {
						$insertQuery = "INSERT INTO ".$this->user_studentTable."(user_id, student_id) 
							VALUES ('".$users['id']."', '".$students["id"]."')";
						$queryC=mysqli_query($this->dbConnect, $insertQuery);
					}
				}			
			}
			
			//$userSaved = mysqli_query($this->dbConnect, $insertQuery);
			$userSaved = ($queryA && $queryB && $queryC);
		}
	}

	public function updateStudent() {
		$fileName='';		
		if($_POST['studentid']) {	
			if($_FILES["photo"]["name"]) {
				$target_dir = "upload/";
				$fileName = time().$_FILES["photo"]["name"];
				$targetFile = $target_dir . basename($fileName);
				if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
					echo "The file $fileName has been uploaded.";
					$imageUpdate = ", image = '$fileName' ";
					$photoUpdate = ", photo = '$fileName' ";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
			if ($fileName=='') 
				{
					$imageUpdate='';
					$photoUpdate='';
				}				
			$updateQueryA = "UPDATE ".$this->studentTable." 
			SET name = '".$_POST["sname"]."', email = '".$_POST["email"]."', mobile = '".$_POST["mobile"]."', gender = '".$_POST["gender"]."', current_address = '".$_POST["address"]."', father_name = '".$_POST["fname"]."', mother_name = '".$_POST["mname"]."', class = '".$_POST["classid"]."', section = '".$_POST["sectionid"]."', admission_no = '".$_POST["registerNo"]."', roll_no = '".$_POST["rollNo"]."', academic_year = '".$_POST["year"]."', admission_date = '".$_POST["admission_date"]."', dob = '".$_POST["dob"]."' $photoUpdate 
			WHERE id ='".$_POST["studentid"]."'";
			//echo $updateQuery;
			mysqli_query($this->dbConnect, $updateQueryA);
			
			$updateQueryB = "UPDATE ".$this->userTable." 
			SET first_name = '".$_POST["sname"]."', email = '".$_POST["email"]."', mobile = '".$_POST["mobile"]."', gender = '".$_POST["gender"]."' $imageUpdate  
			WHERE id = (SELECT user_id FROM ".$this->user_studentTable." WHERE student_id='".$_POST["studentid"]."')";
			mysqli_query($this->dbConnect, $updateQueryB);
			
			$isUpdated = ($updateQueryA && $updateQueryB);		
		}	
	}	
	public function deleteStudent(){
		if($_POST["studentid"]) {
			$sqlUpdate = "
				DELETE FROM ".$this->studentTable."
				WHERE id = '".$_POST["studentid"]."'";		
			mysqli_query($this->dbConnect, $sqlUpdate);		
		}
	}
	
	public function getStudentDetails(){
		$sqlQuery = "SELECT s.id, s.name, s.photo, s.gender, s.dob, s.mobile, s.email, s.current_address, s.father_name, s.mother_name,s.admission_no, s.roll_no, s.admission_date, s.academic_year, s.class, s.section 
			FROM ".$this->studentTable." as s
			LEFT JOIN ".$this->classesTable." as c ON s.class = c.id 
			WHERE s.id = '".$_POST["studentid"]."'";		
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}

	/*****************Teacher methods****************/
	public function _____TEACHERS____(){}
	
	public function listTeachers(){		
		$sqlQuery = "SELECT t.teacher_id, t.teacher, p.program, c.name, se.section			
			FROM ".$this->teacherTable." as t 
			LEFT JOIN ".$this->programsTable." as p ON t.program_id = p.program_id
			LEFT JOIN ".$this->classesTable." as c ON t.teacher_id = c.teacher_id
			LEFT JOIN ".$this->sectionsTable." as se ON c.section = se.section_id ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= ' WHERE (t.teacher_id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR t.teacher LIKE "%'.$_POST["search"]["value"].'%" ';					
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY t.teacher ASC ';//$sqlQuery .= 'ORDER BY t.teacher_id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$teacherData = array();	
		$no=1;
		while( $teacher = mysqli_fetch_assoc($result) ) {		
			$teacherRows = array();		
			$teacherRows[] = $no; $no++;	
			$teacherRows[] = $teacher['teacher_id'];
			$teacherRows[] = $teacher['teacher'];
			$teacherRows[] = $teacher['program'];
			$teacherRows[] = $teacher['name'];	
			$teacherRows[] = $teacher['section'];				
			$teacherRows[] = '<button type="button" name="update" id="'.$teacher["teacher_id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$teacherRows[] = '<button type="button" name="delete" id="'.$teacher["teacher_id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$teacherData[] = $teacherRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$teacherData
		);
		echo json_encode($output);
	}
	public function addTeacher () {
		if($_POST["teacher_name"]) {
		$insertQuery = "INSERT INTO ".$this->teacherTable."(teacher,program_id) 
				VALUES ('".$_POST["teacher_name"]."',".$_POST["program_id"].")";
			$userSaved = mysqli_query($this->dbConnect, $insertQuery);
		}
	}
	
	public function updateTeacher() {
		if($_POST['teacherid']) {	
			$updateQuery = "UPDATE ".$this->teacherTable." 
			SET teacher = '".$_POST["teacher_name"]."', program_id = '".$_POST["program_id"]."' WHERE teacher_id ='".$_POST["teacherid"]."'";				
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}	
	public function deleteTeacher(){
		if($_POST["teacherid"]) {
			$sqlUpdate = "
				DELETE FROM ".$this->teacherTable."
				WHERE teacher_id = '".$_POST["teacherid"]."'";		
			mysqli_query($this->dbConnect, $sqlUpdate);		
		}
	}
	
	public function getTeacherDetails(){	//formerly getTeacher
		$sqlQuery = "
			SELECT * FROM ".$this->teacherTable." 
			WHERE teacher_id = '".$_POST["teacherid"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}
	
	public function getTeacherOptions(){		//formerly getTeacherList	
		$sqlQuery = "SELECT * FROM ".$this->teacherTable;	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$teacherHTML = '';
		while( $teacher = mysqli_fetch_assoc($result)) {
			$teacherHTML .= '<option value="'.$teacher["teacher_id"].'">'.$teacher["teacher"].'</option>';	
		}
		return $teacherHTML;
	}		

	/*****************Programs methods****************/
	public function _____PROGRAMS____(){}
	
	public function listPrograms(){		
	
		$sqlQuery = "SELECT p.program_id, p.program, p.type, p.code 
			FROM ".$this->programsTable." as p ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= ' WHERE (p.program_id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR p.program LIKE "%'.$_POST["search"]["value"].'%" ';	
			$sqlQuery .= ' OR p.type LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR p.code LIKE "%'.$_POST["search"]["value"].'%" ';						
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY p.code ASC ';//$sqlQuery .= 'ORDER BY p.program_id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$programData = array();	
		$no=1;
		while( $program = mysqli_fetch_assoc($result) ) {		
			$programRows = array();	
			$programRows[] = $no; $no++;			
			$programRows[] = $program['program_id'];
			$programRows[] = $program['program'];	
			$programRows[] = $program['type'];	
			$programRows[] = $program['code'];			
			$programRows[] = '<button type="button" name="update" id="'.$program["program_id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$programRows[] = '<button type="button" name="delete" id="'.$program["program_id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$programData[] = $programRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$programData
		);
		echo json_encode($output);
	}

	public function addProgram () {
		if($_POST["program"]) {
			$insertQuery = "INSERT INTO ".$this->programsTable."(program, type, code) 
				VALUES ('".$_POST["program"]."', '".$_POST["p_type"]."', '".$_POST["code"]."')";
			$userSaved = mysqli_query($this->dbConnect, $insertQuery);
		}		
	}
	
	public function updateProgram() {
		if($_POST['programid']) {	
			$updateQuery = "UPDATE ".$this->programsTable." 
			SET program = '".$_POST["program"]."', type = '".$_POST["p_type"]."', code = '".$_POST["code"]."'
			WHERE program_id ='".$_POST["programid"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}			
	}	
	
	public function deleteProgram(){
		if($_POST["programid"]) {
			$sqlUpdate = "
				DELETE FROM ".$this->programsTable."
				WHERE program_id = '".$_POST["programid"]."'";		
			mysqli_query($this->dbConnect, $sqlUpdate);		
		}
	}
	
	public function getProgramDetails(){	//formerly getProgram
		$sqlQuery = "
			SELECT * FROM ".$this->programsTable." 
			WHERE program_id = '".$_POST["programid"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);		
	}	
	
	public function getProgramOptions(){	//formerly getProgramList	
		$sqlQuery = "SELECT * FROM ".$this->programsTable;	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$programHTML = '';
		while( $program = mysqli_fetch_assoc($result)) {
			$programHTML .= '<option value="'.$program["program_id"].'">'.$program["program"].'</option>';	
		}
		return $programHTML;		
	}
	
	/*****************Subject methods****************/
	public function _____SUBJECTS____(){}
		
	public function listSubject(){		
		$sqlQuery = "SELECT subject_id, subject, type, code 
			FROM ".$this->subjectsTable." WHERE 1=1 ";
		$sqlQuery .= " AND code>1 ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= ' AND (subject_id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR subject LIKE "%'.$_POST["search"]["value"].'%" ';	
			$sqlQuery .= ' OR type LIKE "%'.$_POST["search"]["value"].'%" ';	
			$sqlQuery .= ' OR code LIKE "%'.$_POST["search"]["value"].'%" ';				
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY code ASC ';//$sqlQuery .= 'ORDER BY subject_id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		
		
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$subjectData = array();	
		$no=1;
		while( $subject = mysqli_fetch_assoc($result) ) {		
			$subjectRows = array();	
			$subjectRows[] = $no; $no++;
			$subjectRows[] = $subject['subject_id'];
			$subjectRows[] = $subject['subject'];	
			$subjectRows[] = $subject['type'];				
			$subjectRows[] = $subject['code'];
			$subjectRows[] = '<button type="button" name="update" id="'.$subject["subject_id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$subjectRows[] = '<button type="button" name="delete" id="'.$subject["subject_id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$subjectData[] = $subjectRows;
		}

		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$subjectData
		);
		
		echo json_encode($output);
	}
	
	public function addSubject () {
		if($_POST["subject"]) {
			$insertQuery = "INSERT INTO ".$this->subjectsTable."(subject, type, code) 
				VALUES ('".$_POST["subject"]."', '".$_POST["s_type"]."', '".$_POST["code"]."')";
			$userSaved = mysqli_query($this->dbConnect, $insertQuery);
		}
	}
	
	public function updateSubject() {
		if($_POST['subjectid']) {	
			$updateQuery = "UPDATE ".$this->subjectsTable." 
			SET subject = '".$_POST["subject"]."', type = '".$_POST["s_type"]."', code = '".$_POST["code"]."'
			WHERE subject_id ='".$_POST["subjectid"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}	
	
	public function deleteSubject(){
		if($_POST["subjectid"]) {
			$sqlUpdate = "
				DELETE FROM ".$this->subjectsTable."
				WHERE subject_id = '".$_POST["subjectid"]."'";		
			mysqli_query($this->dbConnect, $sqlUpdate);		
		}
	}	

	public function getSubjectDetails(){
		$sqlQuery = "
			SELECT * FROM ".$this->subjectsTable." 
			WHERE subject_id = '".$_POST["subjectid"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}
	
	public function getSubjectOptions(){	//formerly getSubjectList		
		$sqlQuery = "SELECT * FROM ".$this->subjectsTable;	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$subjectHTML = '';
		while( $subject = mysqli_fetch_assoc($result)) {
			$subjectHTML .= '<option value="'.$subject["subject_id"].'">'.$subject["subject"].'</option>';	
		}
		return $subjectHTML;
	}
	
	/*****************Section methods****************/
	public function _____SECTIONS____(){}
	
	public function listSections(){		
		$sqlQuery = "SELECT s.section_id, s.section 
			FROM ".$this->sectionsTable." as s ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= ' WHERE (s.section_id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR s.section LIKE "%'.$_POST["search"]["value"].'%" ';					
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY s.section_id ASC ';//$sqlQuery .= 'ORDER BY s.section_id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$sectionData = array();	
		$no=1;
		while( $section = mysqli_fetch_assoc($result) ) {		
			$sectionRows = array();			
			$sectionRows[] = $no; $no++;
			$sectionRows[] = $section['section_id'];
			$sectionRows[] = $section['section'];				
			$sectionRows[] = '<button type="button" name="update" id="'.$section["section_id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$sectionRows[] = '<button type="button" name="delete" id="'.$section["section_id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$sectionData[] = $sectionRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$sectionData
		);
		echo json_encode($output);
	}
	
	public function addSection () {
		if($_POST["section_name"]) {
			$insertQuery = "INSERT INTO ".$this->sectionsTable."(section) 
				VALUES ('".$_POST["section_name"]."')";
			$userSaved = mysqli_query($this->dbConnect, $insertQuery);
		}
	}

	public function updateSection() {
		if($_POST['sectionid']) {	
			$updateQuery = "UPDATE ".$this->sectionsTable." 
			SET section = '".$_POST["section_name"]."'
			WHERE section_id ='".$_POST["sectionid"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}	
	
	public function deleteSection(){
		if($_POST["sectionid"]) {
			$sqlUpdate = "
				DELETE FROM ".$this->sectionsTable."
				WHERE section_id = '".$_POST["sectionid"]."'";		
			mysqli_query($this->dbConnect, $sqlUpdate);		
		}
	}

	public function getSectionDetails(){	//fomerly getSection
		$sqlQuery = "
			SELECT * FROM ".$this->sectionsTable." 
			WHERE section_id = '".$_POST["sectionid"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}
	
	public function getSectionOptions(){		//formerly getSectionList
		$sqlQuery = "SELECT * FROM ".$this->sectionsTable;	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$sectionHTML = '';
		while( $section = mysqli_fetch_assoc($result)) {
			$sectionHTML .= '<option value="'.$section["section_id"].'">'.$section["section"].'</option>';	
		}
		return $sectionHTML;
	}	
	
	/*****************Classes methods****************/	
	public function _____CLASSES____(){}
	
	public function listClasses(){		
		$sqlQuery = "SELECT c.id, c.name, s.section, t.teacher, ss.session, ss.start, ss.end  
			FROM ".$this->classesTable." as c
			LEFT JOIN ".$this->sectionsTable." as s ON c.section = s.section_id
			LEFT JOIN ".$this->teacherTable." as t ON c.teacher_id = t.teacher_id 
				LEFT JOIN ".$this->class_sessionTable." as cs ON c.id = cs.class_id 
				LEFT JOIN ".$this->sessionsTable." as ss ON cs.session_id = ss.session_id ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= ' WHERE (c.id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR c.name LIKE "%'.$_POST["search"]["value"].'%" ';	
				$sqlQuery .= ' OR ss.session LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR s.section LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR t.teacher LIKE "%'.$_POST["search"]["value"].'%" ';				
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY c.id ASC ';//$sqlQuery .= 'ORDER BY c.id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$classesData = array();	
		$no=1;
		while( $classes = mysqli_fetch_assoc($result) ) {		
			$classesRows = array();			
			$classesRows[] = $no; $no++;			
			$classesRows[] = $classes['id'];
			$classesRows[] = $classes['name'];
				$classesRows[] = $classes['session'].': '.substr($classes["start"],0,5).' - '.substr($classes["end"],0,5);	
			$classesRows[] = $classes['section'];	
			$classesRows[] = $classes['teacher'];	
			$classesRows[] = '<button type="button" name="update" id="'.$classes["id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$classesRows[] = '<button type="button" name="delete" id="'.$classes["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$classesData[] = $classesRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$classesData
		);
		echo json_encode($output);
	}
	public function addClass () {
		if($_POST["cname"]) {
			$insertQuery = "INSERT INTO ".$this->classesTable."(name, section, teacher_id) 
				VALUES ('".$_POST["cname"]."', '".$_POST["sectionid"]."', '".$_POST["teacherid"]."')";
			$queryA = mysqli_query($this->dbConnect, $insertQuery);
			
			$sqlQuery = "SELECT id FROM ".$this->classesTable." where name = '".$_POST["cname"]."' ";
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			$numRows = mysqli_num_rows($result);
			while( $classes = mysqli_fetch_assoc($result) ) {					
				$insertQuery = "INSERT INTO ".$this->class_sessionTable."(class_id, session_id) 
					VALUES ('".$classes['id']."', '".$_POST["sessionid"]."')";
				$queryB=mysqli_query($this->dbConnect, $insertQuery);
			}
			
			//$userSaved = mysqli_query($this->dbConnect, $insertQuery);
			$userSaved = ($queryA && $queryB);
		}
	}

	public function updateClass() {
		if($_POST['classid']) {	
			$updateQuery = "UPDATE ".$this->classesTable." 
			SET Name = '".$_POST["cname"]."', section = '".$_POST["sectionid"]."', teacher_id = '".$_POST["teacherid"]."'
			WHERE id ='".$_POST["classid"]."'";			
			$queryA=mysqli_query($this->dbConnect, $updateQuery);
			
			$updateQuery = "UPDATE ".$this->class_sessionTable." 
			SET session_id = '".$_POST["sessionid"]."'
			WHERE class_id ='".$_POST["classid"]."'";
			$queryB=mysqli_query($this->dbConnect, $updateQuery);	
			
			//$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
			$isUpdated = ($queryA && $queryB);
		}	
	}	
	public function deleteClass(){
		if($_POST["classid"]) {
			$sqlUpdate = "DELETE FROM ".$this->classesTable." WHERE id = '".$_POST["classid"]."'";		
			mysqli_query($this->dbConnect, $sqlUpdate);		

			$sqlUpdate = "DELETE FROM ".$this->class_sessionTable." WHERE class_id = '".$_POST["classid"]."'";		
			mysqli_query($this->dbConnect, $sqlUpdate);				
		}
	}

	public function getClassesDetails(){
		$sqlQuery = "SELECT c.id, c.name, cs.session_id, s.section, s.section_id, t.teacher_id
			FROM ".$this->classesTable." as c
			LEFT JOIN ".$this->sectionsTable." as s ON c.section = s.section_id 
			LEFT JOIN ".$this->teacherTable." as t ON c.teacher_id = t.teacher_id
				LEFT JOIN ".$this->class_sessionTable." as cs ON c.id = cs.class_id 
			WHERE c.id = '".$_POST["classid"]."'";		
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}

	public function getClassOptions(){	//formerly classList		
		$sqlQuery = "SELECT * FROM ".$this->classesTable;	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$classHTML = '';
		while( $class = mysqli_fetch_assoc($result)) {
			$classHTML .= '<option value="'.$class["id"].'">'.$class["name"].'</option>';	
		}
		return $classHTML;
	}
	
	/*****************Session methods****************/
	public function _____SESSIONS____(){}
		
	public function listSessions(){		
		/*
		$sqlQuery = "SELECT s.session_id, s.session, SUBSTRING(TIME(s.start), 1, 5) as start, SUBSTRING(TIME(s.end), 1, 5) as end 
			FROM ".$this->sessionsTable." as s ";
		*/
		$sqlQuery = "SELECT s.session_id, s.session, s.start, s.end 
			FROM ".$this->sessionsTable." as s ";
	
	if(!empty($_POST["search"]["value"])){
			$sqlQuery .= ' WHERE (s.session_id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR s.session LIKE "%'.$_POST["search"]["value"].'%" ';					
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY s.session_id ASC ';//$sqlQuery .= 'ORDER BY s.session_id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$sessionData = array();	
		$no=1;
		while( $session = mysqli_fetch_assoc($result) ) {		
			$sessionRows = array();			
			$sessionRows[] = $no; $no++;
			$sessionRows[] = $session['session_id'];
			$sessionRows[] = $session['session'];	
			$sessionRows[] = substr($session['start'],0,5);	
			$sessionRows[] = substr($session['end'],0,5);			
			$sessionRows[] = '<button type="button" name="update" id="'.$session["session_id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$sessionRows[] = '<button type="button" name="delete" id="'.$session["session_id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$sessionData[] = $sessionRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$sessionData
		);
		echo json_encode($output);
	}

	public function addSession () {
		if($_POST["session_name"]) {
			/*
			$insertQuery = "INSERT INTO ".$this->sessionsTable." (session,start,end) 
				VALUES ('".$_POST["session_name"]."', '1000-01-01 '".$_POST["session_start"]."':00', '1000-01-01 '".$_POST["session_end"]."':00')";
			*/
			
			/*
			$startDate="1000-01-01 ".$_POST["session_start"].":00";
			$endDate="1000-01-01 ".$_POST["session_end"].":00";

			$insertQuery = "INSERT INTO ".$this->sessionsTable." (session,start,end) VALUES ('".$_POST["session_name"]."','".$startDate."','".$endDate."');";
			$userSaved = mysqli_query($this->dbConnect, $insertQuery);
			*/
			
			$startTime=$_POST["session_start"];
			$endTime=$_POST["session_end"];
			
			$insertQuery = "INSERT INTO ".$this->sessionsTable." (session,start,end) VALUES ('".$_POST["session_name"]."','".$startTime."','".$endTime."');";
			$userSaved = mysqli_query($this->dbConnect, $insertQuery);
		}
	}

	public function updateSession() {
		if($_POST['sessionid']) {	
			
			//$updateQuery = "UPDATE sis_session SET session = 'full time (morning)', start='1000-01-01 03:33:00', end='1000-01-01 12:01:00' WHERE session_id ='1'";
			
			/*
			$startDate="1000-01-01 ".$_POST["session_start"].":00";
			$endDate="1000-01-01 ".$_POST["session_end"].":00";
			
			$updateQuery = "UPDATE ".$this->sessionsTable." 
			SET session = '".$_POST["session_name"]."', start='".$startDate."', end='".$endDate."'  			
			WHERE session_id ='".$_POST["sessionid"]."'";
			*/

			$startTime=$_POST["session_start"];
			$endTime=$_POST["session_end"];
			
			$updateQuery = "UPDATE ".$this->sessionsTable." 
			SET session = '".$_POST["session_name"]."', start='".$startTime."', end='".$endTime."'  			
			WHERE session_id ='".$_POST["sessionid"]."'";

			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);	
			
		}	
	}	
	
	public function deleteSession(){
		if($_POST["sessionid"]) {
			$sqlUpdate = "
				DELETE FROM ".$this->sessionsTable."
				WHERE session_id = '".$_POST["sessionid"]."'";		
			mysqli_query($this->dbConnect, $sqlUpdate);		
		}
	}

	public function getSessionDetails(){	//formerly getSession
		/*
		$sqlQuery = "
			SELECT * FROM ".$this->sessionsTable." 
			WHERE session_id = '".$_POST["sessionid"]."'";
		*/	

		/*	
		$sqlQuery = "SELECT s.session_id, s.session, SUBSTRING(TIME(s.start), 1, 5) as startTime, SUBSTRING(TIME(s.end), 1, 5) as endTime 
			FROM ".$this->sessionsTable." as s WHERE session_id ='".$_POST["sessionid"]."'";
		*/
		$sqlQuery = "SELECT s.session_id, s.session, s.start as startTime, s.end as endTime 
			FROM ".$this->sessionsTable." as s WHERE session_id ='".$_POST["sessionid"]."'";
		
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}

	// DON'T DELETE, THIS IS USED FOR CLASS
	public function getSessionOptions(){	//formerly 	getSessionList
		$sqlQuery = "SELECT * FROM ".$this->sessionsTable;	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$sessionHTML = '';
		while( $session = mysqli_fetch_assoc($result)) {
			$sessionHTML .= '<option value="'.$session["session_id"].'">'.$session["session"].': '.substr($session["start"],0,5).' - '.substr($session["end"],0,5).'</option>';	
		}
		return $sessionHTML;
	}

	public function getStartOptions(){	
		$sqlQuery = "SELECT start FROM ".$this->timeTable;	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$startHTML = '';
		while( $time = mysqli_fetch_assoc($result)) {
			$startHTML .= '<option value="'.$time["start"].'">'.substr($time["start"],0,5).'</option>';	
		}
		return $startHTML;		
	}

	public function getEndOptions(){	
		$sqlQuery = "SELECT end FROM ".$this->timeTable;	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$endHTML = '';
		while( $time = mysqli_fetch_assoc($result)) {
			$endHTML .= '<option value="'.$time["end"].'">'.substr($time["end"],0,5).'</option>';	
		}
		return $endHTML;		
	}
	/*****************Class attendance****************/
	public function _____ATTENDANCE____(){}
	
	public function getClassAttendence(){		
		if($_POST["classid"] && $_POST["sectionid"]) {
			
			$attendanceYear = date('Y'); 
			$attendanceMonth = date('m'); 
			$attendanceDay = date('d'); 
			
			/*
			$attendanceYear = _date('Y', false, 'Asia/Kuala_Lumpur');
			$attendanceMonth = _date('m', false, 'Asia/Kuala_Lumpur');
			$attendanceDay = _date('d', false, 'Asia/Kuala_Lumpur');
			*/
			$attendanceDate = $attendanceYear."-".$attendanceMonth."-".$attendanceDay;	
			
			$sqlQueryCheck = "SELECT * FROM ".$this->attendanceTable." 
				WHERE class_id = '".$_POST["classid"]."' AND section_id = '".$_POST["sectionid"]."' AND attendance_date = '".$attendanceDate."'";	
			$resultAttendance = mysqli_query($this->dbConnect, $sqlQueryCheck);	
			$attendanceDone = mysqli_num_rows($resultAttendance);
			
			$query = '';
			if($attendanceDone) {
				$query = "AND a.attendance_date = '".$attendanceDate."'";
			}
/*		
			$sqlQuery = "SELECT s.id, s.name, s.photo, s.gender, s.dob, s.mobile, s.email, s.current_address, s.father_name, s.mother_name,s.admission_no, s.roll_no, s.admission_date, s.academic_year, a.attendance_status, a.attendance_date
				FROM ".$this->studentTable." as s
				LEFT JOIN ".$this->attendanceTable." as a ON s.id = a.student_id
				WHERE s.class = '".$_POST["classid"]."' AND s.section='".$_POST["sectionid"]."' $query ";
			$sqlQuery .= "GROUP BY a.student_id ";	
*/
			$sqlQuery = "SELECT s.id, s.name, s.photo, s.gender, s.dob, s.mobile, s.email, s.current_address, s.father_name, s.mother_name,s.admission_no, s.roll_no, s.admission_date, s.academic_year, a.attendance_status, a.attendance_date
				FROM ".$this->studentTable." as s
				LEFT JOIN ".$this->attendanceTable." as a 
				ON s.id = a.student_id
				WHERE s.class = '".$_POST["classid"]."' AND s.section='".$_POST["sectionid"]."' $query ";
			//$sqlQuery .= "GROUP BY a.student_id ";	

			if(!empty($_POST["search"]["value"])){
				$sqlQuery .= ' AND (s.id LIKE "%'.$_POST["search"]["value"].'%" ';
				$sqlQuery .= ' OR s.name LIKE "%'.$_POST["search"]["value"].'%" ';
				$sqlQuery .= ' OR s.admission_no LIKE "%'.$_POST["search"]["value"].'%" ';	
				$sqlQuery .= ' OR s.roll_no LIKE "%'.$_POST["search"]["value"].'%" )';			
			}
			if(!empty($_POST["order"])){
				$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
			} else {
				$sqlQuery .= 'ORDER BY s.name ASC ';//$sqlQuery .= 'ORDER BY s.id DESC ';
			}
			if($_POST["length"] != -1){
				$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
			}	
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			$numRows = mysqli_num_rows($result);
			
			$studentData = array();	
			
			$no=1;
			while($student = mysqli_fetch_assoc($result) ) {	
				$checked = array();
				$checked[1] = '';
				$checked[2] = '';
				$checked[3] = '';
				$checked[4] = '';
				if($student['attendance_date'] == $attendanceDate) {
					if($student['attendance_status'] == '1') {
						$checked[1] = 'checked';
					} else if($student['attendance_status'] == '2') {
						$checked[2] = 'checked';
					} else if($student['attendance_status'] == '3') {
						$checked[3] = 'checked';
					} else if($student['attendance_status'] == '4') {
						$checked[4] = 'checked';
					}	
				}				
				$studentRows = array();		
				$studentRows[] = $no; $no++;
				$studentRows[] = $student['id'];
				$studentRows[] = $student['admission_no'];
				$studentRows[] = $student['roll_no'];
				$studentRows[] = $student['name'];	
				$studentRows[] = '
				<input type="radio" id="attendencetype1_'.$student['id'].'" value="1" name="attendencetype_'.$student['id'].'" autocomplete="off" '.$checked['1'].'>
				<label for="attendencetype1_'.$student['id'].'">Present</label>
				<input type="radio" id="attendencetype2_'.$student['id'].'" value="2" name="attendencetype_'.$student['id'].'" autocomplete="off" '.$checked['2'].'>
				<label for="attendencetype2_'.$student['id'].'">Late </label>
				<input type="radio" id="attendencetype3_'.$student['id'].'" value="3" name="attendencetype_'.$student['id'].'" autocomplete="off" '.$checked['3'].'>
				<label for="attendencetype3_'.$student['id'].'"> Absent </label>
				<input type="radio" id="attendencetype4_'.$student['id'].'" value="4" name="attendencetype_'.$student['id'].'" autocomplete="off" '.$checked['4'].'>
				<label for="attendencetype4_'.$student['id'].'"> Half Day </label>';					
				$studentData[] = $studentRows;
			}
			
			$output = array(
				"draw"				=>	intval($_POST["draw"]),
				"recordsTotal"  	=>  $numRows,
				"recordsFiltered" 	=> 	$numRows,
				"data"    			=> 	$studentData
			);
			echo json_encode($output);
			
		}
	}
	
	public function updateAttendance(){	
			
			$attendanceYear = date('Y'); 
			$attendanceMonth = date('m'); 
			$attendanceDay = date('d'); 
			
			/*
			$attendanceYear = _date('Y', false, 'Asia/Kuala_Lumpur');
			$attendanceMonth = _date('m', false, 'Asia/Kuala_Lumpur');
			$attendanceDay = _date('d', false, 'Asia/Kuala_Lumpur');
			*/
		
		$attendanceDate = $attendanceYear."-".$attendanceMonth."-".$attendanceDay;		
		$sqlQuery = "SELECT * FROM ".$this->attendanceTable." 
			WHERE class_id = '".$_POST["att_classid"]."' AND section_id = '".$_POST["att_sectionid"]."' AND attendance_date = '".$attendanceDate."'";	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$attendanceDone = mysqli_num_rows($result);
		if($attendanceDone) {
			foreach($_POST as $key => $value) {				
				if (strpos($key, "attendencetype_") !== false) {
					$student_id = str_replace("attendencetype_","", $key);
					$attendanceStatus = $value;		
					$score=0.0;
					if($student_id) {
						if ($attendanceStatus=="1") $score=1.0;
						if ($attendanceStatus=="2") $score=2.0/3.0;
						if ($attendanceStatus=="3") $score=0.0;
						if ($attendanceStatus=="4") $score=0.5;

						$updateQuery = "UPDATE ".$this->attendanceTable." SET attendance_status = '".$attendanceStatus."', score=".$score."  
						WHERE student_id = '".$student_id."' AND class_id = '".$_POST["att_classid"]."' AND section_id = '".$_POST["att_sectionid"]."' AND attendance_date = '".$attendanceDate."'";
						mysqli_query($this->dbConnect, $updateQuery);
					}
				}				
			}	
			echo "Attendance updated successfully!";			
		} else {
			foreach($_POST as $key => $value) {				
				if (strpos($key, "attendencetype_") !== false) {
					$student_id = str_replace("attendencetype_","", $key);
					$attendanceStatus = $value;	
					$score=0.0;	
					if($student_id) {
						if ($attendanceStatus=="1") $score=1.0;
						if ($attendanceStatus=="2") $score=2.0/3.0;
						if ($attendanceStatus=="3") $score=0.0;
						if ($attendanceStatus=="4") $score=0.5;

						$insertQuery = "INSERT INTO ".$this->attendanceTable."(student_id, class_id, section_id, attendance_status, attendance_date, score) 
						VALUES ('".$student_id."', '".$_POST["att_classid"]."', '".$_POST["att_sectionid"]."', '".$attendanceStatus."', '".$attendanceDate."', '".$score."')";
						mysqli_query($this->dbConnect, $insertQuery);
					}
				}
				
			}
			echo "Attendance save successfully!";
		}	
	}
	
	public function attendanceStatus(){	
			
			$attendanceYear = date('Y'); 
			$attendanceMonth = date('m'); 
			$attendanceDay = date('d'); 
			
			/*
			$attendanceYear = _date('Y', false, 'Asia/Kuala_Lumpur');
			$attendanceMonth = _date('m', false, 'Asia/Kuala_Lumpur');
			$attendanceDay = _date('d', false, 'Asia/Kuala_Lumpur');
			*/
		
		$attendanceDate = $attendanceYear."-".$attendanceMonth."-".$attendanceDay;		
		$sqlQuery = "SELECT * FROM ".$this->attendanceTable." 
			WHERE class_id = '".$_POST["classid"]."' AND section_id = '".$_POST["sectionid"]."' AND attendance_date = '".$attendanceDate."'";	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$attendanceDone = mysqli_num_rows($result);
		if($attendanceDone) {
			echo "Attendance already submitted!";
		} 
	}
	
	/*****************Students attendance****************/
	public function _____ATTENDANCE_REPORT____(){}
		
	public function getStudentsAttendance(){		
		if($_POST["classid"] && $_POST["sectionid"] && $_POST["attendanceDate"]) {
			$sqlQuery = "SELECT s.id, s.name, s.photo, s.gender, s.dob, s.mobile, s.email, s.current_address, s.father_name, s.mother_name,s.admission_no, s.roll_no, s.admission_date, s.academic_year, a.attendance_status
				FROM ".$this->studentTable." as s
				LEFT JOIN ".$this->attendanceTable." as a ON s.id = a.student_id
				WHERE s.class = '".$_POST["classid"]."' AND s.section='".$_POST["sectionid"]."' AND a.attendance_date = '".$_POST["attendanceDate"]."'";
			if(!empty($_POST["search"]["value"])){
				$sqlQuery .= ' AND (s.id LIKE "%'.$_POST["search"]["value"].'%" ';
				$sqlQuery .= ' OR s.name LIKE "%'.$_POST["search"]["value"].'%" ';
				$sqlQuery .= ' OR s.admission_no LIKE "%'.$_POST["search"]["value"].'%" ';	
				$sqlQuery .= ' OR s.roll_no LIKE "%'.$_POST["search"]["value"].'%" ';	
				$sqlQuery .= ' OR a.attendance_date LIKE "%'.$_POST["search"]["value"].'%" )';
			}
			if(!empty($_POST["order"])){
				$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
			} else {
				$sqlQuery .= 'ORDER BY s.name ASC ';//$sqlQuery .= 'ORDER BY s.id DESC ';
			}
			if($_POST["length"] != -1){
				$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
			}	
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			$numRows = mysqli_num_rows($result);
			
			$studentData = array();	
			
			$no=1;
			while($student = mysqli_fetch_assoc($result) ) {					
				$attendance = '';
				if($student['attendance_status'] == '1') {
					$attendance = '<small class="label label-success">Present</small>';
				} else if($student['attendance_status'] == '2') {
					$attendance = '<small class="label label-warning">Late</small>';
				} else if($student['attendance_status'] == '3') {
					$attendance = '<small class="label label-danger">Absent</small>';
				} else if($student['attendance_status'] == '4') {
					$attendance = '<small class="label label-info">Half Day</small>';
				}				
				$studentRows = array();
				$studentRows[] = $no; $no++;				
				$studentRows[] = $student['id'];
				$studentRows[] = $student['admission_no'];
				$studentRows[] = $student['roll_no'];
				$studentRows[] = $student['name'];		
				$studentRows[] = $attendance;					
				$studentData[] = $studentRows;
			}
			
			$output = array(
				"draw"				=>	intval($_POST["draw"]),
				"recordsTotal"  	=>  $numRows,
				"recordsFiltered" 	=> 	$numRows,
				"data"    			=> 	$studentData
			);
			echo json_encode($output);
			
		}
	}
	
		
	/*****************class_subject****************/
	public function _____CLASS_SUBJECT____(){}
	
		public function listClass_Subject(){		
		$sqlQuery = "SELECT c.name, s.subject, cs.class_id, cs.subject_id			
			FROM ".$this->class_subjectTable." as cs 
			LEFT JOIN ".$this->classesTable." as c ON c.id = cs.class_id
			LEFT JOIN ".$this->subjectsTable." as s ON s.subject_id = cs.subject_id ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= ' WHERE (c.name LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR s.subject LIKE "%'.$_POST["search"]["value"].'%" ';					
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY c.name ASC ';//$sqlQuery .= 'ORDER BY t.teacher_id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$class_subjectData = array();	
		$no=1;
		while( $class_subject = mysqli_fetch_assoc($result) ) {		
			$class_subjectRows = array();		
			$class_subjectRows[] = $no; $no++;	
			$class_subjectRows[] = $class_subject['name'];
			$class_subjectRows[] = $class_subject['subject'];				
			$class_subjectRows[] = '<button type="button" name="update" id="'.$class_subject["class_id"].'_'.$class_subject["subject_id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$class_subjectRows[] = '<button type="button" name="delete" id="'.$class_subject["class_id"].'_'.$class_subject["subject_id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$class_subjectData[] = $class_subjectRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$class_subjectData
		);
		echo json_encode($output);
	}
	public function addClass_Subject () {
		if($_POST["class_id"] && $_POST["subject_id"]) {
		$insertQuery = "INSERT INTO ".$this->class_subjectTable."(class_id,subject_id) 
		VALUES ('".$_POST["class_id"]."',".$_POST["subject_id"].")";
			$userSaved = mysqli_query($this->dbConnect, $insertQuery);
		}
	}
	
	public function updateClass_Subject() {
		if($_POST["class_id"] && $_POST["subject_id"]) {
			$updateQuery = "UPDATE ".$this->class_subjectTable." 
			SET class_id = '".$_POST["class_id"]."', subject_id = '".$_POST["subject_id"]."' 
			WHERE (class_id = '".$_POST["cid"]."' 
			AND subject_id = '".$_POST["sid"]."')";					
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}	
	public function deleteClass_Subject(){
		if($_POST["class_id"] && $_POST["subject_id"]) {
			$sqlUpdate = "
				DELETE FROM ".$this->class_subjectTable."
				WHERE (class_id = '".$_POST["class_id"]."' 
				AND subject_id = '".$_POST["subject_id"]."')";		
			mysqli_query($this->dbConnect, $sqlUpdate);		
		}
	}
	
	public function getClass_SubjectDetails(){	//formerly getClass
		$sqlQuery = "
			SELECT * FROM ".$this->class_subjectTable." 
			WHERE (class_id = '".$_POST["class_id"]."' 
			AND subject_id = '".$_POST["subject_id"]."')";	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}
/*	
	public function getClassOptions(){		//formerly getClassList	
		$sqlQuery = "SELECT * FROM ".$this->class_subjectTable;	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$class_subjectHTML = '';
		while( $class_subject = mysqli_fetch_assoc($result)) {
			$class_subjectHTML .= '<option value="'.$class_subject["class_id"].'-'.$class_subject["subject_id"].'">'.$class_subject["class_id"].'-'.$class_subject["subject_id"].'</option>';	
		}
		return $class_subjectHTML;
	}		
*/

	/*****************program_subject****************/
	public function _____PROGRAM_SUBJECT____(){}
	
		public function listProgram_Subject(){		
		$sqlQuery = "SELECT p.program, s.subject, ps.program_id, ps.subject_id			
			FROM ".$this->program_subjectTable." as ps 
			LEFT JOIN ".$this->programsTable." as p ON p.program_id = ps.program_id
			LEFT JOIN ".$this->subjectsTable." as s ON s.subject_id = ps.subject_id ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= ' WHERE (p.program LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR s.subject LIKE "%'.$_POST["search"]["value"].'%" ';					
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY p.program ASC ';//$sqlQuery .= 'ORDER BY t.teacher_id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$program_subjectData = array();	
		$no=1;
		while( $program_subject = mysqli_fetch_assoc($result) ) {		
			$program_subjectRows = array();		
			$program_subjectRows[] = $no; $no++;	
			$program_subjectRows[] = $program_subject['program'];
			$program_subjectRows[] = $program_subject['subject'];				
			$program_subjectRows[] = '<button type="button" name="update" id="'.$program_subject["program_id"].'_'.$program_subject["subject_id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$program_subjectRows[] = '<button type="button" name="delete" id="'.$program_subject["program_id"].'_'.$program_subject["subject_id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$program_subjectData[] = $program_subjectRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$program_subjectData
		);
		echo json_encode($output);
	}
	public function addProgram_Subject () {
		if($_POST["program_id"] && $_POST["subject_id"]) {
		$insertQuery = "INSERT INTO ".$this->program_subjectTable."(program_id,subject_id) 
		VALUES ('".$_POST["program_id"]."',".$_POST["subject_id"].")";
			$userSaved = mysqli_query($this->dbConnect, $insertQuery);
		}
	}
	
	public function updateProgram_Subject() {
		if($_POST["program_id"] && $_POST["subject_id"]) {
			$updateQuery = "UPDATE ".$this->program_subjectTable." 
			SET program_id = '".$_POST["program_id"]."', subject_id = '".$_POST["subject_id"]."' 
			WHERE (program_id = '".$_POST["pid"]."' 
			AND subject_id = '".$_POST["sid"]."')";					
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}	
	public function deleteProgram_Subject(){
		if($_POST["program_id"] && $_POST["subject_id"]) {
			$sqlUpdate = "
				DELETE FROM ".$this->program_subjectTable."
				WHERE (program_id = '".$_POST["program_id"]."' 
				AND subject_id = '".$_POST["subject_id"]."')";		
			mysqli_query($this->dbConnect, $sqlUpdate);		
		}
	}
	
	public function getProgram_SubjectDetails(){	//formerly getProgram
		$sqlQuery = "
			SELECT * FROM ".$this->program_subjectTable." 
			WHERE (program_id = '".$_POST["program_id"]."' 
			AND subject_id = '".$_POST["subject_id"]."')";	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}
/*	
	public function getProgramOptions(){		//formerly getProgramList	
		$sqlQuery = "SELECT * FROM ".$this->program_subjectTable;	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$program_subjectHTML = '';
		while( $program_subject = mysqli_fetch_assoc($result)) {
			$program_subjectHTML .= '<option value="'.$program_subject["program_id"].'-'.$program_subject["subject_id"].'">'.$program_subject["program_id"].'-'.$program_subject["subject_id"].'</option>';	
		}
		return $program_subjectHTML;
	}		
*/
}
?>