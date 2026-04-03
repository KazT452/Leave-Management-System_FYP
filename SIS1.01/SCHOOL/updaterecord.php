<?php
$connection=mysqli_connect("localhost","root","passwd");
$db=mysqli_select_db($connection,'sms');

if(isset($_POST['updatedata']))
{
  $id=$_POST['update_id'];
  $name=$_POST['teacher_name'];
  $subject=$_POST['subject_name'];
  $competencies=$_POST['competencies_name'];
  $status=$_POST['status_name'];
  $workingtime=$_POST['workingtime_name'];
  $joiningdate=$_POST['joiningdate_name'];

  $query="UPDATE sam_teacherinfo SET Name='$name',Subject='$subject',Competencies='$competencies',Status='$status',
  Working_Time='$workingtime',Joining_Date='$joiningdate' WHERE Teacher_ID='$id' ";
  $query_run=mysqli_query($connection,$query);

  if($query_run)
  {
    echo'<script> alert("Data Updated");</script>';
    header("Location:teacherinfo.php");
  }
  else
  {
    echo'<script> alert("Data Not Updated");</script>';
  }



}
mysqli_close($conn);
?>