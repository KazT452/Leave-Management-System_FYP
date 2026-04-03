$(document).ready(function(){
	var class_subjectData = $('#class_subjectList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listClass_Subject'},
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

	$('#addClass_Subject').click(function(){
		$('#class_subjectModal').modal('show');
		$('#class_subjectForm')[0].reset();		
		$('.modal-title').html("<i class='fa fa-plus'></i> Add and assign Subject to Class");
		$('#action').val('addClass_Subject');
		$('#save').val('Save');
	});	
	
	$(document).on('submit','#class_subjectForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#class_subjectForm')[0].reset();
				$('#class_subjectModal').modal('hide');				
				$('#save').attr('disabled', false);
				class_subjectData.ajax.reload();
			}
		})
	});	
	
	$(document).on('click', '.update', function(){
		var class_subjectid = $(this).attr("id");
		var csid=class_subjectid.split("_");
		//alert(csid[0]);
		//alert(csid[1]);
		document.getElementById('cid').value=csid[0];
		document.getElementById('sid').value=csid[1];
		var action = 'getClass_SubjectDetails';	//formerly getClass_Subject
		$.ajax({
			url:'action.php',
			method:"POST",
			//data:{class_subjectid:class_subjectid, action:action},
			//data:{updated_class_id:$('#class_id').value, updated_subject_id:$('#subject_id').value}
			data:{class_id:csid[0], subject_id:csid[1], action:action},
			//data:{cid:cid, sid:sid, class_id:class_id, subject_id:subject_id, action:action},
			//data:{class_id:csid[0], subject_id:csid[1], updated_class_id:$('#class_id').value, updated_subject_id:$('#subject_id').value, action:action},
			dataType:"json",
			success:function(data){
				$('#class_subjectModal').modal('show');				
				/*
				$('#class_subjectid').val(data.class_subject_id);
				$('#class_subject_name').val(data.class_subject);	
				$('class_subject_id').val(data.class_subject_id);
				*/
				$('#class_id').val(data.class_id);
				$('#subject_id').val(data.subject_id);	
				
				$('.modal-title').html("<i class='fa fa-plus'></i> Update Class's assigned Subject");		
						
				$('#action').val('updateClass_Subject');
				$('#save').val('Save');
			}
			
		})
	});	
	
	$(document).on('click', '.delete', function(){
		var class_subjectid = $(this).attr("id");
		var csid=class_subjectid.split("_");
		/*
		alert(csid[0]);
		alert(csid[1]);
		*/
		var action = "deleteClass_Subject";
		if(confirm("Are you sure you want to remove this Class's assigned Subject?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				//data:{class_subjectid:class_subjectid, action:action},
				data:{class_id:csid[0], subject_id:csid[1], action:action},
				success:function(data) {					
					class_subjectData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
	
	
	
});