<?php
session_start();
//require('include/config.php');
	//echo $_SERVER['DOCUMENT_ROOT'];
	$docroot="C:\shared\SIS1.01";	//$path = $_SERVER['DOCUMENT_ROOT'];
	$path= "\config.php";
	include_once($docroot.$path);

class User extends Dbconfig {
    //protected $hostName;	//hostName is local name, from config.php is serverName
    //protected $userName;
    //protected $password;
	//protected $dbName;
	//private $userTable = 'user';
	
	private $no;
	
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 				
			$database = new dbConfig();            
            $this -> hostName = $database -> serverName;
            $this -> userName = $database -> userName;
            $this -> password = $database ->password;
			$this -> dbName = $database -> dbName;	
            $conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
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
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
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
    public function loginStatus (){
		if(empty($_SESSION["userid"])) {
			header("Location: login.php");
		}
	}	
	public function isLoggedin (){
		if(!empty($_SESSION["adminUserid"])) {	
			return true;
		} else {
			return false;
		}
	}
	public function login(){		
		$errorMessage = '';
		if(!empty($_POST["login"]) && $_POST["loginId"]!=''&& $_POST["loginPass"]!='') {	
			$loginId = $_POST['loginId'];
			$password = $_POST['loginPass'];
			if(isset($_COOKIE["loginPass"]) && $_COOKIE["loginPass"] == $password) {
				$password = $_COOKIE["loginPass"];
			} else {
				$password = md5($password);
			}	
			$sqlQuery = "SELECT * FROM ".$this->userTable." 
				WHERE email='".$loginId."' AND password='".$password."' AND status = 'active' AND designation='4'"; 	//1=admin 2=staff 3=teacher 4=student
			$resultSet = mysqli_query($this->dbConnect, $sqlQuery);
			$isValidLogin = mysqli_num_rows($resultSet);	
			if($isValidLogin){
				if(!empty($_POST["remember"]) && $_POST["remember"] != '') {
					setcookie ("loginId", $loginId, time()+ (10 * 365 * 24 * 60 * 60));  
					setcookie ("loginPass",	$password,	time()+ (10 * 365 * 24 * 60 * 60));
				} else {
					$_COOKIE['loginId' ]='';
					$_COOKIE['loginPass'] = '';
				}
				$userDetails = mysqli_fetch_assoc($resultSet);
				$_SESSION["userid"] = $userDetails['id'];
				$_SESSION["name"] = $userDetails['first_name']." ".$userDetails['last_name'];
				header("location: home.php"); 		
			} else {		
				$errorMessage = "Invalid login!";		 
			}
		} else if(!empty($_POST["loginId"])){
			$errorMessage = "Enter Both username and password!";	
		}
		return $errorMessage; 		
	}
	public function adminLoginStatus (){
		if(empty($_SESSION["adminUserid"])) {
			header("Location: home.php");
		}
	}		
	public function adminLogin(){		
		$errorMessage = '';
		if(!empty($_POST["login"]) && $_POST["email"]!=''&& $_POST["password"]!='') {	
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sqlQuery = "SELECT * FROM ".$this->userTable." 
				WHERE email='".$email."' AND password='".md5($password)."' AND status = 'active' AND (designation='1' OR type = 'administrator')"; //1=admin 2=staff 3=teacher 4=student
			$resultSet = mysqli_query($this->dbConnect, $sqlQuery);
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
			$errorMessage = "Enter Both user and password!";	
		}
		return $errorMessage; 		
	}
	public function register(){		
		$message = '';
		if(!empty($_POST["register"]) && $_POST["email"] !='') {
			$sqlQuery = "SELECT * FROM ".$this->userTable." 
				WHERE email='".$_POST["email"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			$isUserExist = mysqli_num_rows($result);
			if($isUserExist) {
				$message = "User already exist with this email address.";
			} else {			
				$authtoken = $this->getAuthtoken($_POST["email"]);
				$insertQuery = "INSERT INTO ".$this->userTable."(first_name, last_name, email, password, authtoken) 
				VALUES ('".$_POST["firstname"]."', '".$_POST["lastname"]."', '".$_POST["email"]."', '".md5($_POST["passwd"])."', '".$authtoken."')";
				$userSaved = mysqli_query($this->dbConnect, $insertQuery);
				if($userSaved) {				
					$link = "<a href='../verify.php?authtoken=".$authtoken."'>Verify Email</a>";			
					$toEmail = $_POST["email"];
					$subject = "Verify email to complete registration";
					$msg = "Hi there, click on this ".$link." to verify email to complete registration.";
					$msg = wordwrap($msg,70);
					$headers = "From: info@sbit.edu.my";
					if(mail($toEmail, $subject, $msg, $headers)) {
						$message = "Verification email send to your email address. Please check email and verify to complete registration.";
					}
				} else {
					$message = "User register request failed.";
				}
			}
		}
		return $message;
	}	
	public function getAuthtoken($email) {
		$code = md5(889966);
		$authtoken = $code."".md5($email);
		return $authtoken;
	}	
	public function verifyRegister(){
		$verifyStatus = 0;
		if(!empty($_GET["authtoken"]) && $_GET["authtoken"] != '') {			
			$sqlQuery = "SELECT * FROM ".$this->userTable." 
				WHERE authtoken='".$_GET["authtoken"]."'";
			$resultSet = mysqli_query($this->dbConnect, $sqlQuery);
			$isValid = mysqli_num_rows($resultSet);	
			if($isValid){
				$userDetails = mysqli_fetch_assoc($resultSet);
				$authtoken = $this->getAuthtoken($userDetails['email']);
				if($authtoken == $_GET["authtoken"]) {					
					$updateQuery = "UPDATE ".$this->userTable." SET status = 'active'
						WHERE id='".$userDetails['id']."'";
					$isUpdated = mysqli_query($this->dbConnect, $updateQuery);					
					if($isUpdated) {
						$verifyStatus = 1;
					}
				}
			}
		}
		return $verifyStatus;
	}	
	
