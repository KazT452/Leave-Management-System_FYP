$(document).ready(function(){
	var usersData = $('#userList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listUser'},
			dataType:"json"
		},
		"columnDefs":[
/*
			{
				"targets":[0, 7, 8],
				"orderable":false,		
			},
*/
			{ "targets":[0, 1, -3, -2, -1], "orderable":false, },
			{ targets: [1 ], visible: false },				

		],
		"pageLength": -1
	});		

	$('#addUser').click(function(){
		$('#userModal').modal('show');
		$('#userForm')[0].reset();
		$('#passwordSection').show();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add User");
		$('#action').val('addUser');
		$('#save').val('Save');
	});	
	
	$(document).on('submit','#userForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');	//var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			//data:formData,
			data: new FormData(this),
			processData: false,
			contentType: false,
			success:function(data){				
				$('#userForm')[0].reset();
				$('#userModal').modal('hide');				
				$('#save').attr('disabled', false);
				usersData.ajax.reload();
			}
		})
	});
	$(document).on('click', '.update', function(){
		var userid = $(this).attr("id");
		var action = 'getUserDetails';	//formerly listUser
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{userid:userid, action:action},
			dataType:"json",
			success:function(data){
				$('#userModal').modal('show');		
				$('#userid').val(data.id);
				$('#firstname').val(data.first_name);
				
				$('#lastname').val(data.last_name);
				$('#email').val(data.email);
				$('#password').val(data.password);
				$('#passwordSection').hide();
				if(data.gender == 'male') {
					$('#male').prop("checked", true);
				} else if(data.gender == 'female') {
					$('#female').prop("checked", true);
				}
				if(data.status == 'active') {
					$('#active').prop("checked", true);
				} else if(data.gender == 'pending') {
					$('#pending').prop("checked", true);
				}
				if(data.type == 'general') {
					$('#general').prop("checked", true);
				} else if(data.type == 'administrator') {
					$('#administrator').prop("checked", true);
				}
				$('#mobile').val(data.mobile);
				$('#designation').val(data.designation);	
				
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Users");
				$('#action').val('updateUser');
				$('#save').val('Save');
				
			}
		})
	});	
	
	
	$(document).on('click', '.delete', function(){
		var userid = $(this).attr("id");		
		var action = "userDelete";
		if(confirm("Are you sure you want to delete this user?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{userid:userid, action:action},
				success:function(data) {					
					usersData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
});