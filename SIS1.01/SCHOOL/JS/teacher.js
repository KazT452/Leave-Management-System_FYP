$(document).ready(function(){
	var teacherData = $('#teacherList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listTeachers'},
			dataType:"json"
		},
		"columnDefs":[
/*
			{
				"targets":[0, 5, 6],
				"orderable":false,
			},
*/
			{ "targets":[0, 1, -2, -1], "orderable":false, },
			{ targets: [1 ], visible: false }
		],
		"pageLength": 1000
	});	

	$('#addTeacher').click(function(){
		$('#teacherModal').modal('show');
		$('#teacherForm')[0].reset();		
		$('.modal-title').html("<i class='fa fa-plus'></i> Add and assign teacher to program");
		$('#action').val('addTeacher');
		$('#save').val('Save');
	});	
	
	$(document).on('submit','#teacherForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#teacherForm')[0].reset();
				$('#teacherModal').modal('hide');				
				$('#save').attr('disabled', false);
				teacherData.ajax.reload();
			}
		})
	});	
	
	$(document).on('click', '.update', function(){
		var teacherid = $(this).attr("id");
		var action = 'getTeacherDetails';	//formerly getTeacher
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{teacherid:teacherid, action:action},
			dataType:"json",
			success:function(data){
				$('#teacherModal').modal('show');				
				$('#teacherid').val(data.teacher_id);
				$('#teacher_name').val(data.teacher);	
				$('#program_id').val(data.program_id);
				$('.modal-title').html("<i class='fa fa-plus'></i> Update teacher's assigned program");
				$('#action').val('updateTeacher');
				$('#save').val('Save');
			}
		})
	});	
	
	$(document).on('click', '.delete', function(){
		var teacherid = $(this).attr("id");		
		var action = "deleteTeacher";
		if(confirm("Are you sure you want to remove this teacher's assigned program?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{teacherid:teacherid, action:action},
				success:function(data) {					
					teacherData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
	
	
	
});