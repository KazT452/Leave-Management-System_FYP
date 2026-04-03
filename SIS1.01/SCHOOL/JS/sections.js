$(document).ready(function(){
	var sectionData = $('#sectionList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listSections'},
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

	$('#addSection').click(function(){
		$('#sectionModal').modal('show');
		$('#sectionForm')[0].reset();		
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Section");
		$('#action').val('addSection');
		$('#save').val('Save');
	});	
	
	$(document).on('submit','#sectionForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#sectionForm')[0].reset();
				$('#sectionModal').modal('hide');				
				$('#save').attr('disabled', false);
				sectionData.ajax.reload();
			}
		})
	});	
	
	$(document).on('click', '.update', function(){
		var sectionid = $(this).attr("id");
		var action = 'getSectionDetails';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{sectionid:sectionid, action:action},
			dataType:"json",
			success:function(data){
				$('#sectionModal').modal('show');
				$('#sectionid').val(data.section_id);
				$('#section_name').val(data.section);
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Section");
				$('#action').val('updateSection');
				$('#save').val('Save');
			}
		})
	});	
	
	$(document).on('click', '.delete', function(){
		var sectionid = $(this).attr("id");		
		var action = "deleteSection";
		if(confirm("Are you sure you want to delete this Section?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{sectionid:sectionid, action:action},
				success:function(data) {					
					sectionData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
	
	
	
});