	public function editAccount () {
		$fileName='';
			if($_FILES["photo"]["name"]) {
				$target_dir = "../SCHOOL/upload/";
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
		$message = '';
		$updatePassword = '';
		//if(!empty($_POST["passwd"]) && $_POST["passwd"] != '' && $_POST["passwd"] != $_POST["cpasswd"]) {
			
		if(empty($_POST["passwd"])) {
			$message = "Password must be entered to update account details.";
			return $message;
		} else if(empty($_POST["cpasswd"])) {
			$message = "Enter Confirm Password.";
			return $message;
		} else if($_POST["passwd"] != $_POST["cpasswd"]) {
			$message = "Password and Confirm Password does not match.";
		} else if($_POST["passwd"] == $_POST["cpasswd"]) {
			 //if($_POST["passwd"] == $_POST["cpasswd"]) {
			$updatePassword = ", password='".md5($_POST["passwd"])."' ";
	
			$updateQueryA = "UPDATE ".$this->userTable." 
				SET first_name = '".$_POST["firstname"]."', last_name = '".$_POST["lastname"]."', email = '".$_POST["email"]."', mobile = '".$_POST["mobile"]."' , designation = '4', gender = '".$_POST["gender"]."' $imageUpdate $updatePassword
				WHERE id ='".$_SESSION["userid"]."'";
			//echo $updateQueryA;
			mysqli_query($this->dbConnect, $updateQueryA);
			
			$updateQueryB = "UPDATE ".$this->studentTable." 
				SET name = '".$_POST["firstname"]."', email = '".$_POST["email"]."', mobile = '".$_POST["mobile"]."' , gender = '".$_POST["gender"]."' $photoUpdate
				WHERE id = (SELECT student_id FROM ".$this->user_studentTable." WHERE user_id='".$_SESSION["userid"]."')";
			//echo "<br><br>".$updateQueryB;
			mysqli_query($this->dbConnect, $updateQueryB);
			
			
			$isUpdated = ($updateQueryA && $updateQueryB);
			if($isUpdated) {
				$_SESSION["name"] = $_POST['firstname']." ".$_POST['lastname'];
				$message = "Account details saved.";
			}
		}			
		return $message;
	}	
	public function resetPassword(){
		$message = '';
		if($_POST['email'] == '') {
			$message = "Please enter username or email to proceed with password reset";			
		} else {
			$sqlQuery = "
				SELECT email 
				FROM ".$this->userTable." 
				WHERE email='".$_POST['email']."'";			
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			$numRows = mysqli_num_rows($result);
			if($numRows) {			
				$user = mysqli_fetch_assoc($result);
				$authtoken = $this->getAuthtoken($user['email']);
				$link="<a href='../reset_password.php?authtoken=".$authtoken."'>Reset Password</a>";				
				$toEmail = $user['email'];
				$subject = "Reset your password on examplesite.com";
				$msg = "Hi there, click on this ".$link." to reset your password.";
				$msg = wordwrap($msg,70);
				$headers = "From: info@sbit.edu.my";
				if(mail($toEmail, $subject, $msg, $headers)) {
					$message =  "Password reset link send. Please check your mailbox to reset password.";
				}				
			} else {
				$message = "No account exist with entered email address.";
			}
		}
		return $message;
	}
	public function savePassword(){
		$message = '';
		//if($_POST['passwd'] != $_POST['cpasswd']) {
		//if(!empty($_POST["passwd"]) && $_POST["passwd"] != '' && $_POST["passwd"] != $_POST["cpasswd"]) {
		if($_POST['passwd'] && $_POST['passwd'] != $_POST['cpasswd']) {
			$message = "Password does not match the Confirm Password.";
		} else if($_POST['authtoken']) {
			$sqlQuery = "
				SELECT email, authtoken 
				FROM ".$this->userTable." 
				WHERE authtoken='".$_POST['authtoken']."'";			
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			$numRows = mysqli_num_rows($result);
			if($numRows) {				
				$userDetails = mysqli_fetch_assoc($result);
				$authtoken = $this->getAuthtoken($userDetails['email']);
				if($authtoken == $_POST['authtoken']) {
					$sqlUpdate = "
						UPDATE ".$this->userTable." 
						SET password='".md5($_POST['passwd'])."'
						WHERE email='".$userDetails['email']."' AND authtoken='".$authtoken."'";	
					$isUpdated = mysqli_query($this->dbConnect, $sqlUpdate);	
					if($isUpdated) {
						$message = "Password saved successfully. Please <a href='login.php'>Login</a> to access account.";
					}
				} else {
					$message = "Invalid password change request.";
				}
			} else {
				$message = "Invalid password change request.";
			}	
		}
		return $message;
	}


	
	public function saveAdminPassword(){
		$message = '';
		if($_POST['password'] && $_POST['password'] != $_POST['cpassword']) {
			$message = "Password does not match the Confirm Password!";
		} else {			
			$sqlUpdate = "
				UPDATE ".$this->userTable." 
				SET password='".md5($_POST['password'])."'
				WHERE id='".$_SESSION['adminUserid']."' AND type='administrator'";	
			$isUpdated = mysqli_query($this->dbConnect, $sqlUpdate);	
			if($isUpdated) {
				$message = "Password saved successfully.";
			}				
		}
		return $message;
	}
	public function adminDetails () {
		/*
		$sqlQuery = "SELECT * FROM ".$this->userTable." 
			WHERE id ='".$_SESSION["adminUserid"]."'";
		*/
		$sqlQuery = "SELECT * FROM ".$this->userTable." as u 
			LEFT JOIN ".$this->designationTable." as ds 
			ON ds.designation_id=u.designation 
			WHERE id ='".$_SESSION["adminUserid"]."'";			
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$userDetails = mysqli_fetch_assoc($result);
		return $userDetails;
	}	

	public function totalUsers ($status) {
		$query = '';
		if($status) {
			$query = " AND status = '".$status."'";
		}
		$sqlQuery = "SELECT * FROM ".$this->userTable." 
		WHERE id !='".$_SESSION["adminUserid"]."' $query";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	/*****************User methods****************/
	public function _____USERS____(){}	
	
		public function listUser(){		////formerly getUserList		
		$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE id !='".$_SESSION['adminUserid']."' ";
		//$sqlQuery = "SELECT * FROM ".$this->userTable." ";
		if(!empty($_POST["search"]["value"])){
/*
			$sqlQuery .= '(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR first_name LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR last_name LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR designation LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR status LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR mobile LIKE "%'.$_POST["search"]["value"].'%") ';			
*/
			$sqlQuery .= ' OR id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR first_name LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR last_name LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR designation LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR status LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR mobile LIKE "%'.$_POST["search"]["value"].'%" ';			
			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id ASC ';//$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$userData = array();	
		$no=1;
		while( $users = mysqli_fetch_assoc($result) ) {		
			$userRows = array();
			$userRows[] = $no; $no++;
			$status = '';
			if($users['status'] == 'active')	{
				$status = '<span class="label label-success">Active</span>';
			} else if($users['status'] == 'pending') {
				$status = '<span class="label label-warning">Inactive</span>';
			} else if($users['status'] == 'deleted') {
				$status = '<span class="label label-danger">Deleted</span>';
			}
			$userRows[] = $users['id'];
			$userRows[] = ucfirst($users['first_name']." ".$users['last_name']);
			$userRows[] = $users['gender'];			
			$userRows[] = $users['email'];	
			$userRows[] = $users['mobile'];	
			$userRows[] = $users['type'];
			$userRows[] = $status;						
			$userRows[] = '<button type="button" name="update" id="'.$users["id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$userRows[] = '<button type="button" name="delete" id="'.$users["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$userData[] = $userRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$userData
		);
		echo json_encode($output);
	}
	
	public function addUser () {
		if($_POST["email"]) {
			$authtoken = $this->getAuthtoken($_POST['email']);
			$insertQuery = "INSERT INTO ".$this->userTable."(first_name, last_name, email, gender, password, mobile, designation, type, status, authtoken) 
				VALUES ('".$_POST["firstname"]."', '".$_POST["lastname"]."', '".$_POST["email"]."', '".$_POST["gender"]."', '".md5($_POST["password"])."', '".$_POST["mobile"]."', '".$_POST["designation"]."', '".$_POST['user_type']."', 'active', '".$authtoken."')";
			$userSaved = mysqli_query($this->dbConnect, $insertQuery);
		}
	}	
	
	public function updateUser() {
		if($_POST['userid']) {	
			$updateQuery = "UPDATE ".$this->userTable." 
			SET first_name = '".$_POST["firstname"]."', last_name = '".$_POST["lastname"]."', email = '".$_POST["email"]."', mobile = '".$_POST["mobile"]."' , designation = '".$_POST["designation"]."', gender = '".$_POST["gender"]."', status = '".$_POST["status"]."', type = '".$_POST['user_type']."'
			WHERE id ='".$_POST["userid"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	
	public function deleteUser(){
		if($_POST["userid"]) {
			$sqlUpdate = "
				UPDATE ".$this->userTable." SET status = 'deleted'
				WHERE id = '".$_POST["userid"]."'";		
			mysqli_query($this->dbConnect, $sqlUpdate);		
		}
	}
	
	public function getUser() {	//formally userDetails
		/*
		$sqlQuery = "
			SELECT * FROM ".$this->userTable." 
			WHERE id = '".$_SESSION["userid"]."'";
		*/	
		$sqlQuery = "SELECT * FROM ".$this->userTable." as u 
			LEFT JOIN ".$this->designationTable." as ds 
			ON ds.designation_id=u.designation 
			WHERE id ='".$_SESSION["userid"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$userDetails = mysqli_fetch_assoc($result);
		return $userDetails;
	}

	public function getUser_Student() {
		/*	
		$sqlQuery = "SELECT * FROM user as u 
			LEFT JOIN sis_designation as ds 
			ON ds.designation_id=u.designation 
			left join sis_user_student as us 
			on us.user_id=u.id 
			right join sms_students as s 
			on us.student_id=s.id 
			WHERE u.id =9			
		*/			
		$sqlQuery = "SELECT * FROM ".$this->userTable." as u 
			LEFT JOIN ".$this->designationTable." as ds 
			ON ds.designation_id=u.designation 
			left join ".$this->user_studentTable." as us  
			on us.user_id=u.id 
			right join ".$this->studentTable." as s 
			on us.student_id=s.id 
			WHERE u.id ='".$_SESSION["userid"]."'";

		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$userDetails = mysqli_fetch_assoc($result);
		return $userDetails;
	}
	
	public function getUserDetails(){	//formerly getUser
		//$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE id = '".$_POST["userid"]."'";
		$sqlQuery = "SELECT * FROM ".$this->userTable." as u 
			LEFT JOIN ".$this->designationTable." as ds 
			ON ds.designation_id=u.designation 
			WHERE id ='".$_POST["userid"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC); //*** MYSQLI, not MYSQL !!!
		echo json_encode($row);
	}
	
	/*****************Designation methods****************/
	public function _____DESIGNATION____(){}		
	
	public function getDesignationOptions(){	

		$sqlQuery = "SELECT * FROM ".$this->userTable." 
		WHERE id ='".$_SESSION["userid"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$user = mysqli_fetch_assoc($result);
		
		$sqlQuery = "SELECT * FROM ".$this->designationTable;	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$designationHTML = '';
		while( $designation = mysqli_fetch_assoc($result)) {
			
			if ($designation["designation_id"]==$user['designation'])
				$designationHTML .= '<option selected value="'.$designation["designation_id"].'">'.$designation["designation_name"].'</option>';	
			else						
				$designationHTML .= '<option value="'.$designation["designation_id"].'">'.$designation["designation_name"].'</option>';	
		}
		return $designationHTML;
	}
	/*****************Exam methods****************/
	public function _____EXAM____(){}	
	
		public function userDetails() {	
		/*
		$sqlQuery = "
			SELECT * FROM ".$this->userTable." 
			WHERE id = '".$_SESSION["userid"]."'";
		*/	
		$sqlQuery = "SELECT * FROM ".$this->userTable." as u 
			LEFT JOIN ".$this->designationTable." as ds 
			ON ds.designation_id=u.designation 
			WHERE id ='".$_SESSION["userid"]."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$userDetails = mysqli_fetch_assoc($result);
		return $userDetails;
	}
	
	public function examDetails() {	
	
		$sqlQuery = "
			SELECT * FROM ".$this->examTable." ";
	
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$examDetails = mysqli_fetch_assoc($result);
		return $examDetails;
	}
	
	/*****************Results methods****************/
	public function _____RESULTS____(){}	
	
	public function getUser_Report(){	
	
/*	
		$sqlQuery = "SELECT *,sc.section as sectionName, cls.Id as clsId, cls.name as clsName FROM ".$this->userTable." as u 
			LEFT JOIN ".$this->designationTable." as ds 
			ON ds.designation_id=u.designation 
			left join ".$this->user_studentTable." as us  
			on us.user_id=u.id 
			right join ".$this->studentTable." as s 
			on us.student_id=s.id 
			LEFT JOIN ".$this->sectionsTable." as sc
			on sc.section_id=s.section 
			LEFT JOIN ".$this->classesTable." as cls
			on cls.id=s.class
			LEFT JOIN sis_class_subject as clssub
			ON clssub.class_id = s.class
            LEFT JOIN sms_subjects as sub
            on clssub.subject_id=sub.subject_id
			LEFT JOIN sis_teacher as t
            on t.teacher_id=cls.teacher_id
			LEFT JOIN sis_program_subject as prosub
            ON prosub.subject_id=sub.subject_id
            LEFT JOIN sis_programs as p
            ON p.program_id=prosub.program_id
			WHERE u.id ='".$_SESSION["userid"]."'";
			
			// AND class_id='".$_POST["selClass"]."'";
 */

			$sqlQuery = "SELECT u.id,CONCAT(u.first_name,' ',u.last_name) as fullName,s.admission_no,s.email,s.mobile,s.father_name,s.father_mobile,s.mother_name,s.mother_mobile,s.id as student_id,s.name as studentName,sub.subject as sSubject, s.class as sClass, s.section as sSection,(select section from sms_section where section_id=sSection) as sSectionName,clssub.class_id,cls.name as className,sec.section_id,sec.section as sectionName,clsses.session_id,ses.session as sessionName,clssub.subject_id,sub.subject as subjectName,prosub.program_id,pro.program as programName,cls.teacher_id,tea.teacher as teacherName,cls.start_date,cls.end_date,stucls.status
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
			WHERE u.id ='".$_SESSION["userid"]."' 
			AND cls.id='".$_POST["selClass"]."'";

		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$userReport = mysqli_fetch_assoc($result);
		return $userReport;
	}

	public function getUser_Grades(){	
		
		$sqlQuery = "SELECT * FROM sis_student_grades as sg
					inner join sis_user_student as usrstu
					on usrstu.student_id=sg.student_id
					WHERE usrstu.user_id ='".$_SESSION["userid"]."' AND class_id='".$_POST["selClass"]."'";
			

		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$userGrades = mysqli_fetch_assoc($result);
		return $userGrades;
	}	
	
	public function getSubjectOptions(){	
	
	$sqlQuery = "SELECT * FROM sis_student_class as stucls
				inner join sis_class_subject as clssub
				on clssub.class_id=stucls.class_id
				inner join sms_subjects as sub
				on sub.subject_id=clssub.subject_id
				inner join sis_user_student as usrstu
				on usrstu.student_id=stucls.student_id
				where usrstu.user_id='".$_SESSION["userid"]."'";	
				
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$subjectsHTML = '';
		while( $subjects = mysqli_fetch_assoc($result)) {
				$subjectsHTML .= '<option value="'.$subjects["class_id"].'">'.$subjects["subject"].'</option>';	
		}
		return $subjectsHTML;
	}
}
?>