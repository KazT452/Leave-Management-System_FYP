<?php 
include('class/School.php');
$school = new School();
$school->adminLoginStatus();
include('inc/header.php');
?>
<title>School Management System</title>
<?php include('include_files.php');?>
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/jquery.daataTbles.min.js"></script><!--1.10.12-->
<script src="js/dataTables.bootstrap.min.js"></script>		
<!--script src="js/students.js"></script-->
<!--
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
-->
<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css" />
<script src="js/jquery.dataTables.min.js"></script><!--1.10.21-->
<script src="js/dataTables.bootstrap4.min.js"></script>

<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div class="content">
		<div class="container-fluid">
			<div>   
			<a href="#"><strong><span class="ti-user"></span> Teaching Info Section</strong></a>
				<hr>		
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title"></h3>
						</div>
						<div class="col-md-2" align="right">
						<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myaddModal">Add Teacher</button>
						</div>
					</div>
				</div>
<!--#####################################table display#################################################-->
				<div class="single-table">
                                    <div class="table-responsive">
                                        <table id="TeacherInfoList" class="table table-bordered table-striped">
                                            <thead> <!-- class="text-uppercase"> -->
                                                <tr class="table-active">
												<th scope="col">ID</th>
												<th scope="col">Name</th>	
												<th scope="col">Subject</th>
												<th scope="col">Competencies</th>
												<th scope="col">Status</th>
												<th scope="col">Working Time</th>
												<th scope="col">Joining Date</th>	
												<th scope="col"></th>	
												<th scope="col"></th>	
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
			<?php 
               $conn = new mysqli("localhost","root","passwd","sms");
               $sql = "SELECT * FROM sam_teacherinfo";
               $result = $conn->query($sql);
					//$count=0;
               if ($result -> num_rows >  0) {
				  
                 while ($row = $result->fetch_assoc()) 
				 {
					  //$count=$count+1;
                   ?>
                  
                   
                   <tr>
                    <!--<th><?php //echo $count ?></th>-->
                     
						<td><?php echo $row['Teacher_ID']; ?></td>
						<td><?php echo $row['Name']; ?></td>
						<td><?php echo $row['Subject']; ?></td>
						<td><?php echo $row['Competencies']; ?></td>
						<td><?php echo $row['Status']; ?></td>
						<td><?php echo $row['Working_Time']; ?></td>
						<td><?php echo $row['Joining_Date']; ?></td>
					 	<td><button type="button" class ="btn btn-warning btn-sm editbtn">EDIT</button></td>
						<td><button type="button" class ="btn btn-danger btn-sm deletebtn">DELETE</button></td>
                    </tr>
            <?php
                 
                 }
               }

            ?>

                                            </tbody>
                                        </table>
           
		
			</div>			
		</div>		
	</div>	
</div>	

      </div>
      
    </div>
  </div>
  
</div>
<!--***********************add pop up form(bootstrap) **************************-->
 <!-- Modal -->
 <div class="modal fade" id="myaddModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span>ADD</h4>
        </div>
		<form method="POST"  action="insertrecord.php">
        <div class="modal-body">
		<div class="form-group">
							<label for="teachername" class="control-label">Teacher Name*</label>
							<input type="text" class="form-control"  name="teacher_name" placeholder="Teacher Name" required>							
						</div>
						<div class="form-group">
							<label for="subjectname" class="control-label">Subject Name*</label>
							<input type="text" class="form-control"  name="subject_name" placeholder="Subject Name" required>
									
						</div>
						<div class="form-group">
						<label for="competenciesname" class="control-label">Competencies *</label>
							<!--<input type="text" class="form-control" id="competencies_name" name="competencies_name" placeholder="Competencies Name" required>-->	
							<select name="competencies_name"  class="form-control" required>
							<option value="">Select Competencies</option>
							<option value="DSE">DSE</option>
							<option value="DIP">DIP</option>	
						
							</select>					
						</div>
						<div class="form-group">
						<label for="statusname1" class="control-label">Status *</label>	
						<input type="text" class="form-control"  name="status_name" placeholder="Status Name" required>							
						</div>
						<div class="form-group">
							<label for="workingtimename" class="control-label">Working Time *</label>
							<select name="workingtime_name"  class="form-control" required>
							<option value="">Select Working Time</option>
							<option value="Full Time">Full Time</option>
							<option value="Part Time">Part Time</option>
							
						</select>							
						</div>
						<div class="form-group">
							<label for="joiningdatename" class="control-label">Joining Date *</label>
							<input type="text" class="form-control"  name="joiningdate_name" placeholder="Joining Date YY/MM/DD " required>							
						</div>
        </div>
        <div class="modal-footer">
		<button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		</form>
      </div>
      
    </div>
  </div>
		
		

