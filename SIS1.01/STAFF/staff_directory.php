<?php 
include('class/User.php');
$user = new User();
$user->loginStatus();
include('include/header.php');
?>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable1");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<title>Staff Report</title>
<?php include('include/container.php');?>
<div class="container contact">	
	<h2>Staff</h2>	
	<?php include 'staffmenu.php'; ?>
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   
		<a href="#"><strong><span class="fa fa-dashboard"></span>&nbsp;Staff&nbsp;Directory</strong></a>
		<hr>	
			<div class="row">
				<div class="col-md-9">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-3" align="right">
					<input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search Name.." class="form-control">
				</div>
			</div>
      <br/>
      <br/>
		<?php include 'datadirectory.php'; ?>
	</div>
</div>	
<?php include('include/footer.php');?>