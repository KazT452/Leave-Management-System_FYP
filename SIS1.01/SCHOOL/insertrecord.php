<?php
$servername = "localhost";
$username = "root";
$password = "passwd";
// Create connection to server
$conn = mysqli_connect($servername, $username, $password);

// Check connection
// connect to the database
$db = mysqli_connect('localhost', 'root', 'passwd', 'sms');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Add item
if (isset($_POST['insertdata'])) {
    // receive all input values from the form
    echo "connect";
    $name=mysqli_real_escape_string($db, $_POST['teacher_name']);
    $subject=mysqli_real_escape_string($db, $_POST['subject_name']);
    $competencies=mysqli_real_escape_string($db, $_POST['competencies_name']);
    $status=mysqli_real_escape_string($db, $_POST['status_name']);
    $workingtime=mysqli_real_escape_string($db, $_POST['workingtime_name']);
    $joiningdate=mysqli_real_escape_string($db, $_POST['joiningdate_name']);
    
    
      $query = "INSERT INTO sam_teacherinfo(Name,Subject,Competencies,Status,Working_Time,Joining_Date)
         VALUES('$name','$subject','$competencies','$status','$workingtime','$joiningdate')";
        if(mysqli_query($db, $query))
        {
        echo "<script>alert('Successfully stored');</script>";
        header('location: teacherinfo.php');
      }
      else{
          echo"<script>alert('Somthing wrong!!!');</script>";
      }
        
       
    
  }
  mysqli_close($conn);

?>