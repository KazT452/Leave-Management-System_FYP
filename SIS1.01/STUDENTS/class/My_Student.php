<?php
session_start();
//require('include/config.php');
	//echo $_SERVER['DOCUMENT_ROOT'];
	$docroot="C:\shared\SIS1.01";	//$path = $_SERVER['DOCUMENT_ROOT'];
	$path= "\config.php";
	include_once($docroot.$path);
	
class Kelas extends Dbconfig {	
/*	
	protected $hostName;	//hostName is local name, from config.php is serverName
    protected $userName;
    protected $password;
	protected $dbName;
*/
/*
	private $userTable = 'user';
		private $attendanceTable = 'sms_attendance';
*/

	private $no;

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

	public function getKelasList(){		
/*
		$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE id !='".$_SESSION['adminUserid']."' ";
*/		
/*
		$sqlQuery = "select c.id,c.name,m.subject,i.section,t.teacher,m.type from user as u ";	
*/
/*
		$sqlQuery = "select * from user as u ";
		$sqlQuery.= "inner join sms_students as s ";
		$sqlQuery.= "on u.designation=s.admission_no ";	
*/
	
/*
		$sqlQuery = "select c.id as ID,c.name as Class,ss.Session as Session,m.subject as Subject,i.section as Section,t.teacher as Teacher,u.status as Status 
, u.id as uID, s.id as sID, c.id as cID, m.subject_id as mID, i.section_id as iID, t.teacher_id as tID, ds.designation_name as Designation, u.type as Type, ss.start as sTime	
*/

	$sqlQuery = "select sc.student_id as ID,(select name from ".$this->classesTable." where id=sc.class_id) as Class,(select session from ".$this->sessionsTable." where session_id=(select session_id from ".$this->class_sessionTable." where class_id=sc.class_id)) as Session,(select subject from ".$this->subjectsTable." where subject_id=(select subject_id from ".$this->class_subjectTable." where class_id=sc.class_id)) as Subject,(select section from ".$this->sectionsTable." where section_id=(select section from ".$this->classesTable." where id=sc.class_id)) as Section,(select teacher from ".$this->teacherTable." where teacher_id=(select teacher_id from ".$this->classesTable." where id=sc.class_id)) as Teacher,u.status as Status 
, u.id as uID, s.id as sID, c.id as cID, m.subject_id as mID, i.section_id as iID, t.teacher_id as tID, ds.designation_name as Designation, u.type as Type, (select start from ".$this->sessionsTable." where session_id=(select session_id from ".$this->class_sessionTable." where class_id=sc.class_id)) as sTime

from ".$this->userTable." as u 
inner join ".$this->designationTable." as ds 
on ds.designation_id=u.designation   
inner join ".$this->user_studentTable." as us  
on us.user_id=u.id
inner join ".$this->studentTable." as s 
on us.student_id=s.id
left join ".$this->classesTable." as c
on s.class=c.id
left join ".$this->student_classTable." as sc
on (s.id=sc.student_id)
left join ".$this->teacherTable." as t
on c.teacher_id=t.teacher_id
left join ".$this->programsTable." as p
on t.program_id=p.program_id
left join ".$this->class_subjectTable." as cm
on c.id=cm.class_id
left join ".$this->subjectsTable." as m
on cm.subject_id=m.subject_id
left join ".$this->sectionsTable." as i
on c.section=i.section_id
left join ".$this->class_sessionTable." as cs
on c.id=cs.class_id
left join ".$this->sessionsTable." as ss
on ss.session_id=cs.session_id ";
//		$sqlQuery.= "WHERE u.email='".$_COOKIE["loginId"]."' ";
		$sqlQuery.= "WHERE u.id='".$_SESSION["userid"]."' ";

/*
		$sqlQuery.= "left join sms_classes as c ";
		$sqlQuery.= "on s.class=c.id "
*/
/*
		$sqlQuery.= "left join sis_teacher as t ";
		$sqlQuery.= "on c.teacher_id=t.teacher_id ";
*/
/*
		$sqlQuery.= "left join sms_subjects as m ";
		$sqlQuery.= "on t.subject_id=m.subject_id ";
/*
		$sqlQuery.= "left join sms_section as i ";	
		$sqlQuery.= "on c.section=i.section_id ";
*/		

//		$sqlQuery.= "group by c.id ";
/*		
		$sqlQuery.= "where id=(select class as id from sms_students where id=(select id from user WHERE email='".$_SESSION['adminUserid']."'))";
*/
/*
		$sqlQuery = "select * from sms_classes as c
left join sis_teacher as t
on c.teacher_id=t.teacher_id
left join sms_subjects as s
on t.subject_id=s.subject_id
left join sms_section as i
on c.section=i.section_id
where id=(select class from sms_students where id=(select id from user WHERE id=".$_SESSION['adminUserid'].")";	
*/

		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= '(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR first_name LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR last_name LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR designation LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR status LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR mobile LIKE "%'.$_POST["search"]["value"].'%") ';			
		}


		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}

		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$kelasData = array();	
		$no=1;		
		while( $kelas = mysqli_fetch_assoc($result) ) {		
			$kelasRows = array();
			$kelasRows[] = $no; $no++;			
			$kelasRows[] = $kelas['cID'];
			$kelasRows[] = $kelas['Class'];
			$kelasRows[] = $kelas['Session'];
			$kelasRows[] = $kelas['Subject'];	
			$kelasRows[] = $kelas['Section'];			
			$kelasRows[] = $kelas['Teacher'];	
			
				$status = '';
				if($kelas['Status'] == 'active')	{
					$status = '<span class="label label-success">Active</span>';
				} else if($kelas['Status'] == 'pending') {
					$status = '<span class="label label-warning">Inactive</span>';
				} else if($kelas['Status'] == 'deleted') {
					$status = '<span class="label label-danger">Deleted</span>';
				}
			$kelasRows[] = $status;		
			
				$spanIDs = '';
				$spanIDs .='<span style="display:none" id="uID">'.$kelas['uID'].'</span>';
				$spanIDs .='<span style="display:none" id="sID">'.$kelas['sID'].'</span>';				
				$spanIDs .='<span style="display:none" id="cID">'.$kelas['cID'].'</span>';
				$spanIDs .='<span style="display:none" id="mID">'.$kelas['mID'].'</span>';
				$spanIDs .='<span style="display:none" id="iID">'.$kelas['iID'].'</span>';				
				$spanIDs .='<span style="display:none" id="tID">'.$kelas['tID'].'</span>';
				$spanIDs .='<span style="display:none" id="Designation">'.$kelas['Designation'].'</span>';
				$spanIDs .='<span style="display:none" id="Type">'.$kelas['Type'].'</span>';
				//$spanIDs .='<span style="display:block" id="startTime">'.strrchr($kelas['sTime']," ").'</span>';	//strtok is for string before " "		
				$spanIDs .='<span style="display:block" id="startTime">'.substr($kelas['sTime'],0,5).'</span>';	

			$kelasRows[] = $spanIDs;//'Check:'.$spanIDs;		


			
				$twoButtons = '<button type="button" name="checkIn" id="checkIn" class="btn btn-success btn-xs update">&nbsp;In&nbsp;</button>&nbsp;';
				$twoButtons .= '<button type="button" name="checkOut" id="checkOut" class="btn btn-info btn-xs delete">Out&nbsp;</button>';
			$kelasRows[] = $twoButtons;
			/*
				$oneButton = '<button type="button" name="checkIn" id="checkIn" class="btn btn-default btn-xs update">&nbsp;Check&nbsp;In&nbsp;</button>';
			$kelasRows[] = $oneButton;
			*/
			$kelasData[] = $kelasRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$kelasData
		);
		echo json_encode($output);
	}
	
	
	
	
		public function addKelas($io) {
		//if($_POST["email"]) {
		//	$authtoken = $this->getAuthtoken($_POST['email']);
			/*
			$insertQuery = "INSERT INTO ".$this->userTable."(first_name, last_name, email, gender, password, mobile, designation, type, status, authtoken) 
				VALUES ('".$_POST["firstname"]."', '".$_POST["lastname"]."', '".$_POST["email"]."', '".$_POST["gender"]."', '".md5($_POST["password"])."', '".$_POST["mobile"]."', '".$_POST["designation"]."', '".$_POST['user_type']."', 'active', '".$authtoken."')";
			*/
			/*	
			$insertQuery = "INSERT INTO ".$this->attendanceTable."(student_id, class_id, section_id, attendance_status, attendance_date) 
						VALUES ('".$student_id."', '".$_POST["att_classid"]."', '".$_POST["att_sectionid"]."', '".$attendanceStatus."', '".$attendanceDate."')";
			*/
			
			//TWO BUTTONS
			/*
			$selectQuery = "SELECT * FROM ".$this->attendanceTable." WHERE student_id=".$_POST["studentid"]." AND class_id=".$_POST["classid"]." AND section_id=".$_POST["sectionid"]." AND attendance_date='".$_POST["attendancedate"]."'";
			$result = mysqli_query($this->dbConnect, $selectQuery);
			$numRows = mysqli_num_rows($result);
			if ( $numRows == 0 ) 
			{	
				if ($io=="1") //Check In
				{
					$insertQuery = "INSERT INTO ".$this->attendanceTable." (student_id, class_id, section_id, attendance_status, attendance_date, check_in, score) 
					VALUES (".$_POST["studentid"].",".$_POST["classid"].",".$_POST["sectionid"].",".$_POST["attendancestatus"].",'".$_POST["attendancedate"]."','".$_POST["attendancetime"]."','".$_POST["score"]."')";
					mysqli_query($this->dbConnect, $insertQuery);			
				}	
			}
			if ( $numRows == 1 )
			{
				if ($io=="2") //Check Out
				{
					$insertQuery = "UPDATE ".$this->attendanceTable." SET check_out='".$_POST["attendancetime"]."' 
					WHERE student_id=".$_POST["studentid"]." AND class_id=".$_POST["classid"]." AND section_id=".$_POST["sectionid"]." AND attendance_date='".$_POST["attendancedate"]."'";
					mysqli_query($this->dbConnect, $insertQuery);			
				}
			}
			*/
			if ($io=="1") //Check In
			{		
				$selectQuery = "SELECT * FROM ".$this->attendanceTable." WHERE student_id=".$_POST["studentid"]." AND class_id=".$_POST["classid"]." AND section_id=".$_POST["sectionid"]." AND attendance_date='".$_POST["attendancedate"]."'";
				$result = mysqli_query($this->dbConnect, $selectQuery);
				$numRows = mysqli_num_rows($result);
				if ( $numRows == 0 ) 
				{
					$insertQuery = "INSERT INTO ".$this->attendanceTable." (student_id, class_id, section_id, attendance_status, attendance_date, check_in, score) 
					VALUES (".$_POST["studentid"].",".$_POST["classid"].",".$_POST["sectionid"].",".$_POST["attendancestatus"].",'".$_POST["attendancedate"]."','".$_POST["attendancetime"]."','".$_POST["score"]."')";
					mysqli_query($this->dbConnect, $insertQuery);						
				}
			}
			if ($io=="2") //Check Out
			{			
				$selectQuery = "SELECT * FROM ".$this->attendanceTable." WHERE student_id=".$_POST["studentid"]." AND class_id=".$_POST["classid"]." AND section_id=".$_POST["sectionid"]." AND attendance_date='".$_POST["attendancedate"]."' AND (check_in IS NOT NULL)";
				$result = mysqli_query($this->dbConnect, $selectQuery);
				$numRows = mysqli_num_rows($result);
				if ( $numRows == 1 )
				{
					$insertQuery = "UPDATE ".$this->attendanceTable." SET check_out='".$_POST["attendancetime"]."' 
					WHERE student_id=".$_POST["studentid"]." AND class_id=".$_POST["classid"]." AND section_id=".$_POST["sectionid"]." AND attendance_date='".$_POST["attendancedate"]."'";
					mysqli_query($this->dbConnect, $insertQuery);				
				}
			}
			
			
			/*		
			//ONE BUTTON
			$selectQuery = "SELECT * FROM ".$this->attendanceTable." WHERE student_id=".$_POST["studentid"]." AND class_id=".$_POST["classid"]." AND section_id=".$_POST["sectionid"]." AND attendance_date='".$_POST["attendancedate"]."'";
			$result = mysqli_query($this->dbConnect, $selectQuery);
			$numRows = mysqli_num_rows($result);
			if ( $numRows == 0 ) 
			{				
				
				$insertQuery = "INSERT INTO ".$this->attendanceTable."(student_id, class_id, section_id, attendance_status, attendance_date) 
					VALUES (".$_POST["studentid"].",".$_POST["classid"].",".$_POST["sectionid"].",".$_POST["attendancestatus"].",'".$_POST["attendancedate"]."')";
				
				//"ON DUPLICATE KEY UPDATE 1=1;"
				
				//"WHERE NOT EXISTS (SELECT * FROM ".$this->attendanceTable." WHERE student_id=".$_POST["studentid"]." AND class_id=".$_POST["classid"]." AND section_id=".$_POST["sectionid"]." AND attendance_date='".$_POST["attendancedate"]."')";
				
				
				//echo $insertQuery;
				mysqli_query($this->dbConnect, $insertQuery);			
				//$userSaved = mysqli_query($this->dbConnect, $insertQuery);
			}
			*/
		//}
	}
	
	
	
}
?>