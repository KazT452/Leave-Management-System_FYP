<?php
include('class/User.php');

  $dbconnect = mysqli_connect('localhost', 'root','passwd', 'sms');
 
  // Check connection
  if($dbconnect === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

//$id=$_SESSION['staffid'];
$id=$_SESSION["userid"];

  $date=$_POST['thedate'];
  $Starttime=$_POST['Starttime'];

/*   $ts=date("H:i",strtotime($starttime));
  $te=date("H:i",strtotime($Endtime)); */

  $Endtime=$_POST['Endtime'];
  $command=$_POST['command'];
 

  $sql = "INSERT INTO staff_report (staff_id,date1,start_time,end_time,command) VALUES ($id,'$date','$Starttime','$Endtime','$command') ";
  if (mysqli_query($dbconnect, $sql)) {
    header("location: staffreport.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbconnect);
  }
  
?>
