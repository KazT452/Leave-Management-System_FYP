<?php
session_start();
// Create connection
$mysqli = mysqli_connect('localhost', 'root', 'passwd', 'sms') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = ' ';



if(isset($_POST['save'])){
    if(isset($_POST['valid'])){
        $r = 'valid';
    }else if(isset($_POST['nvalid'])){
        $r = 'Not valid';
    }
    $a = $_POST["exStudent_fname"];
    $c = $_POST["subject_id"];
    $d = $_POST["written_test"];
    $e = $_POST["oral_test"];
    $f = $_POST["project_mark"];
    $g = $_POST["section_id"];
    $t = $e + $d + $f;

    $rel = $mysqli->query("SELECT * FROM ".$this->examTable." WHERE Exname = '" . $n . "' AND ExCourse = '" . $c . "'") or die($mysqli->error());
    if(mysqli_num_rows($rel) >= 1){
        $_SESSION['message'] = "Record already exists";
        $_SESSION['msg_type'] = "warning";

        header("location: kai_exMark.php");
    }else{
        $mysqli->query("INSERT INTO ".$this->examTable."(Exname, ExCourse, ExMark, ExMarkH, ExMarkP, ExSection, ExTotal, Validation)
        VALUES('$a', '$c', '$d', '$e', '$f', '$g', '$t', '$r')") or die($mysqli->error);
        
        $_SESSION['message'] = "Record has been inserted";
        $_SESSION['msg_type'] = "success";

        header("location: kai_exMark.php");
    }
}

//if(isset($_GET['viewM'])){
    //$id = $_GET['viewM'];
    //$result = $mysqli->query("SELECT * FROM sms.kai_exam WHERE ExID=$id") or die($mysqli->error());
    //if(count($result)==1){
        //$row = $result->fetch_array();
        //$Name = $row['Exname'];
    //}
//}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
	$delQuery="DELETE FROM ".$this->examTable." WHERE ExID=".$id." ";
    $mysqli->query($delQuery) or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("location: kai_exMark.php");
}


if(isset($_POST['insert'])){
    $Sect = $_POST["sec"];
    $SecD = $_POST["secdate"];

    $result=$mysqli->query("SELECT * FROM ".$this->section1Table." WHERE ExSection = '".$Sect."'") or die($mysqli->error());
    if(mysqli_num_rows($result) == 1){
        $_SESSION['message'] = "Section already exist";
        $_SESSION['msg_type'] = "warning";
        header("location: kai_exMark.php");
    }
    else
    {
        $mysqli->query("INSERT INTO ".$this->section1Table." (ExSection, ExDate)
        VALUES('$Sect', '$SecD')") or die($mysqli->error);
        
        $_SESSION['message'] = "Section added";
        $_SESSION['msg_type'] = "success";
    
        header("location: kai_exMark.php");

        $res=$mysqli->query("SELECT * FROM ".$this->section1Table." ") or die($mysqli->error());
        while($row = $res->fetch_assoc()): 
            if($row['ExSection'] == "" || $row['ExDate'] == ""){
                $mysqli->query("DELETE FROM ".$this->section1Table." WHERE ExSection='' OR ExDate =''") or die($mysqli->error());
                $_SESSION['message'] = "Requirement not fulfill";
                $_SESSION['msg_type'] = "danger";
            }
        endwhile;
    }
}



if(isset($_POST['update'])){
    if(isset($_POST['valid'])){
        $req = 'valid';
    }else if(isset($_POST['nvalid'])){
        $req = 'Not valid';
    }
    $edid = $_POST['exformID'];
    $edcour = $_POST["subject_id"];
    $edmar = $_POST["written_test"];
    $edmarh = $_POST["oral_test"];
    $edmarp = $_POST["project_mark"];
    $edsec = $_POST["section_id"];
    $edtol = $edmar + $edmarh + $edmarp;

    $mysqli->query("UPDATE ".$this->examTable." SET ExSection = '$edsec', ExCourse = '$edcour', ExMark = $edmar, ExMarkP = $edmarp, ExMarkH = $edmarh, ExTotal = $edtol, Validation = $req WHERE ExID=$edid") or die($mysqli->error);

    $_SESSION['message'] = "Form updated";
    $_SESSION['msg_type'] = "success";
    
    header("location: kai_exMark.php");
}
?>