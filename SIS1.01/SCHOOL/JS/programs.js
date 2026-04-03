$(document).ready(function(){
	var programData = $('#programList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listPrograms'},
			dataType:"json"
		},
		"columnDefs":[
/*
			{
				"targets":[0, -1, -2],
				"orderable":false,
			},
*/
			{ "targets":[0, 1, -2, -1], "orderable":false, },
			{ targets: [1 ], visible: false }
		],
		"pageLength": 1000
	});	

	$('#addProgram').click(function(){
		$('#programModal').modal('show');
		$('#programForm')[0].reset();		
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Program");
		$('#action').val('addProgram');
		$('#save').val('Save');
	});	
	
	$(document).on('submit','#programForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#programForm')[0].reset();
				$('#programModal').modal('hide');				
				$('#save').attr('disabled', false);
				programData.ajax.reload();
			}
		})
	});	
	
	$(document).on('click', '.update', function(){
		var programid = $(this).attr("id");
		var action = 'getProgramDetails';	//formerly getProgram
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{programid:programid, action:action},
			dataType:"json",
			success:function(data){
				$('#programModal').modal('show');
				$('#programid').val(data.program_id);
				$('#program').val(data.program);
				if(data.type == 'Theory') {
					$('#theory').prop("checked", true);
				} else if(data.type == 'Practical') {
					$('#practical').prop("checked", true);
				}
				$('#code').val(data.code);					
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Program");
				$('#action').val('updateProgram');
				$('#save').val('Save');
			}
		})
	});	
	
	$(document).on('click', '.delete', function(){
		var programid = $(this).attr("id");		
		var action = "deleteProgram";
		if(confirm("Are you sure you want to delete this Program?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{programid:programid, action:action},
				success:function(data) {					
					programData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
	
	
	
});