<!--***********************update pop up form(bootstrap) **************************-->
  <!-- Modal -->
  <div class="modal fade" id="myeditModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span>EDIT</h4>
        </div>
		<form method="POST"  action="updaterecord.php">
        <div class="modal-body">
			   		
					   <input type="hidden" name="update_id" id="update_id"> 
			   			

						<div class="form-group">
							<label for="teachername" class="control-label">Teacher Name*</label>
							<input type="text" class="form-control" id="teacher_name" name="teacher_name" placeholder="Teacher Name" required>							
						</div>
						<div class="form-group">
							<label for="subjectname" class="control-label">Subject Name*</label>
							<input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Subject Name" required>
												
						</div>
						<div class="form-group">
						<label for="competenciesname" class="control-label">Competencies *</label>
						
							<select name="competencies_name" id="competencies_name" class="form-control" required>
							<option value="">Select Competencies</option>
							<option value="DSE">DSE</option>
							<option value="DIP">DIP</option>	
						
							</select>					
						</div>
						<div class="form-group">
						<label for="statusname1" class="control-label">Status *</label>	
						<input type="text" class="form-control" id="status_name" name="status_name" placeholder="Status Name" required>							
						</div>
						<div class="form-group">
							<label for="workingtimename" class="control-label">Working Time *</label>
							<select name="workingtime_name" id="workingtime_name" class="form-control" required>
							<option value="">Select Working Time</option>
							<option value="Full Time">Full Time</option>
							<option value="Part Time">Part Time</option>
							
						</select>							
						</div>
						<div class="form-group">
							<label for="joiningdatename" class="control-label">Joining Date *</label>
							<input type="text" class="form-control" id="joiningdate_name"  name="joiningdate_name" placeholder="Joining Date YY/MM/DD " required>							
						</div>
        </div>
        <div class="modal-footer">
		
		<button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		</form>
      </div>
      
    </div>
  </div>
  <!--***********************delete pop up form(bootstrap) **************************-->
  <!-- Modal -->
  <div class="modal fade" id="mydeleteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span>DELETE</h4>
        </div>
		<form method="POST"  action="deleterecord.php">
        <div class="modal-body">
			   		
					   <input type="hidden" name="delete_id" id="delete_id"> 
			   			
			   		<h4>Do you want to DELETE this DATA ??</h4>
        </div>
        <div class="modal-footer">
		
		<button type="submit" name="deletedata" class="btn btn-primary">Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
		</form>
      </div>
      
    </div>
  </div>
<!--######################################EDIT BUTTON################################################-->		
<script>
$(document).ready(function(){
	$('.editbtn').on('click',function(){
		$('#myeditModal').modal('show');

		$tr=$(this).closest('tr');

		var data = $tr.children("td").map(function(){

			return $(this).text();
		}).get();

		console.log(data);

		 $('#update_id').val(data[0]);
		 $('#teacher_name').val(data[1]);
		 $('#subject_name').val(data[2]);
		 $('#competencies_name').val(data[3]);
		 $('#status_name').val(data[4]);
		 $('#workingtime_name').val(data[5]);
		 $('#joiningdate_name').val(data[6]);


	});

});
</script>



<!--#######################################DELETE BUTTON#################################################-->
<script>
$(document).ready(function(){
	$('.deletebtn').on('click',function(){
		$('#mydeleteModal').modal('show');

		$tr=$(this).closest('tr');

		var data = $tr.children("td").map(function(){

			return $(this).text();
		}).get();

		console.log(data);

		 $('#delete_id').val(data[0]);
		

	});

});
</script>

<!--########################################################################################-->
<script>
$(document).ready(function() {
    $('#TeacherInfoList').DataTable({

		"pagingType":"full_numbers","lengthMenu":[
			[10,25,50,-1],
			[10,25,50,"All"]
		],
		responsive:true,
		language:{
			search:"_INPUT_",
			searchPlaceholder:"Search Record",
		}
	});
} );
</script>

<!--########################################################################################-->

<?php include('inc/footer.php');?>