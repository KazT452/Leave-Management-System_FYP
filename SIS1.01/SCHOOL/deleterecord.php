<?php
$connection=mysqli_connect("localhost","root","passwd");
$db=mysqli_select_db($connection,'sms');

if(isset($_POST['deletedata']))
{
	$id=$_POST['delete_id'];
	$query="DELETE FROM sam_teacherinfo WHERE Teacher_ID='$id'";
	$query_run=mysqli_query($connection,$query);

	if($query_run)
  {
    echo'<script> alert("Data Deleted");</script>';
    header("Location:teacherinfo.php");
  }
  else
  {
    echo'<script> alert("Data Not Deleted");</script>';
  }

}







?>