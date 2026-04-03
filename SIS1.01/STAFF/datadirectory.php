<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable1");
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

function zoomphoto(x)
{
/*
x.src='../SCHOOL/upload/man_291x393.jpg';
x.style.width=500;
x.style.height=500;
alert(x.width);
*/
}
</script>
<style>
th {
  cursor: pointer;
}

</style>
<?php 
 $dbconnect = mysqli_connect('localhost', 'root','passwd','sms');
 if($dbconnect === false){
     die("ERROR: Could not connect. " . mysqli_connect_error());
 }
echo "
<table class='table table-bordered' id='myTable1' cellspacing='0' cellpadding='0'>
	<thead>
		<tr class='active'>
		<th onclick='sortTable(0)'>Department/Position</th>
		<th onclick='sortTable(1)'>Name</th>
		<th onclick='sortTable(2)'>EXT</th>
    <th onclick='sortTable(3)'>H/P & Office Number</th>	
	<th onclick='sortTable(4)'>Email</th>
    <th onclick='sortTable(5)'>Photo</th></tr>		
	</thead>
  <tbody>";

$sql = "SELECT position_id FROM sms.staff_position";
$position = mysqli_query($dbconnect, $sql);
$i=0;
if (mysqli_num_rows($position) > 0) {
  while($rows = $position->fetch_assoc()) {
	$c=0;  
	$sql = "SELECT concat(user.first_name,' ',user.last_name) as name,staff_info.id,staff_position.position_id,staff_position.position_name,staff_info.job_title,staff_info.ext,staff_info.home_number,staff_info.phone_number,staff_info.email,user.image FROM staff_info left join user on user.id=staff_info.staff_id left join staff_position on staff_position.position_id=staff_info.position where position=".($i+1);
	$result = mysqli_query($dbconnect, $sql); 
	if (mysqli_num_rows($result) > 0) {
		while($row = $result->fetch_assoc()) {
			if ($c==0) {$c++; echo "<tr class='info'><th colspan='6'>".$row["position_name"]."</th></tr>";}
			if ($row['image']=='man_291x393.jpg' OR $row['image']=='woman_203x201.jpg' OR $row['image']=='') $row['image']='pp.jfif';
			echo "
				<tr><td style='vertical-align:middle'>".$row["job_title"]."</td>
				<td style='vertical-align:middle'>".$row["name"]."</td>
				<td style='vertical-align:middle'>".$row["ext"]."</td>
				<td style='vertical-align:middle'>".$row["home_number"]."<br>".$row["phone_number"]."</td>
				<td style='vertical-align:middle'>".$row["email"]."</td>				
				<td style='vertical-align:middle'><img style='width:30px; height:30px; border:1px outset lightgrey;  padding:0px; margin:0px;' src='../SCHOOL/upload/".$row['image']."' onclick='zoomphoto(this)'></td></tr>
			";
		}	
	}
	$i=$i+1;
	} 
  }
echo "</tbody></table>";
?>
