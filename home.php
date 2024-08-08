<!DOCTYPE html>
<html>
<head>
<title>KEBELE ID MANAGEMENT SYSTEM </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<style>
	h5
	{
	background-color: 	#483D8B;
	height:50px;
	color:#ffdfdf;	
	}
	.form-signin {
            max-width: 250px;
            padding: 6px;
            margin: 0 auto;
            color: #017572;
         }
         
	#right button
	{
		background-color: #047b99;
		color: #fffbfb;
		width: 170px;
		height: 40px;
	
	}
	#right select
	{
		width: 170px;
		height: 30px;
	}
	#right input
	{
		  margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
		width: 170px;
		height: 30px;
	}
	#right h5{
		width: 170px;
	}
</style>
</head>
<body id="body">
<div id="contaner">

  <header id="header" class="clear">    
   <div id="header1">
      <img src ="image/nn.jpg" alt="m1" width="1000px" height="170px" />
    </div>
	</header>
<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
     <ul class="clear">
        <li class="active"><a href="home.php">Home</a></li>     
		  <li class="active"><a  href="#">Contact US</a></li>
		   <li class="active"><a  href="requirements.php">Requirements </a></li>
		    <li class="active"><a  href="homeViewRule.php">View Rules</a></li>
		     <li class="active"><a  href="homeviewFreeHouse.php">View Free houses</a></li>
        <li class="active"><a  href="comment.php"> Feedback</a></li> 
         </ul>
     </nav>
  </div>
</div>
<div id="left">
	<h5><font size="5" > Related Sites</font> </h5>


<h4 align="center"><a href="www.facebook.com" ><font size="4px" color="#e3e0fe" ><hr/> Google </font></a></h4>
<h4 align="center"><a href="www.yahoo.com"><font size="4px" color="#e3e0fe" ><hr/>Yahoo </font></a></h4>
<h4 align="center"><a href="www.gmail.com"><font size="4px" color="#e3e0fe" ><hr/>  Gmail </font></a></h4>	
<h4 align="center"><a href="www.facebook.com" ><font size="4px" color="#e3e0fe" ><hr/>DMU Website </font></a></h4>
<br/><br />
<h5><font size="5"> AboutDMU</font> </h5>

<h4 align="center"><a href="back.php" > <font size="4px" color="#f8f7ff" ><hr/> Background </font></a></h4>
<h4 align="center"><a href="vision.php" ><font size="4px" color="#f8f7ff" ><hr/> Vision </font></a></h4>
<h4 align="center"><a href="mission.php" ><font size="4px" color="#f8f7ff" ><hr/> Mission </font></a></h4>
<h4 align="center"><a href="www.gmail.com"><font size="4px" color="#f8f7ff" ><hr/> Objective </font></a></h4>		
<hr />
</div><!-- close left div---->
<div id="centerrrr">
<div id="register" style="background-color: #fff4f4;margin-left: 160px;width: 740px;height: auto;margin-top: 20px;border-radius: 23PX;border: 0PX SOLID"><br/>
	<h1 style="margin-left: 60px;"><font color="#163ac9" size="5"> Well Come KEBELE ID MANAGEMENT SYSTEM</font></h1>
	<br/>
	<p style="margin-left: 40px;font-style: inherit;"><font size="4"> Debre Markos University is one of the thirty-three universities which were<br />
	 established by the federal democratic republic government of Ethiopia. Its foundation<br />
	  stone was laid in 1997 E.C/.2005. The university is located two kilometers east from <br />
	  the central square of the town. It is laid out on 100 hectares. It is found in north <br />
	  western part of Ethiopia</font></p><br /><br />
	<p align="center"><img src="image/20.jpg" width="150px" height="150px"/></p><br /><br />
	<p style="margin-left: 40px;font-style: inherit;"><font size="4"> town is located 299 K.M North West of Addis Ababa and 270 K.ms South <br />
	of Bahir Dar (the capital of Amhara National Regional state). Its altitude is 2400ms above<br /> 
	sea level and it has a comfortable weather condition. This makes the university have more<br /> 
	than 1000 Instructors regular programs. </font></p><br />
	<?php
	$con=mysql_connect("localhost","root","");
mysql_select_db("kebele",$con);
$num=0;
$a=mysql_query("select * from notice") or die(mysql_error());
print "<table border='1' cellpadding=3 style='margin-left: 40px;font-style: inherit;'>
<tr>
<th>Notice_ID</th>
<th>subject</th>
<th>Content</th>
<th>Post_date</th>
</tr>";
while($rows1=mysql_fetch_array($a))
{
$num=mysql_num_rows($a);
$num=$num++;
print "<tr>";
print "<td>".$rows1['NoID'];
print "<td>".$rows1['subject'];
print "<td>".$rows1['content'];
print "<td>".$rows1['postdate'];
}
print "</tr>";
print "</table>";

echo "<b ><a href='viewfeedback.php' style='color: red;margin-left: 40px;font-style: inherit;'>You have( $num )new Notices.</a></b>";



?>
<br /><br /><br />
</div>
</div><!-- close center div---->

<div id="right">
	<h5><font size="5"> Login</font> </h5>


<div class = "container">
      
         <form class = "form-signin"  action="llogin.php" method = "post">
            <input type = "text" class = "form-control" name = "username" placeholder = " Enter username " required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "enter password " required><br />
               <select name="usertype"  >
			<select name="usertype"  >
			<option>Select Your Role</option>
				<option value="customer">Customer</option>
				<option value="admin"> Administrator</option>
				<option value="employee">Employee</option>
			
			</select><br />
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
                <h4><a href=""><font color="#fff4f4">Password Forgoten</font><font color="#d90000" size="5">?</font></a></h4>
         </form>
        
      </div>
<br />
<div id ="cal" style="width: 180px; margin-left: 10px;">
<h5><font size="5"> Calendar</font></h5>
<table width="180px" height="40px">
 
        <script type="text/javascript" src="date_time.js"></script>
    <body>
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
  
</body>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" media="screen, print, handheld" type="text/css" href="calendar.css" />
        <script type="text/javascript" src="calendar.js"></script>
    </head>
        <script type="text/javascript">
        calendar();
        </script>
        </table>
</div>
</div><!-- close right div---->
<div id="footer">
<b><strong><center>Copy right&copy;DMU house management All Rights Reserved<center></strong></b>	
</div><!---close footer div--->
</div><!-- close container div---->
</body>
</html>
