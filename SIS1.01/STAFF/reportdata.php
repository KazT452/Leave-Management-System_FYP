<script language="JavaScript" type="text/javascript">
function updateReport(i) {
	arr=i.split("|");
	alert(arr[0]+"|"+arr[1]+"|"+arr[2]+"|"+arr[3]+"|"+arr[4]+"|"+arr[5]+"|"+arr[6]+"|"+arr[7]+"|"+arr[8]+"|"+arr[9]+"|"+arr[10]+"|"+arr[11]+"|"+arr[12]);
	document.getElementById("CRUD_action").value="update";
	document.getElementById("frmStaffReport").action.value="update";

	document.getElementById("CRUD_ID").value=arr[0];
	document.getElementById("CRUD_staff_id").value=arr[1];
	document.getElementById("CRUD_date1").value=arr[2];
	document.getElementById("CRUD_start_time").value=arr[3];
	document.getElementById("CRUD_end_time").value=arr[4];
	document.getElementById("CRUD_command").value=arr[5];

	
	//document.getElementById("btnCRUD_submit").click();
	//document.getElementById("frmStaffReport").submit();
	
}

function deleteReport(i) {
	arr=i.split("|");
	//alert(arr[1]);
	document.getElementById("CRUD_action").value="delete";
	
	document.getElementById("CRUD_ID").value=arr[0];
}

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("table3");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
<style>
th {
  cursor: pointer;
}

</style>

<?php 
$CRUD_action = $_SESSION['CRUD_action'];
$CRUD_id = $_SESSION['CRUD_id'];

if(!empty($_POST['action']) && $_SESSION['CRUD_action'] == 'update') {
	$user->updateStaffReport();	
}
//$id=$_SESSION['staffid'];
$id=$_SESSION["userid"];
 $dbconnect = mysqli_connect('localhost', 'root','passwd','sms');

 if($dbconnect === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
 }
 
 if(isset($_GET['pageno'])){
	$pageno=$_GET['pageno'];
}else{
	$pageno=1;
}
 $no_of_records_per_page =10;
$offset=($pageno-1) * $no_of_records_per_page ;
$total_pages_sql="select count(*) from staff_report where staff_id=$id";//echo $total_pages_sql;
$result_limit=mysqli_query($dbconnect, $total_pages_sql);
$total_rows=mysqli_fetch_array($result_limit)[0];
$total_pages=ceil($total_rows / $no_of_records_per_page);
$sql = "SELECT * FROM staff_report where staff_id = $id limit $offset, $no_of_records_per_page ";
$result = mysqli_query($dbconnect, $sql);
echo "
<table  class='table table-bordered table-striped' id='table3'>
<thead>
  <tr>
    <th  onclick='sortTable(0)'>Date <span class='glyphicon glyphicon-sort'></span></th>
    <th onclick='sortTable(1)'>Start Time <span class='glyphicon glyphicon-sort'></span></th>
    <th onclick='sortTable(2)'>End Time <span class='glyphicon glyphicon-sort'></span></th>
	<th onclick='sortTable(3)'>ID <span class='glyphicon glyphicon-sort'></span></th>
    <th onclick='sortTable(4)'>Comment <span class='glyphicon glyphicon-sort'></span></th>
	<th></th>
  </tr>
</thead>
";
if (mysqli_num_rows($result) > 0) {
  while($row = $result->fetch_assoc()) {
    echo "
  </thead>
    <tbody>
	      <tr><td>".$row['date1']."</td>
        <td>".$row["start_time"]."</td>
        <td>".$row["end_time"]."</td>
		<td>".$row['ID']."</td>
        <td>".$row["command"]."</td>
		<td>
			<button onclick='updateReport(this.id)' type='button' name='update' id='".$row['ID']."|".$row['staff_id']."|".$row['date1']."|".$row['start_time']."|".$row['end_time']."|".$row['command']."' class='btn btn-warning btn-xs update' >Update</button>
			<button onclick='deleteReport(this.id)' type='button' name='delete' id='".$row['ID']."|".$row['staff_id']."|".$row['date1']."|".$row['start_time']."|".$row['end_time']."|".$row['command']."' class='btn btn-danger btn-xs delete' >Delete</button>
		</td>
		</tr>
    </tbody>";
  }

} 
echo "</table>";
echo "<form id='frmStaffReport' method='post' action='action.php'>";
echo "Action:<input type='text' id='CRUD_action' value=''>";
echo "<br><br>Report ID : <input type='text' id='CRUD_ID' value=''>";
echo "<br>Staff ID : <input type='text' id='CRUD_staff_id' value=''>";
echo "<br>Date : <input type='text' id='CRUD_date1' value=''>";
echo "<br>Start Time : <input type='text' id='CRUD_start_time' value=''>";
echo "<br>End Time : <input type='text' id='CRUD_end_time' value=''>";
echo "<br>Comments : <input type='text' id='CRUD_command' value=''>";

echo "<br><br>&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' id='btnCRUD_submit' value='update' onclick='document.getElementById(\"btnCRUD_submit\").submit();'>";
echo "<br></form>";
?>
