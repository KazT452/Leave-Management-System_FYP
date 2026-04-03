<?php 
include('class/User.php');
$user = new User();
$user->loginStatus();
include('include/header.php');
?>

<title>Staff Report</title>
<?php include('include/container.php');?>
<div class="container contact">	
	<h2>Staff</h2>	
	<?php include 'staffmenu.php'; ?>
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   
		<a href="#"><strong><span class="fa fa-dashboard"></span>&nbsp;Staff&nbsp;Report</strong></a>
		<hr>	
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">Add&nbsp;Report</button>
		</br>
		</br>
		</br>
		</br>
		<?php include 'reportdata.php'; ?>
		</table>
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-6" align="right">
					<ul class="pagination">
						<li class="page-item <?php if($pageno <= 1){echo 'disabled';} ?>"><a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Previous</a></li>
						<li class="page-item"><a class="page-link" href="?pageno=1" >1 </a></li>
						<li class="page-item <?php if($pageno >= $total_pages){echo 'disabled';} ?>"><a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a></li>
					</ul>
				</div>
			</div>
		</div>
				<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Report</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="modalreport.php">
							<div class="form-group">
								<div class="md-form md-outline">
								<label for="default-picker">date</label>
								<input type="date" id="default-picker"  id="thedate" name="thedate"  class="form-control" placeholder="Select date">
								</div>
							</div>
							<div class="form-group">
								<div class="md-form md-outline">
								<label for="default-picker">start time</label>
								<input type="time" id="default-picker"  id="starttime" name="Starttime"  class="form-control" placeholder="Select start time">
								</div>
							</div>
							<div class="form-group">
								<div class="md-form md-outline">
								<label for="default-picker">End time</label>
								<input type="time" id="default-picker"  id="Endtime" name="Endtime"  class="form-control" placeholder="Select end time">
								</div>
							</div>
							
							<div class="form-group">
								<label for="comment">Comment:</label>
								<textarea class="form-control"  id="command" name="command"  rows="5" id="comment"></textarea>
								</div>
								<div class="modal-footer">
							<input type="submit" class="btn btn-primary" value="Add Report">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
						</form>
					</div>
			
				</div>
			</div>
		</div>
	</div>
</div>	
<?php include('include/footer.php');?>