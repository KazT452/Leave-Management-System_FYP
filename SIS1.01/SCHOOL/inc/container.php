<link rel="icon" type="image/png" href="../images/favicon.ico">
<head>
<script>
// realtime clock
	var currDate,currTime,currDateTime;
	var year,month,day,hour,minute,second;
	var now;
	
	function getDateTime(x) {
		if (!(x instanceof Date))
			now = new Date();
		else
			now = new Date(x);
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
        currDate = year+'-'+month+'-'+day;//currDate = year+'/'+month+'/'+day;
		currTime = hour+':'+minute+':'+second;
		currDateTime=currDate+" "+currTime;		
        return currDateTime;
    }	
</script>
</head>
<body class="" onLoad="XX();" style="background-image: url('../STAFF/IMAGES/staff/1638254484_57f5b6b5cd278f4b15f27a126e42a7b5_en.png');opacity:0.9;">
<div role="navigation" class="navbar navbar-static-top" style="border-bottom:1px solid black;background-color:#e9e9e9;opacity:0.9;">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a href="../HOME/home.php" class="navbar-brand"><img src="images/top(1).jpg" width="1140" style="opacity:0.95; border:2px solid #000000"></a>-->
          <a href="../HOME/home.php" class="navbar-brand"> <img src="../STAFF/IMAGES/staff/np_18846_1678871751.png" width="80 " height="45" style="opacity:0.9" alt="SBIT Training Sdn Bhd" title="SBIT Training Sdn Bhd"><!-- <img src="images/newlogo.png" width="130" height="30" style="opacity:0.95" >--></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="display:'';">
            <li class="active"><a style="color:purple" href="../HOME/home.php">Home</a></li>
            <li class="active"><a style="color:purple" href="../HOME/students.php">Students</a></li>
            <li class="active"><a style="color:purple" href="../HOME/teachers.php">Teachers</a></li>
            <li class="active"><a style="color:purple" href="../HOME/staff.php">Staff</a></li>
            <li class="active"><a style="color:purple" href="../HOME/school.php">School</a></li>
            <li class="active"><a style="color:purple" href="../HOME/admin.php">Admin</a></li>           
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	<div class="container" style="min-height:500px;">
	<br>
</body>
<script>
function XX()
{
	getDateTime();

	if (document.getElementById("attendanceDate")!=null)
	{
		//document.getElementById("attendanceDate").value=currDate.replace("-", "/");
		document.getElementById("attendanceDate").value=currDate;
	}	
}
</script>	