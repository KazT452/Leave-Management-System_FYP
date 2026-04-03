$(document).ready(function(){
	var sessionData = $('#sessionList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listSessions'},
			dataType:"json"
		},
		"columnDefs":[
/*
			{
				"targets":[0, 2, 3],
				"orderable":false,
			},
*/
			{ "targets":[0, 1, -2, -1], "orderable":false, },
			{ targets: [1 ], visible: false }			
		],
		"pageLength": 1000
	});	

	$('#addSession').click(function(){
		$('#sessionModal').modal('show');
		$('#sessionForm')[0].reset();		
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Session");
		$('#action').val('addSession');
		$('#save').val('Save');
	});	
	
	$(document).on('submit','#sessionForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#sessionForm')[0].reset();
				$('#sessionModal').modal('hide');				
				$('#save').attr('disabled', false);
				sessionData.ajax.reload();
			}
		})
	});	
	
	$(document).on('click', '.update', function(){
		var sessionid = $(this).attr("id");
		var action = 'getSessionDetails';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{sessionid:sessionid, action:action},
			dataType:"json",
			success:function(data){

				$('#sessionid').val(data.session_id);
				$('#session_name').val(data.session);	//data.session
				$('#session_start').val(data.startTime); 
				$('#session_end').val(data.endTime);
				//$('#sessionstart').val(data.start); 
				//$('#sessionend').val(data.end); 
				//$('#session_start').val(data.start.substr(11,5)); 
				//$('#session_end').val(data.end.substr(11,5)); 
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Session");
				$('#action').val('updateSession');
				$('#save').val('Save');
				$('#sessionModal').modal('show');
			}
		})
	});	
	
	$(document).on('click', '.delete', function(){
		var sessionid = $(this).attr("id");		
		var action = "deleteSession";
		if(confirm("Are you sure you want to delete this Session?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{sessionid:sessionid, action:action},
				success:function(data) {					
					sessionData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
	
	
	
});