<link rel="icon" type="image/png" href="images/favicon.ico">
<script>
	/**
	 * Adds time to a date. Modelled after MySQL DATE_ADD function.
	 * Example: dateAdd(new Date(), 'minute', 30)  //returns 30 minutes from now.
	 * https://stackoverflow.com/a/1214753/18511
	 * 
	 * @param date  Date to start with
	 * @param interval  One of: year, quarter, month, week, day, hour, minute, second
	 * @param units  Number of units of the given interval to add.
	 */
	function dateAdd(date, interval, units) {
	  if(!(date instanceof Date))
		return undefined;
	  var ret = new Date(date); //don't change original date
	  var checkRollover = function() { if(ret.getDate() != date.getDate()) ret.setDate(0);};
	  switch(String(interval).toLowerCase()) {
		case 'year'   :  ret.setFullYear(ret.getFullYear() + units); checkRollover();  break;
		case 'quarter':  ret.setMonth(ret.getMonth() + 3*units); checkRollover();  break;
		case 'month'  :  ret.setMonth(ret.getMonth() + units); checkRollover();  break;
		case 'week'   :  ret.setDate(ret.getDate() + 7*units);  break;
		case 'day'    :  ret.setDate(ret.getDate() + units);  break;
		case 'hour'   :  ret.setTime(ret.getTime() + units*3600000);  break;
		case 'minute' :  ret.setTime(ret.getTime() + units*60000);  break;
		case 'second' :  ret.setTime(ret.getTime() + units*1000);  break;
		default       :  ret = undefined;  break;
	  }
	  return ret;
	}
	
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
	
    setInterval(function(){
        getDateTime();
        document.getElementById("digital-clock").innerHTML = "Date: "+day+"-"+month+"-"+year+" Time: "+hour+":"+minute+":"+second;
    }, 1000);
</script>
</head>
<body class="">
<div role="navigation" class="navbar navbar-static-top" style="border-bottom:1px solid skyblue">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a href="../HOME/index.html" class="navbar-brand"><img src="images/logo.png" width="130" height="30" style="opacity:0.95"></a>-->
          <a href="../HOME/home.php" class="navbar-brand"><img src="images/logo.png" width="130" height="30" style="opacity:0.95"></a>
        </div><div id="digital-clock" class="btn btn-default btn-sm pull-right" style="margin-top:10px;"></div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav" style="display:none">
            <li class="active"><a href="../HOME/home.php">Home</a></li>
            <li class="active"><a href="../HOME/students.php">Students</a></li>
            <li class="active"><a href="../HOME/teachers.php">Teachers</a></li>
            <li class="active"><a href="../HOME/staff.php">Staff</a></li>
            <li class="active"><a href="../HOME/school.php">School</a></li>
            <li class="active"><a href="../HOME/admin.php">Admin</a></li>
          </ul>         
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	<div class="container" style="min-height:500px;">
	<div class=''>
	</div>