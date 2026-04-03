$(document).ready(function(){
	
	var studentid,classid,sectionid;
	var attendancestatus;
	var checkedInOut="1"; //0:none  1:In   2:Out
/*	
	var currDate,currTime,currDateTime;
	var year,month,day,hour,minute,second;
	
	function getDateTime() {	
	    var now     = new Date(); 
        year    = now.getFullYear();
        month   = now.getMonth()+1; 
        day     = now.getDate();
        hour    = now.getHours();
        minute  = now.getMinutes();
        second  = now.getSeconds(); 
	    if(month.toString().length == 1) {
             month = '0'+month;
        }
        if(day.toString().length == 1) {
             day = '0'+day;
        }   
        if(hour.toString().length == 1) {
             hour = '0'+hour;
        }
        if(minute.toString().length == 1) {
             minute = '0'+minute;
        }
        if(second.toString().length == 1) {
             second = '0'+second;
        }   
        currDate = year+'/'+month+'/'+day;//'Date: '+day+'-'+month+'-'+year+' ';
		currTime = hour+':'+minute+':'+second;//'Time: '+hour+':'+minute+':'+second+' ';
		currDateTime=currDate+" "+currTime;//year+'-'+month+'-'+day+" "+hour+':'+minute+':'+second;		
        return currDateTime;
    }
*/			
	var kelasData = $('#kelasList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"my_action.php",
			type:"POST",
			data:{action:'listKelas'},
			dataType:"json"
		},
		"columnDefs":[
/*
			{
				"targets":[0, 8],
				"orderable":false,
			},
*/
			{ "targets":[0, 1, -1], "orderable":false, },
			{ targets: [1 ], visible: false },			
		],
		"pageLength": 10
	});
	

	/*
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
					data:{classid:classid, sectionid:sectionid, action:'getStudents'},
					dataType:"json"
				},
				"columnDefs":[
					{
						"targets":[0],
						"orderable":false,
					},
				],
				"pageLength": 10
			});				
		}
	*/	

		
/*	
	$(document).on('click', '.delete', function(){
		var userid = $(this).attr("id");		
		var action = "kelasDelete";
		if(confirm("Are you sure you want to delete this class?")) {
			$.ajax({
				url:"my_action.php",
				method:"POST",
				data:{userid:userid, action:action},
				success:function(data) {					
					kelasData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
*/	

	$("#attnForm").submit(function(e) {		
		var formData = $(this).serialize();
		$.ajax({
			url:"my_action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				//$('#message').text(data).removeClass('hidden');				
			}
		});
		return false;
	});
	
	$('#addKelas').click(function(){
		/*
		$('#userModal').modal('show');
		$('#userForm')[0].reset();
		$('#passwordSection').show();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Class");
		$('#action').val('addKelas');
		$('#save').val('Add Class');
		*/
		var userid = $(this).attr("id");		
		var action = "addKelas";
		studentid = document.getElementById("sID").innerHTML;	//$('#studentid').val();
		classid = document.getElementById("cID").innerHTML;		//$('#classid').val();
		sectionid = document.getElementById("iID").innerHTML; 	//$('#sectionid').val();
		//alert(document.getElementById("uID").innerHTML);
		//alert(studentid+"\n"+classid+"\n"+sectionid+"\n"+attendancedate);
		/*if (checkedInOut=="0")//(currDate==null)
		{
			alert("Please Check In first");
		}
		else*/ if (checkedInOut=="1" || checkedInOut=="2") //Checking in/out
		{
			//alert(checkedInOut);
			getDateTime();
			document.getElementById("attendancetime").value=currTime;
			//alert(currDate+document.getElementById("startTime").innerHTML);
			var score=1.0;
			var sTime=new Date(currDate+" "+document.getElementById("startTime").innerHTML);
			//alert(sTime);
			var sTimePlus5min = new Date(dateAdd(sTime, 'minute', +5));
			//alert(sTimePlus5min);
			attendancestatus="1";
			if (now>sTimePlus5min) { attendancestatus="2"; score=2.0/3.0; }//late!!!
			if(confirm("Are you sure you want to save/update your attendance with the following?\n\nDate: "+currDate+"\nTime: "+currTime)) {
				var attendancedate=currDate;//currDateTime; //if using sis_attendance with time
				var attendancetime=currTime; //for Check In or Check Out	
				$.ajax({
					url:"my_action.php",
					method:"POST",
					data:{userid:userid, action:action, studentid:studentid, classid:classid, sectionid:sectionid, attendancedate:attendancedate, attendancetime:attendancetime, attendancestatus:attendancestatus, checkedInOut:checkedInOut, score:score},
					success:function(data) {					
						kelasData.ajax.reload();
					}
				})
			} else {
				return false;
			}
		}
	});	
/*	
	$(document).on('click', '.update', function(){
		var userid = $(this).attr("id");
		var action = 'getKelas';
		$.ajax({
			url:'my_action.php',
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
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Class");
				$('#action').val('updateKelas');
				$('#save').val('Save');
			}
		})
	});	
*/
	$(document).on('submit','#userForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"my_action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#userForm')[0].reset();
				$('#userModal').modal('hide');				
				$('#save').attr('disabled', false);
				kelasData.ajax.reload();
			}
		})
	});	

	
	$(document).on('click', '#checkIn', function(){
		//getDateTime();
		//alert("Check in details:\n\n"+currDate+"\n"+currTime);		
		//alert("Checking in");
		checkedInOut="1";
		document.getElementById("addKelas").click();
		//in2out();
	});	


	$(document).on('click', '#checkOut', function(){
		//getDateTime();
		//alert("Check out details:\n\n"+currDate+"\n"+currTime);
		//alert("Checking out");
		checkedInOut="2";
		document.getElementById("addKelas").click();
		//out2in();
	});	



});

/*
function checkIn(cid) {
	alert(cid+" Check in details:\n"+currDate+"\n"+currTime);
}

function checkOut(){
	alert();//alert(cid+" Check out details:\n"+currDate+"\n"+currTime);
}
*/

function in2out() {
		document.getElementById("checkIn").disabled=true;
		document.getElementById("checkOut").disabled=false;		
}

function out2in() {
		document.getElementById("checkIn").disabled=false; //use true for one-off
		document.getElementById("checkOut").disabled=true;		
}
