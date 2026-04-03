$(document).ready(function(){
	var program_subjectData = $('#program_subjectList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listProgram_Subject'},
			dataType:"json"
		},
		"columnDefs":[
/*
			{
				"targets":[0, 5, 6],
				"orderable":false,
			},
*/
			{ "targets":[0, -2, -1], "orderable":false, }
//			{ targets: [1 ], visible: false }
		],
		"pageLength": 1000
	});	

	$('#addProgram_Subject').click(function(){
		$('#program_subjectModal').modal('show');
		$('#program_subjectForm')[0].reset();		
		$('.modal-title').html("<i class='fa fa-plus'></i> Add and assign Subject to Program");
		$('#action').val('addProgram_Subject');
		$('#save').val('Save');
	});	
	
	$(document).on('submit','#program_subjectForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#program_subjectForm')[0].reset();
				$('#program_subjectModal').modal('hide');				
				$('#save').attr('disabled', false);
				program_subjectData.ajax.reload();
			}
		})
	});	
	
	$(document).on('click', '.update', function(){
		var program_subjectid = $(this).attr("id");
		var csid=program_subjectid.split("_");
		//alert(csid[0]);
		//alert(csid[1]);
		document.getElementById('pid').value=csid[0];
		document.getElementById('sid').value=csid[1];
		var action = 'getProgram_SubjectDetails';	//formerly getProgram_Subject
		$.ajax({
			url:'action.php',
			method:"POST",
			//data:{program_subjectid:program_subjectid, action:action},
			//data:{updated_program_id:$('#program_id').value, updated_subject_id:$('#subject_id').value}
			data:{program_id:csid[0], subject_id:csid[1], action:action},
			//data:{pid:pid, sid:sid, program_id:program_id, subject_id:subject_id, action:action},
			//data:{program_id:csid[0], subject_id:csid[1], updated_program_id:$('#program_id').value, updated_subject_id:$('#subject_id').value, action:action},
			dataType:"json",
			success:function(data){
				$('#program_subjectModal').modal('show');				
				/*
				$('#program_subjectid').val(data.program_subject_id);
				$('#program_subject_name').val(data.program_subject);	
				$('program_subject_id').val(data.program_subject_id);
				*/
				$('#program_id').val(data.program_id);
				$('#subject_id').val(data.subject_id);	
				
				$('.modal-title').html("<i class='fa fa-plus'></i> Update Program's assigned Subject");		
						
				$('#action').val('updateProgram_Subject');
				$('#save').val('Save');
			}
			
		})
	});	
	
	$(document).on('click', '.delete', function(){
		var program_subjectid = $(this).attr("id");
		var csid=program_subjectid.split("_");
		/*
		alert(csid[0]);
		alert(csid[1]);
		*/
		var action = "deleteProgram_Subject";
		if(confirm("Are you sure you want to remove this Program's assigned Subject?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				//data:{program_subjectid:program_subjectid, action:action},
				data:{program_id:csid[0], subject_id:csid[1], action:action},
				success:function(data) {					
					program_subjectData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
	
	
	
});