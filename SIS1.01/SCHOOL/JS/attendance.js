$(document).ready(function(){	

	var attendancestatus;
	var score=1.0;

	$('#search').click(function(){
		$('#studentList').removeClass('hidden');
		$('#saveAttendance').removeClass('hidden');
		if ($.fn.DataTable.isDataTable("#studentList")) {
			$('#studentList').DataTable().clear().destroy();
		}
		var classid = $('#classid').val();
		var sectionid = $('#sectionid').val();
		if(classid && sectionid) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{classid:classid, sectionid:sectionid, action:"attendanceStatus"},
				success:function(data) {					
					$('#message').text(data).removeClass('hidden');	
				}
			})
			$('#studentList').DataTable({
				"lengthChange": false,
				"processing":true,
				"serverSide":true,
				"order":[],
				"ajax":{
					url:"action.php",
					type:"POST",				
					data:{classid:classid, sectionid:sectionid, action:'getClassAttendence'},
					dataType:"json"
				},
				"columnDefs":[
/*				
					{
						"targets":[0],
						"orderable":false,
					},
*/
					{ "targets":[0, 1, -1], "orderable":false, },
					{ targets: [1 ], visible: false },	
				],
				"pageLength": 1000
			});				
		}
	});	
	$("#classid").change(function() {		
        $('#att_classid').val($(this).val());		
    });	
	$("#sectionid").change(function() {
		$('#att_sectionid').val($(this).val());		
    });
	$("#attendanceForm").submit(function(e) {		
		/*
		var sid=document.getElementById("id").value;
		attendancestatus=document.getElementById("attendencetype_"+sid).value;
		if (attendancestatus=="1") score=1.0;
		if (attendancestatus=="2") score=2.0/3.0;
		if (attendancestatus=="3") score=0.0;
		if (attendancestatus=="5") score=0.5;
		document.getElementById("score").value=score;
		*/
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#message').text(data).removeClass('hidden');				
			}
		});
		
		return false;
	});	
});